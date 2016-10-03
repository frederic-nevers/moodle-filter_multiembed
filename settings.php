<?php
// This file is part of Moodle-oembed-Filter
//
// Moodle-oembed-Filter is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle-oembed-Filter is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle-oembed-Filter.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Greedy Filter settings
 *
 * @package    filter_multiembed
 * @copyright  2016 Frederic Nevers, www.iteachwithmoodle.com
 * @authors    Frederic Nevers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/codepen',
        get_string('codepen', 'filter_multiembed'),
        get_string('codepen_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/imgur',
        get_string('imgur', 'filter_multiembed'),
        get_string('imgur_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/padlet',
        get_string('padlet', 'filter_multiembed'),
        get_string('padlet_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/pbs',
        get_string('pbs', 'filter_multiembed'),
        get_string('pbs_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/pollev',
        get_string('pollev', 'filter_multiembed'),
        get_string('pollev_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/prezi',
        get_string('prezi', 'filter_multiembed'),
        get_string('prezi_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/quizlet',
        get_string('quizlet', 'filter_multiembed'),
        get_string('quizlet_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/soundcloud',
        get_string('soundcloud', 'filter_multiembed'),
        get_string('soundcloud_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/ted',
        get_string('ted', 'filter_multiembed'),
        get_string('ted_desc', 'filter_multiembed'),
        1));

    }



