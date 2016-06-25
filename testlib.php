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
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
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
 *          return array('limit' => .5, 'over' => .8);
 *      }
 *
 * 1) The function must return an array with attributes :
 *      (float) limit: Time limit too high but acceptable (orange)
 *      (float) over: Over time, the benchmark fail (red)
 * 
 * 2) The function must have strings in language file "/lang/xy/report_benchmark.php"
 *
 * If you create more test, please send it to the community
 * 
 * 
 *
 */
defined('MOODLE_INTERNAL') || die();

/**
 * BenchMark Test
 */

class benchmark_test extends benchmark {

    public static function cload() {
        return array('limit' => .5, 'over' => .8, 'start' => BENCHSTART);
    }

    public static function processor() {

        $pass = 10000000;
        for ($i = 0; $i < $pass; ++$i);
        $i = 0;
        while($i < $pass) {
            ++$i;
        }

        return array('limit' => .5, 'over' => .8, 'fail' => );
    }


    public static function fileread() {

        global $CFG;

        file_put_contents($CFG->tempdir.'/benchmark.temp', 'benchmark');
        $i = 0;
        $pass = 2000;
        while($i < $pass) {
            ++$i;
            file_get_contents($CFG->tempdir.'/benchmark.temp');
        }
        unlink($CFG->tempdir.'/benchmark.temp');

        return array('limit' => .5, 'over' => .8);

    }
    
    /*

    private function filewrite($pass) {
        $lorem      = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus felis, dignissim quis nisl sit amet, blandit suscipit lacus. Duis maximus, urna sed fringilla consequat, tellus ex sollicitudin ante, vitae posuere neque purus nec justo. Donec porta ipsum sed urna tempus, sit amet dictum lorem euismod. Phasellus vel erat a libero aliquet venenatis. Phasellus condimentum venenatis risus ut egestas. Morbi sit amet posuere orci, id tempor dui. Vestibulum eget sapien eget mauris eleifend ullamcorper. In finibus mauris id augue fermentum porta. Fusce dictum vestibulum justo eget malesuada. Nullam at tincidunt urna, nec ultrices velit. Nunc eget augue velit. Mauris sed rhoncus purus. Etiam aliquam urna ac nisl tristique, vitae tristique urna tincidunt. Vestibulum luctus nulla magna, non tristique risus rhoncus nec. Vestibulum vestibulum, nulla scelerisque congue molestie, dolor risus hendrerit velit, non malesuada nisi orci eget eros. Aenean interdum ut lectus quis semper. Curabitur viverra vitae augue id.';
        $loremipsum = str_repeat($lorem, 16);
        $i = 0;
        while($i < $pass) {
            ++$i;
            file_put_contents($this->cfg->tempdir.'/benchmark.temp', $loremipsum);
        }
        unlink($this->cfg->tempdir.'/benchmark.temp');
    }

    private function courseread($pass) {
        $i = 0;
        while($i < $pass) {
            ++$i;
            $this->db->get_record('course', array('id' => 1));
        }
    }

    private function coursewrite($pass) {
        $uniq                   = md5(uniqid(rand(), true));
        $newrecord              = new stdClass;
        $newrecord->shortname   = '!!!BENCH-'.$uniq;
        $newrecord->fullname    = '!!!BENCH-'.$uniq;
        $newrecord->format      = 'site';
        $newrecord->visible     = 0;
        $newrecord->sortorder   = 0;
        $i = 0;
        while($i < $pass) {
            ++$i;
            $this->db->insert_record('course', $newrecord);
        }
        $this->db->delete_records('course', array('shortname' => $newrecord->shortname));
        unset($newrecord);
    }

    private function querytype1($pass) {
        $i = 0;
        $sql = "SELECT bi.id,bp.id AS blockpositionid,bi.blockname,bi.parentcontextid,bi.showinsubcontexts,bi.pagetypepattern,bi.subpagepattern,bi.defaultregion,bi.defaultweight,COALESCE(bp.visible, 1) AS visible,COALESCE(bp.region, bi.defaultregion) AS region,COALESCE(bp.weight, bi.defaultweight) AS weight,bi.configdata, ctx.id AS ctxid, ctx.path AS ctxpath, ctx.depth AS ctxdepth, ctx.contextlevel AS ctxlevel, ctx.instanceid AS ctxinstance FROM mdl_block_instances bi JOIN mdl_block b ON bi.blockname = b.name LEFT JOIN mdl_block_positions bp ON bp.blockinstanceid = bi.id AND bp.contextid = '26' AND bp.pagetype = 'mod-forum-discuss' AND bp.subpage = '' LEFT JOIN mdl_context ctx ON (ctx.instanceid = bi.id AND ctx.contextlevel = '80') WHERE (bi.parentcontextid = '26' OR (bi.showinsubcontexts = 1 AND bi.parentcontextid IN ('16','3','1'))) AND bi.pagetypepattern IN ('mod-forum-discuss','mod-forum-discuss-*','mod-forum-*','mod-*','*') AND (bi.subpagepattern IS NULL OR bi.subpagepattern = '') AND (bp.visible = 1 OR bp.visible IS NULL) AND b.visible = 1 ORDER BY COALESCE(bp.region, bi.defaultregion),COALESCE(bp.weight, bi.defaultweight),bi.id;";
        while($i < $pass) {
            ++$i;
            $this->db->get_records_sql($sql);
        }
    }

    private function querytype2($pass) {
        $i = 0;
        $sql = "SELECT parent_states.filter, CASE WHEN fa.active IS NULL THEN 0 ELSE fa.active END AS localstate, parent_states.inheritedstate FROM (SELECT f.filter, MAX(f.sortorder) AS sortorder, CASE WHEN MAX(f.active * ctx.depth) > -MIN(f.active * ctx.depth) THEN 1 ELSE -1 END AS inheritedstate FROM mdl_filter_active f JOIN mdl_context ctx ON f.contextid = ctx.id WHERE ctx.id IN (1,3,16) GROUP BY f.filter HAVING MIN(f.active) > -9999 ) parent_states LEFT JOIN mdl_filter_active fa ON fa.filter = parent_states.filter AND fa.contextid = 26 ORDER BY parent_states.sortorder;";
        while($i < $pass) {
            ++$i;
            $this->db->get_records_sql($sql);
        }
    }

    private function loginguest() {
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array(
                        'username' => 'guest',
                        'password' => 'guest',
                    )
                )
            )
        );
        file_get_contents($this->cfg->wwwroot.'/login/index.php', false, stream_context_create($opts));
    }

    private function loginuser() {
        $user               = new stdClass();
        $user->auth         = 'manual';
        $user->confirmed    = 1;
        $user->mnethostid   = 1;
        $user->email        = 'benchtest@benchtest.com';
        $user->username     = 'benchtest';
        $user->password     = md5('benchtest');
        $user->lastname     = 'benchtest';
        $user->firstname    = 'benchtest';
        $user->id           = $this->db->insert_record('user', $user);
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => http_build_query(
                    array(
                        'username' => 'benchtest',
                        'password' => md5('benchtest'),
                    )
                )
            )
        );
        file_get_contents($this->cfg->wwwroot . '/login/index.php', false, stream_context_create($opts));
        $this->db->delete_records('user', array('id' => $user->id));
        unset($user);
    }
    */

}
