<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Veganease
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function veganease_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'veganease_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function veganease_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'veganease_pingback_header' );

//gutenberg blocks
function enhance_wellness_journey() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'enhance-wellness-journey',
			'title'				=> __('Enhance Wellness Journey'),
			'description'		=> __('A custom block for Enhance Wellness Journey.'),
			'render_template'	=> 'template-parts/blocks/enhance-wellness-journey.php',
			'category'			=> 'layout',
			'icon'				=> 'smiley',
			'keywords'			=> array( 'enhance wellness' ),
		));
	}
}

add_action('acf/init', 'enhance_wellness_journey');

function catering_services() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'catering-services',
			'title'				=> __('Catering Services'),
			'description'		=> __('A custom block for Catering Serbices.'),
			'render_template'	=> 'template-parts/blocks/catering-services.php',
			'category'			=> 'layout',
			'icon'				=> 'food',
			'keywords'			=> array( 'catering service services' ),
		));
	}
}

add_action('acf/init', 'catering_services');

function coaching_services() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a portfolio item block
		acf_register_block(array(
			'name'				=> 'coaching-services',
			'title'				=> __('Coaching Services'),
			'description'		=> __('A custom block for Coaching Serbices.'),
			'render_template'	=> 'template-parts/blocks/coaching-services.php',
			'category'			=> 'layout',
			'icon'				=> 'tickets',
			'keywords'			=> array( 'coaching service services' ),
		));
	}
}

add_action('acf/init', 'coaching_services');