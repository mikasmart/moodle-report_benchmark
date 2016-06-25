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
 * Library for the benchmark report
 *
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


// TODO : Finir la prise en charge EN

require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/config.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/version.php');

set_time_limit(120);

class BenchMark {

    public  $version    = '0.0.1b';

    private $cfg        = null;
    private $db         = null;
    private $lang       = null;

    // Nouvelle gestion des chaînes
    private $tests = null;
    private $tpl_loader = null;

    private $tpl_result_details = <<<EOD
        <tr>
            <td class="text-center">{{id}}</td>
            <td>{{name}}</td>
            <td class="text-center {{class}}">{{during}}</td>
            <td class="text-center">{{limit}}</td>
            <td class="text-center">{{over}}</td>
        </tr>
EOD;

    public function  __construct() {

        global $plugin;
        if (!empty($plugin->release)) {
            $this->version = $plugin->release;
        }

        $lang       = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $this->lang = 'fr'; //($lang == 'fr' || $lang == 'en') ? $lang : 'fr';

        // String initialization

        $this->tests      = array(
        'cload'         => array(
            'name'      => get_string('cloadname', 'report_benchmark'),
            'moreinfo'  => get_string('cloadmoreinfo', 'report_benchmark'),
            'nbpass'    => false,
            'limit'     => .5,
            'over'      => .8,
            'overtips'  => array(
                    'label' => get_string('cloadovertipslabel', 'report_benchmark'),
                    'solution' => get_string('cloadovertipssolution', 'report_benchmark')
            )
        ),
        // Chargement de Moodle
        'processor'     => array(
            'name'      => get_string('processorname', 'report_benchmark'),
            'moreinfo'  => get_string('processormoreinfo', 'report_benchmark'),
            'nbpass'    => 10000000,
            'limit'     => .5,
            'over'      => .8,
            'overtips'  => array(
                    'label' => get_string('processorovertipslabel', 'report_benchmark'),
                    'solution' => get_string('processorovertipssolution', 'report_benchmark')
            )
        ),      // Puissance de calcul processeur
        'fileread'      => array(
            'name'      => get_string('filereadname', 'report_benchmark'),
            'moreinfo'  => get_string('filereadmoreinfo', 'report_benchmark'),

            'nbpass'    => 2000,
            'limit'     => .6,
            'over'      => .8,
            'overtips'  => array(
                    'label' => get_string('filereadovertipslabel', 'report_benchmark'),
                    'solution' => get_string('filereadovertipssolution', 'report_benchmark')
            )
        ),      // Lecture sur disque du dossier temporaire
        'filewrite'     => array(
            'name'      => get_string('filewritename', 'report_benchmark'),
            'moreinfo'  => get_string('filewritemoreinfo', 'report_benchmark'),
            'nbpass'    => 2000,
            'limit'     => 1,
            'over'      => 1.25,
            'overtips'  => array(
                    'label' => get_string('filewriteovertipslabel', 'report_benchmark'),
                    'solution' => get_string('filewriteovertipssolution', 'report_benchmark')
            )
        ),      // Ecriture sur disque du dossier temporaire
        'courseread'    => array(
            'name'      => get_string('coursereadname', 'report_benchmark'),
            'moreinfo'  => get_string('coursereadmoreinfo', 'report_benchmark'),
            'nbpass'    => 500,
            'limit'     => .75,
            'over'      => 1,
            'overtips'  => array(
                    'label' => get_string('coursereadovertipslabel', 'report_benchmark'),
                    'solution' => get_string('coursereadovertipssolution', 'report_benchmark')
            )
        ),      // Lecture d'un cours
        'coursewrite'   => array(
            'name'      => get_string('coursewritename', 'report_benchmark'),
            'moreinfo'  => get_string('coursewritemoreinfo', 'report_benchmark'),
            'nbpass'    => 25,
            'limit'     => 1,
            'over'      => 1.25,
            'overtips'  => array(
                    'label' => get_string('coursewriteovertipslabel', 'report_benchmark'),
                    'solution' => get_string('coursewriteovertipssolution', 'report_benchmark')
            )
        ),      // Ecriture d'un cours
        'querytype1'    => array(
            'name'      => get_string('querytype1name', 'report_benchmark'),
            'moreinfo'  => get_string('querytype1moreinfo', 'report_benchmark'),
            'nbpass'    => 100,
            'limit'     => .5,
            'over'      => .7,
            'overtips'  => array(
                    'label' => get_string('querytype1overtipslabel', 'report_benchmark'),
                    'solution' => get_string('querytype1overtipssolution', 'report_benchmark')
            )
        ),      // Exécution d'une requete complexe n°1
        'querytype2'    => array(
            'name'      => get_string('querytype2name', 'report_benchmark'),
            'moreinfo'  => get_string('querytype2moreinfo', 'report_benchmark'),
            'nbpass'    => 250,
            'limit'     => .3,
            'over'      => .38,
            'overtips'  => array(
                    'label' => get_string('querytype2overtipslabel', 'report_benchmark'),
                    'solution' => get_string('querytype2overtipssolution', 'report_benchmark')
            )
        ),      // Exécution d'une requete complexe n°2
        'loginguest'    => array(
            'name'      => get_string('loginguestname', 'report_benchmark'),
            'moreinfo'  => get_string('loginguestmoreinfo', 'report_benchmark'),
            'nbpass'    => 250,
            'limit'     => .3,
            'over'      => .38,
            'overtips'  => array(
                    'label' => get_string('loginguestovertipslabel', 'report_benchmark'),
                    'solution' => get_string('loginguestovertipssolution', 'report_benchmark')
            )
        ),      // Relève le temps de connexion du compte guest
        'loginuser'     => array(
            'name'      => get_string('loginusername', 'report_benchmark'),
            'moreinfo'  => get_string('loginusermoreinfo', 'report_benchmark'),
            'nbpass'    => 250,
            'limit'     => .3,
            'over'      => .38,
            'overtips'  => array(
                    'label' => get_string('loginuserovertipslabel', 'report_benchmark'),
                    'solution' => get_string('loginuserovertipssolution', 'report_benchmark')
            )
        )      // Relève le temps de connexion d'un compte utilisateur
    );

        if (empty($_GET['step'])) {
            $data = array(
                'lang'      => $this->lang,
                'version'   => $this->version
            );

        $this->tpl_loader = '
        <div class="container">
            <div class="page-header"><h1>'.get_string('titre','report_benchmark', $this->version).'</h1></div>
            '.get_string('info','report_benchmark').'
            <div class="text-center">
                <a href="?step=run" class="btn btn-primary">'.get_string('start','report_benchmark').'</a>
            </div>
        </div>
        <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script language="javascript">
        var countdown = 10;
        $(document).ready(function() {
            setInterval(function(){
                --countdown;
                $(\'#countdown\').text(countdown);
                if (countdown == 0) {
                    document.location.href=\'?step=run\';
                }
            }, 1000);
        });
        </script>
'."\n";
            echo $this->renderer($this->tpl_loader, $data);
        } elseif ($_GET['step'] == 'run') {
            $this->launching();

            $total = $this->total();
            $score = ceil($total * 100);
/*
            $data = array(
                'lang'      => $this->lang,
                'version'   => $this->version,
                'total'     => $total,
                'score'     => ceil($total * 100),
            );

            $data['results']    = $this->results();
            $data['tips']       = $this->tips();
*/

            $this->tpl_result = '
        <nav class="navbar navbar-default hidden-print">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">'.get_string('toggle','report_benchmark').'</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">'.get_string('titre','report_benchmark', $this->version).'</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="pull-right"><a href="?step=run" class="pull-right">'.get_string('redo','report_benchmark').'</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <h3 id="score" class="text-center">Score du benchmark : <span class="text-success">'.get_string('scoremsg','report_benchmark',  $score).'</span></h3>

            <h4>'.get_string('resultat','report_benchmark').'</h4>
            <table class="table table-hover" id="result">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>'.get_string('description','report_benchmark').'</th>
                        <th class="text-center">'.get_string('duree','report_benchmark').'</th>
                        <th class="text-center">'.get_string('limiteacceptable','report_benchmark').'</th>
                        <th class="text-center">'.get_string('limitecritique','report_benchmark').'</th>
                    </tr>
                </thead>
                <tbody>
                    '.$this->results().'
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="2" class="text-right">'.get_string('resultat','report_benchmark').'</th>
                        <th colspan="1" class="text-right">'.get_string('total','report_benchmark',$this->total()).'</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                    <tr>
                        <th colspan="2" class="text-right">'.get_string('score','report_benchmark').'</th>
                        <th colspan="1" class="text-right">'.get_string('points','report_benchmark', $score).'</th>
                        <th colspan="2">&nbsp;</th>
                    </tr>
                </tfoot>
            </table>

            <div id="tips">
                '.$this->tips().'
            </div>

            <div class="text-center">
                <a class="btn btn-primary" href="?step=run">'.get_string('repasser','report_benchmark').'</a>

                <a class="btn btn-primary" href="javascript:void();" onclick="window.print();">'.get_string('imprimer','report_benchmark').'</a>
            </div>

        </div>
        <script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
'."\n";


            // echo $this->renderer($this->tpl_result, $data);
            echo $this->tpl_result;
        }

    }

    private function renderer($html, $data) {
        foreach($data as $key => $value) {
            $html = str_replace('{{'.$key.'}}', $value, $html);
        }
        return $html;
    }

    private function launching() {
        foreach($this->tests as $name => $test) {
            if (method_exists($this, 'bench_'.$name)) {
                $start  = microtime(true);
                call_user_func_array(array($this, 'bench_' . $name), array($test['nbpass']));
                $this->tests[$name]['during'] = round(microtime(true) - $start, 4);
            } else {
                die('<pre>Method bench_'.$name.' not exist.</pre>');
            }
        }
    }

    private function results() {
        $output = null;
        $id     = 0;
        foreach($this->tests as $name => $test) {
            ++$id;
            if ($test['during'] >= $test['over']) {
                $class = 'danger';
            } elseif ($test['during'] >= $test['limit']) {
                $class = 'warning';
            } else {
                $class = 'success';
            }
            $data = array(
                'id'        => $id,
                'class'     => $class,
                'name'      => $test['name'],
                'during'    => $test['during'],
                'limit'     => $test['limit'],
                'over'      => $test['over'],
            );
            $output .= $this->renderer($this->tpl_result_details, $data);
        }
        return $output;
    }

    private function total() {
        $total = 0;
        foreach($this->tests as $test) {
            $total += $test['during'];
        }
        return $total;
    }

    private function tips() {
        $output = null;
        foreach($this->tests as $test) {
            if ($test['during'] >= $test['limit']) {
                $output .= '<h5>' . $test['overtips']['label'] . '</h5>' . $test['overtips']['solution'];
            }
        }
        if (empty($output)) {
            $output .= '<div class="alert alert-success" role="alert">'.get_string('felicitation','report_benchmark').'</div>';
        } else {
            $output = '<div class="alert alert-warning" role="alert">'.get_string('alerte','report_benchmark'). ' ' . $output . '</div>';
        }
        return $output;
    }

    // Test, must by named by the prefix bench_ and added in the tests array

    private function bench_cload() {
        // Never delete this test !
        // $CFG = $DB = null;
        // require 'config.php';
        // require_once(dirname(__FILE__).'/../../config.php');
        global $CFG;
        global $DB;

        $this->cfg  = $CFG;
        $this->db   = $DB;
    }

    private function bench_processor($pass) {
        for ($i = 0; $i < $pass; ++$i);
        $i = 0;
        while($i < $pass) {
            ++$i;
        }
    }

    private function bench_fileread($pass) {
        file_put_contents($this->cfg->tempdir.'/benchmark.temp', 'benchmark');
        $i = 0;
        while($i < $pass) {
            ++$i;
            file_get_contents($this->cfg->tempdir.'/benchmark.temp');
        }
        unlink($this->cfg->tempdir.'/benchmark.temp');
    }

    private function bench_filewrite($pass) {
        $lorem      = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus felis, dignissim quis nisl sit amet, blandit suscipit lacus. Duis maximus, urna sed fringilla consequat, tellus ex sollicitudin ante, vitae posuere neque purus nec justo. Donec porta ipsum sed urna tempus, sit amet dictum lorem euismod. Phasellus vel erat a libero aliquet venenatis. Phasellus condimentum venenatis risus ut egestas. Morbi sit amet posuere orci, id tempor dui. Vestibulum eget sapien eget mauris eleifend ullamcorper. In finibus mauris id augue fermentum porta. Fusce dictum vestibulum justo eget malesuada. Nullam at tincidunt urna, nec ultrices velit. Nunc eget augue velit. Mauris sed rhoncus purus. Etiam aliquam urna ac nisl tristique, vitae tristique urna tincidunt. Vestibulum luctus nulla magna, non tristique risus rhoncus nec. Vestibulum vestibulum, nulla scelerisque congue molestie, dolor risus hendrerit velit, non malesuada nisi orci eget eros. Aenean interdum ut lectus quis semper. Curabitur viverra vitae augue id.';
        $loremipsum = str_repeat($lorem, 16);
        $i = 0;
        while($i < $pass) {
            ++$i;
            file_put_contents($this->cfg->tempdir.'/benchmark.temp', $loremipsum);
        }
        unlink($this->cfg->tempdir.'/benchmark.temp');
    }

    private function bench_courseread($pass) {
        $i = 0;
        while($i < $pass) {
            ++$i;
            $this->db->get_record('course', array('id' => 1));
        }
    }

    private function bench_coursewrite($pass) {
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

    private function bench_querytype1($pass) {
        $i = 0;
        $sql = "SELECT bi.id,bp.id AS blockpositionid,bi.blockname,bi.parentcontextid,bi.showinsubcontexts,bi.pagetypepattern,bi.subpagepattern,bi.defaultregion,bi.defaultweight,COALESCE(bp.visible, 1) AS visible,COALESCE(bp.region, bi.defaultregion) AS region,COALESCE(bp.weight, bi.defaultweight) AS weight,bi.configdata, ctx.id AS ctxid, ctx.path AS ctxpath, ctx.depth AS ctxdepth, ctx.contextlevel AS ctxlevel, ctx.instanceid AS ctxinstance FROM mdl_block_instances bi JOIN mdl_block b ON bi.blockname = b.name LEFT JOIN mdl_block_positions bp ON bp.blockinstanceid = bi.id AND bp.contextid = '26' AND bp.pagetype = 'mod-forum-discuss' AND bp.subpage = '' LEFT JOIN mdl_context ctx ON (ctx.instanceid = bi.id AND ctx.contextlevel = '80') WHERE (bi.parentcontextid = '26' OR (bi.showinsubcontexts = 1 AND bi.parentcontextid IN ('16','3','1'))) AND bi.pagetypepattern IN ('mod-forum-discuss','mod-forum-discuss-*','mod-forum-*','mod-*','*') AND (bi.subpagepattern IS NULL OR bi.subpagepattern = '') AND (bp.visible = 1 OR bp.visible IS NULL) AND b.visible = 1 ORDER BY COALESCE(bp.region, bi.defaultregion),COALESCE(bp.weight, bi.defaultweight),bi.id;";
        while($i < $pass) {
            ++$i;
            $this->db->get_records_sql($sql);
        }
    }

    private function bench_querytype2($pass) {
        $i = 0;
        $sql = "SELECT parent_states.filter, CASE WHEN fa.active IS NULL THEN 0 ELSE fa.active END AS localstate, parent_states.inheritedstate FROM (SELECT f.filter, MAX(f.sortorder) AS sortorder, CASE WHEN MAX(f.active * ctx.depth) > -MIN(f.active * ctx.depth) THEN 1 ELSE -1 END AS inheritedstate FROM mdl_filter_active f JOIN mdl_context ctx ON f.contextid = ctx.id WHERE ctx.id IN (1,3,16) GROUP BY f.filter HAVING MIN(f.active) > -9999 ) parent_states LEFT JOIN mdl_filter_active fa ON fa.filter = parent_states.filter AND fa.contextid = 26 ORDER BY parent_states.sortorder;";
        while($i < $pass) {
            ++$i;
            $this->db->get_records_sql($sql);
        }
    }

    private function bench_loginguest() {
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

    private function bench_loginuser() {
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

}
