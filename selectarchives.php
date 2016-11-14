<?php
/**
 * Template Name: Select Archives
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
		?>
		
		<?php
			if (have_posts()) :
				while (have_posts()) :
					the_post();
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
		
		<?php
			endwhile;
			endif;
			// end the main page content loop, now begin the query posts for the category
		?>

		<hr />

		<div id="ba">
			<?php
				// Query posts and list them
				global $wp_query;
				$postid = $wp_query->post->ID;
				$customcat = get_post_meta($post->ID, 'customcat', $single = true);
				$tempPagnation = get_query_var('paged');
				query_posts('category_name=' . $customcat . '&posts_per_page=10&paged='.$tempPagnation);

				if (have_posts()) {
					while (have_posts()) {
						the_post();
						get_template_part( 'templates/partials/post', 'archive' );
					}
				}
			?>
		</div>

		<div class="pagelinks">
			<?php previous_posts_link('« Newer Entries', '0') ?>
			<span class="right"><?php next_posts_link('Older Entries »', 0); ?></span>
		</div>

	</div>

</div> <!-- end grid 11 -->

<?php get_footer(); ?>