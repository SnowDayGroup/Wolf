<?php
/**
 * wolf_starter functions and definitions
 *
 * @package wolf_starter
 */

require get_template_directory() . '/inc/htaccess.php'; // HTML5 Boilerplate .htaccess
require get_template_directory() . '/inc/widgets.php';  // Sidebars and widgets
require get_template_directory() . '/inc/scripts.php';  // Scripts and stylesheets
require get_template_directory() . '/inc/tha-hooks.php'; // Load Theme Hook Alliance files
require get_template_directory() . '/inc/jetpack.php';   // Load Jetpack compatibility file.

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


/*
 *  Sets up our required plugins for the theme
 */
function wolf_register_required_plugins(){

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    /*
    $plugins = array(
        array(
            'name'      => 'Super CPT',
            'slug'      => 'super-cpt',
            'required'  => true,
        ),
    );
    $theme_text_domain = 'wolf_starter';

    $config = array(
        'domain'            => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
        'default_path'      => '',                          // Default absolute path to pre-packaged plugins
        'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
        'parent_url_slug'   => 'themes.php',                // Default parent URL slug
        'menu'              => 'install-required-plugins',  // Menu slug
        'has_notices'       => true,                        // Show admin notices or not
        'is_automatic'      => false,                       // Automatically activate plugins after installation or not
        'message'           => '',                          // Message to output right before the plugins table
        'strings'           => array(
            'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
            'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
            'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
            'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
            'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
            'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
            'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
            'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
            'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
            'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
            'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
            'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
            'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
        )
    );

    tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'wolf_register_required_plugins' );
*/