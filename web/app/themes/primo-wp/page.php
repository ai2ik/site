<?php get_header(); ?>

	<div id="content" class="fixed"> 
		<?php 
		
		
			//## Check for homepage
			//##
			$location = str_replace(array(strtolower(get_bloginfo('url'))),'',strtolower(get_permalink()));
			if (strlen($location)>2){ $is_home = false; }else{ $is_home = true; }
			
			
			//## Load Header OR Slider
			//##			
			if ($is_home){		
				get_template_part('template', 'page-slider');
			}else{
				get_template_part('template', 'page-header');
			}
			
			
			//## Load current page sidebar
			//##
			$sidebar_id = ewf_get_sidebar_id('sidebar-page');		
			
			
			//## Load Header OR Slider
			//##
			$page_layout = ewf_get_sidebar_layout();
			switch ($page_layout) {
			
				case "layout-sidebar-single-left": 
					echo '<div class="row fixed">';
						echo '<div class="col280 no-print">';
							
							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>';
						echo '<div class="col580 last">';
						
							if ( have_posts() ) while ( have_posts() ) : the_post(); 										
								echo the_content();
							endwhile; 
								
						echo ' <div style="background-image: url(http://addiction-treatment-services.com/wp-content/uploads/2013/07/ctabottom.jpg); background-repeat: no-repeat; font-size: 20px; width: 580px; height: 100px; border: 1px solid #ccc;"><div style="position: relative; top: 43px; left: 202px; font-size: 40px; font-weight: bold; color: #22558e; text-shadow: 1px 1px 1px #cccccc; letter-spacing: 1px;">877-455-0055</div></div></div>';
					echo '</div>';
					break;
			
				case "layout-sidebar-single-right": 
					echo '<div class="row fixed">';
						echo '<div class="col580">';

							if ( have_posts() ) while ( have_posts() ) : the_post(); 
								echo the_content();
							endwhile; 

						echo '<div style="background-image: url(http://addiction-treatment-services.com/wp-content/uploads/2013/07/ctabottom.jpg); background-repeat: no-repeat; font-size: 20px; width: 580px; height: 100px; border: 1px solid #ccc;"><div style="position: relative; top: 43px; left: 202px; font-size: 40px; font-weight: bold; color: #22558e; text-shadow: 1px 1px 1px #cccccc; letter-spacing: 1px;"><span class="PhoneNumber4215">888.219.2787</span></div></div></div>';
						echo '<div class="col280 last no-print">';
						
							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>';
					echo '</div>';
					break; 
			
				case "layout-full": 
					if ( have_posts() ) while ( have_posts() ) : the_post(); 
						echo the_content();
					endwhile; 
					break; 
			}

		?>
	</div>	
	
<?php get_footer(); ?>