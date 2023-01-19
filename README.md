![Benchmark screenshot](https://github.com/mikasmart/moodle-report_benchmark/blob/master/screenshot.png)

# Moodle Benchmark plugin

[![GitHub release](https://img.shields.io/github/release/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/releases/latest)
[![GitHub Release Date](https://img.shields.io/github/release-date/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/releases/latest)
[![GitHub last commit](https://img.shields.io/github/last-commit/mikasmart/moodle-report_benchmark.svg)](https://github.com/mikasmart/moodle-report_benchmark/commits/)

Performs various performance checks to determine the quality of the Moodle platform. It is tested against and compatible with Moodle 2.7.x to 4.1.x.

> Version 1.5.0 of the plugin replaced 2 invalid tests (guest and fake account login performance) with a new one (notification page of Moodle administration). __Be careful when comparing benchmarks done before and after version 1.5.0!__

## Availability

Code available at [https://github.com/mikasmart/moodle-report_benchmark](https://github.com/mikasmart/moodle-report_benchmark).

### Release notes

See [Release notes](https://github.com/mikasmart/moodle-report_benchmark/blob/master/CHANGELOG.md).

## Installation
### English

#### Manually
* Clone or download the ***master*** *branch* directly on your  ./moodle/report directory server
* Rename it to benchmark
* Logon as admin on your Moodle server
* Go to "Site Administration > Notification"
* Install the new plugin as usual

#### Automatically
* [Download the zip](https://github.com/mikasmart/moodle-report_benchmark/archive/master.zip)
* Open the Zip and rename the folder *benchmark-master* in *benchmark*
* Logon as admin on your Moodle server
* go to "Site Administration > Plugins > Install plugins"
* Put the zip file i, *ZIP package*
* Clic on *Install plugin from the ZIP file*

### French

#### Manuellement
* Cloner ou télécharger *la branche* ***master*** directement vers le dossier ./moodle/report de votre serveur
* Renommez-le benchmark
* Logez-vous comme administrateur
* Allez à "Administration du site > Notification"
* Installez le nouveau plugin comme d'habitude

#### Automatiquement
* [Télécharger le zip](https://github.com/mikasmart/moodle-report_benchmark/archive/master.zip)
* Ouvrir le Zip et renommer le dossier *benchmark-master* en *benchmark*
* Logez-vous comme administrateur
* Allez à "Administration du site > Plugins > Installer des plugins"
* Placer le zip dans la zone *Paquetage ZIP*
* Cliquer sur *Installer le plugin à partir du fichier Zip*

## Usage

### English
As Admin logon your server, go to "Site Administration > Reports > Benchmark"

### French
Connectez-vous comme Administrateur, allez à "Administration du site > Rapports > Benchmark"

## Requirement

- Be an admin or a manager

## Requirement

- Moodle installed
- 1 minute (time to prepare a coffee / tea during the test)

## Roadmap

- Add more tests (please [send your test on the Moodle Forum](https://moodle.org/mod/forum/discuss.php?d=335282))
- Add sharing score on a global website (?)
- Add more languages

## Thanks

* To the [Moodle community](https://moodle.org/) and specially the [reviewers](https://moodle.org/mod/forum/discuss.php?d=335357)
* To Nicolas Martignoni, for help, time and perspective
* To Jean Fruitet, for help, time and translation
* To [Martin Dougiamas](https://en.wikipedia.org/wiki/Martin_Dougiamas), for giving us Moodle

## Benchmark records

* 1st : Sergio Rabellino - 21 points
* 2nd : Richard Oelmann - 90 points
* 3rd : Usman Asar - 93 points

## License

Copyright ©2016 onwards, Mickaël Pannequin <mickael.pannequin@gmail.com>

* All the source code is licensed under GPL 3 or any later version
* The documentation is licensed under Creative Commons Attribution-NonCommercial-ShareAlike 4.0 International

This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 3 of the License, or (at your option) any later version. This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
