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
 * 
 * HOW TO CREATE A TEST
 * 
 * @see testlib.php
 * 
 */

class benchmark {

    const BENCHFAIL_SLOWSERVER = 'slowserver';
    const BENCHFAIL_SLOWSERVER = 'slowserver';
    const BENCHFAIL_SLOWSERVER = 'slowserver';
    const BENCHFAIL_SLOWSERVER = 'slowserver';

    private $benchs = array();

    public function results() {
        $tests = $this->get_tests();
        foreach($tests as $name) {
            $this->benchs[$name] = array();
            $start = microtime(true);
            $result = $this->start_test($name);
            if (empty($result)) {
                $result = array('limit' => 0, 'over' => 0);
            }
            $over_start = isset($result['start']) ? $result['start'] : $start;
            $this->benchs[$name]['during'] = round(microtime(true) - $over_start, 4);
            $this->benchs[$name] += $result;
        }

        print_object($this->benchs);

    }

    public function start_test($name) {
        return call_user_func(array('benchmark_test', $name));
    }

    private function get_tests() {

        $tests = array();
        $class = new ReflectionClass(__CLASS__.'_test');
        $methods = $class->getMethods(ReflectionMethod::IS_STATIC);

        foreach($methods as $method) {
            if ($method->class == __CLASS__.'_test') {
                $tests[] = $method->name;
            }
        }

        return $tests;
    }



    /*

    public function results() {
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
                'name'      => $test['name'][$this->lang],
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
                $output .= '<h5>' . $test['overtips'][$this->lang]['label'] . '</h5>' . $test['overtips'][$this->lang]['solution'];
            }
        }
        if (empty($output)) {
            $output .= '<div class="alert alert-success" role="alert"><b>Félicitations !</b><br />Votre Moodle semble fonctionner parfaitement.</div>';
        } else {
            $output = '<div class="alert alert-warning" role="alert"><b>Attention !</b><br />Votre Moodle semble rencontrer quelques difficultés.' . $output . '</div>';
        }
        return $output;
    }
    */

    // Test, must by named by the prefix bench_ and added in the tests array


}
/*
if (!file_exists('config.php')) {
    die('Merci de copier ce fichier à la racine du Moodle où se trouve config.php');
}

$Bench = new BenchMark();
*/