<?php
/**
 * WP-LEGO functions and definitions
 */

if ( ! function_exists( 'setup_wp_lego' ) ) :
	function setup_wp_lego() {
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
		add_theme_support( 'widgets-block-editor' );

		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'wp_lego' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'setup_wp_lego' );

function theme_wp_lego_scripts() {
	//wp_enqueue_style( 'roboto-fonts', 'assets/fonts/roboto/style', array(), null );
	wp_enqueue_style( 'wp_lego-style', get_stylesheet_uri()."?".time(), array(), '1.0.0' );
}

add_action( 'wp_enqueue_scripts', 'theme_wp_lego_scripts' );

function theme_wp_lego_unregister_old_sidebars() {
	unregister_sidebar('sidebar-left-1');
	unregister_sidebar('sidebar-left-2');
	unregister_sidebar('sidebar-right-1');
	unregister_sidebar('sidebar-right-2');
}

//add_action( 'widgets_init', 'theme_wp_lego_unregister_old_sidebars', 11);

function theme_wp_lego_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar 1', 'wp-lego' ),
		'id'            => 'sidebar-left-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-lego' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
/*
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar 2', 'wp-lego' ),
		'id'            => 'sidebar-left-2',
		'description'   => esc_html__( 'Add widgets here.', 'wp-lego' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
*/
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar 1', 'wp-lego' ),
		'id'            => 'sidebar-right-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp-lego' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar 2', 'wp-lego' ),
		'id'            => 'sidebar-right-2',
		'description'   => esc_html__( 'Add widgets here.', 'wp-lego' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'theme_wp_lego_widgets_init');
