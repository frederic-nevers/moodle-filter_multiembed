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
 * Multi-Embed Filter settings
 *
 * @package    filter_multiembed
 * @copyright  2016-2017 Frederic Nevers, www.iteachwithmoodle.com
 * @author     Frederic Nevers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // General filter settings.
    $settings->add(new admin_setting_configtext('filter_multiembed/blacklistedpages',
        get_string('blacklistedpages', 'filter_multiembed'),
        get_string('blacklistedpages_desc', 'filter_multiembed'),
        'page-mod-assign-view,page-mod-assign-grading',
        PARAM_TEXT));

    $settings->add(new admin_setting_configtext('filter_multiembed/googledomain',
        get_string('googledomain', 'filter_multiembed'),
        get_string('googledomain_desc', 'filter_multiembed'),
        'yourgoogledomain.edu',
        PARAM_TEXT));

    $settings->add(new admin_setting_configtext('filter_multiembed/nofilter',
        get_string('nofilter', 'filter_multiembed'),
        get_string('nofilter_desc', 'filter_multiembed'),
        'nofilter',
        PARAM_TEXT));

    // Services.
    $settings->add(new admin_setting_configcheckbox('filter_multiembed/bookcreator',
        get_string('bookcreator', 'filter_multiembed'),
        get_string('bookcreator_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/canva',
        get_string('canva', 'filter_multiembed'),
        get_string('canva_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/classtools',
        get_string('classtools', 'filter_multiembed'),
        get_string('classtools_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/codepen',
        get_string('codepen', 'filter_multiembed'),
        get_string('codepen_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/desmos',
        get_string('desmos', 'filter_multiembed'),
        get_string('desmos_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/diagnosticq',
        get_string('diagnosticq', 'filter_multiembed'),
        get_string('diagnosticq_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/emaze',
        get_string('emaze', 'filter_multiembed'),
        get_string('emaze_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/etherpad',
        get_string('etherpad', 'filter_multiembed'),
        get_string('etherpad_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/gdocs',
        get_string('gdocs', 'filter_multiembed'),
        get_string('gdocs_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/gdrive',
        get_string('gdrive', 'filter_multiembed'),
        get_string('gdrive_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/gsuite',
        get_string('gsuite', 'filter_multiembed'),
        get_string('gsuite_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/haiku',
        get_string('haiku', 'filter_multiembed'),
        get_string('haiku_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/imgur',
        get_string('imgur', 'filter_multiembed'),
        get_string('imgur_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/infogram',
        get_string('infogram', 'filter_multiembed'),
        get_string('infogram_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/learningapps',
        get_string('learningapps', 'filter_multiembed'),
        get_string('learningapps_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/padlet',
        get_string('padlet', 'filter_multiembed'),
        get_string('padlet_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/pbs',
        get_string('pbs', 'filter_multiembed'),
        get_string('pbs_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/piktochart',
        get_string('piktochart', 'filter_multiembed'),
        get_string('piktochart_desc', 'filter_multiembed'),
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

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/riddle',
        get_string('riddle', 'filter_multiembed'),
        get_string('riddle_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/slides',
        get_string('slides', 'filter_multiembed'),
        get_string('slides_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/smore',
        get_string('smore', 'filter_multiembed'),
        get_string('smore_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/soundcloud',
        get_string('soundcloud', 'filter_multiembed'),
        get_string('soundcloud_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/studystack',
        get_string('studystack', 'filter_multiembed'),
        get_string('studystack_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/sutori',
        get_string('sutori', 'filter_multiembed'),
        get_string('sutori_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/ted',
        get_string('ted', 'filter_multiembed'),
        get_string('ted_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/thinglink',
        get_string('thinglink', 'filter_multiembed'),
        get_string('thinglink_desc', 'filter_multiembed'),
        1));

    $settings->add(new admin_setting_configcheckbox('filter_multiembed/youtube',
        get_string('youtube', 'filter_multiembed'),
        get_string('youtube_desc', 'filter_multiembed'),
        1));

}



