=== Wolf ===

Wolf is a SASS-powered starter theme for WordPress with a ton of features.

== Description ==

Wolf is a SASS-powered starter theme for WordPress with a ton of features. Use it to make something awesome.
http://github.com/snowdaygroup/wolf

Based on underscores (https://github.com/automattic/_s), Wolf comes with:

 * A just right amount of lean, well-commented, modern, HTML5 templates.
 * A helpful 404 template.
 * A sample custom header implementation in inc/custom-header.php that can be activated by uncommenting one line in functions.php and adding the code snippet found the comments of inc/custom header.php to your header.php template.
 * Custom template tags in inc/template-tags that keep your templates clean and neat and prevent code duplication.
 * Some small tweaks in /inc/tweaks.php that can improve your theming experience. They can be activated by uncommenting one line in functions.php.
 * Keyboard navigation for image attachment templates. The script can be found in js/keyboard-navigation.js. It’s enqueued in functions.php.
 * 5 sample CSS layouts in /layouts: Two sidebars on the left, two sidebars on the right, a sidebar on either side of your content, and two-column layouts with sidebars on either side.
 * The GPL license in license.txt. :) Use it to make something cool


= Added to Wolf: =

* Complete implenmentation of the [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) hooks.
* Modular SCSS (SASS) based styles
* Grid system based on [Zurb Foundation](http://foundation.zurb.com)
* HTML5 Boilerplate htaccess rules
* Tons of handy SASS Mixins to use



= Some Helpful Mixins/Functions =

 * After defining $doc-font-size, you can convert any pixel value to ems easily. example: ```h1{ font-size: em(32px); }```
 * Easily add responsive styles with: ```@include breakpoint($point);``` Check out the sizes and accepted values in ```sass/mixins/_media-queries.scss```
 * All of Madr's [CSS3 Sass Mixins](https://github.com/madr/css3-sass-mixins) - located in ```sass/mixins/_misc.scss```. This includes:
    * An easy to use clearfix with ```@include cf;```
    * IE-8 Compatible display:inline-block ```@include inline-block;```
    * Mixins for hiding elements in a variety of ways. ```@include hidden;```, ```@include invisble;```, and ```@include visually-hidden;```
    * [Even more](http://madr.github.io/css3-sass-mixins/)