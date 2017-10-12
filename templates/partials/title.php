<?php
	$onoroff = get_field('pagetitle');
	if (of_get_option('urid_pageover') == true && !isset($onoroff)) {
	} else {
		if (get_field('pagetitle') == true) {
		} else {
			$the_title = get_the_archive_title();
			?>
			<div class="title">
				<h1><?php echo str_replace('Category: ', '', $the_title); ?></h1>
			</div>
			<?php
		}
	}
?>
