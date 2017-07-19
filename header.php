<!DOCTYPE html>
<html lang="<?php echo of_get_option('urid_lang'); ?>" dir="ltr">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0" />

	<title><?php print uri_department_get_page_title(); ?></title>

	<?php wp_head(); ?>
	<?php
	/*
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
	*/
	?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php
		get_template_part( 'templates/partials/typekit', 'embed' );
	?>


	<link rel="icon" type="image/gif" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.gif" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.gif" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" />


	<?php if (of_get_option('urid_css')) { ?>
	<style type="text/css">
		@import url("<?php echo of_get_option('urid_css'); ?>");
	</style>
	<?php } ?>

	<?php if (of_get_option('urid_cssinline')) { ?>
	<style type="text/css">
		<?php print of_get_option('urid_cssinline'); ?>
	</style>
	<?php } ?>

	<?php
		// adds custom per page styling if it exists in the page meta
		print uri_department_get_page_css();
	?>

</head>

<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-544KHG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-544KHG');</script>
<!-- End Google Tag Manager -->

<!-- screen reader links --><div class="skiplinks"><a href="#content_start">Skip to content</a> &ndash; <a href="#s">Skip to search</a></div><!-- end screen reader -->


<?php 
// Site wide alerts if they exist
/* This fopen disabled 2015-08-13 by Chi Shen -- doesn't not seem to function,
   and as a result it generates a lot of unecessary error messages in the 
   server logs.  Sarah Couch and Lisa Chen aware of change. */

//  if (@fopen("http://web.uri.edu/files/alert.txt","r")) { ?>  
<?php if (false) { ?>
<div class="alertbar">
	<?php echo ( file_get_contents( "http://web.uri.edu/files/alert.txt") ); ?>
</div>
<?php } ?>

<!-- Begin Top layer background -->
<div id="firstlayer">
	<div id="top">

		<?php	
			get_template_part( 'templates/partials/global-header' );
		?>

		<div id="head" class="sub">
			<div class="wrapper">
				<div class="grids">
					<div class="grid-3 logo"><a class="urilogo" href="<?php echo get_site_option('uri_gohome'); ?>" alt="The University of Rhode Island Logo - Link to home page" title="The University of Rhode Island Logo - Link to home page">The University of Rhode Island</a></div>

					<!-- New Search insert -->
					<div class="grid-5">
						<div class="sf" id="urisearch">
							<?php if (get_site_option('uri_cse') ): ?>

								<form method="get" action="http://www.uri.edu/search" name="global_general_search_form">
									<input type="hidden" name="cx" value="016863979916529535900:17qai8akniu" />
									<input type="hidden" name="cof" value="FORID:11" />
									<label for="q">Search:</label>
										<input name="q" id="q" value="<?php print (isset($_GET['q'])) ? htmlentities($_GET['q']) : '' ?>" type="text" placeholder="Search The University of Rhode Island" />
									<input type="submit" class="searchsubmit" name="searchsubmit" value="Search" />
								</form>

							<?php else: ?>

								<form method="get" action="<?php bloginfo('url'); ?>/index.php" name="global_general_search_form">
									<label for="s">Search:</label>
									<input name="s" id="s" value="<?php print (isset($_GET['s'])) ? htmlentities($_GET['s']) : '' ?>" placeholder="Search The University of Rhode Island" type="text" />
									<input name="searchsubmit" class="searchsubmit" type="submit" value="Search" />
								</form>

							<?php endif; ?>
							<div style="clear:both;"></div>
						</div>
					</div>

					<div class="grid-5">
						<div class="quick">
							<a href="http://web.uri.edu/its/uri-email/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/quick/mail.png" alt="Email" />Email</a><a href="http://www.uri.edu/ecampus"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/quick/ecampus.png" alt="eCampus" />eCampus</a><a href="http://sakai.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/quick/sakai.png" alt="Sakai at URI" />Sakai</a><a href="http://rhodynet.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/quick/rhodynet.png" alt="RhodyNet" />RhodyNet</a>
						</div>
					</div>
					<div style="clear:both;"></div>
			</div><!-- /end grids -->

			</div><!-- /end wrapper -->
		</div><!-- /end #head -->

	</div><!-- /end #top container div -->
