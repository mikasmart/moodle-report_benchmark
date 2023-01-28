<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Declare all tests for the benchmark
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @copyright  2023 onwards Nicolas Martignoni {@link nicolas@martignoni.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * HOW TO CREATE A TEST
 *
 * Create a public static function in this class (benchmark_test).
 * The function doesn't need to be declared elsewhere because it is automaticly loaded by the main class "benchmark".
 *
 * Structure :
 *
 *      public static function the_function_name() {
 *          echo 'foo';
 *          return array('limit' => .5, 'over' => .8, 'fail' => BENCHFAIL_BLABLABLA, 'url' => '/admin/index.php');
 *      }
 *
 * 1) The function must return an array with attributes :
 *      (float) limit: Time limit too high but acceptable (orange).
 *      (float) over : Over time, the benchmark fail (red).
 *      (define) fail : To display the good text if the test fail.
 *      (text) text : URL as parameter for the solution string.
 *
 * 2) The function must have strings adequately defined in language file.
 *
 * If you create more tests, please contribute them to the community.
 *
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Benchmark Test
 */

// Define to join the language pack.
define('BENCHFAIL_SLOWSERVER', 'slowserver');
define('BENCHFAIL_SLOWPROCESSOR', 'slowprocessor');
define('BENCHFAIL_SLOWHARDDRIVE', 'slowharddrive');
define('BENCHFAIL_SLOWDATABASE', 'slowdatabase');
define('BENCHFAIL_SLOWWEB', 'slowweb');

