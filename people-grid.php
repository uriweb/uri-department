<?php
/*
Template Name: People
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

<?php endwhile; endif; ?>

<?php wp_reset_query(); ?>

<?php global $wp_query; $postid = $wp_query->post->ID; $peoplesort = get_post_meta($post->ID, 'peoplesort', $single = true); $peoplecat = get_post_meta($post->ID, 'peoplecat', $single = true); ?>

<?php if(get_field('peoplesort') == 1) { ?>

<?php add_filter('post_limits', 'your_query_limit');
function your_query_limit($limit){
    return "LIMIT 9999";
}
?>
<?php $terms = get_terms("peoplegroups");
$count = count($terms);
if ( $count > 0 ){
    foreach ( $terms as $term ) {
        echo '<h2 class="peopleterm">' . $term->name . '</h2>';
        echo '<div class="peoplesector">';
        $loop = new WP_Query( array( 
            'post_type' => 'people',
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'peoplegroups',
                    'field' => 'id',
                    'terms' => $term->term_id
                )
            )
        ));
?>

    <?php $i = 0; // Create a new (incrementing) var ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php $i++; // Increase count ?>

<div class="peopleitem<?php if ($i % 2 == 0) { ?> endperson<?php } ?>">
<div class="header"><h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div>
<div class="inside">
<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
<?php } else { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
<?php } ?>

<p><?php the_field('peopletitle'); ?></p>

<p style="font-size:1em;font-weight:bold;color:#555;font-style:italic;"><?php the_field('peopledepartment'); ?></p>

<p><?php if(get_field('peoplephone')) { ?><?php the_field('peoplephone'); ?><?php } ?><?php if(get_field('peoplephone') && get_field('peopleemail')) { ?> &ndash; <?php } ?><?php if(get_field('peopleemail')) { ?><a href="mailto:<?php the_field('peopleemail'); ?>"><?php the_field('peopleemail'); ?></a><?php } ?></p>

<div style="clear:both;"></div>
</div>
</div>

<?php if ($i % 2 == 0) { ?>
<div style="clear:both;"></div>
<div class="gapspacer"></div>
<?php } ?>

<?php endwhile; ?>
<div style="clear:both;"></div>
</div><!-- end people sector -->
<div style="clear:both;"></div>
<?php wp_reset_postdata(); } } ?>
<?php remove_filter('post_limits', 'your_query_limit'); ?>

<?php } else if(!(get_field('peoplecat') == NULL)) { ?><!-- if a specific person group or groups is defined -->

<?php add_filter('post_limits', 'your_query_limit');
function your_query_limit($limit){
    return "LIMIT 9999";
}
?>
<?php $sortstuff = explode(" ", $peoplecat); foreach($sortstuff as $solocat) { ?>
<?php $terms = get_terms( 'peoplegroups', 'hide_empty=1&slug='.$solocat.'' );
$count = count($terms);
if ( $count > 0 ){
    foreach ( $terms as $term ) {
        echo '<h2 class="peopleterm">' . $term->name . '</h2>';
        echo '<div class="peoplesector">';
        $loop = new WP_Query( array( 
            'post_type' => 'people',
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'peoplegroups',
                    'field' => 'id',
                    'terms' => $term->term_id
                )
            )
        ));
?>

 <?php $i = 0; // Create a new (incrementing) var ?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php $i++; // Increase count ?>

<div class="peopleitem<?php if ($i % 2 == 0) { ?> endperson<?php } ?>">
<div class="header"><h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div>
<div class="inside">
<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
<?php } else { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
<?php } ?>

<p><?php the_field('peopletitle'); ?></p>

<p style="font-size:1em;font-weight:bold;color:#555;font-style:italic;"><?php the_field('peopledepartment'); ?></p>

<p><?php if(get_field('peoplephone')) { ?><?php the_field('peoplephone'); ?><?php } ?><?php if(get_field('peoplephone') && get_field('peopleemail')) { ?> &ndash; <?php } ?><?php if(get_field('peopleemail')) { ?><a href="mailto:<?php the_field('peopleemail'); ?>"><?php the_field('peopleemail'); ?></a><?php } ?></p>

<div style="clear:both;"></div>
</div>
</div>

<?php if ($i % 2 == 0) { ?>
<div style="clear:both;"></div>
<div class="gapspacer"></div>
<?php } ?>

<?php endwhile; ?>
<div style="clear:both;"></div>
</div><!-- end people sector -->
<div style="clear:both;"></div>
<?php wp_reset_postdata(); } } ?>

<?php unset($solocat); ?>
<?php } ?>

<?php remove_filter('post_limits', 'your_query_limit'); ?>

<?php } else { ?><!-- if no category is defined or people aren't sorted -->

<?php query_posts('post_type=people&posts_per_page=9999'); ?>
<?php while (have_posts()) : the_post(); ?>

<?php $i++; // Increase count ?>

<div class="peopleitem<?php if ($i % 2 == 0) { ?> endperson<?php } ?>">
<div class="header"><h3><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3></div>
<div class="inside">
<?php if ( has_post_thumbnail() ) { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_post_thumbnail('people-thumb'); ?></a>
<?php } else { ?>
<a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/defaultsmall.gif" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
<?php } ?>

<p><?php the_field('peopletitle'); ?></p>

<p style="font-size:1em;font-weight:bold;color:#555;font-style:italic;"><?php the_field('peopledepartment'); ?></p>

<p><?php if(get_field('peoplephone')) { ?><?php the_field('peoplephone'); ?><?php } ?><?php if(get_field('peoplephone') && get_field('peopleemail')) { ?> &ndash; <?php } ?><?php if(get_field('peopleemail')) { ?><a href="mailto:<?php the_field('peopleemail'); ?>"><?php the_field('peopleemail'); ?></a><?php } ?></p>

<div style="clear:both;"></div>
</div>
</div>

<?php if ($i % 2 == 0) { ?>
<div style="clear:both;"></div>
<div class="gapspacer"></div>
<?php } ?>

<?php endwhile; ?>

<?php wp_reset_query(); ?>

<?php } ?><!-- end if else statement for determining post loop -->

</div><!-- end subcol -->

</div> <!-- end grid 11 -->

<?php get_footer(); ?>