<?php
function hide_version() {
	return '';
}
add_filter('the_generator', 'hide_version');



// Use WordPress packaged jQuery
function insert_jquery(){
	wp_enqueue_script('jquery');
}
add_filter('wp_enqueue_scripts','insert_jquery');




function my_scripts_method() {
	wp_enqueue_script(
		'slider',
		get_template_directory_uri() . '/js/slide.js',
		array( 'jquery' )
	);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );




function my_scripts_method2() {
	wp_enqueue_script(
		'flexslider',
		get_template_directory_uri() . '/js/flexslider.js',
		array( 'jquery' )
	);
}
add_action( 'wp_enqueue_scripts', 'my_scripts_method2' );



function theme_styles() { 
	wp_register_style( 'inuit', get_template_directory_uri() . '/css/inuit.css', array(), '313', 'all' );
	wp_register_style( 'thegrid', get_template_directory_uri() . '/css/grid.css', array(), '313', 'all' );
	wp_register_style( 'basestyle', get_template_directory_uri() . '/style.css', array(), '313', 'all' );

	// enqueing:
	wp_enqueue_style( 'inuit' );
	wp_enqueue_style( 'thegrid' );
	wp_enqueue_style( 'basestyle' );
}
add_action('wp_enqueue_scripts', 'theme_styles');



/* Flush your rewrite rules */
function frosty_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;

	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		$wp_rewrite->flush_rules();
	}
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'frosty_flush_rewrite_rules' );




// Add buttons to html editor
function eg_quicktags() {
	?>
	<script type="text/javascript" charset="utf-8">
	<?php
	/* Adding Quicktag buttons to the editor Wordpress ver. 3.3 and above
	* - Button HTML ID (required)
	* - Button display, value="" attribute (required)
	* - Opening Tag (required)
	* - Closing Tag (required)
	* - Access key, accesskey="" attribute for the button (optional)
	* - Title, title="" attribute (optional)
	* - Priority/position on bar, 1-9 = first, 11-19 = second, 21-29 = third, etc. (optional)
	*/
	?>
	QTags.addButton( 'eg_bluebox', 'bluebox', '<div class="bluebox">', '</div>' );
	QTags.addButton( 'eg_featureditem', 'featureditem','<div class="archiveitem"><div class="postpic">Insert an image here</div><div class="bc"><h2>Edit the title here</h2>Now edit the content', '</div><div style="clear: both;"></div></div>' );
	QTags.addButton( 'eg_inlineslide', 'slider','<div class="flexslider inlineslide"><ul class="slides">Insert images and wrap them with list item then close this tag', '</ul></div>' );
	</script>
	<?php
}
add_action('admin_print_footer_scripts','eg_quicktags');




function bluebox_shortcode( $atts, $content = null ) {
	return '<div class="bluebox">' . $content . '</div>';
}
add_shortcode( 'bluebox', 'bluebox_shortcode' );




add_filter( 'post_thumbnail_html', 'remove_width_attributedept', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attributedept', 10 );

function remove_width_attributedept( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}




function string_limit_wordsdept($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit) {
	array_pop($words);
	//add a ... at last article when more than limit word count
	echo implode(' ', $words)."..."; } else {
	//otherwise
	echo implode(' ', $words); }
}




add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 650, 350, true ); // hard crop mode

add_image_size( 'people', 300, 150, false );
add_image_size( 'home-thumb', 290, 140, true );
add_image_size( 'who-thumb', 125, 125, true );
add_image_size( 'people-thumb', 80, 80, false );
add_image_size( 'people-big', 300, 300, false );

require_once ( get_stylesheet_directory() . '/widgets/recentposts.php' );
require_once ( get_stylesheet_directory() . '/widgets/recentpostsfull.php' );
require_once ( get_stylesheet_directory() . '/widgets/localist.php' );
require_once ( get_template_directory() . '/mdetect.php' );


// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// This theme uses wp_nav_menu() in one location.

register_nav_menus( array(

'department' => __( 'Primary Department Navigation', 'uri' ),

) );

unregister_nav_menu( 'col1-menu' );
unregister_nav_menu( 'footer-menu' );


function the_excerpt_reloaded($words = 25, $link_text = 'Read more &#187;', $allowed_tags = '', $container = 'p', $smileys = 'no' ) {
	global $post;
	$return = '';
	
	if ( $allowed_tags == 'all' ) {
		$allowed_tags = '<a>,<i>,<em>,<b>,<strong>,<ul>,<ol>,<li>,<span>,<blockquote>,<img>';
	}
	$text = preg_replace('/[*]/', '', strip_tags($post->post_content, $allowed_tags));
	$text = explode(' ', $text);
	$tot = count($text);
	for ( $i=0; $i<$words; $i++ ) {
		$output .= $text[$i] . ' ';
	}
	if ( $smileys == "yes" ) {
		$output = convert_smilies($output);
	}
	
	$return = '<p>' . force_balance_tags($output);
	if ( $i >= $tot ) {
		$return .= '</p>';
	}
	
	if ( $i < $tot ) {
		if ( $container == 'p' || $container == 'div' ) {
			$return .= '</p>';
		}
		if ( $container != 'plain' ) {
			$return .= '<' . $container . ' class="more">';
			if ( $container == 'div' ) {
				$return .= '<p>';
			}
		}

		$return .= '<a href="' . get_the_permalink() . '" title="' . $link_text . '">' . $link_text . '</a>';
		
		if ( $container == 'div' ) {
			$return .= '</p>';
		}
		if ( $container != 'plain' ) {
			$return .= '</' . $container . '>';
		}
		if ( $container == 'plain' || $container == 'span' ) {
			$return .= '</p>';
		}
	}
	print $return;
}


