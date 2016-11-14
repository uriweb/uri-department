<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-11">
	<div class="subcol">
		<div id="content_start" style="display : none ; "></div>

		<?php
			get_template_part( 'templates/partials/alert' );		?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php
			get_template_part( 'templates/partials/title' );
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