</div><!-- /end #firstlayer container div -->



<div id="subpagetop">
	<div class="wrapper">
		<div class="grids">
		
			<div id="deptbanner" class="grid-3">

				<?php 
					// 2017-05-04  jp  in moving theme options to the customizer, we don't need the options framework anymore
					// but this code still checks it for those sites who haven't used Customizer to outfit their sites.
					$urid_altcus = of_get_option('urid_altcus');
					$title = ( ! empty ( $urid_altcus ) ) ? $urid_altcus : get_bloginfo('name');

					// check for new customizer header image
					$background_image = get_header_image();
					// good stuff to know about: get_custom_header()->width and get_custom_header()->height 

					if($background_image === NULL || $background_image == '') {
						// check for legacy header image
						$background_image = of_get_option('urid_ident');
					}

					if($background_image === NULL || $background_image == '') {
						// The header image is still empty.  Use a default
						$background_image = get_stylesheet_directory_uri() . '/images/uri-minidefault.jpg';
					}
					
				?>
				<a rel="home" class="deptpic" title="<?php echo $title; ?>" href="<?php bloginfo('url'); ?>"<?php if ($background_image !== FALSE) { ?> style="background-image: url(<?php echo $background_image; ?>);"<?php } ?>><?php bloginfo('name'); ?></a>
			</div>
			
			<div id="deptsec" class="grid-7">

				<?php 
					// 2017-05-04  jp  in moving theme options to the customizer, we don't need the options framework anymore
					// but this code still checks it for those sites who haven't used Customizer to outfit their sites.
					$address = get_option('uri_department_department_address');
					$email = get_option('uri_department_department_email');
					$phone = get_option('uri_department_department_phone');
					
					// check for legacy values
					if ( empty ( $address ) ) {
						$address = of_get_option('urid_address');
					}
					if ( empty( $email ) ) {
						$email = of_get_option('urid_email');
					}
					if ( empty( $phone ) ) {
						$phone = of_get_option('urid_phone');
					}
					
										
				?>

				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

				<p id="dept-description"><?php bloginfo('description'); ?></p>

				<?php if ( ! empty ( $address ) ): ?>
					<p id="dept-address"><?php echo $address ?></p>
				<?php endif; ?>
				<?php
					$strings = array();
					if ( ! empty ( $email ) ) {
					 	$strings[] = '<a id="dept-email" href="mailto:' . $email . '">' . $email . '</a>';
					}
					if ( ! empty ( $phone ) ) {
					 	$strings[] = '<span id="dept-phone">' . $phone . '</span>';
					}
					?>
					<p><?php echo implode(' &ndash; ', $strings); ?></p>
			</div>
			
			<div class="grid-3">
				<div id="extrabutton">
					<a href="<?php echo get_site_option('uri_gohome'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/urihome.png" alt="Go back to the URI Homepage" />URI Homepage</a>
				</div>
			</div>

		</div><!-- /end grids -->
	</div><!-- /end middle and or wrapper -->
</div><!-- /end subpage top -->

<!-- print stuff that's hidden -->

<div class="logoprint"><img width="180" height="75" src="<?php echo get_template_directory_uri(); ?>/images/logo-print.png" alt="URI" /></div>
<div class="lhwm"><img src="<?php echo get_template_directory_uri(); ?>/images/wmprint.png" alt="Think Big, We Do." /></div>
<div id="riseal"><img src="<?php echo get_template_directory_uri(); ?>/images/wmbprint.png" alt="Rhode Island Seal" /></div>

<!-- back to everything else -->

<div id="mainpage">
<div class="wrap"> 
<div class="wrapper">
<div class="grids">
