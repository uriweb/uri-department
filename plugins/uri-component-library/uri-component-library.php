<?php
/*
Plugin Name: URI Component Library
Plugin URI: http://www.uri.edu
Description: Component Library
Version: 1.0
Author: URI Web Communications
Author URI: 
@author: Brandon Fuller <bjcfuller@uri.edu>
*/

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

// Include css and js
function uri_cl_enqueues() { 
    
    wp_register_style( 'uricl-css', get_template_directory_uri() . '/plugins/uri-component-library/css/cl.built.css' );
    wp_register_style( 'uricl-css-patch', get_template_directory_uri() . '/plugins/uri-component-library/css/clpatch.built.css' );
    
    wp_enqueue_style('uricl-css');
    wp_enqueue_style('uricl-css-patch');
    
    wp_register_script( 'uricl-js', get_template_directory_uri() . '/plugins/uri-component-library/js/cl.built.js' );
    
    wp_enqueue_script('uricl-js');
    
}
add_action( 'wp_enqueue_scripts', 'uri_cl_enqueues' );

// Include shortcodes
include( plugin_dir_path( __FILE__ ) . 'inc/cl-shortcodes.php');