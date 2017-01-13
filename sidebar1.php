<div class="grid-2 one">
	<div class="expandnav">
		<span class="toggleall">
			<a href="#" class="opensb">Show Page Navigation <img src="<?php echo get_template_directory_uri(); ?>/images/opennav.png" alt="Show nav" /></a><a class="closesb" style="display: none;" href="#">Hide Page Navigation <img src="<?php echo get_template_directory_uri(); ?>/images/closenav.png" alt="Hide nav" /></a>
		</span>
		</div><!-- end expandnav hidden menu -->

		<div id="sbnav">
			<?php wp_nav_menu(array('theme_location' => 'department')); ?>
			<!-- break up the navigation if you want into multiple menus. use  the custom menu widget to select them. You can also use this for anything else -->
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Left Column')) {} ?>
			<!-- end custom menus -->
		</div><!-- end sbnav -->

		<div class="socialize">
			<?php if (of_get_option('urid_tweet') == true) { ?><a href="http://www.twitter.com/<?php echo of_get_option('urid_tweet'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/twitter.png" alt="Twitter" /></a><?php } ?>
			<?php if (of_get_option('urid_instagram') == true) { ?><a href="<?php echo of_get_option('urid_instagram'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/instagram.png" alt="Instagram" /></a><?php } ?>
			<?php if (of_get_option('urid_facebook') == true) { ?><a href="<?php echo of_get_option('urid_facebook'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/fb.png" alt="Facebook" /></a><?php } ?>
			<?php if (of_get_option('urid_google') == true) { ?><a href="<?php echo of_get_option('urid_google'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/gplus.png" alt="Google+" /></a><?php } ?>
			<?php if (of_get_option('urid_youtube') == true) { ?><a href="<?php echo of_get_option('urid_youtube'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/youtube.png" alt="Youtube" /></a><?php } ?>
			<?php if (of_get_option('urid_linkedin') == true) { ?><a href="<?php echo of_get_option('urid_linkedin'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/social/linkedin.png" alt="LinkedIn" /></a><?php } ?>
		</div>

	<!-- for extra content under the menu -->
	<?php echo of_get_option('urid_html'); ?>
</div>