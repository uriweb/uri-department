<?php
/**
 * Theme settings and functions
 */

/**
 * Get the version number, as a string, to serve as a cachebuster.
 * @return str
 */
function uri_department_cachebuster() {
	static $cache_buster;
	if(empty($cache_buster)) {
		$cache_buster = wp_get_theme()->get('Version');
		$cache_buster = date(time());
	}
	return $cache_buster;
}

/**
 * Suppress the version number of WordPress
 * @return str
 */
function uri_department_remove_version() {
	return '';
}
add_filter('the_generator', 'uri_department_remove_version');

/**
 * Establish theme settings settings
 */

add_theme_support( 'post-thumbnails' );

set_post_thumbnail_size( 650, 350, true ); // hard crop mode

add_image_size( 'people', 300, 150, false );
add_image_size( 'home-thumb', 290, 140, true );
add_image_size( 'who-thumb', 125, 125, true );
add_image_size( 'people-thumb', 80, 80, false );
add_image_size( 'people-big', 300, 300, false );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );


/**
 * Include the custom post types plugin
 */
require_once ( get_stylesheet_directory() . '/plugins/uri-post-types/uri-post-types.php' );

/**
 * Include the URI news importer
 */
require_once ( get_stylesheet_directory() . '/plugins/uri-today-importer/uri-today-importer.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Include the business logic for features that belong in their own plugins
 */
require_once ( get_stylesheet_directory() . '/widgets/recentposts.php' );
require_once ( get_stylesheet_directory() . '/widgets/recentpostsfull.php' );
require_once ( get_stylesheet_directory() . '/widgets/localist.php' );


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


/**
 * When Options framework is removed, we'll want to ensure that stray
 * calls to of_get_option() don't break the site.
 */
if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option() {
		return FALSE;
	}
}

/**
 * Set up sidebar areas
 */
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


/**
 * Set up menus
 */
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
	'department' => __( 'Primary Department Navigation', 'uri' ),
) );

unregister_nav_menu( 'col1-menu' );
unregister_nav_menu( 'footer-menu' );


/**
 * Suppress version number
 */
function uri_department_hide_version() {
	return '';
}
add_filter('the_generator', 'uri_department_hide_version');



// Use WordPress packaged jQuery
function uri_department_insert_jquery(){
	wp_enqueue_script('jquery');
}
add_filter('wp_enqueue_scripts','uri_department_insert_jquery');




/**
 * Add JS
 */
function uri_department_scripts_method() {
	$version = uri_department_cachebuster();
	wp_enqueue_script(
		'slider',
		get_template_directory_uri() . '/js/slide.js',
		array( 'jquery' ),
		$version,
		TRUE
	);

	wp_enqueue_script(
		'flexslider',
		get_template_directory_uri() . '/js/flexslider.js',
		array( 'jquery' ),
		$version,
		TRUE
	);
    
    wp_enqueue_script(
		'scripts',
		get_template_directory_uri() . '/js/scripts.built.js',
		array( 'jquery' ),
		$version,
		TRUE
	);

}
add_action( 'wp_enqueue_scripts', 'uri_department_scripts_method' );



/**
 * Add CSS
 */
function uri_department_styles() { 
	$version = uri_department_cachebuster();
	wp_register_style( 'reset', get_template_directory_uri() . '/css/reset.css', array(), $version, 'all' );
	wp_register_style( 'thegrid', get_template_directory_uri() . '/css/grid.css', array(), $version, 'all' );
	wp_register_style( 'basestyle', get_template_directory_uri() . '/style.css', array(), $version, 'all' );
    wp_register_style( 'complib', get_template_directory_uri() . '/cl/cl.built.css', array(), $version, 'all' );

	// enqueing:
	wp_enqueue_style( 'reset' );
	wp_enqueue_style( 'thegrid' );
	wp_enqueue_style( 'basestyle' );
    wp_enqueue_style( 'complib' );
}
add_action('wp_enqueue_scripts', 'uri_department_styles');



/* Flush your rewrite rules */
function uri_department_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;

	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
		$wp_rewrite->flush_rules();
	}
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'uri_department_flush_rewrite_rules' );




