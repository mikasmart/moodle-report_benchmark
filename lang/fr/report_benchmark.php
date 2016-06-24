<?php
// ----------------
// UTF-8 French

// Moodle 2
$string['benchmark'] = 'Benchmark';
$string['pluginname'] = 'Moodle  Benchmark';
$string['modulenameplural'] = 'Moodle Benchmarks';
$string['modulename'] = 'Moodle Benchmark';
$string['adminreport'] = 'Benchmark du système';
$string['release'] = 'N° ';
$string['version'] ='Version : {$a}';

$string['info'] = '<p>Ce benchmark doit avoir une durée inférieur à 1 minute et s\'annule à 2 minutes.
<br />Il va démarrer automatiquement dans <span id="countdown">10</span> secondes ou cliquer sur &laquo;Lancer le test&raquo;</p>
<p>Merci de patienter jusqu\'à l\'affichage des résultats.</p>  ';
$string['start'] = 'Lancer le test';
$string['redo'] = 'Refaire le test';
$string['scoremsg'] = 'Score du benchmark : <span class="text-success">{$a} points</span>';
$string['resultat'] = 'Résultats des tests';
$string['score'] = 'Score';
$string['points'] = ' {$a} points';
$string['imprimer'] = 'Imprimer';

// Chargement de Moodle
$string['cloadname'] =  'Chargement de Moodle';
$string['cloadmoreinfo'] = 'Exécute le fichier de configuration &laquo;config.php&raquo;';
$string['cloadovertipslabel'] = 'Votre serveur web semble trop lent.';
$string['cloadovertipssolution'] = '<ul>
                                        <li>Passez en mode <a href="https://httpd.apache.org/docs/2.4/fr/mpm.html" target="_blank">multi-processus</a> si votre serveur est Apache ou passez à <a href="https://nginx.org/" target="_blank">NGinx</a>.</li>
                                        <li>Si votre moodle est installé sur votre poste de travail, vous pouvez désactiver votre antivirus sur le dossier Moodle avec précaution.</li>
                                    </ul>';
// Puissance de calcul processeur
$string['processorname'] = 'Appel d\'une fonction en boucle';
$string['processormoreinfo'] = 'Une fonction est appelée en boucle pour tester la rapidité du processeur';
$string['processorovertipslabel'] = 'Votre processeur semble trop lent.';
$string['processorovertipssolution'] = '<ul>
                                        <li>Vérifier que votre configuration matériel soit suffisante pour faire fonctionner Moodle.</li>
                                    </ul>';


// Lecture sur disque du dossier temporaire
$string['filereadname'] = 'Lecture de fichiers';
$string['filereadmoreinfo'] = 'Test la vitesse de lecture du dossier temporaire de Moodle';
$string['filereadovertipslabel'] = 'Le disque dur semble trop lent.';
$string['filereadovertipssolution'] = '<ul>
                                        <li>Vérifiez l\'état du disque / dossier temporaire</li>
                                        <li>Changez de disque dur ou de répertoire temporaire</li>
                                    </ul>';

//Ecriture sur disque du dossier temporaire
$string['filewritename'] = 'Création de fichiers';
$string['filewritemoreinfo'] = 'Test la vitesse d\'écriture du dossier temporaire de Moodle';
$string['filewriteovertipslabel'] = 'Le disque dur semble trop lent';
$string['filewriteovertipssolution'] = '<ul>
                                        <li>Vérifiez l\'état du disque / dossier temporaire</li>
                                        <li>Changez de disque dur ou de répertoire temporaire</li>
                                    </ul>';

// Lecture d'un cours
$string['coursereadname'] = 'Lecture d\'un cours';
$string['coursereadmoreinfo'] = 'Test la vitesse de la base de données pour lire un cours';
$string['coursereadovertipslabel'] = 'La base de données semble trop lente.';
$string['coursereadovertipssolution'] =  '<ul>
                                        <li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité la base de données</a></li>
                                        <li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li>
                                    </ul>';

// Ecriture d'un cours
$string['coursewritename'] = 'Ecriture d\'un cours';
$string['coursewritemoreinfo'] =  'Test la vitesse de la base de données pour écrire un cours';
$string['coursewriteovertipslabel'] = 'La base de données semble trop lente.';
$string['coursewriteovertipssolution'] =  '<ul>
                                        <li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité la base de données</a></li>
                                        <li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li>
                                    </ul>';

// Exécution d'une requete complexe n°1
$string['querytype1name'] = 'Exécution d\'une requête complexe (n°1)';
$string['querytype1moreinfo'] =  'Test la vitesse de la base de données pour exécuter une requête complexe';
$string['querytype1overtipslabel'] = 'La base de données semble trop lente.';
$string['querytype1overtipssolution'] =  '<ul>
                                        <li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité la base de données</a></li>
                                        <li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li>
                                    </ul>';

// Exécution d'une requete complexe n°2
$string['querytype2name'] = 'Exécution d\'une requête complexe (n°2)';
$string['querytype2moreinfo'] =  'Test la vitesse de la base de données pour exécuter une requête complexe';
$string['querytype2overtipslabel'] = 'La base de données semble trop lente.';
$string['querytype2overtipssolution'] =  '<ul>
                                        <li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité la base de données</a></li>
                                        <li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li>
                                    </ul>';


// Relève le temps de connexion du compte guest
$string['loginguestname'] = 'Temps de connexion du compte uinvité';
$string['loginguestmoreinfo'] =  'Mesure le temps de chargement de la page de connexion du compte invité';
$string['loginguestovertipslabel'] = 'La page d\'identification utilisateur est trop lente à charger.';
$string['loginguestovertipssolution'] =  '<ul>
<li>Videz le cache de Moodle</a></li>
</ul>';

// Relève le temps de connexion d'un compte utilisateur
$string['loginusername'] =  'Temps de connexion du compte utilisateur';
$string['loginusermoreinfo'] =  'Mesure le temps de chargement de la page de connexion du compte utilisateur';
$string['loginuserovertipslabel'] = 'La page d\'identification utilisateur est trop lente à charger.';
$string['loginuserovertipssolution'] =  '<ul><li>Videz le cache de Moodle</a></li></ul>';
