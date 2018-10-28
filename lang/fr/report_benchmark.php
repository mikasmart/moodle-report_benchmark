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
 * Strings for component 'report_benchmark', the Benchmark report, french
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$string['benchmark']        = 'Benchmark';
$string['benchmark:view']   = 'Voir le rapport Benchmark';
$string['pluginname']       = 'Moodle Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['modulename']       = 'Moodle Benchmark';
$string['adminreport']      = 'Benchmark du système';
$string['info']             = 'Ce benchmark devrait durer moins d\'1 minute et s\'interrompt à 2 minutes. Merci de patienter jusqu\'à l\'affichage des résultats.';
$string['infoaverage']      = 'Nous vous invitons à faire ce test plusieurs fois pour obtenir une moyenne.';
$string['infodisclaimer']   = 'Il est déconseillé de lancer ce benchmark sur une plateforme en production.';
$string['start']            = 'Lancer le test';
$string['redo']             = 'Refaire le test';
$string['scoremsg']         = 'Score du benchmark :';
$string['points']           = ' {$a} points';
$string['description']      = 'Description';
$string['during']           = 'Durée en secondes';
$string['limit']            = 'Limite acceptable';
$string['over']             = 'Limite critique';
$string['total']            = 'Temps total des tests';
$string['score']            = 'Score';
$string['seconde']          = ' {$a} s';
$string['benchsuccess']     = '<b>Félicitations !</b><br />Votre Moodle semble fonctionner parfaitement.';
$string['benchfail']        = '<b>Attention !</b><br />Votre Moodle semble rencontrer quelques difficultés.';
$string['benchshare']       = 'Partager mon score sur le forum';

/*
 * Ajouter vos tests ci-dessous
 */

$string['cloadname']            = 'Chargement de Moodle';
$string['cloadmoreinfo']        = 'Exécute le fichier de configuration &laquo;config.php&raquo;';

$string['processorname']        = 'Appel d\'une fonction en boucle';
$string['processormoreinfo']    = 'Une fonction est appelée en boucle pour tester la rapidité du processeur';

$string['filereadname']         = 'Lecture de fichiers';
$string['filereadmoreinfo']     = 'Teste la vitesse de lecture du dossier temporaire de Moodle';

$string['filewritename']        = 'Création de fichiers';
$string['filewritemoreinfo']    = 'Teste la vitesse d\'écriture du dossier temporaire de Moodle';

$string['coursereadname']       = 'Lecture de cours';
$string['coursereadmoreinfo']   = 'Teste la vitesse de la base de données pour lire un cours';

$string['coursewritename']      = 'Ecriture de cours';
$string['coursewritemoreinfo']  = 'Teste la vitesse de la base de données pour écrire un cours';

$string['querytype1name']       = 'Requête complexe (n°1)';
$string['querytype1moreinfo']   = 'Teste la vitesse de la base de données pour exécuter une requête complexe';

$string['querytype2name']       = 'Requête complexe (n°2)';
$string['querytype2moreinfo']   = 'Teste la vitesse de la base de données pour exécuter une requête complexe';

$string['loginguestname']       = 'Durée de connexion de l\'accès anonyme';
$string['loginguestmoreinfo']   = 'Mesure le temps de chargement de la page de connexion du compte anonyme';

$string['loginusername']        = 'Durée de connexion d\'un compte utilisateur';
$string['loginusermoreinfo']    = 'Mesure le temps de chargement de la page de connexion d\'un compte utilisateur';

/*
 * Add your solution here
 */

$string['slowserverlabel']          = 'Le serveur web semble trop lent.';
$string['slowserversolution']       = '<ul><li>Passez en mode <a href="https://httpd.apache.org/docs/2.4/fr/mpm.html" target="_blank">multi-processus</a> si votre serveur est Apache ou passez à <a href="https://nginx.org/" target="_blank">NGinx</a>.</li><li>Si votre Moodle est installé sur votre poste de travail, vous pouvez désactiver votre antivirus sur le dossier Moodle avec précaution.</li></ul>';

$string['slowprocessorlabel']       = 'Le processeur semble trop lent.';
$string['slowprocessorsolution']    = '<ul><li>Vérifier que votre configuration matérielle soit suffisante pour faire fonctionner Moodle.</li></ul>';

$string['slowharddrivelabel']       = 'Le disque dur semble trop lent.';
$string['slowharddrivesolution']    = '<ul><li>Vérifiez l\'état du disque et/ou du dossier temporaire</li><li>Changez de disque dur ou de dossier temporaire</li></ul>';

$string['slowdatabaselabel']        = 'La base de données semble trop lente.';
$string['slowdatabasesolution']     = '<ul><li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité de la base de données</a></li><li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li></ul>';

$string['slowweblabel']             = 'La page de connexion est trop lente à charger.';
$string['slowwebsolution']          = '<ul><li>Purgez le cache de Moodle</a></li></ul>';

/*
 * Privacy provider (GDPR)
 */
$string['privacy:no_data_reason'] = 'Le plugin Moodle benchmark n\'enregistre pas de données personnelles. Il accède simplement aux données d\'autres plugins';

