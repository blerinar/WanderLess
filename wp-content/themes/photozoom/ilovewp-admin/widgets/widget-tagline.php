<?php

/*------------------------------------------*/
/* ILOVEWP: Widget Tagline		            */
/*------------------------------------------*/
 
add_action('widgets_init', create_function('', 'return register_widget("academia_widget_tagline");'));

class academia_widget_tagline extends WP_Widget {
	
	public function __construct() {

		parent::__construct(
			'academia-widget-featured-pages',
			esc_html__( 'ILOVEWP: Widget Tagline', 'photozoom' ),
			array(
				'classname'   => 'ilovewp-widget-tagline',
				'description' => esc_html__( 'Displays a line of text that appears before the title of the widget that goes after it.', 'photozoom' )
			)
		);

	}

	public function widget( $args, $instance ) {
		
		extract( $args );

		/* User-selected settings. */
		$title = apply_filters( 'widget_title', empty($instance['widget_title']) ? '' : $instance['widget_title'], $instance );

		/* Before widget (defined by themes). */
		echo $before_widget;
		
		/* Title of widget (before and after defined by themes). */
		if ( $title ) {
			echo '<p class="widget-pretitle">'; 
			echo $title; 
			echo '</p>';
		}

		wp_reset_postdata();

		/* After widget (defined by themes). */
		echo $after_widget;
	}
	
	
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['widget_title'] = sanitize_text_field ( $new_instance['widget_title'] );

		return $instance;
	}
	
	public function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( );
		$instance = wp_parse_args( (array) $instance, $defaults );

		$instance['widget_title'] = sanitize_text_field( $instance['widget_title'] );
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'widget_title' ); ?>" style="display: block; font-size: 14px; font-weight: bold; margin: 0 0 10px;"><?php esc_html_e('Widget Title', 'photozoom'); ?>:</label>
			<input id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" value="<?php echo esc_attr($instance['widget_title']); ?>" type="text" class="widefat" style="padding: 8px 10px; font-size: 14px;" />
		</p>

		<?php
	}
}
?>