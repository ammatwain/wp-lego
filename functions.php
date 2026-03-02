<?php
/**
 * WP-LEGO functions and definitions
 */

if ( ! function_exists( 'setup_46ba' ) ) :
	function setup_46ba() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', '46ba' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'setup_46ba' );

function theme_46ba_scripts() {
	wp_enqueue_style( '46ba-style', get_stylesheet_uri()."?".time(), array(), '1.0.0' );
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=JetBrains+Mono:wght@400;700&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'theme_46ba_scripts' );

function theme_46ba_unregister_old_sidebars() {
	unregister_sidebar('sidebar-left-2');
}

add_action( 'widgets_init', 'theme_46ba_unregister_old_sidebars', 11);

function theme_46ba_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar 1', '46ba' ),
		'id'            => 'sidebar-left-1',
		'description'   => esc_html__( 'Add widgets here.', '46ba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
/*
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar 2', '46ba' ),
		'id'            => 'sidebar-left-2',
		'description'   => esc_html__( 'Add widgets here.', '46ba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
*/
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar 1', '46ba' ),
		'id'            => 'sidebar-right-1',
		'description'   => esc_html__( 'Add widgets here.', '46ba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar 2', '46ba' ),
		'id'            => 'sidebar-right-2',
		'description'   => esc_html__( 'Add widgets here.', '46ba' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'theme_46ba_widgets_init');
