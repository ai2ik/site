<?php get_header(); ?>

	<div id="content">

		<?php
			global $wp_query, $more;
			
			
			$search_result_info = null;
			
			if ($wp_query->found_posts == 0){
				$search_result_info = '<p class="archive-title">'.__('No posts were found!', EWF_SETUP_THEME_DOMAIN).'</p>';
			}else{
				$search_result_info = '<p class="archive-title">'.__('Search results for: ', EWF_SETUP_THEME_DOMAIN).' <strong>'.$wp_query->query_vars['s'].'</strong></p>';
			}
			
			
			//##
			//## Load Header
			//##			
			get_template_part('template', 'page-header');  
			
			
			$sidebar_id = ewf_get_sidebar_id('sidebar-blog');
			$page_blog = ewf_get_page_relatedID();
		
		
			if (array_key_exists('post_type', $_GET)){
				$page_layout = ewf_get_sidebar_layout("layout-sidebar-single-right", $page_blog );
			}else{
				$page_layout = "layout-full-site"; 
			}
			
			apply_filters("debug", "Search Layout:".$page_layout );
		
			switch ($page_layout) {
			
				//### Seach on blog using right sidebar
				//###			
				case "layout-sidebar-single-left": 
					echo '<div class="row fixed">';
						echo '<div class="col280 no-print">';
						
							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>'; 
						
						echo '<div class="col580 last">';
								
								echo $search_result_info;
								get_template_part('template', 'single-post');
								
						echo '</div>';
					echo '</div>';
					break;
				
				
				//### Seach on blog using right sidebar
				//###			
				case "layout-sidebar-single-right": 
					echo '<div class="row fixed">';
						echo '<div class="col580">';
							
							echo $search_result_info;
							get_template_part('template', 'single-post'); 
														
						echo '</div>';						
						echo '<div class="col280 last no-print">';

							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>';
					echo '</div>';
					break; 
			
			
				//### Seach on blog using full content
				//###
				case "layout-full": 
					echo $search_result_info;
					get_template_part('template', 'single-post');
					
					break;
					
					
				//### Seach on site using full content
				//###
				case "layout-full-site": 
					echo $search_result_info;
					get_template_part('template', 'search');
					
					break;
			}
		
		?>
		 
	</div>
	
<?php get_footer(); ?>