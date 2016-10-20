<div class="three">

<h3>Graduate Programs</h3>
<p>The University of Rhode Island offers over 20 graduate programs that can be completed on both a part-time and full time basis. The list of graduate programs can be seen below.</p>

<?php remove_filter ('the_content', 'wpautop'); ?>

  <?php
$args=array(
  'programs' => 'graduate',
  'post_type' => 'academics',
  'posts_per_page' => 9999,
  'order' => 'ASC',
  'caller_get_posts'=> 1
);
$my_query = null;
$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
  while ($my_query->have_posts()) : $my_query->the_post(); ?>
    <li><a href="<?php the_content(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
    <?php
  endwhile;
}
wp_reset_query();  // Restore global post data stomped by the_post().
?>

</div>
