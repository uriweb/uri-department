<?php
/**
 * uri-department Theme Customizer.
 *
 * @package uri-department
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_department_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	uri_department_notice_customizer( $wp_customize );
	
	uri_department_department_customizer( $wp_customize );


}
add_action( 'customize_register', 'uri_department_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function uri_department_customize_preview_js() {
	wp_enqueue_script( 'uri_department_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), uri_department_cachebuster(), true );
}
add_action( 'customize_preview_init', 'uri_department_customize_preview_js' );




/**
 * Creates the Notice customizer doodad
 * keeping its code in its own container
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_department_notice_customizer($wp_customize) {

	$panel = 'uri_department_notice';
	$section = 'uri_department_notice_options';

	$wp_customize->add_panel($panel, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Notice',
    'description'    => '',
	));

	$wp_customize->add_section($section, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Notice',
    'description'    => '',
	));

	$elements = array();
	
	$elements[] = array(
		'name' => 'uri_department_notice_text',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Enter a notification / alert for this site.', 'uri-department' ),
			'description' => __( 'Keep it short.', 'uri-department'),
			'section'  => $section,
		)
	);
	
	$elements[] = array(
		'name' => 'uri_department_notice_type',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Type of notice', 'uri-department' ),
			'section'  => $section,
	 		'type' => 'select',
	 		'choices' => array('' => 'Select a type', 'blue' => 'Blue', 'green' => 'Green', 'yellow' => 'Yellow', 'orange' => 'Orange', 'red' => 'Red'),
		)
	);

	$elements[] = array(
		'name' => 'uri_department_notice_show_on_all_pages',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Show on every page', 'uri-department' ),
			'description' => __( 'Leave unchecked to display on front page only', 'uri-department'),
			'section'  => $section,
	 		'type' => 'checkbox',
		)
	);
	
	foreach($elements as $el) {
		uri_department_add_customizer_element( $wp_customize, $el['name'], $el['options'], $el['control'] );
	}


}


/**
 * Creates the Department customizer panel
 * Used for contact information and social media information
 * keeping its code in its own container
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_department_department_customizer($wp_customize) {

	$panel = 'uri_department_department';

	$wp_customize->add_panel($panel, array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'URI Department',
    'description'    => '',
	));


	$section = 'uri_department_department_options';
	$wp_customize->add_section($section, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Contact Information',
    'description'    => '',
    'panel'          => $panel,
	));

	$section_social = 'uri_department_department_social_media';
	$wp_customize->add_section($section_social, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Social Media',
    'description'    => '',
    'panel'          => $panel,
	));

	$section_theme = 'uri_department_department_theme_options';
	$wp_customize->add_section($section_theme, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Theme Options',
    'description'    => '',
    'panel'          => $panel,
	));


	$elements = array();
	
	$elements[] = array(
		'name' => 'uri_department_department_address',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Department Mailing Address', 'uri-department' ),
			'description' => __( 'Physical location', 'uri-department'),
			'section'  => $section,
			'type' => 'textarea',
		)
	);

	$elements[] = array(
		'name' => 'uri_department_department_email',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Department Email Address', 'uri-department' ),
			'section'  => $section,
		)
	);

	$elements[] = array(
		'name' => 'uri_department_department_phone',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Department Phone Number', 'uri-department' ),
			'section'  => $section,
		)
	);

	$elements[] = array(
		'name' => 'uri_department_department_twitter',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Twitter', 'uri-department' ),
			'description' => __( 'Just the handle.  Like @universityofri', 'uri-department'),
			'section'  => $section_social,
		)
	);
	$elements[] = array(
		'name' => 'uri_department_department_instagram',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Instagram URL', 'uri-department' ),
			'description' => __( 'The entire URL including https', 'uri-department'),
			'section'  => $section_social,
		)
	);
	$elements[] = array(
		'name' => 'uri_department_department_facebook',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Facebook URL', 'uri-department' ),
			'description' => __( 'The entire URL including https', 'uri-department'),
			'section'  => $section_social,
		)
	);
	$elements[] = array(
		'name' => 'uri_department_department_linkedin',
		'options' => array(),
		'control' => array(
			'label'    => __( 'LinkedIn URL', 'uri-department' ),
			'description' => __( 'The entire URL including https', 'uri-department'),
			'section'  => $section_social,
		)
	);
	$elements[] = array(
		'name' => 'uri_department_department_youtube',
		'options' => array(),
		'control' => array(
			'label'    => __( 'YouTube URL', 'uri-department' ),
			'description' => __( 'The entire URL including https', 'uri-department'),
			'section'  => $section_social,
		)
	);


	$elements[] = array(
		'name' => 'uri_department_department_theme_skin',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Skin', 'uri-department' ),
			'section'  => $section_theme,
	 		'type' => 'select',
	 		'choices' => array('' => 'Select a Skin', 'legacy' => 'Legacy (default)', 'legacy' => 'Legacy'),
		)
	);


	foreach($elements as $el) {
		uri_department_add_customizer_element( $wp_customize, $el['name'], $el['options'], $el['control'] );
	}



}


/**
 * Creates a customizer element (setting and control)
 * this just keeps the repetitive code in its own function so that the 
 * "settings" part of the code is cleaner and easier to manage
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @param str $name The machine-readable name of the element
 * @param arr $options The setting options args
 * @param arr $control The control args
 */

function uri_department_add_customizer_element( $wp_customize, $name, $options=array(), $control=array() ) {

	$default_options = array(
		'type' => 'option',
		'default' => '',
		'transport' => 'postMessage'
	);
	$args = array_merge($default_options, $options);
	$wp_customize->add_setting( $name, $args );

	$default_control = array(
		'label'    => __( 'URI Field', 'uri-department' ),
		'section'  => 'uri_department_section',
		'capability' => 'edit_theme_options',
		'type' => 'text',
		'settings' => $name,
		'priority' => 20,
		'input_attrs' => array(
			'checked' => ''
		)
	);
	
	$args = array_merge( $default_control, $control );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $name, $args ));

}