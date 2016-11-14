<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-9">
	<div class="two">
		<div id="content_start" style="display : none ; "></div>
		<?php
			get_template_part( 'templates/partials/alert' );		?>
		<?php
			if (have_posts()) : while (have_posts()) : the_post();
			$tagline = get_post_meta($post->ID, 'tagline', $single = true);
			$side = get_post_meta($post->ID, 'side', $single = true);
		?>

		<?php
			get_template_part( 'templates/partials/title' );
		?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</div>
	
		<?php
			if (get_site_option('uri_comments') ) {
				comments_template();
			}
		?>
	
		<!-- Loop originally ended here. Moving it so custom fields can be used in the right sidebar -->

	</div><!-- /end two column -->
</div><!-- /end this middle column -->

<?php
	get_template_part( 'sidebar2' );
?>
<?php endwhile; endif; ?>
<!-- Above line ends the loop. Calls in Sidebar2 where the call to the custom field "side" will be made -->

<?php get_footer(); ?>