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
 * Strings for component 'report_benchmark', the Benchmark report, english
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['benchmark']        = 'Benchmark';
$string['benchmark:view']   = 'View the Benchmark report';
$string['pluginname']       = 'Moodle Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['modulename']       = 'Moodle Benchmark';
$string['adminreport']      = 'System Benchmark';
$string['info']             = 'This benchmark should last less than 1 minute and will be aborted at 2 minutes. Please wait until the results show up.';
$string['infoaverage']      = 'It is recommended to take this test several times to obtain a significant average.';
$string['infodisclaimer']   = 'It is not recommended to launch this benchmark on a production platform.';
$string['start']            = 'Start the benchmark';
$string['redo']             = 'Start the benchmark again';
$string['scoremsg']         = 'Benchmark Score:';
$string['points']           = '{$a} points';
$string['description']      = 'Description';
$string['during']           = 'Time (seconds)';
$string['limit']            = 'Acceptable limit';
$string['over']             = 'Critical limit';
$string['total']            = 'Total time';
$string['score']            = 'Score';
$string['duration']         = '{$a} s';
$string['benchsuccess']     = '<b>Congratulations!</b><br />Your Moodle performance seems perfect.';
$string['benchfail']        = '<b>Watch out!</b><br />Your Moodle performance is not optimal.';
$string['benchshare']       = 'Share my score on the forum';

/*
 * Add your test below
 */

$string['cloadname']            = 'Moodle loading time';
$string['cloadmoreinfo']        = 'Load the "config.php" configuration file';

$string['processorname']        = 'Processor processing speed';
$string['processormoreinfo']    = 'Call a PHP function with a loop to check the processor speed';

$string['filereadname']         = 'Reading file performance';
$string['filereadmoreinfo']     = 'Read a file multiple times to check the reading speed of the Moodle temporary folder';

$string['filewritename']        = 'Writing file performance';
$string['filewritemoreinfo']    = 'Write a file multiple times to check the writing speed of the Moodle temporary folder';

$string['coursereadname']       = 'Reading course performance';
$string['coursereadmoreinfo']   = 'Read a course multiple times to check the reading speed of the database';

$string['coursewritename']      = 'Writing course performance';
$string['coursewritemoreinfo']  = 'Write a course multiple times to check the writing speed of the database';

$string['querytype1name']       = 'Database performance (#1)';
$string['querytype1moreinfo']   = 'Run a complex SQL query to check the speed of the database';

$string['querytype2name']       = 'Database performance (#2)';
$string['querytype2moreinfo']   = 'Run a complex SQL query to check the speed of the database';

$string['loginguestname']       = 'Login time performance for the guest account';
$string['loginguestmoreinfo']   = 'Check the loading time of the guest account login page';

$string['loginusername']        = 'Login time performance for a fake user account';
$string['loginusermoreinfo']    = 'Check the loading time of a fake user account login page';

/*
 * Add your solution here
 */

$string['slowserverlabel']          = 'The web server seems too slow.';
$string['slowserversolution']       = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch to <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>If your Moodle is installed on your computer, carefully configure your antivirus so that it does not check the installation of Moodle.</li></ul>';

$string['slowprocessorlabel']       = 'The processor seems too slow.';
$string['slowprocessorsolution']    = '<ul><li>Check that your hardware configuration is high enough to run Moodle.</li></ul>';

$string['slowharddrivelabel']       = 'The hard drive seems too slow.';
$string['slowharddrivesolution']    = '<ul><li>Check the status of the hard drive and/or the temporary folder.</li><li>Change the hard drive and/or the temporary folder.</li></ul>';

$string['slowdatabaselabel']        = 'The database seems too slow.';
$string['slowdatabasesolution']     = '<ul><li>Check <a href="https://mariadb.com/kb/en/library/mysqlcheck/" target="_blank">the database integrity</a>.</li><li>Optimize <a href="https://mariadb.com/kb/en/library/optimization-and-tuning/" target="_blank">the database</a>.</li></ul>';

$string['slowweblabel']             = 'The login page is being loaded too slowly.';
$string['slowwebsolution']          = '<ul><li><a href="/admin/purgecaches.php" target="_blank">Purge the Moodle cache</a>.</li></ul>';

/*
 * Privacy provider (GDPR)
 */
$string['privacy:no_data_reason']   = 'The report benchmark plugins doesn\'t store data by itself. It just access to data from other plugins';

/*
 * Deprecated strings
 */
$string['infodisclamer']    = 'It is not recommended to launch this benchmark on a production platform.';
$string['seconde']          = '{$a} s';
