					<?php 



	if (get_option( EWF_SETUP_THNAME.'_slider_home', 'true')=='true'){

		$wp_slider_query = new WP_Query(array( 'post_type' => 'slide', 'orderby'=>'DATE', 'posts_per_page' => 15, 'order'=>'ASC' ));

	

		if ($wp_slider_query->post_count){  

		

			echo'<div id="slideshow-index"><div id="slideshowbottom"><div style="position: relative; top: 43px; left: 407px; font-size: 40px; font-weight: bold; color: #22558e; text-shadow: 1px 1px 1px #cccccc; letter-spacing: 1px;">877-455-0055</div></div>

					<ul>';

				

					while ($wp_slider_query->have_posts()) : $wp_slider_query->the_post();

						$image_id = get_post_thumbnail_id();  

						$image_url = wp_get_attachment_image_src($image_id,'slider-full');  

						$slide_custom = get_post_custom($post->ID);

						

						echo '<li>';

							echo '<img src="'.$image_url[0].'" width="1000" height="360" alt="" />';

							

							//if ( get_option(EWF_SETUP_THNAME."_slider_text","true") == "true"){				

								//if (array_key_exists('slide_text', $slide_custom) && trim($slide_custom['slide_text'][0]) != null){

									//echo '<div class="slidetext">'.$slide_custom["slide_text"][0].'</div>';}} 

						echo '</li>'; 

					endwhile; 	

					

					wp_reset_query();

				

				echo '</ul>

				</div>';

				

		} else {				

			echo ewf_message(__('There are no slides, please add slides to show the slider!',EWF_SETUP_THEME_DOMAIN));

		}

		

	}else{

		

		//## If slider is deactivated load page header

		//##

		get_template_part('template', 'page-header');  

		

	}



?>