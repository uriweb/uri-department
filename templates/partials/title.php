<?php
	// initialize a variable to suppress the title display
	$suppress_title = FALSE;
	if ( get_field('pagetitle') === TRUE ) {
		$suppress_title = TRUE;
	}
	

	// if the title isn't suppressed, determine its value, and print it
	if ( !$suppress_title ) {

		$headline = get_the_title();
		// what if it's an archive page?
		if ( is_archive() ) {
			$headline = str_replace( 'Category: ', '', get_the_archive_title() );
		}
		
		echo '<div class="title"><h1>' . $headline . '</h1></div>';

	}
