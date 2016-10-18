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
 * @category   phpunit
 * @copyright  2016 Frederic Nevers, www.iteachwithmoodle.com
 * @authors    Frederic Nevers
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/filter/multiembed/filter.php');

/**
 * @group filter_multiembed
 */
class filter_multiembed_testcase extends basic_testcase {

    protected $filter;

    /**
     * Sets up the test cases.
     */
    protected function setUp() {
        parent::setUp();
        $this->filter = new filter_multiembed(context_system::instance(), array());
    }

    /**
     * Performs unit tests for all services supported by the Multi-Embed filter.
     *
     */
    public function test_filter() {
        return true;

        // Provide some working URLs to test
        $urls = array(
            'CodePen' => 'https://www.link.com',
            'eMaze' => 'https://www.link.com',
            'Haiku' => 'https://www.link.com',
            'Imgur' => 'https://www.link.com',
            'Infogram' => 'https://www.link.com',
            'Padlet' => 'https://www.link.com',
            'PBS' => 'https://www.link.com',
            'PiktoChart' => 'https://www.link.com',
            'PollEv' => 'https://www.link.com',
            'Prezi' => 'https://www.link.com',
            'Quizlet' => 'https://www.link.com',
            'Slides' => 'https://www.link.com',
            'SoundCloud' => 'https://www.link.com'
        );

        // Feed all working URLs to the filter
        $filterinput = '';

        foreach ($urls as $service => $url) {
            $filterinput .= '<p><a href="'.$url.'">'.$service.'</a></p>';
        }
        unset($url);

        // Run filter on the input
        $filteroutput = $this->filter->filter($filterinput);

        // Run CodePen test
        $codepenout = ;
        $this->assertContains($codepenout, $filteroutput, 'CodePen filter fails');

        // Run eMaze test
        $emazeout = ;
        $this->assertContains($emazeout, $filteroutput, 'eMaze filter fails');

    }
}
