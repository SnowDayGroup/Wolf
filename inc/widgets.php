<?php
/**
 * Register widgetized area and update sidebar with default widgets
 */
function wolf_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wolf' ),
		'id'            => 'sidebar-primary',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	),
	array(
		'name'          => __( 'Left Footer Sidebar', 'wolf' ),
		'id'            => 'sidebar-left-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	),
	array(
		'name'          => __( 'Center Footer Sidebar', 'wolf' ),
		'id'            => 'sidebar-center-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	),
	array(
		'name'          => __( 'Right Footer Sidebar', 'wolf' ),
		'id'            => 'sidebar-right-footer',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wolf_widgets_init' );