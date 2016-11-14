<?php
/**
 Template Name: Why
*/
?>

<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-11">
	<div class="two" style="padding-right;0px;border-right:none;">
		<div id="content_start" style="display : none ; "></div>
			<?php
				get_template_part( 'templates/partials/alert' );			?>

			<?php
				if (have_posts()) : while (have_posts()) : the_post();
				$tagline = get_post_meta($post->ID, 'tagline', $single = true);
				$side = get_post_meta($post->ID, 'side', $single = true);
			?>

			<?php
				get_template_part( 'templates/partials/title' );
			?>

			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="entry">
					<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
					<?php endwhile; endif; ?>

					<?php query_posts('post_type=why&posts_per_page=9999'); ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="archiveitem">
							<div class="postpic"><?php the_post_thumbnail(); ?></div>
							<div class="bc">
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
							</div>
							<div style="clear: both;"></div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_query(); ?>

			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>