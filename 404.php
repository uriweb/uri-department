<?php

	get_header();

	global $blog_id;
	if($blog_id != 1) { // this is apparently old code from a multisite install -- jp 2016-11-14
		get_template_part( 'sidebar1' );
	} else {
		include (TEMPLATEPATH . '/sidebar-singleleft.php');
	}
?>

<div class="grid-11">
	<div class="subcol">
		<div class="title">
			<h1>404 &mdash; This page does not exist </h1>
			<span class="tagline">Let's help you find what you were looking for.</span>
		</div>

		<div class="post">
			<div class="entry">
				<p>The page you were looking for is not available. This could be for a number of reasons.</p>
			</div>
		</div>
	</div>
</div><!-- grid11 -->

<?php get_footer(); ?>