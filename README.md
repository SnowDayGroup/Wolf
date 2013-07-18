![wolf starter](images/readme-header.png)
===

##Wolf Starter is a starter theme for WordPress.
*You can take Wolf and hack away on it. No need for a parent theme.*


###Why Wolf Starter is awesome:

Based on [underscores](https://github.com/automattic/_s), Wolf Starter comes with:

 * A just right amount of lean, well-commented, modern, HTML5 templates.
 * A helpful 404 template.
 * A sample custom header implementation in inc/custom-header.php that can be activated by uncommenting one line in functions.php and adding the code snippet found the comments of inc/custom header.php to your header.php template.
 * Custom template tags in inc/template-tags that keep your templates clean and neat and prevent code duplication.
 * Some small tweaks in /inc/tweaks.php that can improve your theming experience. They can be activated by uncommenting one line in functions.php.
 * Keyboard navigation for image attachment templates. The script can be found in js/keyboard-navigation.js. It’s enqueued in functions.php.
 * 5 sample CSS layouts in /layouts: Two sidebars on the left, two sidebars on the right, a sidebar on either side of your content, and two-column layouts with sidebars on either side.
 * The GPL license in license.txt. :) Use it to make something cool


###Added to Wolf Starter:

* Complete implenmentation of the [Theme Hook Alliance](https://github.com/zamoose/themehookalliance) hooks.
* Modular SCSS (SASS) based styles
* Grid system based on [Zurb Foundation](http://foundation.zurb.com)
* HTML5 Boilerplate htaccess rules
* Tons of handy SASS Mixins to use
* An awesome SASS file structure.
* [TGM Plugin Activation](https://github.com/thomasgriffin/TGM-Plugin-Activation) built in.



###Some Helpful Mixins/Functions

 * After defining $doc-font-size, you can convert any pixel value to ems easily. example: ```h1{ font-size: em(32px); }```
 * Easily add responsive styles with: ```@include breakpoint($point);``` Check out the sizes and accepted values in ```sass/mixins/_media-queries.scss```
 * All of Madr's [CSS3 Sass Mixins](https://github.com/madr/css3-sass-mixins) - located in ```sass/mixins/_misc.scss```. This includes:
 	* An easy to use clearfix with ```@include cf;```
 	* IE-8 Compatible display:inline-block ```@include inline-block;```
 	* Mixins for hiding elements in a variety of ways. ```@include hidden;```, ```@include invisble;```, and ```@include visually-hidden;```
 	* [Even more](http://madr.github.io/css3-sass-mixins/)
 

###Editing Wolf

To edit the theme, you'll need compass & Sass running. You can use Codekit, Prepros, Grunt, or the command line tools.

For more about sass:
- [sass-lang.com](http://sass-lang.com/).
- [thesassway.com](http://thesassway.com/).
- [alistapart.com/article/getting-started-with-sass](http://alistapart.com/article/getting-started-with-sass).

All Sass files are in the `sass` directory and you can edit any one you like. `style.scss` is the main stylesheet. You can see it importing the other scss files. These will all be processed into one file, and are for organizational purposes. Your browser will only be loading `style.css` as usual.

 
---


Inspiration and Code Borrowed:
[wp-talon](https://github.com/dustyf/wp-talon), [Bones](http://themble.com/bones/), [Tincap](https://github.com/bradthomas127/tincap), [blueox](https://github.com/AaronHolbrook/blueox)

---


Make something awesome. 
