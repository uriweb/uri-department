<?php

class RecentPosts extends WP_Widget {

  function __construct() {
		$widget_ops = array('classname' => 'RecentPosts', 'description' => 'Displays a random post with thumbnail' );
		parent::__construct('RecentPosts', 'Recent Posts with Thumbnail', $widget_ops);
	}
 

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'titletext' => '', 'text' => '', 'ppp' => '' ) );
		$titletext = $instance['titletext'];
		$text = $instance['text'];
		$ppp = $instance['ppp'];
		?>
		<p>
			<label for="<?php echo $this->get_field_id('titletext'); ?>"><?php _e('Widget title text', 'uri-department'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('titletext'); ?>" name="<?php echo $this->get_field_name('titletext'); ?>" type="text" value="<?php echo $titletext; ?>" /><small>Give the widget a title if needed.</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Category slug to take posts from', 'uri-department'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" /><small>Use the category slug for the intended category. For example, if the category is News Post the slug is likely to be /news-posts, so enter it in as news-posts.</small>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('ppp'); ?>"><?php _e('Posts to show', 'uri-department'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('ppp'); ?>" name="<?php echo $this->get_field_name('ppp'); ?>" type="text" value="<?php echo $ppp; ?>" /><small>Recommend count is 3, but it can be whatever you want.</small>
		</p>
		<?php
  }
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['titletext'] = $new_instance['titletext'];
		$instance['text'] = $new_instance['text'];
		$instance['ppp'] = $new_instance['ppp'];
		return $instance;
	}
 
  function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$titletext = empty($instance['titletext']) ? ' ' : apply_filters('widget_title', $instance['titletext']);
		$text = empty($instance['text']) ? ' ' : apply_filters('widget_title', $instance['text']);
		$ppp = empty($instance['ppp']) ? ' ' : apply_filters('widget_title', $instance['ppp']);

		echo $before_widget;

		// @todo: clean this mess up
		// WIDGET CODE GOES HERE
		echo "<div class='postlist'><h3>";
		echo $titletext;
		echo "</h3><ul>";
		query_posts( array( 'category_name' => $text, 'posts_per_page' => $ppp ) );
		if (have_posts()) : 
		while (have_posts()) : the_post(); 
		echo "<li>";
		echo "<a href='".get_permalink()."'>";
		echo the_post_thumbnail();
		echo "</a>";
		echo "<h4><a href='".get_permalink()."'>".get_the_title()."</a></h4>";
		echo "<p>";
		$excerpt = strip_tags((get_the_content('')),"<p><b><strong><i><em>"); echo string_limit_wordsdept($excerpt,20);
		echo "</p>";
		echo "</li>";
		endwhile;
		endif; 
		wp_reset_query();

		echo '</ul></div>';

		echo $after_widget;
  }
}

add_action( 'widgets_init', function () { return register_widget('RecentPosts'); }, 1 );
?>