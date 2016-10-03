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
 * Multi-Embed filter logic
 *
 * @package    filter_multiembed
 * @copyright  2016 Frederic Nevers, www.iteachwithmoodle.com
 * @authors    Frederic Nevers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Class filter_multiembed
 */

class filter_multiembed extends moodle_text_filter {

    /**
     * @param some $text
     * @param array $options
     * @return some
     */
    public function filter($text, array $options = array()) {

        if (!is_string($text) or empty($text)) {
            // Non-string data can not be filtered anyway.
            return $text;
        }

        if (stripos($text, '</a>') === false) {
            // Performance shortcut - if there is no </a> tag, nothing can match.
            return $text;
        }

        // Return the original text if the regex fails
        $newtext = $text;

        // Search for CodePen snippets
        if (get_config('filter_multiembed', 'codepen')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(codepen\.io)\/(.*?)\/(pen)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_codepencallback', $newtext);
        }

        // Search for Imgur images
        if (get_config('filter_multiembed', 'imgur')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(imgur\.com)\/(.*?)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_imgurcallback', $newtext);
        }

        // Search for Padlet boards
        if (get_config('filter_multiembed', 'padlet')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(padlet\.com)\/(.*?)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_padletcallback', $newtext);
        }

        // Search for PBS videos
        if (get_config('filter_multiembed', 'pbs')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(pbs\.org)\/(video)\/(.*?)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_pbscallback', $newtext);
        }

        // Search for PollEverywhere polls
        if (get_config('filter_multiembed', 'pollev')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(polleverywhere\.com|PollEv.com)\/(discourses|polls|multiple_choice_polls|free_text_polls||ranking_polls)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_pollevcallback', $newtext);
        }

        // Search for Prezi presentations
        if (get_config('filter_multiembed', 'prezi')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(prezi\.com)\/(.*?)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_prezicallback', $newtext);
        }

        // Search for Quizlet actvities
        if (get_config('filter_multiembed', 'quizlet')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(quizlet\.com)\/(.*?)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_quizletcallback', $newtext);
        }

        // Search for Soundcloud tracks
        if (get_config('filter_multiembed', 'soundcloud')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(soundcloud\.com)\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_soundcloudcallback', $newtext);
        }

        // Search for TED Videos
        if (get_config('filter_multiembed', 'ted')) {
            $search = '/<a\s[^>]*href="(https?:\/\/(www\.)?)(ted\.com)\/talks\/(.*?)"(.*?)>(.*?)<\/a>/is';
            $newtext = preg_replace_callback($search, 'filter_multiembed_tedcallback', $newtext);
        }

        // Exception checks
        if (empty($newtext) or $newtext === $text) {
            // Error or not filtered.
            unset($newtext);
            return $text;
        }

        return $newtext;
    }

}

/**
 * Turns a CodePen link into an embedded snippet
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_codepencallback($link) {
    $embedcode = '<iframe height="265" scrolling="no" src="//codepen.io/';
    $embedcode .= $link[4]; // CodePen user ID is in 4th capturing group of the regular expression
    $embedcode .= '/embed/';
    $embedcode .= $link[6]; // CodePen snippet ID is in 6th capturing group of the regular expression
    $embedcode .= '/?height=265&amp;theme-id=0&amp;default-tab=css,result&embed-version=2" frameborder="no"';
    $embedcode .= ' allowtransparency="true" allowfullscreen="true" style="width: 100%;"></iframe>';

    return $embedcode;
}

/**
 * Turns an Imgur link into an embedded image
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_imgurcallback($link) {
    $embedcode = '<blockquote class="imgur-embed-pub" lang="en" data-id="a/';
    $embedcode .= $link[5]; // Imgur images are in the 5th capturing group of the regular expression
    $embedcode .= '"><a href="//imgur.com/';
    $embedcode .= $link[5];
    $embedcode .= '">';
    $embedcode .= $link[5];
    $embedcode .= '</a></blockquote><script async src="//s.imgur.com/min/embed.js" charset="utf-8"></script>';

    return $embedcode;
}

/**
 * Turns a Padlet link into an embedded video
 * iframe code from www.padlet.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_padletcallback($link) {
    $embedcode = '<iframe src="https://padlet.com/embed/';
    $embedcode .= $link[5]; // Padlet IDs are in the 4th capturing group of the regular expression
    $embedcode .= '" frameborder="0" width="100%" height="480px" style="padding:0;margin:0;border:none"></iframe>';

    return $embedcode;
}

/**
 * Turns a PBS link into an embedded video
 * iframe code from www.pbs.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_pbscallback($link) {
    $embedcode = '<iframe width="512" height="376" src="http://player.pbs.org/viralplayer/';
    $embedcode .= $link[5]; // PBS IDs are in the 4th capturing group of the regular expression
    $embedcode .= '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" seamless allowfullscreen></iframe>';

    return $embedcode;
}

/**
 * Turns a PollEverywhere link into an embedded poll
 * iframe code from www.polleverywhere.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_pollevcallback($link) {
    $embedcode = '<iframe src="https://embed.polleverywhere.com/';
    $embedcode .= $link[4].'/'; // Type of activity
    // Strip any unwanted parts of ID (e.g. trailing folder)
    $embedcode .= strtok($link[5], "/"); // PollEv IDs are in the 5th capturing group of the regular expression
    $embedcode .= '?controls=none&amp;short_poll=true" width="100%" height="100%" frameBorder="0"></iframe>';

    return $embedcode;
}

/**
 * Turns a Prezi link into an embedded presentation
 * iframe code from www.prezi.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_prezicallback($link) {
    $embedcode = '<iframe id="iframe_container" frameborder="0" webkitallowfullscreen="" mozallowfullscreen=""';
    $embedcode .= 'allowfullscreen="" width="550" height="400" src="https://prezi.com/embed/';
    $embedcode .= $link[4]; // Prezi IDs are in the 4th capturing group of the regular expression
    $embedcode .= '/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0"></iframe>';

    return $embedcode;
}

/**
 * Turns a Quizlet link into an embedded activity
 * iframe code from www.quizlet.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_quizletcallback($link) {
    $embedcode = '<iframe src="https://quizlet.com/';
    $embedcode .= $link[4]; // Quizlet IDs are in the 4th capturing group of the regular expression
    $embedcode .= '/flashcards/embed" height="410" width="100%" style="border:0"></iframe>';

    return $embedcode;
}

/**
 * Turns a Soundcloud link into an embedded song
 * Please note that this may not work forever,
 * As it is a workaround (soundcloud API normally asks for tracks IDs)
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_soundcloudcallback($link) {
    $embedcode = '<iframe width="100%" height="166" scrolling="no" frameborder="no"';
    $embedcode .= ' src="https://w.soundcloud.com/player/?url=https%3A//soundcloud.com/';
    $embedcode .= $link[4]; // Soundcloud tracks are in the 4th capturing group of the regular expression
    $embedcode .= '&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;';
    $embedcode .= 'show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';

    return $embedcode;
}

/**
 * Turns a TED link into an embedded video
 * iframe code from www.ted.com website
 *
 * @param $link HTML tag containing a link
 * @return string HTML content after processing.
 */
function filter_multiembed_tedcallback($link) {
    $embedcode = '<iframe src="https://embed.ted.com/talks/';
    $embedcode .= $link[4]; // TED video IDs are in the 4th capturing group of the regular expression
    $embedcode .= '" width="640" height="360" frameborder="0" scrolling="no" ';
    $embedcode .= 'webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

    return $embedcode;
}