<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-10">
	<div class="two">
		<div class="deptbody">
			<div id="content_start" style="display : none ; "></div>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('mainbody') ) {} ?>
		</div>
	</div>
</div>

<?php
	get_template_part( 'sidebarpage' );
	get_footer();
?>