<?php
	// <!-- the alert system for departments -->
	if ((of_get_option('urid_sitealert') == true) && (of_get_option('urid_alertspot') == 'everywhere')) {
		$contentoutput = of_get_option('urid_sitealert');
		apply_filters('the_content', $contentoutput);
		print '<div class="depalert">' . wpautop($contentoutput) . '</div>';
}
