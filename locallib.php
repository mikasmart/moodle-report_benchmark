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
 * Library for the Benchmark report
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mailto:mickael.pannequin@gmail.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 * HOW TO CREATE A TEST
 * @see testlib.php
 */

/**
 * Utility class for report_benchmark
 *
 * @copyright  2016 onwards Mickaël Pannequin {@link mailto:mickael.pannequin@gmail.com}
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class report_benchmark {

    /**
     * benchmark results.
     *
     * @var array Benchmark results.
     */
    private $results = [];

    /**
     * benchmark constructor.
     */
    public function __construct() {

        // Get the list of test.
        $tests  = $this->get_tests();
        $benchs = [];
        $idtest = 0;

        foreach ($tests as $name) {

            ++$idtest;

            // Initialize and execute the test.
            $start  = microtime(true);
            $result = $this->start_test($name);

            // Populate if empty result.
            empty($result['limit']) ? $result['limit'] = 0 : null;
            empty($result['over']) ? $result['over'] = 0 : null;

            // Overwrite the result if start/stop if defined.
            $overstart = isset($result['start']) ? $result['start'] : $start;
            $overstop  = isset($result['stop']) ? $result['stop'] : microtime(true);
            $stop      = round($overstop - $overstart, 3);

            // Store and merge result.
            $benchs[$name] = [
                    'during'    => $stop,
                    'id'        => $idtest,
                    'class'     => $this->get_feedback_class($stop, $result['limit'], $result['over']),
                    'name'      => get_string($name.'name', 'report_benchmark'),
                    'info'      => get_string($name.'moreinfo', 'report_benchmark'),
                ] + $result;
        }

        // Store all results.
        $this->results = $benchs;

    }

    /**
     * Start a benchmark test
     *
     * @param string $name Test name
     * @return array Test result
     */
    private function start_test($name) {

        return call_user_func(['report_benchmark_test', $name]);

    }

    /**
     * Get the list of tests
     *
     * @return array List of test
     */
    private function get_tests() {

        // Get the list of all static method in the class benchmark_test.
        $tests      = [];
        $class      = new ReflectionClass(__CLASS__.'_test');
        $methods    = $class->getMethods(ReflectionMethod::IS_STATIC);

        // Check if the method is in the class benchmark_test.
        foreach ($methods as $method) {
            if ($method->class == __CLASS__.'_test') {
                $tests[] = $method->name;
            }
        }

        return $tests;
    }

    /**
     * Get the class with the timer result
     *
     * @param int $during
     * @param int $limit
     * @param int $over
     * @return string Get the class
     */
    private function get_feedback_class($during, $limit, $over) {

        if ($during >= $over) {
            $class = 'danger';
        } else if ($during >= $limit) {
            $class = 'warning';
        } else {
            $class = 'success';
        }
        return $class;

    }

    /**
     * Return the result of all tests
     *
     * @return array Get the result of all tests
     */
    public function get_results() {

        return $this->results;

    }

    /**
     * Return total time and score of all tests
     *
     * @return array Get the total time and score of all tests
     */
    public function get_total() {

        $total = 0;

        foreach ($this->results as $result) {
            $total += $result['during'];
        }

        return [
            'total' => $total,
            'score' => ceil($total * 100),
        ];

    }

}
