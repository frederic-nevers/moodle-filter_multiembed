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
 * @copyright  2016-2017 Frederic Nevers, www.iteachwithmoodle.com
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
            'BookCreator' => 'https://read.bookcreator.com/W9CW9hBf61bdhZr6CvqD4dNMbUP2/W0MDbmwVS0-Xizi_oVrPig',
            'Canva' => 'https://www.canva.com/design/DACQO7blkSY/E3CcafRvC6J2TcPfo0kRGQ/edit',
            'ClassTools' => 'http://www.classtools.net/brainybox/14_FYggLj',
            'CodePen' => 'http://codepen.io/superpikar/pen/wzYaRo',
            'Desmos' => 'https://www.desmos.com/calculator/cdxhggo4nc',
            'DiagnosticQuestions' => 'https://diagnosticquestions.com/Questions/Go#/37889',
            'eMaze' => 'https://www.emaze.com/@AWRCLTWI/welcome-aboard',
            'Etherpad' => 'https://etherpad.openstack.org/p/check',
            'Gdocs' => 'https://docs.google.com/document/d/1rIj1E-vS_cAJjg-awtILzypvomS1Yp0QQzEVkxEfNjs/edit',
            'Gdrive' => 'https://drive.google.com/file/d/1GECgpVvpwCCL4p5x13_cADhT11UIhNkf/view',
            'Gsuite' => 'https://docs.google.com/a/lms.isf.edu.hk/document/d/1IYYv4eIscPfQtJzIcveYufLMe8BghNBm6wuBGyai5hE/edit',
            'Haiku' => 'https://www.haikudeck.com/parental-engagement-innovation-education-presentation-IAoLln02nF',
            'Imgur' => 'http://imgur.com/gallery/SRtaf',
            'Infogram' => 'https://infogr.am/eu_fraud_map___international_version',
            'Learningapps' => 'https://learningapps.org/1653886',
            'Padlet' => 'https://padlet.com/fnevers/gwz9fjz4yiia',
            'PBS' => 'http://www.pbs.org/video/2365868384/',
            'PiktoChart' => 'https://magic.piktochart.com/output/17277748-testy',
            'PollEv' => 'https://www.polleverywhere.com/ranking_polls/7LLFJoRV9oAoolv',
            'Prezi' => 'https://prezi.com/flgl_ykzaqqu/merging-humans-computers-the-next-10-years-of-computing/#',
            'Quizlet' => 'https://quizlet.com/68910157/flashcards',
            'Riddle' => 'https://www.riddle.com/view/86733',
            'Slides' => 'http://slides.com/news/custom-fonts#/',
            'Smore' => 'https://www.smore.com/j6ry-using-smore-in-your-classroom',
            'SoundCloud' => 'https://soundcloud.com/770rd/bentley-coupe-lil-yachty-ft-gucci-mane-prod-byou',
            'Studystack' => 'http://www.studystack.com/flashcard-13053',
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

        // Run Book Creator test.
        $bookcreatorout = '<div style="display:inline-block;vertical-align:top;width:300px;margin:20px auto;color:#333;';
        $bookcreatorout .= 'background:#fff;border:1px solid #ddd;line-height:1.2;text-decoration:none;padding:0;">';
        $bookcreatorout .= '<a href="https://read.bookcreator.com/W9CW9hBf61bdhZr6CvqD4dNMbUP2/W0MDbmwVS0-Xizi_oVrPig"';
        $bookcreatorout .= ' style="display:block;color:#333;line-height:1.2;text-decoration:none;text-align:left;';
        $bookcreatorout .= 'padding:0;font-weight:normal;" target="_blank">';
        $bookcreatorout .= '<img class="lazyload" data-src="https://read.bookcreator.com/assets/W9CW9hBf61bdhZr6CvqD4dNMbUP2/';
        $bookcreatorout .= 'W0MDbmwVS0-Xizi_oVrPig';
        $bookcreatorout .= '/cover"';
        $bookcreatorout .= ' style="max-height:300px;max-width:100%;display:block;margin:0 auto;padding:0;border:none;" ';
        $bookcreatorout .= 'alt=""/></a>';
        $bookcreatorout .= '<div style="display:block;padding:20px;overflow:hidden;overflow-x:hidden;border-top:1px solid #ddd;">';
        $bookcreatorout .= '<div style="display:block;color:#333;line-height:1.2;text-decoration:none;text-align:left;';
        $bookcreatorout .= 'padding:0;font-weight:normal;font-size:16px;margin:0 0 0.5em;">';
        $bookcreatorout .= '<a href="https://read.bookcreator.com/W9CW9hBf61bdhZr6CvqD4dNMbUP2/W0MDbmwVS0-Xizi_oVrPig" ';
        $bookcreatorout .= 'style="display:block;color:#333;line-height:1.2;text-decoration:none;text-align:left;';
        $bookcreatorout .= 'padding:0;font-weight:normal;" target="_blank">Click to read this book, made with Book Creator</a>';
        $bookcreatorout .= '</div>';
        $bookcreatorout .= '<div style="display:block;color:#455a64;line-height:1.2;text-decoration:none;text-align:left;';
        $bookcreatorout .= 'padding:0;font-weight:bold;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:14px;">';
        $bookcreatorout .= '<a href="https://read.bookcreator.com/W9CW9hBf61bdhZr6CvqD4dNMbUP2/W0MDbmwVS0-Xizi_oVrPig" ';
        $bookcreatorout .= 'style="display:block;color:#333;line-height:1.2;text-decoration:none;text-align:left;';
        $bookcreatorout .= 'padding:0;font-weight:normal;" target="_blank">https://read.bookcreator.com</a></div></div></div>';
        $this->assertContains($bookcreatorout, $filteroutput, 'Book Creator filter fails');

        // Run Canva test.
        $canvaout = '<div class="canva-embed" data-height-ratio="0.7095" data-design-id="DACQO7blkSY" ';
        $canvaout .= 'style="padding:70.95% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;">';
        $canvaout .= '</div><script async src="https://sdk.canva.com/v1/embed.js"></script>';
        $canvaout .= '<a href="https://www.canva.com/design/DACQO7blkSY/view?utm_content=DACQO7blkSY&utm_campaign=';
        $canvaout .= 'designshare&utm_medium=embeds&utm_source=link" target="_blank">Created using Canva</a>';
        $this->assertContains($canvaout, $filteroutput, 'Canva filter fails');

        // Run ClassTools test.
        $classtoolsout = '<p align="center"><iframe class="lazyload" scrolling="no" ';
        $classtoolsout = 'data-src="//www.classtools.net/brainybox/14_FYggLj&widget=1" ';
        $classtoolsout .= 'width="650" height="650" frameborder=0></iframe></p>';
        $this->assertContains($classtoolsout, $filteroutput, 'ClassTools filter fails');

        // Run CodePen test.
        $codepenout = '<iframe class="lazyload" height="265" scrolling="no" data-src="//codepen.io/superpikar/embed/wzYaRo';
        $codepenout .= '/?height=265&amp;theme-id=0&amp;default-tab=css,result&embed-version=2" frameborder="no"';
        $codepenout .= ' allowtransparency="true" allowfullscreen="true" style="width: 100%;"></iframe>';
        $this->assertContains($codepenout, $filteroutput, 'CodePen filter fails');

        // Run Desmos test.
        $desmosout = '<a title="View with the Desmos Graphing Calculator" href="https://www.desmos.com/calculator/';
        $desmosout .= 'cdxhggo4nc">  <img class="lazyload" ';
        $desmosout .= 'data-src="https://s3.amazonaws.com/calc_thumbs/production/cdxhggo4nc.png"';
        $desmosout .= ' width="200px" height="200px" style="border:1px solid #ccc; border-radius:5px"/></a>';
        $this->assertContains($desmosout, $filteroutput, 'Desmos filter fails');

        // Run Diagnostic Questions test.
        $diagnosticout = '<iframe class="lazyload" width="664" height="568" ';
        $diagnosticout .= 'data-src="https://diagnosticquestions.com/Questions/Embed#/37889"';
        $diagnosticout .= ' frameborder="0"></iframe>';
        $this->assertContains($diagnosticout, $filteroutput, 'Diagnostic Questions filter fails');

        // Run eMaze test.
        $emazeout = '<iframe class="lazyload" data-src="//app.emaze.com/@AWRCLTWI/welcome-aboard';
        $emazeout .= '" width="960px" height="540px" seamless webkitallowfullscreen';
        $emazeout .= ' mozallowfullscreen allowfullscreen></iframe>';
        $this->assertContains($emazeout, $filteroutput, 'eMaze filter fails');

        // Run Etherpad test.
        $etherpadout = '<iframe class="lazyload" name="embed_readwrite" data-src="//etherpad.openstack.org/p/check?showControls=';
        $etherpadout .= 'true&showChat=true&showLineNumbers=true&useMonospaceFont=false" width=600 height=400></iframe>';
        $this->assertContains($etherpadout, $filteroutput, 'Etherpad filter fails');

        // Run Google Docs test.
        $gdocsout = '<iframe class="lazyload" height="620" width="100%" border="0" data-src="//docs.google.com/document/';
        $gdocsout .= 'd/1rIj1E-vS_cAJjg-awtILzypvomS1Yp0QQzEVkxEfNjs/edit?usp=sharing"></iframe>';
        $this->assertContains($gdocsout, $filteroutput, 'Gdocs filter fails');

        // Run Google Drive test.
        $gdriveout = '<iframe class="lazyload" height="480" width="100%" data-src="//drive.google.com/file/';
        $gdriveout .= 'd/1GECgpVvpwCCL4p5x13_cADhT11UIhNkf/preview"></iframe>';
        $this->assertContains($gdriveout, $filteroutput, 'Gdrive filter fails');

        // Run GSuite test.
        $gsuiteout = '<iframe class="lazyload" height="620" width="100%" border="0" data-src="//docs.google.com/document/';
        $gsuiteout .= 'd/1IYYv4eIscPfQtJzIcveYufLMe8BghNBm6wuBGyai5hE/edit?usp=sharing"></iframe>';
        $this->assertContains($gsuiteout, $filteroutput, 'GSuite filter fails');

        // Run Haiku Deck test.
        $haikuout = '<iframe class="lazyload" data-src="//www.haikudeck.com/e/IAoLln02nF';
        $haikuout .= '/?isUrlHashEnabled=false&isPreviewEnabled=false&isHeaderVisible=false"';
        $haikuout .= 'width="640" height="541" frameborder="0" marginheight="0" marginwidth="0"></iframe>';
        $this->assertContains($haikuout, $filteroutput, 'Haiku filter fails');

        // Run Imgur test.
        $imgurout = '<blockquote class="imgur-embed-pub" lang="en" data-id="a/SRtaf';
        $imgurout .= '"><a href="//imgur.com/SRtaf">';
        $imgurout .= 'SRtaf</a></blockquote><script async src="//s.imgur.com/min/embed.js" charset="utf-8"></script>';
        $this->assertContains($imgurout, $filteroutput, 'Imgur filter fails');

        // Run Infogram test.
        $infogramout = '<iframe class="lazyload" data-src="//e.infogr.am/eu_fraud_map___international_version';
        $infogramout .= '?src=embed" title="Top Earners" width="700" height="580"';
        $infogramout .= 'scrolling="no" frameborder="0" style="border:none;"></iframe>';
        $this->assertContains($infogramout, $filteroutput, 'Infogram filter fails');

        // Run Learningapps test.
        $learningappsout = '<iframe src="https://learningapps.org/watch?app=1653886" style="border:0px;width:100%;height:500px"';
        $learningappsout .= ' webkitallowfullscreen="true" mozallowfullscreen="true" allowfullscreen="true"></iframe>';
        $this->assertContains($learningappsout, $filteroutput, 'Learningapps filter fails');

        // Run Padlet test.
        $padletout = '<iframe class="lazyload" data-src="//padlet.com/embed/gwz9fjz4yiia';
        $padletout .= '" frameborder="0" width="100%" height="480px" style="padding:0;margin:0;border:none"></iframe>';
        $this->assertContains($padletout, $filteroutput, 'Padlet filter fails');

        // Run PBS test.
        $pbsout = '<iframe class="lazyload" width="512" height="376" data-src="//player.pbs.org/viralplayer/2365868384';
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
        $pollevout = '<iframe class="lazyload" data-src="https://embed.polleverywhere.com/ranking_polls/7LLFJoRV9oAoolv';
        $pollevout .= '?controls=none&short_poll=true" width="100%" height="100%" frameBorder="0"></iframe>';
        $this->assertContains($pollevout, $filteroutput, 'PollEv filter fails');

        // Run Prezi test.
        $preziout = '<iframe id="iframe_container" class="lazyload" frameborder="0" webkitallowfullscreen="" mozallowfullscreen=""';
        $preziout .= 'allowfullscreen="" width="550" height="400" data-src="//prezi.com/embed/flgl_ykzaqqu';
        $preziout .= '/merging-humans-computers-the-next-10-years-of-computing';
        $preziout .= '/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0"></iframe>';
        $this->assertContains($preziout, $filteroutput, 'Prezi filter fails');

        // Run Quizlet test.
        $quizletout = '<iframe class="lazyload" data-src="//quizlet.com/68910157';
        $quizletout .= '/flashcards/embed" height="500" width="100%" style="border:0"></iframe>';
        $this->assertContains($quizletout, $filteroutput, 'Quizlet filter fails');

        // Run Riddle test.
        $riddletout = '<div class="riddle_target" data-rid-id="86733" data-fg="#1486cd" data-bg="#FFFFFF" ';
        $riddletout .= 'style="margin:0 auto;max-width:640px">';
        $riddletout .= '<script src="https://www.riddle.com/files/js/embed.js"></script>';
        $riddletout .= '<iframe style="width:100%;height:300px;border:1px solid #cfcfcf" ';
        $riddletout .= 'src="//riddle.com/a/86733?"></iframe></div>';
        $this->assertContains($riddletout, $filteroutput, 'Riddle filter fails');

        // Run Slid.es test.
        $slidesout = '<iframe class="lazyload" data-src="//slides.com/news/custom-fonts#';
        $slidesout .= '/embed" width="576" height="420" scrolling="no" frameborder="0"';
        $slidesout .= 'webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
        $this->assertContains($slidesout, $filteroutput, 'Slid.es filter fails');

        // Run Smore test.
        $smoreout = '<iframe class="lazyload" width="100%" height="600" ';
        $smoreout .= 'data-src="//www.smore.com/j6ry-using-smore-in-your-classroom?';
        $smoreout .= 'embed=1" scrolling="auto" frameborder="0" allowtransparency="true" ';
        $smoreout .= 'style="min-width: 320px;border: none;"></iframe>';
        $this->assertContains($smoreout, $filteroutput, 'Smore filter fails');

        // Run SoundCloud test.
        $soundcloudout = '<iframe class="lazyload" width="100%" height="166" scrolling="no" frameborder="no"';
        $soundcloudout .= ' data-src="//w.soundcloud.com/player/?url=https%3A//soundcloud.com/';
        $soundcloudout .= '770rd/bentley-coupe-lil-yachty-ft-gucci-mane-prod-byou';
        $soundcloudout .= '&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;';
        $soundcloudout .= 'show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>';
        $this->assertContains($soundcloudout, $filteroutput, 'SoundCloud filter fails');

        // Run Studystack test.
        $studystackout = '<iframe class="studyStackFlashcardIframe lazyload" ';
        $studystackout .= 'data-src="https://www.studystack.com/inewflashcard-13053" ';
        $studystackout .= 'width="850" height="440" frameborder="0" scrolling="no" style="overflow:hidden"></iframe>';
        $this->assertContains($studystackout, $filteroutput, 'Sutori filter fails');

        // Run Sutori test.
        $sutoriout = '<script src="https://d1ox703z8b11rg.cloudfront.net/assets/iframeResizer.js"></script>';
        $sutoriout .= '<iframe src="//www.sutori.com/timeline/the-french-revolution-eb10/embed" ';
        $sutoriout .= 'width="100%" scrolling="no" frameborder="0" allowfullscreen></iframe>';
        $sutoriout .= '<script src="https://d1ox703z8b11rg.cloudfront.net/assets/iframeResizer.executer.js"></script>';
        $this->assertContains($sutoriout, $filteroutput, 'Sutori filter fails');

        // Run TED test.
        $tedout = '<iframe class="lazyload" ';
        $tedout .= 'data-src="//embed.ted.com/talks/sam_harris_can_we_build_ai_without_losing_control_over_it';
        $tedout .= '" width="640" height="360" frameborder="0" scrolling="no" ';
        $tedout .= 'webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
        $this->assertContains($tedout, $filteroutput, 'TED filter fails');

        // Run ThingLink test.
        $thinglinkout = '<iframe class="lazyload" width="800" height="500" data-src="//www.thinglink.com/card/737743411833995264"';
        $thinglinkout .= ' type="text/html" frameborder="0" webkitallowfullscreen mozallowfullscreen';
        $thinglinkout .= ' allowfullscreen scrolling="no"></iframe>';
        $this->assertContains($thinglinkout, $filteroutput, 'ThingLink filter fails');

        // Run YouTube test.
        $youtubeout = '<iframe class="lazyload" width="560" height="315" data-src="//www.youtube.com/embed/';
        $youtubeout .= '4m5KrPXL4wI';
        $youtubeout .= '" frameborder="0" allowfullscreen></iframe>';
        $this->assertContains($youtubeout, $filteroutput, 'YouTube filter fails');

        return true;
    }
}
