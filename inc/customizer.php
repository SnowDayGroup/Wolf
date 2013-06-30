<?php
/**
 * wolf Theme Customizer
 *
 * @package wolf
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wolf_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'wolf_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wolf_customize_preview_js() {
	wp_enqueue_script( 'wolf_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130304', true );
}
add_action( 'customize_preview_init', 'wolf_customize_preview_js' );


/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function wolf_register_custom_background() {
    $args = array(
        'default-color' => 'ffffff',
        'default-image' => '',
    );

    $args = apply_filters( 'wolf_custom_background_args', $args );

    if ( function_exists( 'wp_get_theme' ) ) {
        add_theme_support( 'custom-background', $args );
    } else {
        define( 'BACKGROUND_COLOR', $args['default-color'] );
        if ( ! empty( $args['default-image'] ) )
            define( 'BACKGROUND_IMAGE', $args['default-image'] );
        add_custom_background();
    }
}
add_action( 'after_setup_theme', 'wolf_register_custom_background' );

/**
 * Adds a Customize menu option to the appearance menu
 */
function wolf_customizer_menu() { 
    add_theme_page( 'Customize', 'Customize', 'edit_theme_options', 'customize.php' );
}
add_action( 'admin_menu', 'wolf_customizer_menu' );



/**
 * Sample Theme Customizer implementation, here we're modifying the footer text
 */
function wolf_customizer( $wp_customize ) {

    //////
    //  Sample Customizer
    //////

    $wp_customize->add_section(
        'wolf_section_one',
        array(
            'title' => 'Footer Copyright Text',
            'description' => 'You can modify the footer copyright text to your hearts content.',
            'priority' => 35,
        )
    );
    $wp_customize->add_setting(
        'wolf_footer_text',
        array(
            'default' => 'Code is poetry.',
        )
    );
    $wp_customize->add_control(
        'wolf_footer_text',
        array(
            'label' => 'Text',
            'section' => 'wolf_section_one',
            'type' => 'text',
        )
    );

}
add_action( 'customize_register', 'wolf_customizer' );
