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

class report_benchmark_renderer extends plugin_renderer_base {
    
    public function launcher() {

        $out  = $this->output->header();
        $out .= $this->output->heading(get_string('adminreport', 'report_benchmark'));

        $out .= html_writer::tag('p', get_string('info', 'report_benchmark'), array('class' => 'info'));

        $out .= html_writer::start_div('continuebutton');
        $out .= html_writer::link(new moodle_url('/report/benchmark/index.php', array('step' => 'run')),
                get_string('start', 'report_benchmark'), array('class' => 'btn btn-primary'));
        $out .= html_writer::end_div();

        $out .= $this->output->footer();
        return $out;

    }

    public function display() {

        $bench = new benchmark();

        $out  = $this->output->header();
        $out .= $this->output->heading(get_string('adminreport', 'report_benchmark'));
        $out .= html_writer::start_div(null, array('id' => 'benchmark'));

        $strdesc = get_string('description', 'report_benchmark');
        $strduring = get_string('during', 'report_benchmark');
        $strlimit = get_string('limit', 'report_benchmark');
        $strover = get_string('over', 'report_benchmark');

        $results = $bench->get_results();
        $totals = $bench->get_total();

        $out .= html_writer::start_div('text-center');

        $out .= html_writer::start_tag('h3');
        $out .= get_string('scoremsg', 'report_benchmark');

        $out .= html_writer::start_tag('span');
        $out .= get_string('points', 'report_benchmark', $totals['score']);

        $out .= html_writer::end_tag('span');
        $out .= html_writer::end_tag('h3');

        $out .= html_writer::end_div();

        // Display tests with details

        $table = new html_table();
        $table->head  = array('#', $strdesc, $strduring, $strlimit, $strover);
        $table->attributes = array('class' => 'admintable benchmarkresult generaltable');
        $table->id = 'benchmarkresult';

        foreach($results as $result) {

            $row = new html_table_row();
            $row->attributes['class'] = 'bench_'.$result['name'];

            $cell = new html_table_cell($result['id']);
            $row->cells[] = $cell;
            $cell = new html_table_cell($result['name']);
            $text = $result['name'];
            $text .= html_writer::start_div();
            $text .= html_writer::tag('small', $result['info']);
            $text .= html_writer::end_div();
            $cell->text = $text;
            $row->cells[] = $cell;
            $cell = new html_table_cell(number_format($result['during'], 3, '.', null));
            $cell->attributes['class'] = $result['class'];
            $row->cells[] = $cell;
            $cell = new html_table_cell($result['limit']);
            $row->cells[] = $cell;
            $cell = new html_table_cell($result['over']);
            $row->cells[] = $cell;

            $table->data[] = $row;

        }

        $row = new html_table_row();
        $row->attributes['class'] = 'footer';
        $cell = new html_table_cell(get_string('total', 'report_benchmark'));
        $cell->colspan = 2;
        $row->cells[] = $cell;

        $cell = new html_table_cell(get_string('seconde', 'report_benchmark', number_format($totals['total'], 3, '.', null)));
        $row->cells[] = $cell;

        $cell = new html_table_cell('&nbsp;');
        $cell->colspan = 2;
        $row->cells[] = $cell;

        $table->data[] = $row;

        $row = new html_table_row();
        $row->attributes['class'] = 'footer';
        $cell = new html_table_cell(get_string('score', 'report_benchmark'));
        $cell->colspan = 2;
        $row->cells[] = $cell;
        $cell = new html_table_cell(get_string('points', 'report_benchmark', $totals['score']));
        $row->cells[] = $cell;

        $cell = new html_table_cell('&nbsp;');
        $cell->colspan = 2;
        $row->cells[] = $cell;

        $table->data[] = $row;
        
        $out .= html_writer::table($table);

        // Display the tips

        $tips = null;
        foreach($results as $result) {
            if ($result['during'] >= $result['limit']) {
                $tips .= html_writer::start_tag('h5', null);
                $tips .= get_string($result['fail'].'label', 'report_benchmark');
                $tips .= html_writer::end_tag('h5');
                $tips .= get_string($result['fail'].'solution', 'report_benchmark');
            }
        }

        if (empty($tips)) {
            $out .= html_writer::start_div('alert alert-success', array('role' => 'alert'));
            $out .= get_string('benchsuccess', 'report_benchmark');
            $out .= html_writer::end_div();
        } else {
            $out .= html_writer::start_div('alert alert-warning', array('role' => 'alert'));
            $out .= get_string('benchfail', 'report_benchmark');
            $out .= $tips;
            $out .= html_writer::end_div();
        }

        $out .= html_writer::start_div('continuebutton');

        $out .= html_writer::tag('a', get_string('benchshare', 'report_benchmark'),
            array('class' => 'btn btn-default', 'target' => '_blank', 'href' => 'https://moodle.org/mod/forum/discuss.php?d=335282'));

        $out .= html_writer::tag('a', get_string('redo', 'report_benchmark'),
            array('class' => 'btn btn-primary', 'href' => new moodle_url('/report/benchmark/index.php')));

        $out .= html_writer::end_div();



        $out .= html_writer::end_div();
        $out .= $this->output->footer();
        return $out;

    }
    
}