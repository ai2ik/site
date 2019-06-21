<?php

	add_action('init', 'ewf_register_type_slide');
	
	add_action('admin_menu'	, 'ewf_slide_meta_install');
	add_action('save_post'	, 'ewf_slide_meta_update');
	
	add_image_size( 'slider-full', 1000, 360, true);
	
	function ewf_register_type_slide() {
		register_post_type('slide', 
		
			array(
			'labels' => array(
				'name' 					=> __( 'Slides'						,EWF_SETUP_THEME_DOMAIN ),
				'singular_name' 		=> __( 'Slide'						,EWF_SETUP_THEME_DOMAIN ),
				'add_new' 				=> __( 'Add New'					,EWF_SETUP_THEME_DOMAIN ),
				'add_new_item' 			=> __( 'Add New Slide'				,EWF_SETUP_THEME_DOMAIN ),
				'edit' 					=> __( 'Edit'						,EWF_SETUP_THEME_DOMAIN ),
				'edit_item' 			=> __( 'Edit Slide'					,EWF_SETUP_THEME_DOMAIN ),
				'new_item' 				=> __( 'New Slide'					,EWF_SETUP_THEME_DOMAIN ),
				'view' 					=> __( 'View Slide'					,EWF_SETUP_THEME_DOMAIN ),
				'view_item' 			=> __( 'View Slide'					,EWF_SETUP_THEME_DOMAIN ),
				'search_items' 			=> __( 'Search Slides'				,EWF_SETUP_THEME_DOMAIN ),
				'not_found' 			=> __( 'No slides found'			,EWF_SETUP_THEME_DOMAIN ),
				'not_found_in_trash' 	=> __( 'No slides found in Trash'	,EWF_SETUP_THEME_DOMAIN ),
				'parent' 				=> __( 'Parent slides'				,EWF_SETUP_THEME_DOMAIN ),
				),
			'public' 	=> true,
			'rewrite' 	=> false, 
			'slug'		=> 'slide',
			'show_ui' 	=> true,
			'supports' 	=> array('title', 'thumbnail') 
			));
	}
	
	function ewf_slide_meta_install() {
		 add_meta_box( 'ewf_slides_meta',__('Slide text'), 'ewf_slide_meta_source', 'slide', 'normal', 'high' );
	}

	function ewf_slide_meta_update() {
		global $post;
		update_post_meta($post->ID, "slide_text", $_POST["slide_text"]);
	} 
 
	function ewf_slide_meta_source() {
			global $post; 
			
			$custom = get_post_custom($post->ID);
		
			$slide_text = $custom["slide_text"][0]; 
			
			echo '		
			<div style="padding-top:10px;">
				<label style="display:block;padding:2px;"><textarea style="width:440px;" name="slide_text" >'.$slide_text.'</textarea> 
			</div>';
	}


?>