<div class="<?php print get_option('uri_department_notice_type'); ?>" id="dept-notice">
<?php

	// 2017-05-05 jp new alert system built in the customizer
	$alert_message = get_option('uri_department_notice_text');
	if ( ! empty( $alert_message ) ) {
		$alert_show_on_all_pages = get_option('uri_department_notice_show_on_all_pages');
				
		if( is_front_page() ) {
			// always show on front page
			print $alert_message;
		} else {
			// conditionally show on subpages
			if ( $alert_show_on_all_pages === '1' ) {
				print $alert_message;
			}
		}
	}

	// legacy alert system
	if (of_get_option('urid_sitealert') == true) {
		$contentoutput = of_get_option('urid_sitealert');
		apply_filters('the_content', $contentoutput);
		print '<div class="depalert">' . wpautop($contentoutput) . '</div>';
	}

?>
</div>
