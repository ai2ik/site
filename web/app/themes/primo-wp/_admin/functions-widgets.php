<?php
	
	include_once('widgets/widget-search.php');
	include_once('widgets/widget-brochure.php');
	include_once('widgets/widget-navigation.php');
	include_once('widgets/widget-popular-posts.php'); 
	include_once('widgets/widget-portfolio-filters.php'); 
	
	add_action( 'widgets_init', 'ewf_widgets_load' );
	
	function ewf_widgets_load() {
		register_widget( 'ewf_widget_search' );
		register_widget( 'ewf_widget_brochure' );
		register_widget( 'ewf_widget_navigation' );
		register_widget( 'ewf_widget_popular_posts' );
		register_widget( 'ewf_widget_portfolio_filters' );
	}

?>