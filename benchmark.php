<?php
//
// LICENSE GNU GENERAL PUBLIC LICENSE Version 3
//
// You should have received a copy of the GNU General Public License
//  along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * BenchMark in single file
 *
 * @package    moodlebenchmark
 * @copyright  2016 Mickaël PANNEQUIN <mickael.pannequin@smartcanal.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

set_time_limit(120);

class BenchMark {

    public  $version    = '0.0.1';

    private $cfg        = null;
    private $db         = null;
    private $lang 		= null;
    private $tests 		= array(
        'cload'         => array(
            'name' 		=> array(
                'fr' 	=> 'Chargement de Moodle',
                'en'	=> 'Moodle loading time'
            ),
            'moreinfo'	=> array(
                'fr'	=> 'Exécute le fichier de configuration &laquo;config.php&raquo;',
                'en'	=> 'Run the configuration file &laquo;config.php&raquo;',
            ),
            'nbpass'	=> false,
            'limit'		=> .5,
            'over'		=> .8,
            'overtips'	=> array(
                'fr' 	=> array(
                    'label'		=> 'Votre serveur web est trop lent.',
                    'solution'	=> '<ul>
                                        <li>Passez en mode <a href="https://httpd.apache.org/docs/2.4/fr/mpm.html" target="_blank">multi-processus</a> si votre serveur est Apache ou passez à <a href="https://nginx.org/" target="_blank">NGinx</a>.</li>
                                        <li>Si votre moodle est installé sur votre poste de travail, vous pouvez désactiver votre antivirus sur le dossier Moodle avec précaution.</li>
                                    </ul>'
                ),
                'en' 	=> array(
                    'label'		=> 'Your web server is too slow.',
                    'solution'	=> '<ul>
                                        <li>Set your Apache in <a href="https://httpd.apache.org/docs/2.4/en/mpm.html" target="_blank">multi-processing</a> mode or switch on <a href="https://nginx.org/" target="_blank">NGinx</a>.</li>
                                        <li>If your Moodle is installed on your computer, you can desactivate your antivirus where Moodle is. Do it with precaution.</li>
                                    </ul>'
                )
            )
        ),      // Chargement de Moodle
        'processor'     => array(
            'name' 		=> array(
                'fr' 	=> 'Appel d\'une fonction en boucle',
                'en'	=> 'Function called many times'
            ),
            'moreinfo'	=> array (
                'fr'	=> 'Une fonction est appelée en boucle pour tester la rapidité du processeur',
                'en'	=> 'A function is called in a loop to test the processor speed',
            ),
            'nbpass'	=> 10000000,
            'limit'		=> .5,
            'over'		=> .8,
            'overtips'	=> array(
                'fr' 	=> array(
                    'label'		=> 'Votre processeur semble trop lent.',
                    'solution'	=> '<ul>
                                        <li>Vérifier que votre configuration matériel soit suffisante pour faire fonctionner Moodle.</li>
                                    </ul>'
                ),
                'en' 	=> array(
                    'label'		=> 'Your processor is too slow.',
                    'solution'	=> '<ul>
                                        <li>Check that the equipment is enough to run Moodle.</li>
                                    </ul>'
                )
            )
        ),      // Puissance de calcul processeur
        'filewrite'     => array(
            'name' 		=> array(
                'fr' 	=> 'Création de fichiers',
                'en'	=> 'Creating files'
            ),
            'moreinfo'	=> array (
                'fr'	=> 'Test la vitesse d\'écriture du dossier temporaire de Moodle' ,
                'en'	=> 'Test the write speed in the Moodle\'s temporary folder',
            ),
            'nbpass'	=> 2000,
            'limit'		=> 1,
            'over'		=> 1.25,
            'overtips'	=> array(
                'fr' 	=> array(
                    'label'		=> 'Le disque dur semble trop lent',
                    'solution'	=> '<ul>
                                        <li>Vérifiez l\'état du disque / dossier temporaire</li>
                                        <li>Changez de disque dur ou de répertoire temporaire</li>
                                    </ul>'
                ),
                'en' 	=> array(
                    'label'		=> 'The harddrive is too slow.',
                    'solution'	=> '<ul>
                                        <li>Vérifiez l\'état du disque / temp folder</li>
                                        <li>Change your drive or the temporary folder</li>
                                    </ul>'
                )
            )
        ),      // Ecriture sur disque du dossier temporaire
        'fileread'      => array(
            'name' 		=> array(
                'fr' 	=> 'Lecture de fichiers',
                'en'	=> 'Reading files'
            ),
            'moreinfo'	=> array (
                'fr'	=> 'Test la vitesse de lecture du dossier temporaire de Moodle' ,
                'en'	=> 'Test the read speed in the Moodle\'s temporary folder',
            ),
            'nbpass'	=> 2000,
            'limit'		=> .6,
            'over'		=> .8,
            'overtips'	=> array(
                'fr' 	=> array(
                    'label'		=> 'Le disque dur semble trop lent',
                    'solution'	=> '<ul>
                                        <li>Vérifiez l\'état du disque / dossier temporaire</li>
                                        <li>Changez de disque dur ou de répertoire temporaire</li>
                                    </ul>'
                ),
                'en' 	=> array(
                    'label'		=> 'The harddrive is too slow.',
                    'solution'	=> '<ul>
                                        <li>Vérifiez l\'état du disque / temp folder</li>
                                        <li>Change your drive or the temporary folder</li>
                                    </ul>'
                )
            )
        ),      // Lecture sur disque du dossier temporaire
        'readcourse'    => array(
            'name' 		=> array(
                'fr' 	=> 'Lecture d\'un cours',
                'en'	=> 'Reading course'
            ),
            'moreinfo'	=> array (
                'fr'	=> 'Test la vitesse de la base de données pour lire un cours',
                'en'	=> 'Test the read speed to read a course',
            ),
            'nbpass'	=> 500,
            'limit'		=> .75,
            'over'		=> 1,
            'overtips'	=> array(
                'fr' 	=> array(
                    'label'		=> 'La base de données semble trop lente',
                    'solution'	=> '<ul>
                                        <li>Vérifiez <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">l\'intégrité la base de données</a></li>
                                        <li>Optimisez <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">la base de données</a></li>
                                    </ul>'
                ),
                'en' 	=> array(
                    'label'		=> 'The database is too slow.',
                    'solution'	=> '<ul>
                                        <li>Check <a href="http://dev.mysql.com/doc/refman/5.7/en/mysqlcheck.html" target="_blank">the database integrity</a></li>
                                        <li>Optimze <a href="http://dev.mysql.com/doc/refman/5.7/en/server-parameters.html" target="_blank">the database</a></li>
                                    </ul>'
                )
            )
        ),      // Lecture d'un cour
    );

