<?php
/**
 * Options Page Functions
 */

function themeoptions_admin_menu() {
	// here's where we add our theme options page link to the dashboard sidebar
	add_theme_page("Department Options", "Department Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}

function themeoptions_page() {
	// here's the main function that will generate our options page
	if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }
	//if ( get_option() == 'checked'
	?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"><br /></div>
		<h2>Theme Options</h2>

		<form method="POST" action="">
			<input type="hidden" name="update_themeoptions" value="true" />

			<h4>Custom Department Settings</h4>
			<p><input type="text" name="address" id="address" size="32" value="<?php echo get_option('mytheme_address'); ?>"/> Main Office Address (Format: 1 Rhody Way, Kingston, RI 02881</p>
			<p><input type="text" name="emailadd" id="emailadd" size="32" value="<?php echo get_option('mytheme_emailadd'); ?>"/> Email Address</p>
			<p><input type="text" name="deptphone" id="deptphone" size="32" value="<?php echo get_option('mytheme_deptphone'); ?>"/> Phone Number (Format: 401-123-4567)</p>
			<p><input type="text" name="twitteruser" id="twitteruser" size="32" value="<?php echo get_option('mytheme_twitteruser'); ?>"/> Twitter username (optional)</p>
			<p><input type="text" name="gplususer" id="gplususer" size="32" value="<?php echo get_option('mytheme_gplususer'); ?>"/> Google+ full url (optional, include http://)</p>
			<p><input type="text" name="youtubeuser" id="youtubeuser" size="32" value="<?php echo get_option('mytheme_youtubeuser'); ?>"/> Youtube channel url (optional, include http://)</p>
			<p><input type="text" name="fbuser" id="fbuser" size="32" value="<?php echo get_option('mytheme_fbuser'); ?>"/> Facebook page url (optional, include http://)</p>
			<p><input type="submit" name="search" value="Update Options" class="button" /></p>  
		</form>

	</div>
	<?php
}

function themeoptions_update() {
	// this is where validation would go
	update_option('mytheme_address', 	$_POST['address']);
	update_option('mytheme_emailadd', 	$_POST['emailadd']);
	update_option('mytheme_deptphone', 	$_POST['deptphone']);
	update_option('mytheme_twitteruser', 	$_POST['twitteruser']);
	update_option('mytheme_gplususer', 	$_POST['gplususer']);
	update_option('mytheme_youtubeuser', 	$_POST['youtubeuser']);
	update_option('mytheme_fbuser', 	$_POST['fbuser']);
}
add_action('admin_menu', 'themeoptions_admin_menu');