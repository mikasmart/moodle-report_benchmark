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
 * The benchmark report
 *
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

    require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
    require_once($CFG->libdir.'/adminlib.php');
    require_once(dirname(__FILE__).'/lib/lib.php');

/// Get all required strings
    $baseUrl='/report/benchmark/';
    $reportCss=$baseUrl.'report_benchmark.css';
    $bootstrapCss=$baseUrl.'bootstrap.css';
    $base_url=$CFG->wwwroot.$baseUrl;

    $strbenchmarks = get_string('modulenameplural', 'report_benchmark');
    $strbenchmark  = get_string('modulename', 'report_benchmark');


// Print the header & check permissions.
    $url = new moodle_url($base_url.'index.php');
    admin_externalpage_setup('reportbenchmark');
    $PAGE->set_url($url);
    $PAGE->requires->css($bootstrapCss);
    $PAGE->requires->css($reportCss);
    echo $OUTPUT->header();
    echo $OUTPUT->heading(get_string('adminreport', 'report_benchmark'));

    $msg = '';
    // Version du module
    $s_version='';
    if (!empty($module->release)) {
        $s_version.= $module->release;
    }

    if (!empty($module->version)){
        $s_version.= ' ('.get_string('release','report_benchmark').' '.$module->version.')'."\n";
    }

    if ($s_version!=''){
       $msg.= get_string('version', 'report_benchmark').'<br /><i>'.$s_version.'</i>'."\n";
    }


    if ($msg) {
        echo $OUTPUT->box_start('generalbox boxwidthwide boxaligncenter centerpara');
        echo $msg;
        echo $OUTPUT->box_end();
    }
    /*******************
    // Print it.
    echo html_writer::table($table);
    ************/

    $Bench = new BenchMark();


    // Footer.

    echo $OUTPUT->footer();
