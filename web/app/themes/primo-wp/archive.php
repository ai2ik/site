<?php get_header(); ?>

	<div id="content">
		<?php 
		
		
			//## Load Header
			//##			
			get_template_part('template', 'page-header');  
			
		
		
			
			global $wp_query, $more;
			$date = null;
			$page_title = null;
			
			if ($wp_query->is_category == 1 && $wp_query->is_archive == 1) {
				$cat_ID = get_query_var('cat');
				$categ = get_category($cat_ID,false);
					
				$page_title = '<p class="archive-title">'.__('Viewing posts categorised under:', EWF_SETUP_THEME_DOMAIN).' <strong>'.ucfirst($categ->category_nicename).'</strong></p>';
			}
			
			if ($wp_query->is_category == null && $wp_query->is_archive == 1 && $wp_query->is_month = 1) {
				
				if (get_query_var('monthnum').get_query_var('year') != null ){
					$tmp_date = '1'.'-'.get_query_var('monthnum').'-'.get_query_var('year');
					$date = date('F Y' ,strtotime($tmp_date));					
				}
				
				if (get_query_var('m') != null ){
					$tmp_year = substr(get_query_var('m'), 0, 4);
					$tmp_month = substr(get_query_var('m'), 5, 7);
					
					$tmp_date = '1'.'-'.$tmp_month.'-'.$tmp_year;
					$date = date('F Y' ,strtotime($tmp_date));					
				}
				
				$page_title = '<p class="archive-title">'.__('Viewing posts from:', EWF_SETUP_THEME_DOMAIN).' <strong>'.$date.'</strong></p>';
			} 

			
			
			
			$sidebar_id = ewf_get_sidebar_id('sidebar-blog');
			$page_blog = ewf_get_page_relatedID();
		
		
			$page_layout = ewf_get_sidebar_layout("layout-full", $page_blog );		
			switch ($page_layout) {
			
				case "layout-sidebar-single-left": 
						echo '<div class="row fixed">';
							echo '<div class="col280 no-print">';
								
								if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
								
							echo '</div>';
							echo '<div class="col580 last">';
									
									if ($page_title != null){ echo $page_title; }
									get_template_part('template', 'single-post');
									
							echo '</div>';
						echo '</div>'; 
				break;
			
				case "layout-sidebar-single-right": 
						echo '<div class="row fixed">';
							echo '<div class="col580">';
							
								if ($page_title != null){ echo $page_title; }
								get_template_part('template', 'single-post'); 
								
							echo '</div>';
							echo '<div class="col280 last no-print">';
						
								if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
								
							echo '</div>';
						echo '</div>';
				break; 
			
				case "layout-full": 
				
					if ($page_title != null){ echo $page_title; }
					get_template_part('template', 'single-post');
					
					break;
			}
		
		?>
		 
	</div>
	
<?php get_footer(); ?>