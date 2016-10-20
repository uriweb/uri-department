<?php

/*

Template Name: Custom News

*/

?>

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

<?php if (have_posts()) : while (have_posts()) : the_post(); $tagline = get_post_meta($post->ID, 'tagline', $single = true); $side = get_post_meta($post->ID, 'side', $single = true); ?>

<?php $onoroff = get_field('pagetitle'); if (of_get_option('urid_pageover') == true && !isset($onoroff)) { ?>
<?php } else { ?>
<?php if (get_field('pagetitle') == true) { ?>
<?php } else { ?>
<div class="title">
<h1><?php the_title(); ?></h1>
</div>
<?php } ?>
<?php } ?>

<div class="post" id="post-<?php the_ID(); ?>">

  <div class="entry">

    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

  </div>

</div>

<?php endwhile; endif; ?> <!-- end the main page content loop, now begin the query posts for the category -->

<!-- Query posts and list them -->

<hr />

<div id="ba">

<?php global $wp_query; $postid = $wp_query->post->ID; $customcat = get_post_meta($post->ID, 'customcat', $single = true); ?>

<?php $tempPagnation = get_query_var('paged'); ?>

<?php query_posts('category_name=news&posts_per_page=10&paged='.$tempPagnation); ?>

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