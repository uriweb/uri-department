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
			'label'    => __( 'Text for the notification', 'uri-department' ),
			'description' => __( 'Keep it short.', 'uri-department'),
			'section'  => $section,
		)
	);

	$elements[] = array(
		'name' => 'uri_department_notice_type',
		'options' => array(),
		'control' => array(
			'label'    => __( 'Type of notice', 'uri-department' ),
			'description' => '',
			'section'  => $section,
	 		'type' => 'select',
	 		'choices' => array('blue' => 'Blue', 'green' => 'Green', 'yellow' => 'Yellow', 'orange' => 'Orange', 'red' => 'Red'),
			'priority' => 30,
		)
	);

	foreach($elements as $el) {
		uri_department_add_customizer_element( $wp_customize, $el['name'], $el['options'], $el['control'] );
	}


}


/**
 * Creates the Department customizer panel
 * keeping its code in its own container
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function uri_department_department_customizer($wp_customize) {

	$section = 'uri_department_department_options';
	$panel = 'uri_department_department';

	$wp_customize->add_section($section, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'URI Department',
    'description'    => '',
	));

	$wp_customize->add_panel($panel, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'URI Department',
    'description'    => '',
	));


	$wp_customize->add_panel($section, array(
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Contact Information',
    'description'    => '',
	));

	$elements = array();
	$elements[] = array(
		'name' => 'uri_department_department_foo',
		'options' => array(),
		'control' => array(
			'label'    => __( 'FOO', 'uri-department' ),
			'section'  => 'uri_department_department_contact',
		)
	);

	foreach($elements as $el) {
		uri_department_add_customizer_element( $wp_customize, $el['name'], $el['options'], $el['control'] );
	}



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



function foo() {

	$options = array();

	$options[] = array(
		'name' => 'Basic Options',
		'type' => 'heading'
	);
    
    $options[] = array(
        'name' => 'Skin',
        'desc' => 'Choose a skin for the theme.',
        'id' => 'urid_skin',
        'std' => 'legacy',
        'type' => 'radio',
        'options' => $skin_choices
    );

	$options[] = array(
		'name' => 'Site Identifier',
		'desc' => 'Upload an image 190px wide by 90px high.',
		'id' => 'urid_ident',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => 'Identifier Custom Alt Text',
		'desc' => 'Describe the image shown in the identifier icon and note that it links to the department homepage',
		'id' => 'urid_altcus',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Department Address',
		'desc' => 'The address to the main office, if it exists',
		'id' => 'urid_address',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Department Email Address',
		'desc' => 'The main contact email for the department',
		'id' => 'urid_email',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Department Phone Number',
		'desc' => 'The main contact number (office number) for the department',
		'id' => 'urid_phone',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Social Media',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => 'Twitter Username',
		'desc' => 'If you have a Twitter account, enter your user name here.',
		'id' => 'urid_tweet',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Instagram URL',
		'desc' => 'If you have an Instagram account, enter your full profile url here including http',
		'id' => 'urid_instagram',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Facebook URL',
		'desc' => 'If you have a Facebook account, enter your full profile url here including http',
		'id' => 'urid_facebook',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'LinkedIn URL',
		'desc' => 'If you have a LinkedIn account, enter your full profile url here including http',
		'id' => 'urid_linkedin',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Youtube Channel URL',
		'desc' => 'If you have a Youtube account, enter your full channel url here including http',
		'id' => 'urid_youtube',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Google+ URL',
		'desc' => 'If you have a Google+ account, enter your full profile url here including http',
		'id' => 'urid_google',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Homepage Setup',
		'type' => "heading"
	);

	$options[] = array(
		'name' => 'Top Content',
		'desc' => 'Top content teaser. The lower content portion under the slider will come from the post body of the page. For content above, please use this box.',
		'id' => 'urid_pagecontent',
		'std' => '',
		'type' => "editor"
	);

	$options[] = array(
		'name' => 'Featured Links',
		'desc' => 'Place links here for big yellow button links. Wrap links in appropriate link tags. Note that classes are automatically applied.',
		'id' => 'urid_yellowlinks',
		'std' => '',
		'type' => "textarea"
	);

	$options[] = array(
		'name' => 'Spotlight Tagline Text',
		'desc' => 'Change the title for the spotlight box on the department homepage',
		'id' => 'urid_tagtitle',
		'std' => '',
		'type' => 'text'
	);

	$options[] = array(
		'name' => 'Alert',
		'type' => "heading"
	);

	$options[] = array(
		'name' => __('Alert location', 'options_framework_theme'),
		'desc' => __('Select the location for the alert system', 'options_framework_theme'),
		'id' => 'urid_alertspot',
		'std' => 'everywhere',
		'type' => 'radio',
		'options' => $test_array
	);

	$options[] = array(
		'name' => 'Department Alert',
		'desc' => 'Create an alert for display on this department only. Leaving this blank will disable the alert area.',
		'id' => 'urid_sitealert',
		'std' => '',
		'type' => 'editor'
	);

	$options[] = array(
		'name' => 'Advanced Settings',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => 'Select a language',
		'desc' => 'Select the language for this site',
		'id' => 'urid_lang',
		'type' => 'select',
		'std' => 'en',
		'options' => $options_langs
	);

	$options[] = array(
		'name' => 'Disable Page Headlines',
		'desc' => 'By default, the page title displays on your page as the page\'s first headline. To suppress this by default, click this box. (You can still override this on a page-by-page basis.)',
		'id' => 'urid_pageover',
		'type' => 'checkbox',
		'std' => '0'
	);

	$options[] = array(
		'name' => 'Inline Custom CSS',
		'desc' => 'Insert inline css here. Will be included throughout this department site.',
		'id' => 'urid_cssinline',
		'std' => '',
		'type' => 'textarea'
	); 

	$options[] = array(
		'name' => '@Import Custom CSS',
		'desc' => 'Insert an absolute link to an external css file which will be imported into the current design.',
		'id' => 'urid_css',
		'std' => '',
		'type' => 'text'
	); 

	$options[] = array(
		'name' => 'Inline Custom JS',
		'desc' => 'Insert inline javascript here. Will be included throughout this department site. (content entered here will be placed within a SCRIPT element)',
		'id' => 'urid_jsinline',
		'std' => '',
		'type' => "textarea"
	); 

	$options[] = array( 'name' => 'Left Sidebar Custom',
		'desc' => 'Custom area for things under the left nav menu. Please do not use php here or IDs for DIVs, as Wordpress will strip out these tags.',
		'id' => 'urid_html',
		'std' => '',
		'type' => 'textarea'
	);

	return $options;
}

