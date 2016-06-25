<?php
// ----------------
// English

// Moodle 2
$string['benchmark'] = 'Benchmark';
$string['pluginname'] = 'Moodle  Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['modulename'] = 'Moodle Benchmark';
$string['adminreport'] = 'System Benchmark';
$string['release'] = 'User friendly version: {$a} ';
$string['moodleversion'] ='Moodle distribution number: {$a}';
$string['version'] ='Version {$a}';

$string['titre'] = 'BenchMark Moodle version <small>{$a}</small>';
$string['toggle'] = 'Toggle navigation';
$string['total'] = '{$a} sec';
$string['repasser'] = 'Redo the test';

$string['description'] = 'Description';
$string['duree'] = 'Duration in seconds';
$string['limiteacceptable'] = 'Acceptable limit';
$string['limitecritique'] = 'Critical limit';
$string['dureetotale'] = 'Total time of the tests';

$string['info'] = '<p>This benchmark has to last no more than 1 minute; it stops à 2 minutes.
<br />If you d\'nt click on &laquo;Startthe test&raquo; it will start in <span id="countdown">10</span> seconds.</p>
<p>Thanks to wait until results show on.</p>  ';
$string['start'] = 'Start the test';
$string['redo'] = 'Redo the test';
$string['scoremsg'] = 'Bechmark Score: <span class="text-success">{$a} points</span>';
$string['resultat'] = 'Tests résults';
$string['score'] = 'Score';
$string['points'] = ' {$a} points';
$string['imprimer'] = 'Print';

$string['felicitation'] = '<b>Congratulations!</b><br />Votre Moodle seems to work perfectly.';
$string['alerte'] = '<b>Watch out! Your Moodle seems to meet some difficulties: ';


// Chargement de Moodle
$string['cloadname'] =  'Moodle loading time';
$string['cloadmoreinfo'] = 'Run the configuration file &laquo;config.php&raquo;';
$string['cloadovertipslabel'] = 'Your web server is too slow.';
$string['cloadovertipssolution'] = '<ul><li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch on <a href="https://nginx.org/" target="_blank">NGinx</a>.</li>
<li>If your Moodle is installed on your computer, you can desactivate your antivirus where Moodle is. Do it with precaution.</li>
</ul>';

// Puissance de calcul processeur
$string['processorname'] = 'Function called many times';
$string['processormoreinfo'] = 'A function is called in a loop to test the processor speed';
$string['processorovertipslabel'] = 'Your processor is too slow.';
$string['processorovertipssolution'] = '<ul>
<li>Check that the equipment is enough to run Moodle.</li>
</ul>';



// Lecture sur disque du dossier temporaire
$string['filereadname'] = 'Reading files';
$string['filereadmoreinfo'] = 'Test the read speed in the Moodle\'s temporary folder';
$string['filereadovertipslabel'] = 'The harddrive is too slow.';
$string['filereadovertipssolution'] = '<ul>
<li>Check the harddrive state / temp folder</li>
<li>Change your harddrive or the temporary folder</li>
</ul>';


// Ecriture sur disque du dossier temporaire
$string['filewritename'] = 'Creating files';
$string['filewritemoreinfo'] = 'Test the write speed in the Moodle\'s temporary folder';
$string['filewriteovertipslabel'] = 'The harddrive is too slow.';
$string['filewriteovertipssolution'] = '<ul>
<li>Check the harddrive state / temp folder</li>
<li>Change your harddrive or the temporary folder</li>
</ul>';


// Lecture d'un cours
$string['coursereadname'] = 'Reading course';
$string['coursereadmoreinfo'] = 'Test the read speed to read a course';
$string['coursereadovertipslabel'] = 'The database is too slow.';
$string['coursereadovertipssolution'] =  '<ul>
<li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li>
<li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li>
</ul>';

// Ecriture d'un cours
$string['coursewritename'] = 'Writing course';
$string['coursewritemoreinfo'] =  'Test the database speed to write a course';
$string['coursewriteovertipslabel'] = 'The database is too slow.';
$string['coursewriteovertipssolution'] =  '<ul>
<li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li>
<li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li>
</ul>';

// Exécution d'une requete complexe n°1
$string['querytype1name'] = 'Complex request';
$string['querytype1moreinfo'] =  'Test the database speed to execute a complex request';
$string['querytype1overtipslabel'] = 'The database is too slow.';
$string['querytype1overtipssolution'] =  '<ul>
<li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li>
<li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li>
</ul>';

// Exécution d'une requete complexe n°2
$string['querytype2name'] = 'Complex request n°2';
$string['querytype2moreinfo'] =  'Test the database speed to execute a complex request';
$string['querytype2overtipslabel'] = 'The database is too slow.';
$string['querytype2overtipssolution'] =  '<ul>
<li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li>
<li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li>
</ul>';


// Relève le temps de connexion du compte guest
$string['loginguestname'] = 'Time to connect with the guest account';
$string['loginguestmoreinfo'] =  'Measuring the time to load the login page with the guest account';
$string['loginguestovertipslabel'] = 'The page is too slow to upload.';
$string['loginguestovertipssolution'] =  '<ul>
<li>Clear the Moodle cache</a></li>
</ul>';



// Relève le temps de connexion d'un compte utilisateur
$string['loginusername'] =  'Time to connect with the user account';
$string['loginusermoreinfo'] =  'Measuring the time to load the login page with the guest account';
$string['loginuserovertipslabel'] = 'The login page for a user account is too slow to load.';
$string['loginuserovertipssolution'] =  '<ul>
<li>Clear the Moodle cache</a></li>
</ul>';

?>
