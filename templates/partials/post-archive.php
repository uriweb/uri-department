<div class="archiveitem">

	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
	<?php } else { ?>
		<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
	<?php } ?>

	<h2><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

	<?php the_excerpt(); ?>

	<p style="margin-top: 10px;"><?php the_tags(); ?></p>

	<div style="clear:both;"></div>

</div>
