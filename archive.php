<?php get_header(); ?>


<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-11">

<div class="subcol">

<div id="content_start" style="display : none ; "></div>

<!-- the alert system for departments -->
<?php if ((of_get_option('urid_sitealert') == true) && (of_get_option('urid_alertspot') == 'everywhere')) { ?>
<div class="depalert"><?php $contentoutput = of_get_option('urid_sitealert'); apply_filters('the_content', $contentoutput); echo wpautop($contentoutput); ?></div>
<?php } ?>
<!-- end alerts -->

<div class="title">

<h1>
<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php single_cat_title(); ?> 
						<?php endif; ?>
</h1>

</div>

<div id="ba">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
<div class="archiveitem">

<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
<?php } else { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
<?php } ?>

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