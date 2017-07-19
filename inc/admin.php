<?php
/**
 * Customizations to the admin theme
 *
 * Better unify the UX between front end and admin
 *
 * @package uri2016
 */

/**
 * Adds custom css to the admin section so that not all text areas are the same height.
 */
function uri_department_custom_admin_styles() {
  echo '<style>
    .wp-admin .field textarea {
      min-height: 0;
    } 
  </style>';
}
add_action('admin_head', 'uri_department_custom_admin_styles');

// Add CSS to Visual Editor
add_editor_style('style.css');


add_editor_style('css/wysiwyg.css');


/**
 * In the event we want to add js to the admin side
 */
// function uri_department_admin_enqueue( $hook ) {
// 	if ('edit.php' != $hook) {
// 		return;
// 	}
// }
// 
// add_action('admin_enqueue_scripts', 'uri_department_admin_enqueue');