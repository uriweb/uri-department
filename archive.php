<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-11">
	<div class="subcol">
		<div id="content_start" style="display : none ; "></div>

		<?php
			get_template_part( 'templates/partials/alert' );
			get_template_part( 'templates/partials/title' );
		?>

		<div id="ba">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="archiveitem">
					<?php if ( has_post_thumbnail() ) : ?>
					<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
					<?php else: ?>
					<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
					<?php endif; ?>

					<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
					<p style="margin-top: 10px;"><?php the_tags(); ?></p>
					<div style="clear:both;"></div>
				</div>

			<?php endwhile; endif; ?>

		</div>

		<div class="pagelinks">
			<?php previous_posts_link('« Newer Entries', '0') ?>
			<span class="right"><?php next_posts_link('Older Entries »', 0); ?></span>
		</div>
		
	</div>
</div> <!-- end grid 11 -->

<?php get_footer(); ?>