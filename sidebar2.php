<div class="grid-2 three">

<?php 
	global $wp_query;
	$postid = $wp_query->post->ID;
	echo get_post_meta($postid, 'side', true);
?>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('mainsidebar') ) {} ?>

</div>