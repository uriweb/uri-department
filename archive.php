<?php
/**
 * Template Name: Archive (not sure where this is used)
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
			get_template_part( 'templates/partials/title' );
		?>

		<div id="ba">

			<?php
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