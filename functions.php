<?php
/**
 * wolf_starter functions and definitions
 *
 * @package wolf_starter
 */

require ( get_template_directory() . '/inc/htaccess.php' ); // HTML5 Boilerplate .htaccess
require ( get_template_directory() . '/inc/widgets.php' );  // Sidebars and widgets
require ( get_template_directory() . '/inc/scripts.php' );  // Scripts and stylesheets
require ( get_template_directory() . '/inc/tha-hooks.php' ); // Load Theme Hook Alliance files
require ( get_template_directory() . '/inc/jetpack.php' );   // Load Jetpack compatibility file.

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
    $content_width = 640; /* pixels */

if ( ! function_exists( 'wolf_starter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function wolf_starter_setup() {
    require( get_template_directory() . '/inc/template-tags.php' ); // Custom template tags for this theme.
    require( get_template_directory() . '/inc/extras.php' ); // Custom functions that act independently of the theme templates
    require( get_template_directory() . '/inc/customizer.php' ); //Customizer additions

    add_theme_support( 'h5bp-htaccess' ); // Enable HTML5 Boilerplate's .htaccess
    add_theme_support( 'automatic-feed-links' ); //Add default posts and comments RSS feed links to head
    add_theme_support( 'post-thumbnails' ); //Enable support for Post Thumbnails
    add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) ); //Enable support for Post Formats

    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'wolf_starter' ),
    ) );

    /**
     * Make theme available for translation
     * Translations can be filed in the /languages/ directory
     * If you're building a theme based on wolf_starter, use a find and replace
     * to change 'wolf_starter' to the name of your theme in all the template files
     */
    load_theme_textdomain( 'wolf_starter', get_template_directory() . '/languages' );
    
}
endif; // wolf_starter_setup
add_action( 'after_setup_theme', 'wolf_starter_setup' );
