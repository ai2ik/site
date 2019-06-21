<?php 

	class ewf_widget_search extends WP_Widget {
		function ewf_widget_search() {
			$widget_ops = array( 'classname' => 'ewf_widget_search', 'description' => __('A widget that displays search field for blog', EWF_SETUP_THEME_DOMAIN) );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ewf_widget_search' );
			$this->WP_Widget( 'ewf_widget_search', __('EWF - Search', EWF_SETUP_THEME_DOMAIN), $widget_ops, $control_ops );
		}
		
		function widget( $args, $instance ) {
			extract( $args );
			global $post;
			
			$title = apply_filters('widget_title', $instance['title'] );

			echo $before_widget;

			if ( $title ) 
				echo $before_title . $title . $after_title;
				echo '<form id="search" method="get" id="searchform" action="'.get_bloginfo('url').'">
						<fieldset>
							<input type="text" class="text" id="search-input" name="s" value="search..." onfocus="if(this.value=='."'search...'".')this.value='."''".';" onblur="if(this.value=='."''".')this.value='."'search...'".'"  />';
				
							if ($instance['search-blog'] == 'on'){
								echo '<input type="hidden" name="post_type" value="post" />';
							}
				
					echo '<input type="submit" class="search-submit-btn" id="search_submit" value="" />
					</fieldset>
				</form>';
			
			echo $after_widget;
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['search-blog'] = strip_tags( $new_instance['search-blog'] ); 

			return $instance;
		}
		
		function form( $instance ) {
			$defaults = array( 'title' => __( null, EWF_SETUP_THEME_DOMAIN));
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
			</p>
			 
			<p>
				<input type="checkbox" id="<?php echo $this->get_field_id( 'search-blog' ); ?>" name="<?php echo $this->get_field_name( 'search-blog' ); ?>" <?php check_checkbox( $instance['search-blog']); ?> />
				<label for="<?php echo $this->get_field_id( 'search-blog' ); ?>"><?php _e('Search only blog content', EWF_SETUP_THEME_DOMAIN); ?></label>
			</p>  
			
		<?php
		}
	}
?>