    private $text = array(
        'fr' => array(
            'thanks' => 'N.B. : Les résultats et les conseils donnés par cet outil sont à titre indicatif.'
        )
    );

    private $loader = <<<EOD
<!doctype html>
<html lang="{{lang}}">
    <head>
        <meta charset="utf-8">
        <title>BenchMark Moodle v{{version}}</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    </head>
    <body>
        <div id="wrapper">
            <div class="container">
                <div class="page-header">
                    <h1>BenchMark Moodle <small>{{version}}</small></h1>
                </div>
                <p>
                    Ce benchmark doit avoir une durée inférieur à 1 minute et s'annule à 2 minutes.
                    il va démarrer automatiquement dans <span id="countdown">10</span> secondes ou cliquer sur &laquo;Lancer le test&raquo;
                </p>
                <p>Merci de patienter jusqu'à l'affichage des résultats.</p>
                <a href="?step=run" class="btn btn-primary">Lancer le test</a>
                <p class="text-muted">{{thanks}}</p>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script language="javascript">
        var countdown = 10;
        $(document).ready(function() {
            setInterval(function(){
                --countdown;
                $('#countdown').text(countdown);
                if (countdown == 0) {
                    document.location.href='?step=run';
                }
            }, 1000);
        });
        </script>
    </body>
</html>
EOD;

