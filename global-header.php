<div id="panel">
	<div class="center">
		<?php	
			include ( get_template_directory() . '/global-nav.php' );
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

<div id="topnav"<?php if (is_home()){ ?> class="mobiletop"<?php } ?>><a class="first" href="<?php echo get_site_option('uri_gohome'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/home.png" alt="Home" />Home</a><span class="toggle"><a href="#" class="toggleclosemobile open"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/browse.png" alt="Open Navigation" />Browse</a><a class="toggleclosemobile close" style="display: none;" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/close.png" alt="Close Navigation" />Close</a></span><a href="http://events.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/events.png" alt="View our calendar" />Events</a><a href="http://map.web.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/maps.png" alt="Campus Maps" />Maps</a><a href="http://www.uri.edu/news/myuri/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/email.png" alt="webmail" />Email</a><a href="http://sakai.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/sakai.png" alt="Sakai" />Sakai</a><a href="http://www.uri.edu/ecampus"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/ecampus.png" alt="eCampus" />eCampus</a><a class="last" href="http://web.uri.edu/experience/rhodynet"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mobile/rhodynet_icon_dark.png" alt="RhodyNet" />RhodyNet</a></div>
