<?php
/**
 * Enqueue scripts and styles
 */
function wolf_starter_scripts() {
    global $post;

    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    wp_enqueue_script( 'jquery' );
    
    /* jQuery plugins */
    wp_enqueue_script( 'jquery-plugins', get_template_directory_uri() . '/js/app.js', array( 'jquery' ), '0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_singular() && wp_attachment_is_image( $post->ID ) ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
    
    wp_enqueue_script( 'modernizr', get_template_directory_uri().'/js/modernizr-2.5.3.js', array(),'2.5.3');
}
add_action( 'wp_enqueue_scripts', 'wolf_starter_scripts' );


function wolf_starter_script_functions() { ?>

    <script type="text/javascript">
    jQuery(document).ready(function($){
        $('ul.menu').mobileMenu({switchWidth: 600, topOptionText: 'Menu', prependTo: '.main-navigation'});
    });     
    </script>

<?php
}
add_action('wp_footer','wolf_starter_script_functions',30);

/*
 * Add class attribute to the first <ul> occurence in wp_page_menu for the responsive menu to work without a custom menu
 */
function wolf_starter_menu_ul_class($ulclass) {
    return preg_replace('/<ul>/', '<ul class="menu">', $ulclass, 1);
}
add_filter('wp_page_menu','wolf_starter_menu_ul_class');
