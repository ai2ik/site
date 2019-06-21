<?php 

	define( 'EWF_TAXONOMY_INDEX'	, __('All Work', EWF_SETUP_THEME_DOMAIN));
	
	
	global $post, $wp_query;
	get_header();
	
?>
	
	<div id="content">
	
	<?php
		
		//##
		//## Load Header
		//##			
		get_template_part('template', 'page-header');  
	 
		
		$tax_term =  get_term_by( 'slug', $wp_query->query_vars['service'], EWF_PROJECTS_TAX_SERVICES);	
		$tax_query_projects = $wp_query;
		
		$page_portfolio = ewf_get_page_relatedID();
		
		if (is_object($tax_term)){
			
			if ($page_portfolio > 0){
				echo   '<h5 class="last"><a href="'.get_permalink($page_portfolio).'">'.EWF_TAXONOMY_INDEX.'</a> / '.$tax_term->name.'</h5> 
						<div class="hr"></div>';				
			}else{
				echo   '<h5 class="last">'.EWF_TAXONOMY_INDEX.' / '.$tax_term->name.'</h5> 
						<div class="hr"></div>';
			}
		}
		
		echo ewf_projects_sc_overview(array('nav'=>'true', 'hassidebar'=>'false'), null); 

	?>
	
	</div>
	
<?php
	get_footer();  
 ?>