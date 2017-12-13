<?php
/*
Plugin Name: URI Post Types
Plugin URI: http://www.uri.edu
Description: Create custom post types for WordPress Department Sites (Legacy Homepage Builder)
Version: 0.1
Author: John Pennypacker
Author URI: 
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');
	

function uri_post_types_post_type_maker() {

	register_post_type('spotlight', array(
		'label' => 'Spotlights',
		'description' => 'For promoting certain aspects within a college. Usually hard-coded and unchanging. Use three posts only.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => ''),
		'query_var' => true,
		'exclude_from_search' => true,
		'supports' => array('title','editor','excerpt','thumbnail',),
		'labels' => array (
			'name' => 'Spotlights',
			'singular_name' => 'Spotlight',
			'menu_name' => 'Home Spotlights',
			'add_new' => 'Add Spotlight',
			'add_new_item' => 'Add New Spotlight',
			'edit' => 'Edit',
			'edit_item' => 'Edit Spotlight',
			'new_item' => 'New Spotlight',
			'view' => 'View Spotlight',
			'view_item' => 'View Spotlight',
			'search_items' => 'Search Spotlights',
			'not_found' => 'No Spotlights Found',
			'not_found_in_trash' => 'No Spotlights Found in Trash',
			'parent' => 'Parent Spotlight',
		),
		'menu_icon'   => 'dashicons-media-text',
	));

	register_post_type('slideshow', array(
		'label' => 'Slideshow',
		'description' => 'For slideshow slides on the homepage.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => ''),
		'query_var' => true,
		'exclude_from_search' => true,
		'supports' => array('title','editor','excerpt',),
		'labels' => array (
			'name' => 'Slideshow',
			'singular_name' => 'Slide',
			'menu_name' => 'Home Slideshow',
			'add_new' => 'Add Slide',
			'add_new_item' => 'Add New Slide',
			'edit' => 'Edit',
			'edit_item' => 'Edit Slide',
			'new_item' => 'New Slide',
			'view' => 'View Slide',
			'view_item' => 'View Slide',
			'search_items' => 'Search Slideshow',
			'not_found' => 'No Slideshow Found',
			'not_found_in_trash' => 'No Slideshow Found in Trash',
			'parent' => 'Parent Slide',
		),
		'menu_icon'   => 'dashicons-images-alt',
	));

	register_post_type('why', array(
		'label' => 'Why Dept',
		'description' => 'Highlighting benefits for this particular department.',
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => ''),
		'query_var' => true,
		'exclude_from_search' => true,
		'supports' => array('title','editor','excerpt','thumbnail',),
		'labels' => array (
			'name' => 'Why Dept',
			'singular_name' => 'Benefit',
			'menu_name' => 'Why Dept',
			'add_new' => 'Add Benefit',
			'add_new_item' => 'Add New Benefit',
			'edit' => 'Edit',
			'edit_item' => 'Edit Benefit',
			'new_item' => 'New Benefit',
			'view' => 'View Benefit',
			'view_item' => 'View Benefit',
			'search_items' => 'Search Benefit',
			'not_found' => 'No Benefits Found',
			'not_found_in_trash' => 'No Benefits Found in Trash',
			'parent' => 'Parent Benefit',
		),
		'menu_icon'   => 'dashicons-index-card',
	));

}
add_action('init', 'uri_post_types_post_type_maker');


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists('register_field_group')) {
	
	register_field_group(array (
		'id' => '502a639e5813f',
		'title' => 'Custom Sidebar',
		'fields' => array (
			0 => array (
				'key' => 'field_502a61d11ab3a',
				'label' => 'Sidebar',
				'name' => 'side',
				'type' => 'textarea',
				'instructions' => 'Use html for the right sidebar.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'order_no' => '0',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => '0',
				),
				1 => array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => '1',
				),
			),
			'allorany' => 'any',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
		
	register_field_group(array (
		'id' => '502b9f08e2358',
		'title' => 'Layout Options',
		'fields' => array (
			array (
				'key' => 'field_502b9eb29fc45',
				'label' => 'Use Custom Page or Post Title?',
				'name' => 'pagetitle',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '0',
				'message' => 'If checked the standard page title will not be used and you can use your own in the body content of the page.',
				'order_no' => '0',
			),
			array (
				'key' => 'field_502b9eb29fc46',
				'label' => 'Use Manual Formatting?',
				'name' => 'autop_disable',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '0',
				'message' => 'If checked WordPress will not autoformat your HTML and you will be expected to create your own linebreaks and paragraphs in HTML.',
				'order_no' => '0',
			),
		),
		'location' => array (
			'rules' => array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
					'order_no' => 0,
				),
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 1,
				),
			),
			'allorany' => 'any',
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => 
			array (),
		),
		'menu_order' => 0,
	));
	
	register_field_group(array (
		'id' => '506446f1c5b8d',
		'title' => 'Custom Archive',
		'fields' => array (
			0 => array (
				'key' => 'field_506446c8993e1',
				'label' => 'Custom Archive Category',
				'name' => 'customcat',
				'type' => 'text',
				'instructions' => 'Enter the category slug if this page is being used as a custom archive page, with normal page content on top.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'order_no' => '0',
			),
		),
		'location' => array (
			'rules' => array (
				0 => array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => 
			array (),
		),
		'menu_order' => 0,
	));
	
}
