<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package wolf
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function wolf_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'content',
		'footer'    => 'false',
	) );
}
add_action( 'after_setup_theme', 'wolf_jetpack_setup' );