/**
 * Tests for the BenchMark report
 *
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_benchmark_test extends report_benchmark {

    /**
     * Moodle configuration file (config.php) loading time
     *
     * @return array Contains the test results
     */
    public static function cload() {

        return array(
            'limit' => .5,
            'over'  => .8,
            'start' => BENCHSTART,
            'stop'  => BENCHSTOP,
            'fail'  => BENCHFAIL_SLOWSERVER,
            'url'   => ''
        );

    }

    /**
     * Stress processor by looping many times
     *
     * @return array Contains the test results
     */
    public static function processor() {

        $pass = 10000000;
        for ($i = 0; $i < $pass; ++$i) {
        };
        $i = 0;
        while ($i < $pass) {
            ++$i;
        }

        return array('limit' => .5, 'over' => .8, 'fail' => BENCHFAIL_SLOWPROCESSOR, 'url' => '');

    }

    /**
     * Read many files from the Moodle's temporary shared folder
     *
     * @return array Contains the test results
     */
    public static function fileread() {
        global $CFG;

        $tempfile = make_temp_directory('benchmark') . DIRECTORY_SEPARATOR . 'benchmark.temp';
        file_put_contents($tempfile, 'benchmark');
        $i = 0;
        $pass = 2000;
        while ($i < $pass) {
            ++$i;
            file_get_contents($tempfile);
        }
        unlink($tempfile);

        return array('limit' => .5, 'over' => .8, 'fail' => BENCHFAIL_SLOWHARDDRIVE, 'url' => '');

    }

    /**
     * Create many files in the Moodle's temporary shared folder
     *
     * @return array Contains the test results
     */
    public static function filewrite() {
        global $CFG;

        $lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus felis, dignissim quis nisl sit amet, blandit suscipit lacus. Duis maximus, urna sed fringilla consequat, tellus ex sollicitudin ante, vitae posuere neque purus nec justo. Donec porta ipsum sed urna tempus, sit amet dictum lorem euismod. Phasellus vel erat a libero aliquet venenatis. Phasellus condimentum venenatis risus ut egestas. Morbi sit amet posuere orci, id tempor dui. Vestibulum eget sapien eget mauris eleifend ullamcorper. In finibus mauris id augue fermentum porta. Fusce dictum vestibulum justo eget malesuada. Nullam at tincidunt urna, nec ultrices velit. Nunc eget augue velit. Mauris sed rhoncus purus. Etiam aliquam urna ac nisl tristique, vitae tristique urna tincidunt. Vestibulum luctus nulla magna, non tristique risus rhoncus nec. Vestibulum vestibulum, nulla scelerisque congue molestie, dolor risus hendrerit velit, non malesuada nisi orci eget eros. Aenean interdum ut lectus quis semper. Curabitur viverra vitae augue id.';
        $loremipsum = str_repeat($lorem, 16);
        $i = 0;
        $pass = 2000;
        $tempfile = make_temp_directory('benchmark') . DIRECTORY_SEPARATOR . 'benchmark.temp';
        while ($i < $pass) {
            ++$i;
            file_put_contents($tempfile, $loremipsum);
            unlink($tempfile);
        }

        return array('limit' => 1, 'over' => 1.25, 'fail' => BENCHFAIL_SLOWHARDDRIVE, 'url' => '');

    }

    /**
     * Read the homepage course many times
     *
     * @return array Contains the test results
     */
    public static function courseread() {
        global $DB;

        $i = 0;
        $pass = 500;
        while ($i < $pass) {
            ++$i;
            $DB->get_record('course', array('id' => SITEID));
        }

        return array('limit' => .75, 'over' => 1, 'fail' => BENCHFAIL_SLOWDATABASE, 'url' => '');

    }

    /**
     * Create a new course many times
     *
     * @return array Contains the test results
     */
    public static function coursewrite() {
        global $DB;

        $uniq = md5(uniqid(rand(), true));
        $newrecord = new stdClass;
        $newrecord->shortname = '!!!BENCH-'.$uniq;
        $newrecord->fullname = '!!!BENCH-'.$uniq;
        $newrecord->format = 'site';
        $newrecord->visible = 0;
        $newrecord->sortorder = 0;

        $i = 0;
        $pass = 25;
        while ($i < $pass) {
            ++$i;
            $DB->insert_record('course', $newrecord);
        }
        $DB->delete_records('course', array('shortname' => $newrecord->shortname));
        unset($newrecord);

        return array('limit' => 1, 'over' => 1.25, 'fail' => BENCHFAIL_SLOWDATABASE, 'url' => '');

    }

    /**
     * Execute many times a complex DB request (n°1)
     *
     * @return array Contains the test results
     */
    public static function querytype1() {
        global $DB;

        $i = 0;
        $sql = "SELECT bi.id,
                         bp.id AS blockpositionid,
                         bi.blockname,
                         bi.parentcontextid,
                         bi.showinsubcontexts,
                         bi.pagetypepattern,
                         bi.subpagepattern,
                         bi.defaultregion,
                         bi.defaultweight,
                         COALESCE (bp.visible, 1) AS visible,
                         COALESCE (bp.region, bi.defaultregion) AS region,
                         COALESCE (bp.weight, bi.defaultweight) AS weight,
                         bi.configdata,
                         ctx.id AS ctxid,
                         ctx.path AS ctxpath,
                         ctx.depth AS ctxdepth,
                         ctx.contextlevel AS ctxlevel,
                         ctx.instanceid AS ctxinstance
                    FROM {block_instances} bi
                         JOIN {block} b ON bi.blockname = b.name
                         LEFT JOIN
                         {block_positions} bp
                            ON     bp.blockinstanceid = bi.id
                               AND bp.contextid = '26'
                               AND bp.pagetype = 'mod-forum-discuss'
                               AND bp.subpage = ''
                         LEFT JOIN {context} ctx
                            ON (ctx.instanceid = bi.id AND ctx.contextlevel = '80')
                   WHERE     (   bi.parentcontextid = '26'
                              OR (    bi.showinsubcontexts = 1
                                  AND bi.parentcontextid IN ('16', '3', '1')))
                         AND bi.pagetypepattern IN
                                ('mod-forum-discuss',
                                 'mod-forum-discuss-*',
                                 'mod-forum-*',
                                 'mod-*',
                                 '*')
                         AND (bi.subpagepattern IS NULL OR bi.subpagepattern = '')
                         AND (bp.visible = 1 OR bp.visible IS NULL)
                         AND b.visible = 1
                ORDER BY COALESCE (bp.region, bi.defaultregion),
                         COALESCE (bp.weight, bi.defaultweight),
                         bi.id";
        $pass = 100;
        while ($i < $pass) {
            ++$i;
            $DB->get_records_sql($sql);
        }

        return array('limit' => .5, 'over' => .7, 'fail' => BENCHFAIL_SLOWDATABASE, 'url' => '');

    }

    /**
     * Execute many times another complex DB request (n°2)
     *
     * @return array Contains the test results
     */
    public static function querytype2() {
        global $DB;

        $i = 0;
        $sql = "SELECT parent_states.filter,
                       CASE WHEN fa.active IS NULL THEN 0 ELSE fa.active END AS localstate,
                       parent_states.inheritedstate
                  FROM (SELECT f.filter,
                               MAX(f.sortorder) AS sortorder,
                               CASE WHEN MAX(f.active * ctx.depth) > -MIN(f.active * ctx.depth)
                               THEN 1 ELSE - 1 END AS inheritedstate
                          FROM {filter_active} f
                          JOIN {context} ctx ON f.contextid = ctx.id
                         WHERE ctx.id IN (1, 3, 16)
                      GROUP BY f.filter
                        HAVING MIN(f.active) > -9999) parent_states
             LEFT JOIN {filter_active} fa
                    ON fa.filter = parent_states.filter AND fa.contextid = 26
              ORDER BY parent_states.sortorder";

        $pass = 250;
        while ($i < $pass) {
            ++$i;
            $DB->get_records_sql($sql);
        }

        return array('limit' => .3, 'over' => .5, 'fail' => BENCHFAIL_SLOWDATABASE, 'url' => '');

    }

    /**
     * Download a few times the admin notification page (cached!)
     *
     * @return array Contains the test results
     */
    public static function notificatiopagedownload() {
        global $CFG;

        $i = 0;
        $pass = 3;
        while ($i < $pass) {
            ++$i;
            download_file_content($CFG->wwwroot.'/admin/index.php?cache=1');
        }

        return array('limit' => .3, 'over' => .8, 'fail' => BENCHFAIL_SLOWWEB, 'url' => '/admin/purgecaches.php');

    }

}
