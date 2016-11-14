<?php
/**
 * Template Name: Two Column Widgetized
 */
?>

<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-11">
	<div class="subcol">
		<div id="content_start" style="display : none ; "></div>

		<?php
			get_template_part( 'templates/partials/alert' );
			if (have_posts()) : while (have_posts()) : the_post();
			$tagline = get_post_meta($post->ID, 'tagline', $single = true);
			$side = get_post_meta($post->ID, 'side', $single = true);

			get_template_part( 'templates/partials/title' );

		?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<div class="entry">
				<?php
					the_content('<p class="serif">Read the rest of this page &raquo;</p>');
					wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
				?>
			</div>
		</div>

		<?php endwhile; endif; ?> <!-- end the main page content loop, now begin the query posts for the category -->

		<hr />

		<!-- add wiget area here -->
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Body Content Widget')) {} ?>
		<!-- end widget -->

	</div>
</div> <!-- end grid 11 -->

<?php get_footer(); ?>