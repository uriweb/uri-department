<div class="archiveitem-modern">

	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
	<?php } else { ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/default/uri80.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
	<?php } ?>

	<h2><?php the_title(); ?></h2>

	<?php the_excerpt(); ?>

	<p style="margin-top: 10px;"><?php the_tags(); ?></p>
    
    <a class="button" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">Learn more</a>

</div>
