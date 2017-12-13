<?php
/*
Plugin Name: URI People Tool
Plugin URI: http://www.uri.edu
Description: Create custom post types for WordPress Department Sites
Version: 0.1
Author: John Pennypacker
Author URI: 
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');


/**
 * Print a list of people
 * @param arr $args @see https://codex.wordpress.org/Class_Reference/WP_Query
 */
function uri_department_get_people($args) {

	$default_args = array(
		'post_type' => 'people',
		'posts_per_page' => -1,
		'order' => 'DESC',
		'orderby' => array('date' => 'DESC' ),
	);

	$loop = new WP_Query( array_merge( $default_args, $args ) );
	
	$i = 0;
	while ($loop->have_posts()) {
		$i++;
		$loop->the_post();
		get_template_part( 'templates/partials/person', 'card' );
	}
	wp_reset_postdata();

}

/**
 * Define the custom people post type
 */
function uri_people_tool_post_type_maker() {

	register_post_type('people', array(
		'label' => 'People',
		'description' => 'For faculty, staff, and others.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => true,
		'rewrite' => array('slug' => 'meet'),
		'query_var' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'supports' => array('title','thumbnail',),
		'labels' => array (
			'name' => 'People',
			'singular_name' => 'Person',
			'menu_name' => 'People',
			'add_new' => 'Add Person',
			'add_new_item' => 'Add New Person',
			'edit' => 'Edit',
			'edit_item' => 'Edit Person',
			'new_item' => 'New Person',
			'view' => 'View Person',
			'view_item' => 'View Person',
			'search_items' => 'Search People',
			'not_found' => 'No People Found',
			'not_found_in_trash' => 'No People Found in Trash',
			'parent' => 'Parent Person',
		),
		'menu_icon'   => 'dashicons-id-alt',
	));

	register_taxonomy('peoplegroups', array (
		0 => 'people'
		), array(
			'hierarchical' => true,
			'label' => 'People Groups',
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'person'),
			'singular_label' => 'People Group'
		)
	);


}
add_action('init', 'uri_people_tool_post_type_maker');


// require the individual field definitions from a different file
require_once dirname(__FILE__) . '/inc/uri-people-fields.php';