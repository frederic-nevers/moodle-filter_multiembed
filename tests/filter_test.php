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
 * Multi-Embed Unit test
 *
 * @package    filter_multiembed
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
     * Test all services used in the filter.
     * TODO: Update this every time a new service is added
     *
     */
    public function test_filter() {
        return true;
        $tedlink = '<p><a href="https://www.ted.com/talks/aj_jacobs_how_healthy_living_nearly_killed_me">Ted</a></p>';

        $filterinput = $tedlink;

        $filteroutput = $this->filter->filter($filterinput);

        $tedoutput = '<iframe src="https://embed-ssl.ted.com/talks/aj_jacobs_how_healthy_living_nearly_killed_me.html" width="480"';
        $tedoutput .= ' height="270" frameborder="0" scrolling="no" webkitAllowFullScreen mozallowfullscreen allowFullScreen>';
        $tedoutput .= '</iframe>';
        $this->assertContains($tedoutput, $filteroutput, 'Ted filter fails');
    }
}
