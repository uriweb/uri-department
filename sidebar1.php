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

			<?php 
				// 2017-05-04  jp  in moving theme options to the customizer, we don't need the options framework anymore
				// but this code still checks it for those sites who haven't used Customizer to outfit their sites.
				$twitter = get_option('uri_department_department_twitter');
				$instagram = get_option('uri_department_department_instagram');
				$facebook = get_option('uri_department_department_facebook');
				$linkedin = get_option('uri_department_department_linkedin');
				$youtube = get_option('uri_department_department_youtube');
								
				// check for legacy values
				if ( empty ( $twitter ) ) {
					$twitter = of_get_option('urid_tweet');
				}
				if ( empty( $instagram ) ) {
					$instagram = of_get_option('urid_instagram');
				}
				if ( empty( $facebook ) ) {
					$facebook = of_get_option('urid_facebook');
				}
				if ( empty( $linkedin ) ) {
					$linkedin = of_get_option('urid_linkedin');
				}
				if ( empty( $youtube ) ) {
					$youtube = of_get_option('urid_youtube');
				}
				if ( empty( $google ) ) {
					$google = of_get_option('urid_google');
				}
				
				$social_icon_dir = get_bloginfo('stylesheet_directory') . '/images/social/';
									
			?>

			<?php if ( ! empty( $twitter ) ) : ?><a href="http://www.twitter.com/<?php echo $twitter; ?>" id="dept-twitter"><img src="<?php echo $social_icon_dir; ?>twitter.png" alt="Twitter" /></a><?php endif; ?>
			<?php if ( ! empty( $instagram ) ) : ?><a href="<?php echo of_get_option('urid_instagram'); ?>" id="dept-instagram"><img src="<?php echo $social_icon_dir; ?>instagram.png" alt="Instagram" /></a><?php endif; ?>
			<?php if ( ! empty( $facebook ) ) : ?><a href="<?php echo of_get_option('urid_facebook'); ?>" id="dept-facebook"><img src="<?php echo $social_icon_dir; ?>fb.png" alt="Facebook" /></a><?php endif; ?>
			<?php if ( ! empty( $google ) ) : ?><a href="<?php echo of_get_option('urid_google'); ?>" id="dept-google"><img src="<?php echo $social_icon_dir; ?>gplus.png" alt="Google+" /></a><?php endif; ?>
			<?php if ( ! empty( $youtube ) ) : ?><a href="<?php echo of_get_option('urid_youtube'); ?>" id="dept-youtube"><img src="<?php echo $social_icon_dir; ?>youtube.png" alt="Youtube" /></a><?php endif; ?>
			<?php if ( ! empty( $linkedin ) ) : ?><a href="<?php echo of_get_option('urid_linkedin'); ?>" id="dept-linkedin"><img src="<?php echo $social_icon_dir; ?>linkedin.png" alt="LinkedIn" /></a><?php endif; ?>
		</div>

	<!-- for extra content under the menu -->
	<?php echo of_get_option('urid_html'); ?>
</div>