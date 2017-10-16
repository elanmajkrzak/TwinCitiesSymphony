<?php
/**
 * Culture functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 */
#-----------------------------------------------------------------#
# INCLUDE REQUIRED FILE FOR THEME (PLEASE DON'T REMOVE IT)
#-----------------------------------------------------------------#
include_once(get_template_directory() . '/functions/init.php');
include_once(get_template_directory() . '/includes/customizer.php');


#-------------------------------------------------------------------#
# THEME CONFIGURATION
#-------------------------------------------------------------------#
function culture_theme_config() {
	 
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );
	
	// Load text domain
	load_theme_textdomain('culture');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');
	
	// Setup the WordPress custom logo feature.
	add_theme_support( 'custom-logo', array(
		'width'       => 170,
		'height'      => 40,
		'flex-width' => true,
	));

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array(
		'audio',
		'gallery',
		'image',
		'quote',
		'video'
	));
	
	// Setup the WordPress core custom header feature.
	add_theme_support( 'custom-header' );
	
	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 150, 150, true );
	
	// this theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'Header' => __( 'Main Navigation', 'culture' ),
	));
}
add_action( 'after_setup_theme', 'culture_theme_config' ); 

#-----------------------------------------------------------------#
# FROM HERE YOU CAN ADD YOUR OWN FUNCTIONS
#-----------------------------------------------------------------#
function create_header_menu() {
	$menu_name = 'Navigation';
	$menu_exists = wp_get_nav_menu_object( $menu_name );

	if (!$menu_exists) {
		$menu_id = wp_create_nav_menu($menu_name);
		$menu = get_term_by( 'name', $menu_name, 'nav_menu' );

		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' =>  __('Home'),
			'menu-item-classes' => 'home',
			'menu-item-url' => home_url( '/' ),
			'menu-item-status' => 'publish'
		));

		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' =>  __('Concerts & Events'),
			'menu-item-url' => home_url( '/concerts/' ),
			'menu-item-status' => 'publish'
		));

		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' =>  __('Donate'),
			'menu-item-status' => 'publish'
		));

		wp_update_nav_menu_item($menu_id, 0, array(
			'menu-item-title' =>  __('Auditions'),
			'menu-item-url' => home_url( '/audition/' ),
			'menu-item-status' => 'publish'
		));

		$locations = get_theme_mod('nav_menu_locations');
		$locations['Header'] = $menu->term_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}
add_action( 'load-nav-menus.php', 'create_header_menu' );