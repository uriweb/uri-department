<div class="grid-4 three">

<?php 
global $wp_query;
$postid = $wp_query->post->ID;
echo get_post_meta($postid, 'side', true);
?>


<ul>


<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('mainsidebar') ) : else : ?>



<?php endif; ?>


</ul>


</div>