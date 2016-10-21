<?php get_header(); ?>

<?php include (STYLESHEETPATH . '/sidebar1.php'); ?>

<div class="grid-10">
	<div class="two">
		<div class="deptbody">
			<div id="content_start" style="display : none ; "></div>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('mainbody') ) {} ?>
		</div>
	</div>
</div>

<?php include (STYLESHEETPATH . '/sidebarpage.php'); ?>

<?php get_footer(); ?>