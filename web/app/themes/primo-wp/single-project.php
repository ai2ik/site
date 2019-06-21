<?php get_header(); ?>
	<div id="content">
	
	<?php		
	
		
		//##
		//## Load Header
		//##			
		get_template_part('template', 'page-header');  
		
		
		$sidebar_id = ewf_get_sidebar_id('sidebar-portfolio');
		$page_portfolio = ewf_get_page_relatedID();
		$nav_data = ewf_projects_get_nav();
		
		
		$page_layout = ewf_get_sidebar_layout("layout-full", $page_portfolio );
		switch ($page_layout) {
		
			case "layout-sidebar-single-left": 
								
				echo '<div class="fixed">';
					echo '<div class="col280 no-print">';
					
						if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
						
					echo '</div>';
					echo '<div class="col580 last">';
							
							if ( have_posts() ) while ( have_posts() ) : the_post(); 																
								echo the_content();
							endwhile; 
							
						echo '</div>';
				echo '</div>';
				break;
		
			case "layout-sidebar-single-right": 
					
				echo '<div class="fixed">'; 
					echo '<div class="col580">';
					
						if ( have_posts() ) while ( have_posts() ) : the_post(); 
							echo the_content();
						endwhile;  
						
					echo '</div>'; 
					echo '<div class="col280 last no-print">';
						
						if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
						
					echo '</div>';
				echo '</div>';
				break; 
		
			case "layout-full":  
				if ( have_posts() ) while ( have_posts() ) : the_post(); 
					
					echo '<div class="fixed">'; 
							echo the_content();
					echo '</div>';;
				 
				endwhile; 
				break;
		}

	?>
	
	</div>
	
<?php get_footer(); ?>