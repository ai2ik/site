<?php 



	class ewf_widget_popular_posts extends WP_Widget {

		function ewf_widget_popular_posts() {
			$widget_ops = array( 'classname' => 'ewf_widget_popular_posts', 'description' => __('A widget that displays popular posts from blog', EWF_SETUP_THEME_DOMAIN) );
			$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'ewf_widget_popular_posts' );
			$this->WP_Widget( 'ewf_widget_popular_posts', __('EWF - Popular Posts', EWF_SETUP_THEME_DOMAIN), $widget_ops, $control_ops );
		}
		


		function widget( $args, $instance ) {
			extract( $args );
			global $post;

			$title = apply_filters('widget_title', $instance['title'] );
			$items =  $instance['items']; 
			
			if ($items == null){
				$items = 3;
			}
			
			echo $before_widget;

			if ( $title ) 
				echo $before_title . $title . $after_title;
				
			$popular_posts = new WP_Query('orderby=comment_count&posts_per_page='.$items); 
			$posts_count = 0;
			$extra_class = null;
			
			echo '<ul class="blog-overview">';
				 while ($popular_posts->have_posts()) : $popular_posts->the_post();
					global $post;
					$posts_count++;
					
					if ($posts_count == 1){
						$extra_class = 'first'; 
					}elseif($posts_count == $items){
						$extra_class = 'last'; 
					}else{
						$extra_class = null;
					}
					
					$image_id = get_post_thumbnail_id($post->ID);  
					$image_url = wp_get_attachment_image_src($image_id,'blog-featured-thumb');  
					
					echo'<li class="fixed '.$extra_class.'">';
						echo '<div class="date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>';
						
						if ($image_id){
							echo '<img width="50" height="50" alt="" src="'.$image_url[0].'">';
							}
							
							echo '<a href="'. get_permalink($post->ID) .'">'.$post->post_title.'</a>'.substr(get_the_excerpt(),0,25).'
						</li>'; 
					
				endwhile;
			echo '</ul>';
			
			
			echo $after_widget;
		}
	 
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			
			$instance['title'] = strip_tags( $new_instance['title'] );
			$instance['items'] = strip_tags( $new_instance['items'] );

			return $instance;
		}
		

		function form( $instance ) {
			$defaults = array( 'title' => __(null , EWF_SETUP_THEME_DOMAIN));
			$instance = wp_parse_args( (array) $instance, $defaults ); ?>

			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Section title:', EWF_SETUP_THEME_DOMAIN); ?></label>
				<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
			</p>
			
			<p>
				<label for="<?php echo $this->get_field_id( 'items' ); ?>"><?php _e('Show posts:', EWF_SETUP_THEME_DOMAIN); ?></label>
				<input id="<?php echo $this->get_field_id( 'items' ); ?>" name="<?php echo $this->get_field_name( 'items' ); ?>" value="<?php echo $instance['items']; ?>" style="width:100%;" />
			</p>
 
		<?php
		}
	}


?>