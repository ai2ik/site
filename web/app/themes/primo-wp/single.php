<?php get_header(); ?>

	<div id="content">

		<?php 
		
			//##
			//## Load Header
			//##			
			get_template_part('template', 'page-header');  
			
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
							
									get_template_part('template', 'single-post-full');
									
							echo '</div>';
						echo '</div>';
				break;
			
				case "layout-sidebar-single-right": 
						echo '<div class="row fixed">';
							echo '<div class="col580">';
								
								get_template_part('template', 'single-post-full'); 
								
							echo '</div>';
							echo '<div class="col280 last no-print">';

								if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
								
							echo '</div>';
						echo '</div>';
				break; 
			
				case "layout-full": 
					get_template_part('template', 'single-post-full');
					break;
			}
		
		?>
		
	</div>
	
<?php get_footer(); ?>