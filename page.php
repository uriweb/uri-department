<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-9">

<div class="two">

<div id="content_start" style="display : none ; "></div>

<!-- the alert system for departments -->
<?php if ((of_get_option('urid_sitealert') == true) && (of_get_option('urid_alertspot') == 'everywhere') || (of_get_option('urid_sitealert') == true) && is_front_page()) { ?>
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



<?php if (get_site_option('uri_comments') ) { ?>  



<?php comments_template(); ?>



<?php } ?>



<!-- Loop originally ended here. Moving it so custom fields can be used in the right sidebar -->



</div><!-- /end two column -->

</div><!-- /end this middle column -->





<?php include (STYLESHEETPATH . '/sidebar2.php'); ?>



<?php endwhile; endif; ?>



<!-- Above line ends the loop. Calls in Sidebar2 where the call to the custom field "side" will be made -->



<?php get_footer(); ?>