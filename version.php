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
 * Version details of the benchmark report
 *
 * @package    report_benchmark
 * @copyright  2016 onwards Mickaël Pannequin {@link mickael.pannequin@gmail.com}
 * @copyright  2023 onwards Nicolas Martignoni {@link nicolas@martignoni.net}
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

// Avoid warning message in Moodle 2.5 and below.
if (!isset($plugin)) {
    $plugin = new stdClass();
}

// Plugin informations.
$plugin->version    = 2023012800; // The current module version (Date: YYYYMMDDXX).
$plugin->release    = 'v1.5.1';
$plugin->requires   = 2011120500; // Requires this Moodle version 2.0 or later.
$plugin->supported  = [27, 410];
$plugin->maturity   = MATURITY_STABLE;
$plugin->component  = 'report_benchmark'; // Full name of the plugin (used for diagnostics).
