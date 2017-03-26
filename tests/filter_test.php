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
 * Units tests for the Multi-Embed Filter
 *
 * @package    filter_multiembed
 * @copyright  2016-2017 Frederic Nevers, www.iteachwithmoodle.com
 * @author     Frederic Nevers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/filter/multiembed/filter.php');


/**
 * PHP Unit test for the Multi-Embed filter
 *
 * Class filter_multiembed_testcase
 * @copyright  2016 Frederic Nevers, www.iteachwithmoodle.com
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_multiembed_testcase extends basic_testcase {

    /**
     * @var
     */
    protected $filter;


    /**
     * Set up Test
     *
     * @throws dml_exception
     */
    protected function setUp() {
        parent::setUp();
        $this->filter = new filter_multiembed(context_system::instance(), array());
    }


    /**
     * Test every service offered in the Multi-Embed filter
     *
     * @return bool
     */
    public function test_filter() {

        // Provide some working URLs to test.
        $urls = array(
            'CodePen' => 'http://codepen.io/superpikar/pen/wzYaRo',
            'Desmos' => 'https://www.desmos.com/calculator/cdxhggo4nc',
            'eMaze' => 'https://www.emaze.com/@AWRCLTWI/welcome-aboard',
            'Gdocs' => 'https://docs.google.com/document/d/1rIj1E-vS_cAJjg-awtILzypvomS1Yp0QQzEVkxEfNjs',
            'Gsuite' => 'https://docs.google.com/a/lms.isf.edu.hk/document/d/1IYYv4eIscPfQtJzIcveYufLMe8BghNBm6wuBGyai5hE',
            'Haiku' => 'https://www.haikudeck.com/parental-engagement-innovation-education-presentation-IAoLln02nF',
            'Imgur' => 'http://imgur.com/gallery/SRtaf',
            'Infogram' => 'https://infogr.am/eu_fraud_map___international_version',
            'Padlet' => 'https://padlet.com/fnevers/gwz9fjz4yiia',
            'PBS' => 'http://www.pbs.org/video/2365868384/',
            'PiktoChart' => 'https://magic.piktochart.com/output/17277748-testy',
            'PollEv' => 'https://www.polleverywhere.com/ranking_polls/7LLFJoRV9oAoolv',
            'Prezi' => 'https://prezi.com/flgl_ykzaqqu/merging-humans-computers-the-next-10-years-of-computing/#',
            'Quizlet' => 'https://quizlet.com/68910157/flashcards',
            'Slides' => 'http://slides.com/news/custom-fonts#/',
            'SoundCloud' => 'https://soundcloud.com/770rd/bentley-coupe-lil-yachty-ft-gucci-mane-prod-byou',
            'Sutori' => 'https://www.sutori.com/timeline/the-french-revolution-eb10',
            'TED' => 'https://www.ted.com/talks/sam_harris_can_we_build_ai_without_losing_control_over_it',
            'ThingLink' => 'https://www.thinglink.com/scene/737743411833995264',
            'YouTube' => 'https://youtu.be/4m5KrPXL4wI'
        );

        // Feed all working URLs to the filter.
        $filterinput = '';
        foreach ($urls as $service => $url) {
            $filterinput .= '<p><a href="'.$url.'">'.$service.'</a></p>';
        }
        unset($url);

        // Run filter on the input.
        $filteroutput = $this->filter->filter($filterinput);

        // Run CodePen test.
        $codepenout = '<iframe height="265" scrolling="no" src="//codepen.io/superpikar/embed/wzYaRo';
        $codepenout .= '/?height=265&amp;theme-id=0&amp;default-tab=css,result&embed-version=2" frameborder="no"';
        $codepenout .= ' allowtransparency="true" allowfullscreen="true" style="width: 100%;"></iframe>';
        $this->assertContains($codepenout, $filteroutput, 'CodePen filter fails');

        // Run Desmos test.
        $desmosout = '<a title="View with the Desmos Graphing Calculator" href="https://www.desmos.com/calculator/';
        $desmosout .= 'cdxhggo4nc">  <img src="https://s3.amazonaws.com/calc_thumbs/production/cdxhggo4nc.png"';
        $desmosout .= ' width="200px" height="200px" style="border:1px solid #ccc; border-radius:5px"/></a>';
        $this->assertContains($desmosout, $filteroutput, 'Desmos filter fails');

        // Run eMaze test.
        $emazeout = '<iframe src="//app.emaze.com/@AWRCLTWI/welcome-aboard';
        $emazeout .= '" width="960px" height="540px" seamless webkitallowfullscreen';
        $emazeout .= ' mozallowfullscreen allowfullscreen></iframe>';
        $this->assertContains($emazeout, $filteroutput, 'eMaze filter fails');

        // Run Google Docs test.
        $gdocsout = '<iframe height="620" width="100%" border="0" src="//docs.google.com/document/';
        $gdocsout .= 'src="https://docs.google.com/document/d/1rIj1E-vS_cAJjg-awtILzypvomS1Yp0QQzEVkxEfNjs';
        $gdocsout .= '/edit?usp=sharing"></iframe>';
        $this->assertContains($gdocsout, $filteroutput, 'Gdocs filter fails');

        // Run GSuite test.
        $gsuiteout = '<iframe height="620" width="100%" border="0" src="//docs.google.com/document/';
        $gsuiteout .= 'src="https://docs.google.com/document/d/1IYYv4eIscPfQtJzIcveYufLMe8BghNBm6wuBGyai5hE';
        $gsuiteout .= '/edit?usp=sharing"></iframe>';
        $this->assertContains($gdocsout, $filteroutput, 'GSuite filter fails');

        // Run Haiku Deck test.
        $haikuout = '<iframe src="//www.haikudeck.com/e/IAoLln02nF';
        $haikuout .= '/?isUrlHashEnabled=false&isPreviewEnabled=false&isHeaderVisible=false"';
        $haikuout .= 'width="640" height="541" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
        $this->assertContains($haikuout, $filteroutput, 'Haiku filter fails');

        // Run Imgur test.
        $imgurout = '<blockquote class="imgur-embed-pub" lang="en" data-id="a/SRtaf';
        $imgurout .= '"><a href="//imgur.com/SRtaf">';
        $imgurout .= 'SRtaf</a></blockquote><script async src="//s.imgur.com/min/embed.js" charset="utf-8"></script>';
        $this->assertContains($imgurout, $filteroutput, 'Imgur filter fails');

        // Run Infogram test.
        $infogramout = '<iframe src="//e.infogr.am/eu_fraud_map___international_version';
        $infogramout .= '?src=embed" title="Top Earners" width="700" height="580"';
        $infogramout .= 'scrolling="no" frameborder="0" style="border:none;"></iframe>';
        $this->assertContains($infogramout, $filteroutput, 'Infogram filter fails');

        // Run Padlet test.
        $padletout = '<iframe src="//padlet.com/embed/gwz9fjz4yiia';
        $padletout .= '" frameborder="0" width="100%" height="480px" style="padding:0;margin:0;border:none"></iframe>';
        $this->assertContains($padletout, $filteroutput, 'Padlet filter fails');

        // Run PBS test.
        $pbsout = '<iframe width="512" height="376" src="//player.pbs.org/viralplayer/2365868384';
        $pbsout .= '" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" seamless allowfullscreen></iframe>';
        $this->assertContains($pbsout, $filteroutput, 'PBS filter fails');

        // Run PiktoChart test.
        $piktoout = '<div class="piktowrapper-embed" pikto-uid="17277748-testy';
        $piktoout .= '" style="height: 300px; position: relative;"><div class="embed-loading-overlay" style="width: 100%;';
        $piktoout .= ' height: 100%; position: absolute; text-align: center;">';
        $piktoout .= '<img width="60px" alt="Loading..." style="margin-top: 100px" ';
        $piktoout .= 'src="//magic.piktochart.com/loading.gif"/>';
        $piktoout .= '<p style="margin: 0; padding: 0; font-family: Lato, Helvetica, Arial, sans-serif;';
        $piktoout .= 'font-weight: 600; font-size: 16px">Loading...</p></div><div class="pikto-canvas-wrap">';
        $piktoout .= '<div class="pikto-canvas"></div></div></div>';
        $piktoout .= '<script>(function(d){var js, id="pikto-embed-js", ref=d.getElementsByTagName("script")[0]';
        $piktoout .= ';if (d.getElementById(id)) { return;}js=d.createElement("script")';
        $piktoout .= ';js.id=id; js.async=true;js.src="//magic.piktochart.com/assets/embedding/embed.js"';
        $piktoout .= ';ref.parentNode.insertBefore(js, ref);}(document));</script>';
        $this->assertContains($piktoout, $filteroutput, 'PiktoChart filter fails');

        // Run PollEv test.
        $pollevout = '<iframe src="//embed.polleverywhere.com/ranking_polls/7LLFJoRV9oAoolv';
        $pollevout .= '?controls=none&amp;short_poll=true" width="100%" height="100%" frameBorder="0"></iframe>';
        $this->assertContains($pollevout, $filteroutput, 'PollEv filter fails');

        // Run Prezi test.
        $preziout = '<iframe id="iframe_container" frameborder="0" webkitallowfullscreen="" mozallowfullscreen=""';
        $preziout .= 'allowfullscreen="" width="550" height="400" src="//prezi.com/embed/flgl_ykzaqqu';
        $preziout .= '/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0"></iframe>';
        $this->assertContains($preziout, $filteroutput, 'Prezi filter fails');

        // Run Quizlet test.
        $quizletout = '<iframe src="//quizlet.com/68910157';
        $quizletout .= '/flashcards/embed" height="410" width="100%" style="border:0"></iframe>';
        $this->assertContains($quizletout, $filteroutput, 'Quizlet filter fails');

        // Run Slid.es test.
        $slidesout = '<iframe src="//slides.com/news/custom-fonts#';
        $slidesout .= '/embed" width="576" height="420" scrolling="no" frameborder="0"';
        $slidesout .= 'webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        $this->assertContains($slidesout, $filteroutput, 'Slid.es filter fails');

        // Run SoundCloud test.
        $soundcloudout = '<iframe width="100%" height="166" scrolling="no" frameborder="no"';
        $soundcloudout .= ' src="//w.soundcloud.com/player/?url=https%3A//soundcloud.com/';
        $soundcloudout .= '770rd/bentley-coupe-lil-yachty-ft-gucci-mane-prod-byou';
        $soundcloudout .= '&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;';
        $soundcloudout .= 'show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';
        $this->assertContains($soundcloudout, $filteroutput, 'SoundCloud filter fails');

        // Run Sutori test.
        $sutoriout = '<script src="https://d1ox703z8b11rg.cloudfront.net/assets/iframeResizer.js"></script>';
        $sutoriout .= '<iframe src="//www.sutori.com/timeline/the-french-revolution-eb10/embed" ';
        $sutoriout .= 'width="100%" scrolling="no" frameborder="0" allowfullscreen></iframe>';
        $sutoriout .= '<script src="https://d1ox703z8b11rg.cloudfront.net/assets/iframeResizer.executer.js"></script>';
        $this->assertContains($sutoriout, $filteroutput, 'Sutori filter fails');

        // Run TED test.
        $tedout = '<iframe src="//embed.ted.com/talks/sam_harris_can_we_build_ai_without_losing_control_over_it';
        $tedout .= '" width="640" height="360" frameborder="0" scrolling="no" ';
        $tedout .= 'webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        $this->assertContains($tedout, $filteroutput, 'TED filter fails');

        // Run ThingLink test.
        $thinglinkout = '<iframe width="800" height="500" src="//www.thinglink.com/card/737743411833995264"';
        $thinglinkout .= ' type="text/html" frameborder="0" webkitallowfullscreen mozallowfullscreen';
        $thinglinkout .= ' allowfullscreen scrolling="no"></iframe>';
        $this->assertContains($thinglinkout, $filteroutput, 'ThingLink filter fails');

        // Run YouTube test.
        $youtubeout = '<iframe width="560" height="315" src="//www.youtube.com/embed/';
        $youtubeout .= '4m5KrPXL4wI';
        $youtubeout .= '" frameborder="0" allowfullscreen></iframe>';
        $this->assertContains($youtubeout, $filteroutput, 'YouTube filter fails');

        return true;
    }
}
