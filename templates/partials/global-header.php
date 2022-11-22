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

<div class="m-nav" id="topnav"<?php if (is_home()){ ?> class="mobiletop"<?php } ?>><a class="first home" href="<?php echo get_site_option('uri_gohome'); ?>">Home</a><span class="toggle"><a href="#" class="toggleclosemobile open browse" title="Open Navigation">Browse</a><a class="toggleclosemobile close" style="display: none;" href="#" title="Close Navigation">Close</a></span><a href="http://events.uri.edu" class="events">Events</a><a href="http://map.web.uri.edu" class="maps">Maps</a><a href="http://www.uri.edu/news/myuri/" class="email">Email</a><a href="https://brightspace.uri.edu/d2l/home" class="sakai">Brightspace</a><a href="http://www.uri.edu/ecampus" class="ecampus">eCampus</a><a class="last rhodynet" href="https://uri.joinhandshake.com/login">Handshake</a></div>
