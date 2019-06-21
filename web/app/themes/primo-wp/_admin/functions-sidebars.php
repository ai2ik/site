<?php


	if (function_exists('register_sidebar')){

		
		/** Header sidebar
		 **/
		register_sidebar(array('id' => 'header-top', 'name' => __('Header Widget 1',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the header the right column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));		
		register_sidebar(array('id' => 'header-top-search', 'name' => __('Header Widget 2',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the header the right column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));		

		
		
		/** Footer sidebar
		 **/
		register_sidebar(array('id' => 'footer-widgets-1', 'name' => __('Footer Widget 1',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));
		register_sidebar(array('id' => 'footer-widgets-2', 'name' => __('Footer Widget 2',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));
		register_sidebar(array('id' => 'footer-widgets-3', 'name' => __('Footer Widget 3',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));
		register_sidebar(array('id' => 'footer-widgets-4', 'name' => __('Footer Widget 4',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));
		register_sidebar(array('id' => 'footer-bottom-left', 'name' => __('Footer Bottom Left',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null ));
		register_sidebar(array('id' => 'footer-bottom-right', 'name' => __('Footer Bottom Right',EWF_SETUP_THEME_DOMAIN), 'description'   => __('In the footer the left column',EWF_SETUP_THEME_DOMAIN), 'before_title'  => null,'after_title'   => null, 'before_widget' => null, 'after_widget'  => null )); 
		
		
		/**	Page Sidebars
		 **/
		register_sidebar(array('id' => 'sidebar-page', 'name' => __('Sidebar Page',EWF_SETUP_THEME_DOMAIN), 'description'   => __('Page sidebar',EWF_SETUP_THEME_DOMAIN),'before_title'  => '<h5>','after_title'   => '</h5>', 'before_widget' => '<div class="sidebartop"></div><div id="%1$s" class="widget list-nav %2$s">', 'after_widget'  => '</div><div class="sidebarbottom"></div>' ));
		register_sidebar(array('id' => 'sidebar-blog', 'name' => __('Sidebar Blog',EWF_SETUP_THEME_DOMAIN), 'description'   => __('Blog sidebar',EWF_SETUP_THEME_DOMAIN),'before_title'  => '<h5>','after_title'   => '</h5>', 'before_widget' => '<div class="sidebartop"></div><div id="%1$s" class="widget list-nav %2$s">', 'after_widget'  => '</div><div class="sidebarbottom"></div>' ));
	
		

		if (is_array($ewf_sidebars)){
			foreach($ewf_sidebars as $sidebar_id => $sidebar_name){
				register_sidebar(array('id' => $sidebar_id, 'name' => __($sidebar_name ,EWF_SETUP_THEME_DOMAIN), 'description'   => __('Dynamic Sidebar',EWF_SETUP_THEME_DOMAIN),'before_title'  => '<h5>','after_title'   => '</h5>', 'before_widget' => '<div id="%1$s" class="widget list-nav %2$s">', 'after_widget'  => '</div>' ));
			}
		}
		
	}

?>