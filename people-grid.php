<?php
/**
 * Template Name: People
 */
?>

<?php get_header(); ?>
<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-11">
	<div class="subcol">
	<div id="content_start" style="display : none ; "></div>
		<?php
			include (STYLESHEETPATH . '/inc/alert.php');
		?>

		<?php
			if (have_posts()) : while (have_posts()) : the_post();
			$tagline = get_post_meta($post->ID, 'tagline', $single = true);
			$side = get_post_meta($post->ID, 'side', $single = true);
		?>

		<?php
			include (STYLESHEETPATH . '/inc/title.php');
		?>

	<div class="post" id="post-<?php the_ID(); ?>">
		<div class="entry">
			<?php
				the_content('<p class="serif">Read the rest of this page &raquo;</p>');
				wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
			?>
		</div>
	</div>
	<?php endwhile; endif; ?>

<?php 
	wp_reset_query();
	
	global $wp_query;
	$postid = $wp_query->post->ID;
	$peoplesort = get_post_meta($post->ID, 'peoplesort', $single = true);
	$peoplecat = get_post_meta($post->ID, 'peoplecat', $single = true);
?>

<?php if(get_field('peoplesort') == 1) { ?>

<?php
function your_query_limit($limit){
	return "LIMIT 9999";
}
add_filter('post_limits', 'your_query_limit');
?>

<?php
	$terms = get_terms("peoplegroups");
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

			<?php
				get_template_part( 'templates/partials/person', 'card' );
			?>


<?php if ($i % 2 == 0) : ?>
	<div style="clear:both;"></div>
	<div class="gapspacer"></div>
<?php endif; ?>

<?php endwhile; ?>
<div style="clear:both;"></div>
</div><!-- end people sector -->
<div style="clear:both;"></div>
<?php
			wp_reset_postdata();
		}
	}
	remove_filter('post_limits', 'your_query_limit');

} else if(!(get_field('peoplecat') == NULL)) { // if a specific person group or groups is defined

	function your_query_limit($limit){
		return "LIMIT 9999";
	}
	add_filter('post_limits', 'your_query_limit');
?>
<?php
	$sortstuff = explode(" ", $peoplecat);
	foreach($sortstuff as $solocat):
?>
<?php $terms = get_terms( 'peoplegroups', 'hide_empty=1&slug=' . $solocat );
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

			<?php
				get_template_part( 'templates/partials/person', 'card' );
			?>

			<?php if ($i % 2 == 0) : ?>
			<div style="clear:both;"></div>
			<div class="gapspacer"></div>
			<?php endif; ?>

		<?php endwhile; ?>
<div style="clear:both;"></div>
</div><!-- end people sector -->
<div style="clear:both;"></div>
<?php wp_reset_postdata(); } } ?>

<?php
	unset($solocat);
	endforeach;
?>

<?php remove_filter('post_limits', 'your_query_limit'); ?>

<?php } else { ?><!-- if no category is defined or people aren't sorted -->

<?php

		$args = array(
			'meta_query' => array(
				'relation' => 'AND',
				array(
					'key' => 'sortname',
					'compare' => 'EXISTS'
				),
				array(
					'key' => 'sortname',
					'compare' => '!=',
					'value' => ''
				),
			),
			'orderby' => array( 'meta_value' => 'ASC', 'publication_date' => 'DESC' ),
		);
		uri_department_get_people($args);

		$args = array(
			'meta_query' => array(
				'relation' => 'OR',
				array(
					'key' => 'sortname',
					'compare' => 'NOT EXISTS'
				),
				array(
					'key' => 'sortname',
					'compare' => '=',
					'value' => ''
				),
			),
			'orderby' => array('publication_date' => 'DESC' ),
		);
		uri_department_get_people($args);
	?>
<div style="clear:both;"></div>
<div class="gapspacer"></div>

<?php } ?><!-- end if else statement for determining post loop -->
</div><!-- end subcol -->
</div> <!-- end grid 11 -->

<?php get_footer(); ?>