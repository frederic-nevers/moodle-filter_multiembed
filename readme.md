[![Build Status](https://travis-ci.org/frederic-nevers/moodle-filter_multiembed.svg?branch=master)](https://travis-ci.org/frederic-nevers/moodle-filter_multiembed)
# Synopsis

The Moodle Multi-Embed filter automatically turns URLs from supported services into embedded content, without any user input. By using the Moodle Multi-Embed, Moodle users (e.g. teachers) do not need to know how to 'embed' objects from other sites, they only need to know how to copy/paste a URL into their Moodle content, using the standard Moodle editor. The initial release of this plugin supports [14](#Supported-services) services. 

# Example

For example, if this URL is pasted in the Moodle editor https://www.ted.com/talks/sam_harris_can_we_build_ai_without_losing_control_over_it 
![TED video URL in Moodle editor](http://iteachwithmoodle.com/assets/moodle-editor.png "TED video URL in Moodle editor") 
it will automatically turn into this
![Embedded TED video in Moodle](http://iteachwithmoodle.com/assets/embedded-ted-video-in-moodle.png "Embedded TED video in Moodle")

# Motivation

I have created this plugin to help teachers embed content more easily into their Moodle courses. Many teachers I have worked with want to make their Moodle courses more interactive with content already available online, but do not always have the technical know-how to make it happen. Whilst this tool was created to help novice users, all users may appreciate the few clicks that this tool saves in the course creation process.

# Installation

There are several ways to install Moodle plugins. This plugin is compatible with all officially supported ways to install a plugin. Please review this page for the latest information https://docs.moodle.org/32/en/Installing_plugins#Installing_a_plugin

# Supported services

The following services are currently supported. Services will be added on a regular basis. Please add an issue [here](https://github.com/frederic-nevers/moodle-filter_multiembed/issues) if you would like a service to be added
   1. CodePen - http://codepen.io
   2. Desmos - https://www.desmos.com
   3. eMaze - https://www.emaze.com
   4. Personal Google Docs, Drawings, Forms, Sheets, Slides - https://docs.google.com
   5. GSuite Google Docs, Drawings, Forms, Sheets, Slides - https://gsuite.google.com
   6. Haiku Deck - https://www.haikudeck.com
   7. ImgUr - http://imgur.com
   8. Infogr.am - https://infogr.am
   9. Padlet - https://padlet.com
   10. PBS - http://www.pbs.org/video/
   11. PiktoChart - https://piktochart.com
   12. Poll Everywhere - https://www.polleverywhere.com
   13. Prezi - https://prezi.com
   14. Quizlet - https://quizlet.com
   15. Slid.es - https://slid.es
   16. SoundCloud - https://soundcloud.com
   17. Sutori - https://www.sutori.com
   18. TED - https://www.ted.com
   19. ThingLink - https://www.thinglink.com
   20. YouTube - https://www.youtube.com

# Services tested, not currently supported

The following services have been tested, but cannot currently be supported (either the service does not offer embedding, or the embedding code cannot be reverse-engineered from the URL). Please create an issue [here](https://github.com/frederic-nevers/moodle-filter_multiembed/issues) if you think it can be done, or better yet send a pull request [here](https://github.com/frederic-nevers/moodle-filter_multiembed/pulls) .
   * Cram - http://www.cram.com
   * Dribbble - https://dribbble.com
   * Easel.ly - https://easel.ly
   * Flashcard Machine - http://www.flashcardmachine.com/
   * Flickr - https://www.flickr.com
   * Kahoot - https://getkahoot.com
   * NatGeo Map Maker - http://mapmaker.nationalgeographic.org
   * National Geographic - http://video.nationalgeographic.com
   * NearPod - https://nearpod.com
   * PearDeck - https://www.peardeck.com
   * Quizalize - https://www.quizalize.com
   * Quizizz - https://quizizz.com
   * SlideShare - http://www.slideshare.net
   * Socrative - http://www.socrative.com
   * Speaker Deck - https://speakerdeck.com
   * StudyBlue - https://www.studyblue.com
   * TES Blendspace - https://www.tes.com/lessons/gallery
   * Todays meet - https://todaysmeet.com
   * UStream - http://www.ustream.tv

# Contributors

Original author: Frederic Nevers | [www.iteachwithmoodle.com](http://www.iteachwithmoodle.com) | [@fred_nevers](https://twitter.com/@fred_nevers)
Inspired by the Moodle [oEmbed](https://github.com/Microsoft/moodle-filter_oembed) filter

# License

This plugin is (like Moodle) free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. More information about this license at http://www.gnu.org/licenses/