<?php
	get_header();
	include (STYLESHEETPATH . '/sidebar1.php');
?>


<div class="grid-11">
	<div class="subcol">
		<div id="content_start" style="display : none ; "></div>

		<!-- the alert system for departments -->
		<?php if ((of_get_option('urid_sitealert') == true) && (of_get_option('urid_alertspot') == 'everywhere')) { ?>
		<div class="depalert"><?php $contentoutput = of_get_option('urid_sitealert'); apply_filters('the_content', $contentoutput); echo wpautop($contentoutput); ?></div>
		<?php } ?>
		<!-- end alerts -->

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

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

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php
					the_content('<p class="serif">Read the rest of this page &raquo;</p>');
					wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
				?>
				<div class="taglist"><p><?php the_tags(); ?></p></div>
			</div>
		</div>

		<?php 
			if (get_site_option('uri_comments') ) {
				comments_template();
			}
		?>

		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>