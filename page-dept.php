<?php
/**
 * Template Name: Department Home
 */
?>

<?php
	get_header();
	get_template_part( 'sidebar1' );
?>
<div class="grid-11">
	<div id="content_start" style="display : none ; "></div>
	<div class="subspace">
		<div class="subcol" style="padding-left: 0px; border-left: 0px;">
			<?php
				get_template_part( 'templates/partials/alert' );
			?>
			<div class="subl1"><!-- layer one, full width -->
				<?php
					get_template_part( 'templates/partials/title' );
				?>
				<?php if (of_get_option('urid_pagecontent') == true) : ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry">
						 <?php
							$contentoutput = of_get_option('urid_pagecontent');
							apply_filters('the_content', $contentoutput);
							echo wpautop($contentoutput);
						 ?>
						</div>
					</div>
				<?php endif; ?>
		</div><!-- end .subl1 -->
	</div><!-- end .subcol -->

	<div class="subl2"><!-- layer two, full width -->
		<div class="subl2left"><!-- now split it to 70 25 -->

			<?php query_posts('post_type=slideshow&posts_per_page=9999'); ?>
	
			<?php if (have_posts()) : ?>
				<?php
					remove_filter ('the_content', 'wpautop');
					remove_filter ('the_excerpt', 'wpautop');
				?>

				<div class="slideshow">
					<div class="flexslider deptslide">
						<ul class="slides">
						<?php while (have_posts()) : the_post(); ?> 
							<li>
								<?php the_content(); ?>
								<div class="slidecaption">
									<h3><?php the_title(); ?></h3>
									<p><?php the_excerpt(); ?></p>
								</div>
							</li>
						<?php endwhile; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>

			<?php
				wp_reset_query();
				add_filter ('the_content', 'wpautop');
				add_filter ('the_excerpt', 'wpautop');
			?>

			<?php
				if (have_posts()) : while (have_posts()) : the_post(); 
				$tagline = get_post_meta($post->ID, 'tagline', $single = true);
				$side = get_post_meta($post->ID, 'side', $single = true);
			?>

			<!-- regular content -->
			<div class="subcol" style="padding-left: 0px; border-left: 0px;">
				<div class="post">
					<div class="entry">
						<?php the_content(); ?>
					</div>
				</div>
			</div>

			<?php endwhile; endif; ?>
			<?php wp_reset_query(); ?> 

			<!-- back to normal -->
			<?php remove_filter ('the_excerpt', 'wpautop'); ?>
	
			<?php query_posts('post_type=spotlight&posts_per_page=3'); ?>
	
			<?php if (have_posts()) : ?>  
				<div class="rpwidget">
					<h2 id="meet_head"><?php echo of_get_option('urid_tagtitle'); ?></h2>
					<?php while (have_posts()) : the_post(); ?>
					<div class="image_container">
						<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
						<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
						<?php the_content(); ?>
						<p class="more"><a href="<?php the_excerpt(); ?>">More</a></p>
					</div>
					<?php endwhile; ?>
				</div>
				<div style="clear:both;"></div>
			<?php endif; ?>
		<?php wp_reset_query(); ?> 

		</div><!-- end left column subl2left -->

		<div class="subl2right">
			<?php if (of_get_option('urid_yellowlinks') == true) : ?>
				<div class="buttoncol">
					<?php echo of_get_option('urid_yellowlinks'); ?>
				</div>
			<?php endif; ?>
			
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage')) {} ?>
			<div style="clear:both;"></div>
		</div><!-- end subl2right -->

		<div style="clear:both;"></div>
	</div><!-- end subl2 -->

</div><!-- end subspace -->
</div><!-- end grid-11 -->

<?php get_footer(); ?>