[![Build Status](https://travis-ci.org/frederic-nevers/moodle-filter_multiembed.svg?branch=master)](https://travis-ci.org/frederic-nevers/moodle-filter_multiembed)
# Synopsis

The Moodle Multi-Embed filter automatically turns URLs from supported services into embedded content, without any user input. By using the Moodle Multi-Embed, Moodle users (e.g. teachers) do not need to know how to 'embed' objects from other sites, they only need to know how to copy/paste a URL into their Moodle content, using the standard Moodle editor. This release supports [28](#Supported-services) services. 

# Example

For example, if this URL is pasted in the Moodle editor https://www.ted.com/talks/sam_harris_can_we_build_ai_without_losing_control_over_it 
![TED video URL in Moodle editor](http://iteachwithmoodle.com/assets/moodle-editor.png "TED video URL in Moodle editor") 
it will automatically turn into this
![Embedded TED video in Moodle](http://iteachwithmoodle.com/assets/embedded-ted-video-in-moodle.png "Embedded TED video in Moodle")

# Motivation

I have created this plugin to help teachers embed content more easily into their Moodle courses. Many teachers I have worked with want to make their Moodle courses more interactive with content already available online, but do not always have the technical know-how to make it happen. Whilst this tool was created to help novice users, all users may appreciate the few clicks that this tool saves in the course creation process.

# Installation

There are several ways to install Moodle plugins. This plugin is compatible with all officially supported ways to install a plugin. Please review this page for the latest information https://docs.moodle.org/33/en/Installing_plugins#Installing_a_plugin

# Supported services

The following services are currently supported. Services will be added on a regular basis. Please add an issue [here](https://github.com/frederic-nevers/moodle-filter_multiembed/issues) if you would like a service to be added
   1. Book Creator - https://bookcreator.com
   2. Canva - https://www.canva.com
   2. ClassTools - https://www.classtools.net
   3. CodePen - http://codepen.io
   4. Desmos - https://www.desmos.com
   5. Diagnostic Questions - https://diagnosticquestions.com
   6. eMaze - https://www.emaze.com
   7. EtherPad - https://etherpad.openstack.org
   8. Personal Google Docs, Drawings, Forms, Sheets, Slides - https://docs.google.com
   9. GSuite Google Docs, Drawings, Forms, Sheets, Slides - https://gsuite.google.com
   10. Haiku Deck - https://www.haikudeck.com
   11. ImgUr - http://imgur.com
   12. Infogr.am - https://infogr.am
   13. Padlet - https://padlet.com
   14. PBS - http://www.pbs.org/video/
   15. PiktoChart - https://piktochart.com
   16. Poll Everywhere - https://www.polleverywhere.com
   17. Prezi - https://prezi.com
   18. Quizlet - https://quizlet.com
   19. Riddle - https://www.riddle.com
   20. Slid.es - https://slid.es
   21. Smore - https://www.smore.com
   22. SoundCloud - https://soundcloud.com
   23. StudyStack - https://www.studystack.com
   24. Sutori - https://www.sutori.com
   25. TED - https://www.ted.com
   26. ThingLink - https://www.thinglink.com
   27. YouTube - https://www.youtube.com

# Services tested, not currently supported

The following services have been tested, but cannot currently be supported (either the service does not offer embedding, or the embedding code cannot be reverse-engineered from the URL). Please create an issue [here](https://github.com/frederic-nevers/moodle-filter_multiembed/issues) if you think it can be done, or better yet send a pull request [here](https://github.com/frederic-nevers/moodle-filter_multiembed/pulls) .
   * Answer Garden - https://answergarden.ch
   * Coggle - https://coogle.it
   * Cram - http://www.cram.com
   * Dribbble - https://dribbble.com
   * Easel.ly - https://easel.ly
   * Flashcard Machine - http://www.flashcardmachine.com/
   * Flickr - https://www.flickr.com
   * Glogster - http://edu.glogster.com
   * GoPop - http://gogopp.com/
   * Go Formative - http://goformative.com/
   * Kahoot - https://getkahoot.com
   * NatGeo Map Maker - http://mapmaker.nationalgeographic.org
   * National Geographic - http://video.nationalgeographic.com
   * NearPod - https://nearpod.com
   * NoteBookCast - https://www.notebookcast.com
   * Opinion Stage - https://www.opinionstage.com
   * PearDeck - https://www.peardeck.com
   * Quizalize - https://www.quizalize.com
   * Quizizz - https://quizizz.com
   * SlideShare - http://www.slideshare.net
   * Socrative - http://www.socrative.com
   * Speaker Deck - https://speakerdeck.com
   * StudyBlue - https://www.studyblue.com
   * TES Blendspace - https://www.tes.com/lessons/gallery
   * Todays meet - https://todaysmeet.com
   * Twiddla - http://www.twiddla.com
   * UStream - http://www.ustream.tv
   * Wizer - https://app.wizer.me

# Contributors

Original author: Frederic Nevers | [www.iteachwithmoodle.com](http://www.iteachwithmoodle.com) | [@fred_nevers](https://twitter.com/@fred_nevers)
Inspired by the Moodle [oEmbed](https://github.com/Microsoft/moodle-filter_oembed) filter

# License

This plugin is (like Moodle) free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version. More information about this license at http://www.gnu.org/licenses/