![Benchmark screenshot](https://github.com/mikasmart/moodle-report_benchmark/blob/master/screenshot.png)

# Moodle Benchmark plugin

[![GitHub release](https://img.shields.io/github/release/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/releases/latest)
[![GitHub Release Date](https://img.shields.io/github/release-date/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/releases/latest)
[![GitHub last commit](https://img.shields.io/github/last-commit/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/commits/)

Performs various performance checks to determine the quality of the Moodle platform. Benchmark plugin is tested against and compatible with Moodle 2.7.x to 4.1.x.

> Version 1.5.1 of the plugin replaced 2 invalid tests (guest and fake account login performance) with a new one (notification page of Moodle administration). __Be careful when comparing benchmarks done before and after version 1.5.1!__

## Availability

Code is available at [https://github.com/mikasmart/moodle-report_benchmark](https://github.com/mikasmart/moodle-report_benchmark).

### Release notes

See [Release notes](https://github.com/mikasmart/moodle-report_benchmark/blob/master/CHANGELOG.md).

## Installation

### Automatically

- Log into your Moodle site as an administrator
- Go to "Site Administration > Plugins > Install plugins"
- Click on __Install plugins form the Moodle plugins directory__
- Search for "Benchmark" in the Moodle plugins directory
- Click on __Moodle Benchmark__
- Click on __Install now__ button and select your Moodle site
- Follow the instructions given by Moodle

### Manually

- [Download the zip](https://github.com/mikasmart/moodle-report_benchmark/archive/master.zip)
- Log into your Moodle site as an administrator
- Go to "Site Administration > Plugins > Install plugins"
- Drag and drop the zip file to the field __ZIP package__
- Click on __Install plugin from the ZIP file__
- Follow the instructions given by Moodle

## Usage

Log into your Moodle site as an administrator, go to "Site Administration > Reports > Benchmark"

## Requirements

- A Moodle server
- 1 minute (time to prepare a coffee / tea during the test)

## Roadmap

- Add more tests (please [send your test on the Moodle Forum](https://moodle.org/mod/forum/discuss.php?d=335282))
- Add sharing score on a global website (?)

## Thanks

- To the [Moodle community](https://moodle.org/) and specially the [reviewers](https://moodle.org/mod/forum/discuss.php?d=335357)
- To Nicolas Martignoni, for help, time and perspective
- To Jean Fruitet, for help, time and translation
- To [Martin Dougiamas](https://en.wikipedia.org/wiki/Martin_Dougiamas), for giving us Moodle

## License

Copyright ©2016 onwards, Mickaël Pannequin <mickael.pannequin@gmail.com>
Copyright ©2023 onwards, Nicolas Martignoni <nicolas@martignoni.net>

- All the source code is licensed under GPL 3 or any later version
- The documentation is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