// Add buttons to html editor
function uri_department_quicktags() {
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
add_action('admin_print_footer_scripts','uri_department_quicktags');


/**
 * Component library shortcodes.
 */
include 'cl/cl-shortcodes.php';



function uri_department_bluebox_shortcode( $atts, $content = null ) {
	return '<div class="bluebox">' . $content . '</div>';
}
add_shortcode( 'bluebox', 'uri_department_bluebox_shortcode' );




function uri_department_remove_size_attributes( $html ) {
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
	return $html;
}
add_filter( 'post_thumbnail_html', 'uri_department_remove_size_attributes', 10 );
add_filter( 'image_send_to_editor', 'uri_department_remove_size_attributes', 10 );




function string_limit_wordsdept($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit) {
		array_pop($words);
		//add a ... at last article when more than limit word count
		echo implode(' ', $words)."...";
	} else {
		//otherwise
		echo implode(' ', $words);
	}
}


/**
 * Calculates the page title.  As in HTML <title> title
 * @return str
 */
function uri_department_get_page_title() {
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) { 
		return ' | ' . $site_description;
	}
	if ( $paged >= 2 || $page >= 2 ) {
		return ' | ' . sprintf( __( 'Page %s', 'uridepartment' ), max( $paged, $page ) );
	}
}

/**
 * adds custom per page styling if it exists in the page meta
 * @return str
 */
function uri_department_get_page_css() {
	global $wp_query;
	$postid = $wp_query->post->ID;
	$meta = get_post_meta($postid,'_my_meta',TRUE);
	if (isset($meta['pagecss']) && $meta['pagecss'] === true) {
		return '<style type="text/css">' . $meta['pagecss'] . '</style>';
	}
}


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

	while ($loop->have_posts()) {
		$i++;
		$loop->the_post();
		get_template_part( 'templates/partials/person', 'card' );
	}
	wp_reset_postdata();

}



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






function uri_department_admin_notice(){
	global $pagenow;
	if ( $pagenow == 'nav-menus.php' ) {
		echo '<div class="updated">
		<p><span style="color:#ca1717;"><strong>Important:</strong></span> Be sure that your select the corresponding menu under <em>"Primary Department Sidebar"</em> in the <em>"Theme Locations"</em> box. Please refer to the documentation for more.</p>
		</div>';
	}
}
add_action('admin_notices', 'uri_department_admin_notice');



function uri_department_admin_notice2(){
	global $pagenow;
	if ( $pagenow == 'options-reading.php' ) {
		echo '<div class="updated">
		<p><span style="color:#ca1717;"><strong>Important:</strong></span> Be sure to set the "homepage" for this department by setting "A static page" and choosing a page in the drop-down for the <em>Front-Page</em>. <strong>Leave the <em>Post Page</em> selection blank</strong>, and use the <em>Archive</em> page template on any page you would like to list posts. See the documentation for more.</p>
		</div>';
	}
}
add_action('admin_notices', 'uri_department_admin_notice2');


function uri_department_remove_metaboxes() {
	remove_meta_box( 'postcustom' , 'page' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'postcustom' , 'post' , 'normal' ); //removes custom fields for page
	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' ); //removes comments status for page
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' ); //removes comments for page
}
add_action( 'admin_menu' , 'uri_department_remove_metaboxes' );



function uri_department_acf_load_value( $value, $post_id, $field ) {
	//Set the default value for "pagetitle" to checked if the option is set in options panel
	if( of_get_option('urid_pageover') == true && ! is_numeric( $value ) ) {
		$value = 1;
	}
	return $value;
}
add_filter('acf/load_value/name=pagetitle', 'uri_department_acf_load_value', 10, 3);


//********************************************************/
//By default, SearchWP adds an entry to WP Admin Bar but it is now restricted to super admin only
function uri_department_searchwp_admin_bar_cap($capability) {
	//return 'manage_network'; //
	$capability = 'manage_network'; //restructed to users with super admin privilege
	return $capability;
}
add_filter( 'searchwp_settings_cap', 'uri_department_searchwp_admin_bar_cap' );


//prevent SearchWP from initializing itself unless it is a search page
function uri_department_searchwp_init() {
	return is_search();
}
add_filter( 'searchwp_init', 'uri_department_searchwp_init' );

//********************************************************/


// adds the featured image to the RSS feed
// https://duogeek.com/blog/add-featured-images-as-enclosures-in-wordpress-rss-feeds/
function uri_department_add_featured_image_in_rss() {
	$thumbnail_ID = get_post_thumbnail_id( $post->ID );
	$thumbnail = wp_get_attachment_image_src($thumbnail_ID, array(200, 200));

	$url = ( ! empty( $thumbnail ) ) ? $thumbnail[0] : get_template_directory_uri() . '/images/default/uri80.gif';
	echo "\t" . '<enclosure url="' . $url . '" />' . "\n";
}
add_action( 'rss2_item', 'uri_department_add_featured_image_in_rss' );


