<!DOCTYPE html>
<html lang="<?php echo of_get_option('urid_lang'); ?>" dir="ltr">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0" />

	<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); $site_description = get_bloginfo( 'description', 'display' ); if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) ); ?></title>

	<?php wp_head(); ?>

	<?php require_once ( get_stylesheet_directory() . '/typekit-embed.php' ); ?>


	<link rel="icon" type="image/gif" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.gif" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('stylesheet_directory'); ?>/images/favicon.gif" />
	<link rel="stylesheet" type="text/css" media="print" href="<?php bloginfo('stylesheet_directory'); ?>/print.css" />

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

	<?php if (of_get_option('urid_css') == true) { ?>
	<style type="text/css">
		@import url("<?php echo of_get_option('urid_css'); ?>");
	</style>
	<?php } ?>

	<?php if (of_get_option('urid_cssinline') == true) { ?>
	<style type="text/css">
	<?php
		echo of_get_option('urid_cssinline');
	?>
	</style>
	<?php } ?>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- adds custom per page styling if it exists in the page meta -->
	<?php global $wp_query; $postid = $wp_query->post->ID; $my_meta = get_post_meta($postid,'_my_meta',TRUE); if (isset($my_meta['pagecss']) && $my_meta['pagecss'] === true) { ?>
	<style type="text/css">
		<?php echo $my_meta['pagecss']; ?>
	</style>
	<?php } ?>
	<!-- end -->

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

<!-- screen reader links --><div class="skiplinks"><a href="#content_start">Skip to content</a> &ndash; <a href="#urisearch">Skip to search</a></div><!-- end screen reader -->

<!-- Site wide alerts if they exist -->

<?php 
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

		<?php require_once ( get_stylesheet_directory() . '/global-header.php' ); ?>

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
							<a href="http://web.uri.edu/its/uri-email/"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mail.png" alt="Email" />Email</a><a href="http://www.uri.edu/ecampus"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ecampus.png" alt="eCampus" />eCampus</a><a href="http://sakai.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/sakai.png" alt="Sakai at URI" />Sakai</a><a href="http://rhodynet.uri.edu"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/rhodynet_icon_white_sm.png" alt="RhodyNet" />RhodyNet</a>
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
				<a class="deptpic" title="<?php if (of_get_option('urid_altcus') == true) { ?><?php echo of_get_option('urid_altcus'); ?><?php } else { ?><?php bloginfo('name'); ?><?php } ?>" href="<?php bloginfo('url'); ?>"<?php if (of_get_option('urid_ident') == true) { ?> style="background-image: url(<?php echo of_get_option('urid_ident'); ?>);"<?php } ?>><?php bloginfo('name'); ?></a>
			</div>
			
			<div id="deptsec" class="grid-7">
				<h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1><?php if (of_get_option('urid_address') == true) { ?><p><?php echo of_get_option('urid_address'); ?></p><?php } ?><p><a href="mailto:<?php echo of_get_option('urid_email'); ?>"><?php echo of_get_option('urid_email'); ?></a><?php if (of_get_option('urid_phone') == true) { ?> &ndash; <?php echo of_get_option('urid_phone'); ?><?php } ?></p>
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
