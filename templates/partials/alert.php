<?php
	$alert_message = get_option('uri_department_notice_text');
	$alert_show_on_all_pages = get_option('uri_department_notice_show_on_all_pages');
	
	if( ( is_front_page() || $alert_show_on_all_pages === '1' ) ) {
		$alert_type = get_option('uri_department_notice_type');
	} else {
		$alert_type = 'hidden';
	}

?>
<div class="<?php print $alert_type; ?>" id="dept-notice">
<?php

	// 2017-05-05 jp new alert system built in the customizer
	if ( ! empty( $alert_message ) ) {
				
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
