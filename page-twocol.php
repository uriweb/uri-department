<?php
/** 
 * Template Name: Two Column
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

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
		<?php endwhile; endif; ?>

	</div>
</div>

<?php get_footer(); ?>