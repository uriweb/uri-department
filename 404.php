<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-11 not-found">
	<div class="subcol">
		<div class="title">
			<figure class="rhody-ohno">
				<img height="365" width="176" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/rhody-ohno.png" alt="Rhody the Ram lamenting the missing page" srcset="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/rhody-ohno.png 1x, <?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/rhody-ohno@2x.png 2x" />
			</figure>
			<h1>404: Page Not Found</h1>
			<span class="tagline">Let's help you find what you were looking for.</span>
		</div>

		<div class="post">
			<div class="entry">
				<p>The page you were looking for is not available.</p>
				
				<h2>Try a new search</h2>
				<?php
					$site_uri = parse_url( get_site_url() );
					$value = str_replace( $site_uri['path'], '', $_SERVER['REQUEST_URI'] );
					$value = str_replace( '/', ' ', $value );
				?>

				<form method="get" action="http://www.uri.edu/search" class="search-404">
					<input type="hidden" name="cx" value="016863979916529535900:17qai8akniu" />
					<input type="hidden" name="cof" value="FORID:11" />
					<label for="q">Search:</label>
						<input class="search-input" name="q" value="<?php print esc_attr($value) ?>" type="text" placeholder="Search The University of Rhode Island" />
					<input type="submit" class="searchsubmit" name="searchsubmit" value="Search" />
				</form>

				<h2>Contact Us</h2>
				<ul>
					<li><a href="http://web.uri.edu/about/contact/">Common phone numbers</a></li>
					<li><a href="http://directory.uri.edu/">People directory</a></li>
				</ul>


			</div>
		</div>
	</div>
</div><!-- grid11 -->

<?php get_footer(); ?>