<div id="panel">
	<div class="center">
		<?php	
			get_template_part( 'templates/partials/global-nav' );
		?>
	</div>
	<div style="clear:both;"></div>
</div>

<div id="nav">
  <div class="center">
    <a class="toggle open mylink" href="http://www.uri.edu/home/about">About URI</a><a class="toggle open mylink" href="http://www.uri.edu/admission">Admission</a><a class="toggle open mylink" href="http://www.uri.edu/home/academics">Academics</a><a class="toggle open mylink" href="http://www.uri.edu/home/students">Campus Life</a><a class="toggle open mylink" href="http://www.gorhody.com">Athletics</a><a class="rsl toggle open mylink" href="http://www.uri.edu/research/tro/">Research &amp; Outreach</a><a class="toggle open mylink noborder" href="http://web.uri.edu/globaluri">Global</a>
  </div>
</div>

<div class="drawer"><a class="toggleclose close but" style="display: none;" href="#">Close</a></div>

<div id="topnav"<?php if (is_home()){ ?> class="mobiletop"<?php } ?>><a class="first" href="<?php echo get_site_option('uri_gohome'); ?>"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/home.png" alt="Home" />Home</a><span class="toggle"><a href="#" class="toggleclosemobile open"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/browse.png" alt="Open Navigation" />Browse</a><a class="toggleclosemobile close" style="display: none;" href="#"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/close.png" alt="Close Navigation" />Close</a></span><a href="http://events.uri.edu"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/events.png" alt="View our calendar" />Events</a><a href="http://map.web.uri.edu"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/maps.png" alt="Campus Maps" />Maps</a><a href="http://www.uri.edu/news/myuri/"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/email.png" alt="webmail" />Email</a><a href="http://sakai.uri.edu"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/sakai.png" alt="Sakai" />Sakai</a><a href="http://www.uri.edu/ecampus"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/ecampus.png" alt="eCampus" />eCampus</a><a class="last" href="https://rhodynet.uri.edu"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/mobile/rhodynet_icon_dark.png" alt="RhodyNet" />RhodyNet</a></div>
