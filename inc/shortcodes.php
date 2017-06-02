<?php
/**
 * uri-department Shortcodes
 *
 * @package uri-department
 */

function uri_department_bluebox_shortcode( $atts, $content = null ) {
	return '<div class="bluebox">' . $content . '</div>';
}
add_shortcode( 'bluebox', 'uri_department_bluebox_shortcode' );


/**
 * A shortcode to display the featured image in a post
 * @param arr atts: size and class.  Size expects a named size like medium or large
 *									class is a string
 *
 */
function uri_department_featured_image_shortcode($atts) {

    global $post;
    
    $default_class = 'featured-image sc';

		extract( shortcode_atts( array(
				'size' => 'thumbnail', // any of the possible post thumbnail sizes - defaults to 'thumbnail'
				'class' => ''
			), $atts )
		);
				
		if( !in_array( $size, get_intermediate_image_sizes() ) ) {
			$size = 'thumbnail';
		}

    // Image to display
    $thumbnail = get_the_post_thumbnail($post->ID, $size);

    // ID of featured image
    $thumbnail_id = get_post_thumbnail_id();

    // Caption from featured image's WP_Post
    $caption = get_post($thumbnail_id)->post_excerpt;

    // Link to attachment page
    $link = get_permalink($thumbnail_id);

		$class = ' class="' . trim($default_class . ' ' . $class) . '"';
    // Final output
    $output = '<figure' . $class . '>' . '<a href="' . $link . '">' . $thumbnail;
    if(!empty($caption)) {
	    $output .= '<figcaption>' . $caption . '</figcaption>';
    }
    $output .= '</a></figure>';
    
    return $output;

}
add_shortcode('featured_image', 'uri_department_featured_image_shortcode');
