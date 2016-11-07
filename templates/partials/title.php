<?php
	$onoroff = get_field('pagetitle');
	if (of_get_option('urid_pageover') == true && !isset($onoroff)) {
	} else {
		if (get_field('pagetitle') == true) {
		} else {
			?>
			<div class="title">
				<h1><?php the_title(); ?></h1>
			</div>
			<?php
		}
	}
?>
