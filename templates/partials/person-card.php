<?php

	// put together a string of miscellaneous custom fields
	$misc = array();
	
	if(get_field('peoplephone')) {
		$misc[] = '<span class="p-tel">' . get_field('peoplephone') . '</span>';
	}
	if(get_field('peopleemail')) {
		$misc[] = '<a href="mailto:' . get_field('peopleemail') . '" class="u-email">' . get_field('peopleemail') . '</a>';
	}
	
	$misc = implode( ' &ndash; ', $misc );
	
?><div class="peopleitem h-card">
	<div class="header">
		<h3 class="p-name"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
	</div>
	<div class="inside">
		<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink() ?>"><?php the_post_thumbnail('people-thumb', array( 'class' => 'u-photo' )); ?></a>
		<?php else : ?>
		<a href="<?php the_permalink() ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
		<?php endif; ?>

		<p><?php the_field('peopletitle'); ?></p>
		
		<p class="people-department"><?php the_field('peopledepartment'); ?></p>

		<?php if(!empty( $misc )): ?>
			<p><?php print $misc ?></p>
		<?php endif; ?>

		<div style="clear:both;"></div>
	</div>
</div>
