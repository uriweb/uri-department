<div class="peopleitem<?php if ($i % 2 == 0) { ?> endperson<?php } ?>">
	<div class="header">
		<h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	</div>
	<div class="inside">
		<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
		<?php else : ?>
		<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
		<?php endif; ?>

		<p><?php the_field('peopletitle'); ?></p>

		<p style="font-size:1em;font-weight:bold;color:#555;font-style:italic;"><?php the_field('peopledepartment'); ?></p>

		<p><?php if(get_field('peoplephone')) { ?><?php the_field('peoplephone'); ?><?php } ?><?php if(get_field('peoplephone') && get_field('peopleemail')) { ?> &ndash; <?php } ?><?php if(get_field('peopleemail')) { ?><a href="mailto:<?php the_field('peopleemail'); ?>"><?php the_field('peopleemail'); ?></a><?php } ?></p>

		<div style="clear:both;"></div>
	</div>
</div>
<?php if ($i % 2 == 0) : ?>
	<div style="clear:both;"></div>
	<div class="gapspacer"></div>
<?php endif; ?>
