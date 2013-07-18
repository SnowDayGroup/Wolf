<?php
/*
 * Some opinionated removal of things
*/
function wolf_remove_head_links(){
    remove_action('wp_head', 'wlwmanifest_link'); //remove windows live writer links
    remove_action('wp_head', 'rsd_link'); //remove really simple discovery stuff
}
add_action( 'wp_loaded', 'wolf_remove_head_links');


// Remove Dashboard Meta Boxes
function wolf_remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); //Removes the popular plugins dashboard widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); //removes the WP news widget
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); //removes the WP news widget
     
     //These are all good things to have. 
    // You can remove them here, but it's better to hide them using something like 'Hide Noisy Metaboxes'
     //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
     //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
     //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
     //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
     //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
     
}
add_action('wp_dashboard_setup', 'wolf_remove_dashboard_widgets' );