    public function     __construct() {

        $lang       = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
        $this->lang = ($lang == 'fr' || $lang == 'en') ? $lang : 'fr';

        if (empty($_GET['step'])) {
            $data = array(
                'lang'      => $this->lang,
                'version'   => $this->version
            );
            echo $this->renderer($this->loader, $data);
        } elseif ($_GET['step'] == 'run') {
            $this->launching();
        }

    }

    private function    launching() {
        foreach($this->tests as $name => $test) {
            if (method_exists($this, 'bench_'.$name)) {
                $start  = microtime(true);
                call_user_func_array(array($this, 'bench_' . $name), array($test['nbpass']));
                $this->tests[$name]['during'] = round(microtime(true) - $start, 4);
            } else {
                die('<pre>Method bench_'.$name.' not exist.</pre>');
            }
        }
        print_r($this->tests);
    }

    public function     result() {
        return $this->test;
    }

    private function    renderer($html, $data) {
        foreach($data as $key => $value) {
            $html = str_replace('{{'.$key.'}}', $value, $html);
        }
        return $html;
    }

    // Test, must by named by the prefix test_ and added in the tests array

    private function    bench_cload() {
        // Never delete this test !
        $CFG = $DB = null;
        require 'config.php';
        $this->cfg  = $CFG;
        $this->db   = $DB;
    }

    private function    bench_processor($pass) {
        for ($i = 0; $i < $pass; ++$i);
        $i = 0;
        while($i < $pass) {
            ++$i;
        }
    }

    private function    bench_filewrite($pass) {
        $lorem      = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lacus felis, dignissim quis nisl sit amet, blandit suscipit lacus. Duis maximus, urna sed fringilla consequat, tellus ex sollicitudin ante, vitae posuere neque purus nec justo. Donec porta ipsum sed urna tempus, sit amet dictum lorem euismod. Phasellus vel erat a libero aliquet venenatis. Phasellus condimentum venenatis risus ut egestas. Morbi sit amet posuere orci, id tempor dui. Vestibulum eget sapien eget mauris eleifend ullamcorper. In finibus mauris id augue fermentum porta. Fusce dictum vestibulum justo eget malesuada. Nullam at tincidunt urna, nec ultrices velit. Nunc eget augue velit. Mauris sed rhoncus purus. Etiam aliquam urna ac nisl tristique, vitae tristique urna tincidunt. Vestibulum luctus nulla magna, non tristique risus rhoncus nec. Vestibulum vestibulum, nulla scelerisque congue molestie, dolor risus hendrerit velit, non malesuada nisi orci eget eros. Aenean interdum ut lectus quis semper. Curabitur viverra vitae augue id.';
        $loremipsum = str_repeat($lorem, 16);
        $i = 0;
        while($i < $pass) {
            ++$i;
            file_put_contents($this->cfg->tempdir.'/benchmark.temp', $loremipsum);
        }
        //unlink($this->cfg->tempdir.'/benchmark.temp');
    }

    private function    bench_fileread($pass) {
        $i = 0;
        while($i < $pass) {
            ++$i;
            file_get_contents($this->cfg->tempdir.'/benchmark.temp');
        }
        unlink($this->cfg->tempdir.'/benchmark.temp');
    }

    private function    bench_readcourse($pass) {
        $i = 0;
        while($i < $pass) {
            ++$i;
            $this->db->get_record('course', array('id' => 1));
        }
    }
}

if (!file_exists('config.php')) {
    die('Merci de copier ce fichier à la racine du Moodle où se trouve config.php');
}

$Bench = new BenchMark();