<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-9">
	<div class="subcol" style="padding-right: 24px; border-right: 1px solid #ccc;">
		<div id="content_start" style="display : none ; "></div>
			<?php
				get_template_part( 'templates/partials/alert' );			?>
		<div class="title">
			<h1>
				<?php
					if ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'uri-department' ), '<span>' . get_the_date() . '</span>' );
					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'uri-department' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'uri-department' ) ) . '</span>' );
					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'uri-department' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'uri-department' ) ) . '</span>' );
					} else {
						single_cat_title();
					}
				?>
			</h1>
		</div>

		<div id="ba">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="archiveitem">

					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
					<?php else: ?>
						<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/default/uri80.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
					<?php endif; ?>

					<h2><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt_reloaded('30','...','<em>','plain','no'); ?>
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

<?php
	get_template_part( 'sidebar2' );
?>

<?php get_footer(); ?>