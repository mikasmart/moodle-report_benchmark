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
 * HTML rendering methods are defined here
 *
 * @package    report
 * @subpackage benchmark
 * @copyright  Mickaël Pannequin, mickael.pannequin@smartcanal.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
/**
 * Overview benchmark renderer
 */
class report_benchmark_renderer {
    
    public function launcher() {
        $out  = $this->output->header();
        $out .= $this->output->heading(get_string('adminreport', 'report_benchmark'));

        $out .= html_writer::tag('p', get_string('info', 'report_benchmark'));
        $out .= html_writer::link(new moodle_url('/report/benchmark/index.php', array('step' => 'run')),
                get_string('start', 'report_benchmark'), array('class' => 'btn btn-primary'));

        $out .= $this->output->footer();
        return $out;
    }

    public function display() {
        $bench = new benchmark();
        return $bench->results();
    }
    
}