<?php

class Localist extends WP_Widget {
	function Localist() {
		$widget_ops = array('classname' => 'Localist', 'description' => 'Drop in a localist calendar' );
		$this->WP_Widget('Localist', 'Localist Events', $widget_ops);
	}
 
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );
		$text = $instance['text'];
?>
<p>
	<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Localist Javascript code'); ?></label>
	<textarea class="widefat" rows="8" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea><small>Generate your code <a href="http://events.uri.edu/help/widget">here</a> paste it into the box below. <strong>Recommended setting: Javascript</strong></small>
</p>
<?php
	}
 
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['text'] = $new_instance['text'];
		return $instance;
	}
 
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		echo $before_widget;
		
		$text = empty($instance['text']) ? ' ' : apply_filters('', $instance['text']);
		
		// WIDGET CODE GOES HERE
		echo "<div class='localist'>";
		echo $text;
		echo "</div>";
		echo $after_widget;
	}

}
add_action( 'widgets_init', create_function('', 'return register_widget("Localist");') );?>