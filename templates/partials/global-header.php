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
    <a href="https://www.uri.edu/about/">About URI</a><a href="https://www.uri.edu/admission/">Admission</a><a href="https://www.uri.edu/academics/">Academics</a><a href="https://www.uri.edu/campus-life/">Campus Life</a><a href="https://www.uri.edu/athletics/">Athletics</a><a href="https://web.uri.edu/research/">Research</a><a href="http://web.uri.edu/global">Global</a>
  </div>
</div>

<!--<div class="drawer"><a class="toggleclose close but" style="display: none;" href="#">Close</a></div> -->

<div class="m-nav" id="topnav"<?php if (is_home()){ ?> class="mobiletop"<?php } ?>><a class="first home" href="<?php echo get_site_option('uri_gohome'); ?>">Home</a><span class="toggle"><a href="#" class="toggleclosemobile open browse" title="Open Navigation">Browse</a><a class="toggleclosemobile close" style="display: none;" href="#" title="Close Navigation">Close</a></span><a href="http://events.uri.edu" class="events">Events</a><a href="https://map.uri.edu/" class="maps">Maps</a><a href="http://www.uri.edu/news/myuri/" class="email">Email</a><a href="https://brightspace.uri.edu/d2l/home" class="sakai">Brightspace</a><a href="http://www.uri.edu/ecampus" class="ecampus">eCampus</a><a class="last rhodynet" href="https://uri.joinhandshake.com/login">Handshake</a></div>