// Area 1, right sidebar customization

register_sidebar( array(
	'name' => __( 'Right Department Sidebar', 'uri' ),
	'id' => 'mainsidebar',
	'description' => __( 'Right sidebar content for department', 'uri' ),
	'before_widget' => '<div class="sidebarwidget">',
	'after_widget'  => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>',
	));

register_sidebar(array(
		'name'=> 'Left Column',
		'id' => 'leftcol',
		'before_widget' => '<div class="box">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));

register_sidebar(array(
		'name'=> 'Body Content Widget',
		'id' => 'bodycol',
		'before_widget' => '<div class="bottomcontent">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

register_sidebar(array(
		'name'=> 'Homepage',
		'id' => 'homepage',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

add_action('init', 'my_post_type_maker');



function my_post_type_maker() {

	register_post_type('people', array(	'label' => 'People','description' => 'For faculty, staff, and others.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => true,'rewrite' => array('slug' => 'meet'),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'supports' => array('title','thumbnail',),'labels' => array (
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
	),) );


	register_taxonomy('peoplegroups',array (
		0 => 'people',
	),array( 'hierarchical' => true, 'label' => 'People Groups','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => 'person'),'singular_label' => 'People Group') );

	register_post_type('spotlight', array(	'label' => 'Spotlights','description' => 'For promoting certain aspects within a college. Usually hard-coded and unchanging. Use three posts only.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'supports' => array('title','editor','excerpt','thumbnail',),'labels' => array (
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
	),) );

	register_post_type('slideshow', array(	'label' => 'Slideshow','description' => 'For slideshow slides on the homepage.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'supports' => array('title','editor','excerpt',),'labels' => array (
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
	),) );

	register_post_type('why', array(	'label' => 'Why Dept','description' => 'Highlighting benefits for this particular department.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'exclude_from_search' => true,'supports' => array('title','editor','excerpt','thumbnail',),'labels' => array (
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
	),) );

}

/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group")) {
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



if ( !function_exists( 'optionsframework_init' ) ) {
	/*-----------------------------------------------------------------------------------*/
	/* Options Framework Theme
	/*-----------------------------------------------------------------------------------*/
	/* Set the file path based on whether the Options Framework Theme is a parent theme or child theme */
	if ( STYLESHEETPATH == TEMPLATEPATH ) {
		define('OPTIONS_FRAMEWORK_URL', TEMPLATEPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('template_directory') . '/admin/');
	} else {
		define('OPTIONS_FRAMEWORK_URL', STYLESHEETPATH . '/admin/');
		define('OPTIONS_FRAMEWORK_DIRECTORY', get_bloginfo('stylesheet_directory') . '/admin/');
	}
	require_once (OPTIONS_FRAMEWORK_URL . 'options-framework.php');
}


function my_admin_notice(){
	global $pagenow;
	if ( $pagenow == 'nav-menus.php' ) {
		echo '<div class="updated">
		<p><span style="color:#ca1717;"><strong>Important:</strong></span> Be sure that your select the corresponding menu under <em>"Primary Department Sidebar"</em> in the <em>"Theme Locations"</em> box. Please refer to the documentation for more.</p>
		</div>';
	}
}
add_action('admin_notices', 'my_admin_notice');



function my_admin_notice2(){
	global $pagenow;
	if ( $pagenow == 'options-reading.php' ) {
		echo '<div class="updated">
		<p><span style="color:#ca1717;"><strong>Important:</strong></span> Be sure to set the "homepage" for this department by setting "A static page" and choosing a page in the drop-down for the <em>Front-Page</em>. <strong>Leave the <em>Post Page</em> selection blank</strong>, and use the <em>Archive</em> page template on any page you would like to list posts. See the documentation for more.</p>
		</div>';
	}
}
add_action('admin_notices', 'my_admin_notice2');


function remove_metaboxes() {
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'postcustom' , 'post' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status for page
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments for page
}
add_action( 'admin_menu' , 'remove_metaboxes' );



function my_acf_load_value( $value, $post_id, $field ) {
	//Set the default value for "pagetitle" to checked if the option is set in options panel
	if( of_get_option('urid_pageover') == true && ! is_numeric( $value ) ) {
		$value = 1;
	}
	return $value;
}
add_filter('acf/load_value/name=pagetitle', 'my_acf_load_value', 10, 3);


//********************************************************/
//By default, SearchWP adds an entry to WP Admin Bar but it is now restricted to super admin only
function my_searchwp_admin_bar_cap ($capability){
	//return 'manage_network'; //
	$capability = 'manage_network'; //restructed to users with super admin privilege
	return $capability;
}
add_filter( 'searchwp_settings_cap', 'my_searchwp_admin_bar_cap' );


//prevent SearchWP from initializing itself unless it is a search page
function my_searchwp_init() {
	return is_search();
}
add_filter( 'searchwp_init', 'my_searchwp_init' );

//********************************************************/

