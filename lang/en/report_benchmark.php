<?php

$string['benchmark']        = 'Benchmark';
$string['benchmark:view']   = 'Voir le rapport Benchmark';
$string['pluginname']       = 'Moodle Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['modulename']       = 'Moodle Benchmark';
$string['adminreport']      = 'System Benchmark';
$string['info']             = 'This benchmark has to last no more than 1 minute; it stops at 2 minutes. Thanks to wait until results show on.';
$string['infoaverage']      = 'We invite you to take this test several times to obetenir average.';
$string['infodisclamer']    = 'It isn\'t advisable to run this benchmark on a platform in production.';
$string['start']            = 'Start the test';
$string['redo']             = 'Start the test again';
$string['scoremsg']         = 'Bechmark Score :';
$string['points']           = ' {$a} points';
$string['description']      = 'Description';
$string['during']           = 'Durée en secondes';
$string['limit']            = 'Limite acceptable';
$string['over']             = 'Limite critique';
$string['total']            = 'Temps total des tests';
$string['score']            = 'Score';
$string['seconde']          = ' {$a} sec.';
$string['benchsuccess']     = '<b>Congratulations!</b><br />Your Moodle seems to work perfectly.';
$string['benchfail']        = '<b>Watch out!</b><br />Your Moodle seems to meet some difficulties.';
$string['benchshare']       = 'Share my score on the forum';

/*
 * Add your test below
 */

$string['cloadname']            = 'Moodle loading time';
$string['cloadmoreinfo']        = 'Run the configuration file &laquo;config.php&raquo;';

$string['processorname']        = 'Function called many times';
$string['processormoreinfo']    = 'A function is called in a loop to test the processor speed';

$string['filereadname']         = 'Reading files';
$string['filereadmoreinfo']     = 'Test the read speed in the Moodle\'s temporary folder';

$string['filewritename']        = 'Creating files';
$string['filewritemoreinfo']    = 'Test the write speed in the Moodle\'s temporary folder';

$string['coursereadname']       = 'Reading course';
$string['coursereadmoreinfo']   = 'Test the read speed to read a course';

$string['coursewritename']      = 'Writing course';
$string['coursewritemoreinfo']  = 'Test the database speed to write a course';

$string['querytype1name']       = 'Complex request (n°1)';
$string['querytype1moreinfo']   = 'Test the database speed to execute a complex request';

$string['querytype2name']       = 'Complex request (n°2)';
$string['querytype2moreinfo']   = 'Test the database speed to execute a complex request';

$string['loginguestname']       = 'Time to connect with the guest account';
$string['loginguestmoreinfo']   = 'Measuring the time to load the login page with the guest account';

$string['loginusername']        = 'Time to connect with a fake user account';
$string['loginusermoreinfo']    = 'Measuring the time to load the login page with a fake user account';

/*
 * Add your solution here
 */

$string['slowserverlabel']          = 'Your web server is too slow.';
$string['slowserversolution']       = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch on <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>If your Moodle is installed on your computer, you can desactivate your antivirus where Moodle is. Do it with precaution.</li></ul>';

$string['slowprocessorlabel']       = 'Your processor is too slow.';
$string['slowprocessorsolution']    = '<ul><li>Check that the equipment is enough to run Moodle.</li></ul>';

$string['slowharddrivelabel']       = 'The harddrive is too slow.';
$string['slowharddrivesolution']    = '<ul><li>Check the harddrive state / temp folder</li><li>Change your harddrive or the temporary folder</li></ul>';

$string['slowdatabaselabel']        = 'The database is too slow.';
$string['slowdatabasesolution']     = '<ul><li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li><li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li></ul>';

$string['slowweblabel']             = 'The page is too slow to upload.';
$string['slowwebsolution']          = '<ul><li>Clear the Moodle cache</a></li></ul>';
