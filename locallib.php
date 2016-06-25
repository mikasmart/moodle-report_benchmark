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

    private $results = array();

    public function __construct() {

        $tests  = $this->get_tests();
        $benchs = array();
        $idtest = 0;

        foreach($tests as $name) {

            ++$idtest;

            $start  = microtime(true);
            $result = $this->start_test($name);
            
            empty($result['limit']) ? $result['limit'] = 0 : null;
            empty($result['over']) ? $result['over'] = 0 : null;
            $over_start = isset($result['start']) ? $result['start'] : $start;
            $stop = round(microtime(true) - $over_start, 4);

            $benchs[$name] = array(
                    'during' => round(microtime(true) - $over_start, 3),
                    'id' => $idtest,
                    'class' => $this->get_feedback_class($stop, $result['limit'], $result['over']),
                    'name' => get_string($name.'name', 'report_benchmark'),
                    'info' => get_string($name.'moreinfo', 'report_benchmark'),
                ) + $result;

        }

        $this->results = $benchs;

    }

    private function start_test($name) {
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

    private function get_feedback_class($during, $limit, $over) {
        if ($during >= $over) {
            $class = 'danger';
        } elseif ($during >= $limit) {
            $class = 'warning';
        } else {
            $class = 'success';
        }
        return $class;
    }

    public function get_results() {

        return $this->results;

    }

    public function get_total() {

        $total = 0;

        foreach($this->results as $result) {
            $total += $result['during'];
        }

        return array(
            'total' => $total,
            'score' => ceil($total * 100),
        );
    }

}
