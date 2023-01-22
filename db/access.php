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
 * Benchmark report capabilities are defined here.
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @link       https://github.com/mikasmart/moodle-report_benchmark Source on GitHub
 */

defined('MOODLE_INTERNAL') || die();

$capabilities = array(
    'report/benchmark:view' => array(
        'riskbitmask' => RISK_DATALOSS,
        'captype' => 'read',
        'contextlevel' => CONTEXT_SYSTEM,
        'archetypes' => array(
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'report/performance:view'
    )
);
