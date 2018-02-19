<?php
/**
 * Template Name: People
 */
?>

<?php
	get_header();
	get_template_part( 'sidebar1' );
?>

<div class="grid-11">
	<div class="subcol">
		<div id="content_start" style="display : none ; "></div>
			<?php
				get_template_part( 'templates/partials/alert' );

				if (have_posts()) : while (have_posts()) : the_post();
				$tagline = get_post_meta($post->ID, 'tagline', $single = true);
				$side = get_post_meta($post->ID, 'side', $single = true);

				get_template_part( 'templates/partials/title' );
			?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="entry">
				<?php
					the_content('<p class="serif">Read the rest of this page &raquo;</p>');
					wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number'));
				?>
			</div>
		</div>
		<?php endwhile; endif; ?>

		<?php 
			wp_reset_query();
	
			global $wp_query;
			$postid = $wp_query->post->ID;
			$peoplesort = get_post_meta($post->ID, 'peoplesort', $single = true);
			$peoplecat = get_post_meta($post->ID, 'peoplecat', $single = true);
	
			// First, check to see if we display by group or by specific, selected groups:
	
			if(get_field('peoplesort') == 1) { // if the "group people" checkbox is checked
				$terms = get_terms('peoplegroups');
			} else if(!(get_field('peoplecat') == NULL)) { // if a specific person group or groups is defined
				$terms = array();
				$selected_terms = explode(' ', $peoplecat);
				foreach ($selected_terms as $cat) {
					$terms = array_merge($terms, get_terms( 'peoplegroups', 'hide_empty=1&slug=' . $cat ) );
				}
			} else {
				$terms = FALSE;
			}
	

			// Next, display people
	
			if($terms !== FALSE) { // See if we're showing people in groups
	
				if ( count($terms) > 0 ) {
					foreach ( $terms as $term ) {
						echo '<h2 class="peopleterm">' . $term->name . '</h2>';
						echo '<div class="peoplesector">';

						$args = array(
							'meta_query' => array(
								'relation' => 'AND',
								array(
									'key' => 'sortname',
									'compare' => 'EXISTS'
								),
								array(
									'key' => 'sortname',
									'compare' => '!=',
									'value' => ''
								),
							),
							'orderby' => array( 'meta_value' => 'ASC', 'date' => 'DESC' ),
							'tax_query' => array(
									array(
											'taxonomy' => 'peoplegroups',
											'field' => 'id',
											'terms' => $term->term_id
									)
							)
						);
						if ( function_exists( 'uri_people_tool_get_people' ) ) {
							uri_people_tool_get_people($args);
						} else {
							uri_department_get_people($args);
						}

						$args = array(
							'meta_query' => array(
								'relation' => 'OR',
								array(
									'key' => 'sortname',
									'compare' => 'NOT EXISTS'
								),
								array(
									'key' => 'sortname',
									'compare' => '=',
									'value' => ''
								),
							),
							'orderby' => array('date' => 'DESC' ),
							'tax_query' => array(
									array(
											'taxonomy' => 'peoplegroups',
											'field' => 'id',
											'terms' => $term->term_id
									)
							)
						);
						if ( function_exists( 'uri_people_tool_get_people' ) ) {
							uri_people_tool_get_people($args);
						} else {
							uri_department_get_people($args);
						}
				
						echo '<div style="clear:both;"></div>';
						echo '</div><!-- end people sector -->';
						echo '<div style="clear:both;"></div>';

						wp_reset_postdata();
					}
				}
		

			} else {  // show people without groups


				$args = array(
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'sortname',
							'compare' => 'EXISTS'
						),
						array(
							'key' => 'sortname',
							'compare' => '!=',
							'value' => ''
						),
					),
					'orderby' => array( 'meta_value' => 'ASC', 'publication_date' => 'DESC' ),
				);
				if ( function_exists( 'uri_people_tool_get_people' ) ) {
					uri_people_tool_get_people($args);
				} else {
					uri_department_get_people($args);
				}

				$args = array(
					'meta_query' => array(
						'relation' => 'OR',
						array(
							'key' => 'sortname',
							'compare' => 'NOT EXISTS'
						),
						array(
							'key' => 'sortname',
							'compare' => '=',
							'value' => ''
						),
					),
					'orderby' => array('publication_date' => 'DESC' ),
				);
				if ( function_exists( 'uri_people_tool_get_people' ) ) {
					uri_people_tool_get_people($args);
				} else {
					uri_department_get_people($args);
				}

				echo '<div style="clear:both;"></div>';

			}
	
	
		?>
	</div><!-- end subcol -->
</div> <!-- end grid 11 -->

<?php get_footer(); ?>