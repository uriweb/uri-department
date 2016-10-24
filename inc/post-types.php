<?php

function uri_department_post_type_maker() {

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
		)
	);

}
add_action('init', 'uri_department_post_type_maker');


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists('register_field_group')) {
	register_field_group(array (
		'id' => '502a639e579f1',
		'title' => 'People',
		'fields' => array (
			0 => array (
				'label' => 'Title',
				'name' => 'peopletitle',
				'type' => 'text',
				'instructions' => 'Enter the title',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da51637c7',
				'order_no' => '0',
			),
			1 => array (
				'label' => 'Department',
				'name' => 'peopledepartment',
				'type' => 'text',
				'instructions' => 'Enter the department label',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da5163bdb',
				'order_no' => '1',
			),
			2 => array (
				'label' => 'Phone',
				'name' => 'peoplephone',
				'type' => 'text',
				'instructions' => 'Use periods for breaks per branding guidelines',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da5163f7d',
				'order_no' => '2',
			),
			3 => array (
				'label' => 'Email',
				'name' => 'peopleemail',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da516431f',
				'order_no' => '3',
			),
			4 => array (
				'label' => 'Mailing Address',
				'name' => 'peoplemail',
				'type' => 'textarea',
				'instructions' => 'Enter the mailing address here. Use line breaks when necessary.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'br',
				'key' => 'field_5017da5164706',
				'order_no' => '4',
			),
			5 => array (
				'label' => 'Fax Number',
				'name' => 'peoplefax',
				'type' => 'text',
				'instructions' => 'Use periods between breaks per branding guidelines',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da5164ac9',
				'order_no' => '5',
			),
			6 => array (
				'label' => 'Biography',
				'name' => 'peoplebio',
				'type' => 'wysiwyg',
				'instructions' => 'Enter bio information',
				'required' => '0',
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'key' => 'field_5017da5164ea8',
				'order_no' => '6',
			),
			7 => array (
				'label' => 'Publications',
				'name' => 'peoplepubs',
				'type' => 'wysiwyg',
				'instructions' => 'Enter publication list. Use list items when possible.',
				'required' => '0',
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'key' => 'field_5017da5165266',
				'order_no' => '7',
			),
			8 => array (
				'label' => 'URL',
				'name' => 'peopleurl',
				'type' => 'text',
				'instructions' => 'URL to a personal website if available',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_5017da516562b',
				'order_no' => '8',
			),
			9 => array (
				'label' => 'People Excerpt',
				'name' => 'peoplereview',
				'type' => 'wysiwyg',
				'instructions' => 'For use with people reviews or testimonials',
				'required' => '0',
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'key' => 'field_5017da5165286',
				'order_no' => '9',
			),
			10 => array (
				'label' => 'Research Interests',
				'name' => 'peopleresearch',
				'type' => 'wysiwyg',
				'instructions' => 'Research interests for this person',
				'required' => '0',
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'key' => 'field_5017da5165317',
				'order_no' => '10',
			),
			11 => array (
				'label' => 'Education',
				'name' => 'peopleedu',
				'type' => 'wysiwyg',
				'instructions' => 'Education info for this person',
				'required' => '0',
				'toolbar' => 'basic',
				'media_upload' => 'no',
				'key' => 'field_5017da5165357',
				'order_no' => '11',
			),
			12 => array (
				'label' => 'Custom',
				'name' => 'peoplecustom',
				'type' => 'textarea',
				'instructions' => 'A custom area for anything. Bold section titles. Use two line breaks for new paragraphs and an h3 for header items',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_5017da5165387',
				'order_no' => '12',
			),
		),
		'location' => array (
			'rules' => array (
				0 => array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (),
		),
		'menu_order' => 0,
	));
	
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
		'id' => '502a639e58574',
		'title' => 'People Options',
		'fields' => array (
			0 => array (
				'label' => 'People Category',
				'name' => 'peoplecat',
				'type' => 'text',
				'instructions' => 'For use when limiting the people page template to one or more specific people groups. Use the desired people group slug. Separate multiple groups with a space between slugs',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_502a636e3a5d7',
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
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (),
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
	
	register_field_group(array (
		'id' => '506ae97f314e0',
		'title' => 'People Sorting',
		'fields' => array (
			0 => array (
				'label' => 'Sort People',
				'name' => 'peoplesort',
				'type' => 'true_false',
				'instructions' => '',
				'required' => '0',
				'message' => 'When checked, the people page will be sorted into groups.',
				'key' => 'field_506ae96a8e2f5',
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
