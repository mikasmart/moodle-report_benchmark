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
$string['infoaverage']      = 'We invite you to take this test several times to obtain an average.';
$string['infodisclaimer']   = 'It is not recommended to launch this benchmark on a production platform.';
$string['start']            = 'Start the test';
$string['redo']             = 'Start the test again';
$string['scoremsg']         = 'Benchmark Score:';
$string['points']           = ' {$a} points';
$string['description']      = 'Description';
$string['during']           = 'Time in seconds';
$string['limit']            = 'Acceptable limit';
$string['over']             = 'Critical limit';
$string['total']            = 'Total time';
$string['score']            = 'Score';
$string['seconde']          = ' {$a} s';
$string['benchsuccess']     = '<b>Congratulations!</b><br />Your Moodle seems to work perfectly.';
$string['benchfail']        = '<b>Watch out!</b><br />Your Moodle seems to have some difficulties.';
$string['benchshare']       = 'Share my score on the forum';

/*
 * Add your test below
 */

$string['cloadname']            = 'Moodle loading time';
$string['cloadmoreinfo']        = 'Run the configuration file &laquo;config.php&raquo;';

$string['processorname']        = 'Loop function call';
$string['processormoreinfo']    = 'A function is called in a loop to test processor speed';

$string['filereadname']         = 'Reading files';
$string['filereadmoreinfo']     = 'Test the reading speed of the Moodle temporary folder';

$string['filewritename']        = 'Creating files';
$string['filewritemoreinfo']    = 'Test the writing speed of the Moodle temporary folder';

$string['coursereadname']       = 'Reading course';
$string['coursereadmoreinfo']   = 'Test the read speed to read a course';

$string['coursewritename']      = 'Writing course';
$string['coursewritemoreinfo']  = 'Test the speed of the database to write a course';

$string['querytype1name']       = 'Complex SQL query (n°1)';
$string['querytype1moreinfo']   = 'Test the speed of the database to execute a complex SQL query';

$string['querytype2name']       = 'Complex SQL query (n°2)';
$string['querytype2moreinfo']   = 'Test the speed of the database to execute a complex SQL query';

$string['loginguestname']       = 'Login time for the guest account';
$string['loginguestmoreinfo']   = 'Measures the loading time of the guest account login page';

$string['loginusername']        = 'Login time for a fake user account';
$string['loginusermoreinfo']    = 'Measures the loading time of a fake user account login page';

/*
 * Add your solution here
 */

$string['slowserverlabel']          = 'The web server seems too slow.';
$string['slowserversolution']       = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch to <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>If your Moodle is installed on your computer, try to deactivate your antivirus where Moodle is located. Do it with precaution.</li></ul>';

$string['slowprocessorlabel']       = 'The processor seems too slow.';
$string['slowprocessorsolution']    = '<ul><li>Check that your hardware configuration is large enough to run Moodle.</li></ul>';

$string['slowharddrivelabel']       = 'The harddrive seems too slow.';
$string['slowharddrivesolution']    = '<ul><li>Check the harddrive and/or the temporary folder state</li><li>Change your harddrive or the temporary folder</li></ul>';

$string['slowdatabaselabel']        = 'The database seems too slow.';
$string['slowdatabasesolution']     = '<ul><li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li><li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li></ul>';

$string['slowweblabel']             = 'The login page is too slow to load.';
$string['slowwebsolution']          = '<ul><li>Purge the Moodle cache</a></li></ul>';

/*
 * Privacy provider (GDPR)
 */
$string['privacy:no_data_reason']   = 'The report benchmark plugins doesn\'t store data by itself. It just access to data from other plugins';

/*
 * Deprecated strings
 */
$string['infodisclamer']    = 'It is not recommended to launch this benchmark on a production platform.';
