<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */
 
function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces or hyphens)
	
	$themeinfo = wp_get_theme();
	$themename = preg_replace("/\W|-/", "", strtolower($themeinfo->Name) );

	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
	// echo $themename;
}


/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 */

function optionsframework_options() {
	// Homepage Data
	$test_array = array(
		'everywhere' => 'On all pages',
		'homeonly' => 'Only on the homepage'
	);
    
    // Skin Choices
	$skin_choices = array(
		'legacy' => 'Legacy'
    );
    
	// Language Data
	$options_langs = array(
		'en' => 'English',
		'es' => 'Spanish',
		'fr' => 'French',
		'it' => 'Italian',
		'pt' => 'Portuguese',
		'de' => 'German',
		'ru' => 'Russian'
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => 'French Toast',
		'two' => 'Pancake',
		'three' => 'Omelette',
		'four' => 'Crepe',
		'five' => 'Waffle'
	);

	// Multicheck Defaults
	// five => 1 seems like an odd choice
	$multicheck_defaults = array(
		'one' => 1,
		'five' => 1
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll'
	);

	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

/** HOMEPAGE OPTIONS **/


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


/** ADVANCED SETTING OPTIONS **/

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



/** BASIC OPTIONS **/

	$options[] = array(
		'name' => 'Basic Options (DEPRECATED)',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => 'Please Note: This Basic Options panel is going away.',
		'desc' => __('Site options have been moved to the Customize menu at the top of the front page.', 'options_framework_theme'),
		'type' => 'info',
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
	

/** SOCIAL MEDIA OPTIONS **/


	$options[] = array(
		'name' => 'Social Media (DEPRECATED)',
		'type' => 'heading'
	);

	$options[] = array(
		'name' => 'Please Note: This Social Media panel is going away.',
		'desc' => __('Social Media options have been moved to the Customize menu at the top of the front page.', 'options_framework_theme'),
		'type' => 'info',
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


/** ALERT OPTIONS **/


	$options[] = array(
		'name' => 'Alert (DEPRECATED)',
		'type' => "heading",
	);
	$options[] = array(
		'name' => 'Please Note: The Alert panel is going away.',
		'desc' => __('Alert options have been moved to the Customize menu at the top of the front page.', 'options_framework_theme'),
		'type' => 'info',
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



	return $options;
}