=== Plugin Name ===
Contributors: rtowebsites
Donate link: https://www.rto.de
Tags: page transition, page animation, slider, ajax, rto, rto.de
Requires at least: 3.0.1
Tested up to: 5.0
Stable tag: 4.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Create page-transitions

== Description ==

With this plugin can you create page-transitions.
You can use a lot of different animations. It use animate.css.
http://daneden.github.io/animate.css/

Also every option of Owl-Carousel is usable:
https://owlcarousel2.github.io/OwlCarousel2/docs/api-options.html


You can help to develop on
https://github.com/RTO-Websites/page-swapper


== Installation ==

Just install and activate the plugin. Then your body use page-transitions.
You can also select a specific element with a css-selector, so only this element will be animated.


= Javascript-Callbacks =
The following callbacks are available:

`
psw-beforeopen
psw-loadstart
psw-loadcomplete
`

So can you trigger it:

`
$('.psw-container').on('pws-loadcomplete', function(e, args) {
    console.info(args);
}
`

args has the following information:

`
'container' : container,
'args': args,
'oldTab' : oldTab,
'newTab' : newTab,
`

== Screenshots ==

1. This screenshot shows the admin-section


== Changelog ==
= 1.2.8 =
* Go back to owl.carousel 2.2.1 cause nesting bug

= 1.2.7 =
* Update owl.carousel to 2.3.4

= 1.2.6 =
* Works better with elementor

= 1.0.6 =
* Some fixes

= 1.0.5 =
* Add support for owl 1.x

= 1.0.4 =
* Fix wrong height if images in content

= 1.0.3 =
* Fix error on minified javascript
* Works now with body as selector
* Add presets
* Add debug-mode
* Add german-translation
* Add javascript-callbacks to readme
* Add screenshot

= 1.0.2 =
* Add example to settings
* Fix some issues in javascript

= 1.0.1 =
* Better docs, banner, icon and screenshot

= 1.0 =
* Release

