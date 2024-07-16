<?php

class Localist extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'Localist', 'description' => 'Drop in a localist calendar' );
		parent::__construct('Localist', 'Localist Events', $widget_ops);
	}

	/**
	 * Renders the widget form
	 */
	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );

		$content = '<p>';
		$content .= '<label for="' . $this->get_field_id('text') . '">' . _e('Localist Javascript code', 'uri-department') . '</label>';
		$content .= '<textarea class="widefat" rows="8" id="' . $this->get_field_id('text') . '" name="' . $this->get_field_name('text') . '">' . $instance['text'] . '</textarea>';
		$content .= '<small>Generate your code <a href="http://events.uri.edu/help/widget">here</a> paste it into the box below. <strong>Recommended setting: Javascript</strong></small>';
		$content .= '</p>';
		
		print $content;
  }
 
	/**
	 * Handles updates to widget
	 */
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['text'] = $new_instance['text'];
		return $instance;
	}

	/**
	 * Outputs widget to page
	 */
	function widget($args, $instance) {
		extract($args, EXTR_SKIP);
		$text = empty($instance['text']) ? ' ' : apply_filters('', $instance['text']);

		print $before_widget;
		print '<div class="localist">' . $text . '</div>';
		print $after_widget;
	}

}
add_action( 'widgets_init', function () { return register_widget('Localist'); }, 1 );