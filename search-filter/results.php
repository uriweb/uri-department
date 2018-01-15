<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2015 Designs & Code
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */



/**
 * quick and dirty pagination 
 */
function _uri_department_search_filter_pagination($current_page, $num_pages, $offset=3, $separator=' ') {
	
	$pagination = array();
	
	$page = 1;
	while ( $page <= $num_pages ) {

		if ( $page == $current_page ) {
			$pagination[] = '<span class="page-number">' . $page . '</span>';
		} else {
			$url = esc_url( add_query_arg( 'sf_paged', $page ) );
			$pagination[] = '<a href="' . $url . '" class="page-number">' . $page . '</a>';
		}

		$page++;
	}
	
	return implode( " ", $pagination );
}



/**
 * quick and dirty number of results 
 */
function _uri_department_search_filter_number_of_results($total) {
	$r = ( $total == 1 ) ? 'result' : 'results';
	return '<div class="search-filter-total">Found ' . $total . ' ' . $r . '</div>';
}



$query_id = $query->query['search_filter_id'];
//  echo '<pre>';
// $vars = get_defined_vars();
// var_dump ( array_keys ( $vars ) );
//  var_dump ( $searchandfilter->get($query_id)->current_query() );
//  echo '</pre>';


if ( $query->have_posts() ): ?>
	<div class="search-filter-results">
		<div class="results-meta">
			<?php print _uri_department_search_filter_number_of_results($query->found_posts); ?>
			<div class="pagination">
				Page: 
				<?php
					$current_page = $_REQUEST['sf_paged'];
					if ( empty ( $current_page ) ) {
						$current_page = 1;
					}
					print _uri_department_search_filter_pagination($current_page, $query->max_num_pages);
				?>
			</div>
		</div>
	
		<div class="search-filter-results-posts cl-tiles halves">
			<?php
			while ($query->have_posts())
			{
				$query->the_post();
		
				?>
		
				<?php if( get_post_type() === 'people' ): // it's a people post, customize result display ?>
			
					<div class="people-result">

						<?php if ( has_post_thumbnail() ): ?>
							<a href="<?php the_permalink() ?>"><figure><?php the_post_thumbnail('small', array( 'class' => 'u-photo' )); ?></figure></a>
						<?php else: ?>
							<a href="<?php the_permalink() ?>"><figure><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/default/uri80.gif" alt="Person Icon" /></figure></a>
						<?php endif; ?>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

			
						<?php if ( get_field( 'peopletitle' ) ): ?>
							<div class="people-title people-field"><?php the_field( 'peopletitle' ); ?></div>
						<?php endif; ?>
			
						<?php if ( get_field( 'peopledepartment' ) ): ?>
							<div class="people-department people-field"><?php the_field( 'peopledepartment' ); ?></div>
						<?php endif; ?>
			
						<?php if ( 1==2 && get_field( 'peopleresearch' ) ): ?>
							<div class="people-research people-field">Research: <?php the_field( 'peopleresearch' ); ?></div>
						<?php endif; ?>
			
						<?php
							// $term_lists = get_the_term_list( $post->ID, 'peoplegroups', '', ', ' );
							// format the links so that they point to new searches
							$terms_raw = get_the_terms($post, 'peoplegroups');
							$terms = array();
							foreach ( $terms_raw as $t ) {
								$terms[] = '<a href="?_sft_peoplegroups=' . $t->slug . '">' . $t->name . '</a>';
							}
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ): ?>
								<div class="people-expertise people-field">Areas of expertise: <?php echo implode ( ', ', $terms ); ?></div>
							<?php endif; ?>
			
					</div>
			
				<?php else: // not a people post, use default search and filter template ?>

					<div>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
						<p><br /><?php the_excerpt(); ?></p>
						<?php 
							if ( has_post_thumbnail() ) {
								echo '<p>';
								the_post_thumbnail("small");
								echo '</p>';
							}
						?>
						<p><?php the_category(); ?></p>
						<p><?php the_tags(); ?></p>
						<p><small><?php the_date(); ?></small></p>
			
					</div>

				<?php endif; // end post type conditional ?>
									

			<?php } // end while ?>
		</div>

		<div class="results-meta">
			<?php print _uri_department_search_filter_number_of_results($query->found_posts); ?>
			<div class="pagination">
				Page: 
				<?php
					$current_page = $_REQUEST['sf_paged'];
					if ( empty ( $current_page ) ) {
						$current_page = 1;
					}
					print _uri_department_search_filter_pagination($current_page, $query->max_num_pages);
				?>
			</div>
		</div>
	
	
	</div>
	
<?php else: ?>

	<p>No Results Found.</p>

<?php endif; ?>

<style>
	.search-filter-results .results-meta {
		font-size: 13px;
	}
	.results-meta {
		color: #555;
		margin-bottom: 1.5rem;
	}
	
	.search-filter-results hr {
		clear: both;
		display: block;
		margin: 1rem 0;
		visibility: hidden;
	}
	.people-result {
		background-color: #eee;
		border-radius: 2px;
		margin-bottom: 1rem !important;
		padding: 20px !important;
	}
	.people-result figure {
		float: left;
		margin: 0 1rem 0 0;
	}
	.people-result img {
		max-width: 80px;
	}
	.people-result .people-field, .people-result .people-field p {
		font-size: 14px !important;
	}
	
	.wf-trajanpro-n7-active .people-result h3 {
		margin-bottom: 2px;
		position: relative;
		top: -6px;
	}
	
	.page-number:not(:last-child):after {
		color: #555;
		content: " | ";
	}
</style>