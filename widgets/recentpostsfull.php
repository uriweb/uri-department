<?php

class RecentPosts2 extends WP_Widget {
	function RecentPosts2() {
		$widget_ops = array('classname' => 'RecentPosts2', 'description' => 'Recent posts with optional thumbnail' );
		$this->WP_Widget('RecentPosts2', 'Recent Posts In Page', $widget_ops);
	}
	
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'titletext' => '', 'text' => '', 'ppp' => '', 'spt' => true ) );
		$titletext = $instance['titletext'];
		$text = $instance['text'];
		$ppp = $instance['ppp'];
		$spt = $instance['spt'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('titletext'); ?>"><?php _e('Widget title text'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('titletext'); ?>" name="<?php echo $this->get_field_name('titletext'); ?>" type="text" value="<?php echo $titletext; ?>" />
			<small>Give the widget a title if needed.</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Category slug to take posts from'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
			<small>Use the category slug for the intended category. For example, if the category is News Post the slug is likely to be /news-posts, so enter it in as news-posts.</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ppp'); ?>"><?php _e('Posts to show'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ppp'); ?>" name="<?php echo $this->get_field_name('ppp'); ?>" type="text" value="<?php echo $ppp; ?>" />
			<small>Recommend count is 3, but it can be whatever you want.</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('spt'); ?>"><?php _e('Show Post Thumbnail'); ?>
			<input id="<?php echo $this->get_field_id('spt'); ?>" name="<?php echo $this->get_field_name('spt'); ?>" type="checkbox" <?php checked(isset($spt) ? 1 : 0); ?> /></label>
		</p>
		<?php
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['titletext'] = $new_instance['titletext'];
		$instance['text'] = $new_instance['text'];
		$instance['ppp'] = $new_instance['ppp'];
		$instance['spt'] = $new_instance['spt'];
		return $instance;
	}

	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$titletext = empty($instance['titletext']) ? ' ' : apply_filters('widget_title', $instance['titletext']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_title', $instance['text']);
		$ppp = empty($instance['ppp']) ? ' ' : apply_filters('widget_title', $instance['ppp']);
		$show_thumb = isset( $instance['spt'] ) ? $instance['spt'] : false;
		
		echo $before_widget;
		
		// WIDGET CODE GOES HERE
		print '<div class="postlist"><h3>' . $titletext . '</h3><ul>';
		$i = 0; // Create a new (incrementing) var
		query_posts( array( 'category_name' => $text, 'posts_per_page' => $ppp ) );
		if (have_posts()) { 
			while (have_posts()) : the_post(); 
			$i++; // Increase count 
			if ($i % 3 == 2) {
				echo "<li class='midbox'>";
			} else {
				echo "<li>";
			}
			if ( $show_thumb ) :
				echo "<a href='".get_permalink()."'>";
				echo the_post_thumbnail('people');
				echo "</a>";
			endif;
				echo "<h4><a href='".get_permalink()."'>".get_the_title()."</a></h4>";
			echo "<p>";
			$excerpt = strip_tags((get_the_content('')),"<p><b><strong><i><em>");
			echo string_limit_wordsdept($excerpt,20);
			echo "</p>";
			echo "</li>";
			if ($i % 3 == 0) {
				echo "<div style='clear:both;'></div>";
			}
			endwhile;
		} 
		wp_reset_query();

		echo "<div style='clear:both;'></div></ul></div>";
		echo $after_widget;
	}
}
add_action( 'widgets_init', create_function('', 'return register_widget("RecentPosts2");') );?>