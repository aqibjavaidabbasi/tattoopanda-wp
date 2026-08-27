<?php
/**
 * Implement Default Theme/Customizer Options
 *
 * @package Catch Themes
 * @subpackage Studio Pro
 * @since Studio 1.0
 */


/**
 * Returns the default options for studio.
 *
 * @since Studio 1.0
 */
function studio_get_default_theme_options( $parameter = null ) {

	$default_theme_options = array(
		//Logo
		'logo'												=> trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/logo.png',
		'logo_alt_text' 									=> '',
		'logo_disable'										=> 1,

		//Layout
		'theme_layout' 										=> 'no-sidebar',
		'content_layout'									=> 'excerpt-image-top',

		//Comment Options
		'comment_option'									=> 'use-wordpress-setting',
		'disable_website_field'								=> 0,

		//Custom CSS
		'custom_css'										=> '',

		//Excerpt Options
		'excerpt_length'									=> '30',
		'excerpt_more_text'									=> esc_html__( 'Read More ...', 'studio' ),

		//Homepage / Frontpage Settings
		'front_page_category'								=> '0',

		//Pagination Options
		'pagination_type'									=> 'default',

		//Search Options
		'search_text'										=> esc_html__( 'Search...', 'studio' ),
		//Reset all settings
		'reset_all_settings'								=> 0,
	);

	if ( null == $parameter ) {
		return apply_filters( 'studio_default_theme_options', $default_theme_options );
	}
	else {
		return $default_theme_options[ $parameter ];
	}
}

/**
 * Returns an array of layout options registered for studio.
 *
 * @since Studio 1.0
 */
function studio_layouts() {
	$layout_options = array(
		'left-sidebar'  => esc_html__( 'Primary Sidebar, Content', 'studio' ),
		'right-sidebar' => esc_html__( 'Content, Primary Sidebar', 'studio' ),
		'no-sidebar'    => esc_html__( 'No Sidebar', 'studio' ),
	);
	return apply_filters( 'studio_layouts', $layout_options );
}

/**
 * Returns an array of pagination schemes registered for studio.
 *
 * @since Studio 1.0
 */
function studio_get_pagination_types() {
	$pagination_types = array(
		'default'                => esc_html__( 'Default(Older Posts/Newer Posts)', 'studio' ),
		'numeric'                => esc_html__( 'Numeric', 'studio' ),
		'infinite-scroll-click'  => esc_html__( 'Infinite Scroll (Click)', 'studio' ),
		'infinite-scroll-scroll' => esc_html__( 'Infinite Scroll (Scroll)', 'studio' ),
	);

	return apply_filters( 'studio_get_pagination_types', $pagination_types );
}


/**
 * Returns an array of comment options for studio.
 *
 * @since Studio 1.0
 */
function studio_comment_options() {
	$comment_options = array(
		'use-wordpress-setting' => esc_html__( 'Use WordPress Setting', 'studio' ),
		'disable-in-pages'      => esc_html__( 'Disable in Pages', 'studio' ),
		'disable-completely'    => esc_html__( 'Disable Completely', 'studio' ),
	);

	return apply_filters( 'studio_comment_options', $comment_options );
}

/**
 * Returns an array of content layout options registered for studio.
 *
 * @since Studio 1.0
 */
function studio_get_archive_content_layout() {
	$layout_options = array(
		'excerpt-image-top' => esc_html__( 'Show Excerpt (Image Top)', 'studio' ),
		'full-content'      => esc_html__( 'Show Full Content (No Featured Image)', 'studio' ),
	);

	return apply_filters( 'studio_get_archive_content_layout', $layout_options );
}
