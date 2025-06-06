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
 * @copyright  2016 onwards Mickaël Pannequin {@link mailto:mickael.pannequin@gmail.com}
 * @copyright  2023 onwards Nicolas Martignoni {@link mailto:nicolas@martignoni.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['adminreport'] = 'System Benchmark';
$string['benchfail'] = '<b>Watch out!</b><br />The performance of your Moodle installation is not optimal.';
$string['benchmark'] = 'Benchmark';
$string['benchmark:view'] = 'View the Benchmark report';
$string['benchshare'] = 'Share this score on the forum';
$string['benchsuccess'] = '<b>Congratulations!</b><br />The performance of your Moodle installation seems to be perfect.';
$string['cloadmoreinfo'] = 'Load the "config.php" configuration file';
$string['cloadname'] = 'Moodle loading time';
$string['coursereadmoreinfo'] = 'Read a course multiple times to check the reading speed of the database';
$string['coursereadname'] = 'Reading course performance';
$string['coursewritemoreinfo'] = 'Write a course multiple times to check the writing speed of the database';
$string['coursewritename'] = 'Writing course performance';
$string['description'] = 'Description';
$string['duration'] = '{$a}s';
$string['during'] = 'Time (seconds)';
$string['filereadmoreinfo'] = 'Read a file multiple times to check the reading speed of the Moodle temporary folder';
$string['filereadname'] = 'Reading file performance';
$string['filewritemoreinfo'] = 'Write a file multiple times to check the writing speed of the Moodle temporary folder';
$string['filewritename'] = 'Writing file performance';
$string['info'] = 'This benchmark test should last less than 1 minute and will be aborted after 2 minutes. Please wait for the results to be displayed.';
$string['infoaverage'] = 'It is recommended to perform this benchmark test several times to obtain a meaningful average. If the performance of your installation is not optimal, you will find recommendations to improve it in the <a href="https://docs.moodle.org/en/Performance_recommendations" target="_blank">Moodle documentation</a>.';
$string['infodisclaimer'] = 'Do not run this benchmark on a production platformas it may cause significant performance degradation.';
$string['limit'] = 'Acceptable limit';
$string['modulename'] = 'Moodle Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['notificatiopagedownloadmoreinfo'] = 'Load the administration interface notification page a few times to check web server speed';
$string['notificatiopagedownloadname'] = 'Loading time of administration notification page';
$string['over'] = 'Critical limit';
$string['pluginname'] = 'Moodle Benchmark';
$string['points'] = '{$a} points';
$string['privacy:no_data_reason'] = 'The Benchmark report plugin doesn\'t store any personal data.';
$string['processormoreinfo'] = 'Call a PHP function with a loop to check the processor speed';
$string['processorname'] = 'Processor processing speed';
$string['querytype1moreinfo'] = 'Run a complex SQL query to check the speed of the database';
$string['querytype1name'] = 'Database performance (#1)';
$string['querytype2moreinfo'] = 'Run a complex SQL query to check the speed of the database';
$string['querytype2name'] = 'Database performance (#2)';
$string['redo'] = 'Start the benchmark again';
$string['score'] = 'Score';
$string['scoremsg'] = 'Benchmark Score:';
$string['slowdatabaselabel'] = 'The database seems too slow.';
$string['slowdatabasesolution'] = '<ul><li>Check <a href="https://mariadb.com/kb/en/library/mysqlcheck/" target="_blank">the database integrity</a>.</li><li>Optimize <a href="https://mariadb.com/kb/en/library/optimization-and-tuning/" target="_blank">the database</a>.</li></ul>';
$string['slowharddrivelabel'] = 'The hard drive seems too slow.';
$string['slowharddrivesolution'] = '<ul><li>Check the status of the hard drive and/or the temporary folder.</li><li>Change the hard drive and/or the temporary folder.</li></ul>';
$string['slowprocessorlabel'] = 'The processor seems too slow.';
$string['slowprocessorsolution'] = '<ul><li>Check that your hardware configuration is high enough to run Moodle.</li></ul>';
$string['slowserverlabel'] = 'The web server seems too slow.';
$string['slowserversolution'] = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch to <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>If your Moodle is installed on your computer, carefully configure your antivirus so that it does not check the installation of Moodle.</li></ul>';
$string['slowweblabel'] = 'The notification page is loading too slowly.';
$string['slowwebsolution'] = '<ul><li><a href="{$a}" target="_blank">Purge the Moodle cache</a>.</li></ul>';
$string['start'] = 'Start the benchmark';
$string['total'] = 'Total time';
