<?php 


	add_action('admin_menu'	, 'ewf_services_meta_install');
	add_action('save_post'	, 'ewf_services_meta_update');
	
	
	function ewf_services_meta_install() {
		global $post;
		
		if (is_array($_GET) && array_key_exists('post', $_GET)){
			$post_id = intval($_GET['post']);
			$custom = get_post_custom($post_id); 
		
			if (array_key_exists('_wp_page_template', $custom) && $custom['_wp_page_template'][0] == 'page-service-single.php' )
				add_meta_box( 'ewf_services_meta',__('Extra settings'), 'ewf_services_meta_source', 'page', 'normal', 'high' );
				
		}
	
	}

	function ewf_services_meta_update() {
		global $post;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}
		
		update_post_meta($post->ID, "service_extra_info", $_POST["service_extra_info"]);
		update_post_meta($post->ID, "service_icon_url", $_POST["service_icon_url"]);
	}
 
	function ewf_services_meta_source() {
			global $post;
			
			$custom = get_post_custom($post->ID);
			$service_extra_info = $custom["service_extra_info"][0];
			$service_icon_url = $custom["service_icon_url"][0];
						
			echo '
			<div style="padding-top:10px;">
				<label style="display:block;padding:2px;">'.__('Service Extra Info', EWF_SETUP_THEME_DOMAIN).': </label><textarea style="width:420px;" rows="10" name="service_extra_info">'.$service_extra_info.'</textarea>
				<label style="display:block;padding:2px;">'.__('Icon URL', EWF_SETUP_THEME_DOMAIN).': </label><input style="width:420px;" name="service_icon_url" value="'.$service_icon_url.'">
			</div>';
	} 

?>