<?php
	define ('EWF_LAYOUT_SIDEBARS', true);
	define ('EWF_LAYOUT_FOOTER', false);


	add_action('admin_menu', 'ewf_layoutMetaBox');
	add_action('admin_menu', 'ewf_removeMetaCustomFields' );
	
	add_action('save_post', 'ewf_layoutSidebarsMetaBoxSettingsUpdate');
	add_action('save_post', 'ewf_layoutFooterMetaBoxSettingsUpdate');
	
	add_action('wp_ajax_ewf_create_sidebar', 'ewf_sid_create');
	add_action('wp_ajax_ewf_delete_sidebar', 'ewf_sid_delete');
	
	
	
	
	
	if (get_option('ewf_settings_sidebars', null) == null){
		update_option('ewf_settings_sidebars', serialize(null));
		$ewf_sidebars =null;
	}else{
		$ewf_sidebars = unserialize(get_option('ewf_settings_sidebars'));
	}
	
	
	
	//##
	//## Delete sidebar via Theme options & Ajax
	//##
	function ewf_sid_delete(){
		$ewf_sidebars = unserialize(get_option('ewf_settings_sidebars'));
		$response = array();

		if (array_key_exists('id', $_POST)){
			$sidebar_id = $_POST['id'];
			
			if (array_key_exists($sidebar_id, $ewf_sidebars)){
				unset($ewf_sidebars[$sidebar_id]);
				update_option('ewf_settings_sidebars', serialize($ewf_sidebars));
				
				$response['state'] = 1;
			}else{
				$response['state'] = 0;
				$response['error'] = 'Sidebar ID does not exist!';
			
			}
		}
		
		echo json_encode($response);
		exit;
	}
	
	
	//##
	//## Create new sidebar via MetaBox & Ajax
	//##
	function ewf_sid_create(){
		global $ewf_sidebars;
		$response = array();

		if (array_key_exists('name', $_POST)){
			$sidebar_id = strtolower(str_replace(array('#', '@', '$', '-', '_', ' '), '_', $_POST['name'])); 
			
			if (! array_key_exists($sidebar_id, $ewf_sidebars)){
				$ewf_sidebars[$sidebar_id] = $_POST['name'];
				update_option('ewf_settings_sidebars', serialize($ewf_sidebars));
				
				$response['state'] = 0;
				$response['html'] = '<option id="'.$id.'" selected="selected">'.$_POST['name'].'</option>';
			}else{
				$response['state'] = 1;
				$response['html'] = '<span>The sidebar already exists</span>'; 
			} 
		}
		
		echo json_encode($response);exit;
	}
	
	
	
	
	//##
	//## Remove custom fields meta box from interface
	//##
	function ewf_removeMetaCustomFields() {
		if (EWF_LAYOUT_SIDEBARS){
			remove_meta_box( 'postcustom', 'page', 'normal' ); 
			}
		
		if (EWF_LAYOUT_FOOTER){
			
			}
	}
	
	function ewf_layoutMetaBox() {
		
		if (EWF_LAYOUT_SIDEBARS){
			add_meta_box( 'ewf-layout-sidebars-setup',__('Sidebar Layout Settings',EWF_SETUP_THEME_DOMAIN), 'ewf_layoutSidebarsMetaBoxCode', 'page', 'normal', 'high');
			add_meta_box( 'ewf-layout-sidebars-setup',__('Sidebar Layout Settings',EWF_SETUP_THEME_DOMAIN), 'ewf_layoutSidebarsMetaBoxCode', EWF_PROJECTS_SLUG, 'normal', 'high');  
			}
			
		if (EWF_LAYOUT_FOOTER){
			add_meta_box( 'ewf-layout-footer-setup',__('Footer Layout Settings',EWF_SETUP_THEME_DOMAIN), 'ewf_layoutFooterMetaBoxCode', array('page',EWF_PROJECTS_SLUG), 'normal', 'high');
			}
	}

	function ewf_layoutSidebarsMetaBoxCode() {
			global $post, $ewf_sidebars;
			
			$layouts = array(
				array(
					'icon' => 'layout-sidebar-single-left.png',
					'name' => 'layout-sidebar-single-left',
					'title' => 'Sidebar Left'
				),
				array(
					'icon' => 'layout-full.png',
					'name' => 'layout-full',
					'title' => 'No Sidebar'
				),
				array(
					'icon' => 'layout-sidebar-single-right.png',
					'name' => 'layout-sidebar-single-right',
					'title' => 'Sidebar Right'
				)
			);
			
			$layout_default = 'layout-sidebar-single-left';
			$layout_sidebar_id = ewf_get_sidebar_id();
			
			
			$ewf_page_layout = null;
			$custom = get_post_custom($post->ID);
			
			// Check if there is a setup layout
			if (array_key_exists('_ewf-page-layout',$custom)){
				$ewf_page_layout = $custom["_ewf-page-layout"][0];
			}else{
				$ewf_page_layout = $layout_default;
			}
			
			echo '<div class="ewf-layout-widget">';
				echo '<label class="side-new">Choose the position the sidebar should have on the page</label>'; 
				echo '<div class="clearfix">';
					foreach($layouts as $key=>$layout){
						$class = null;
						
						if ($ewf_page_layout==$layout['name']){ $class=" active"; }else{ $class=null; }
					
						echo '<a style="background:url('.get_bloginfo('template_directory').'/_admin/images/'.$layout['icon'].') no-repeat;" class="ewf-page-layout'.$class.'"  id="'.$layout['name'].'" title="'.$layout['title'].'" ></a>';
					}
				echo '</div>';
				
				echo '<hr/>';
				echo '<label>Choose from the existing sidebars, the one you want this page to use.</label>';
				
				
				echo '<select id="ewf-page-sidebar" name="ewf-page-sidebar">';
					
					$ewf_sidebars['sidebar-blog'] = 'Blog Sidebar';
					$ewf_sidebars['sidebar-page'] = 'Page Sidebar'; 				
					
					if (is_array($ewf_sidebars)){
						foreach($ewf_sidebars as $sidebar_id => $sidebar_name){
							if ($layout_sidebar_id == $sidebar_id){
								echo '<option value="'.$sidebar_id.'" selected="selected">'.$sidebar_name.'</option>';
							}else{
								echo '<option value="'.$sidebar_id.'">'.$sidebar_name.'</option>';
							}
						}
					}
					
				echo '</select>';
				
				echo '<hr/>';
				
				echo '<div id="ewf-new-sidebar-form" >'; 
					echo '<label class="side-new">Or create new sidebar</label>'; 
					echo '<div class="clearfix"><input type="text" id="ewf-sidebar-name"  value="Sidebar Name" /><input type="button" id="ewf-create-sidebar" class="preview button" value="Create Sidebar"></div>';
				echo '</div>'; 
					
				
				echo '<input type="hidden" id="ewf-page-layout" name="ewf-page-layout" value="'.$ewf_page_layout.'" />';
			echo '</div>';
	}
	
	function ewf_layoutFooterMetaBoxCode() {
			global $post;
			
			$layouts = array(
				array(
					'icon' => 'layout-footer-three-equal.png',
					'name' => 'layout-footer-three-equal'
				),
				array(
					'icon' => 'layout-footer-three-unequal.png',
					'name' => 'layout-footer-three-unequal'
				),
				array(
					'icon' => 'layout-footer-four.png',
					'name' => 'layout-footer-four'
				),
				array(
					'icon' => 'layout-footer-double-equal.png',
					'name' => 'layout-footer-double'
				),

			);
			
			$ewf_footer_layout = null;
			$custom = get_post_custom($post->ID);
			
			// Check if there is a setup for footer layout
			if (array_key_exists('_ewf-footer-layout',$custom)){
				$ewf_footer_layout = $custom["_ewf-footer-layout"][0];
				}
			
			echo '<div class="clearfix">';
				foreach($layouts as $key=>$layout){
					$class = null;
					
					if ($ewf_footer_layout==$layout['name']){ $class=" active"; }else{ $class=null; }
				
					echo '<div style="background:url('.get_bloginfo('template_directory').'/_admin/images/'.$layout['icon'].') no-repeat;" class="ewf-footer-layout'.$class.'"  id="'.$layout['name'].'" ></div>';
				}
			echo '</div>';
			
			echo '<input type="hidden" id="ewf-footer-layout" name="ewf-footer-layout" value="'.$EWF_footer_layout.'" />';
	}

	function ewf_layoutSidebarsMetaBoxSettingsUpdate() {
		global $post;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}
		
		update_post_meta($post->ID, "_ewf-page-layout", $_POST["ewf-page-layout"]);
		update_post_meta($post->ID, "_ewf-page-sidebar", $_POST["ewf-page-sidebar"]);
		
	}
	
	function ewf_layoutFooterMetaBoxSettingsUpdate() {
		global $post;
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post->ID;
		}
		
		update_post_meta($post->ID, "_ewf-footer-layout", $_POST["ewf-footer-layout"]);
	}
	
	function ewf_get_sidebar_layout($default = "layout-full", $post_id = 0){
		global $post;
		
				
		
		if ($post_id > 0){
			$item_meta = get_post_custom($post_id);	// get the item custom variables
		}else{
			$item_meta = get_post_custom($post->ID);	// get the item custom variables
		}
		
		if (array_key_exists('_ewf-page-layout',$item_meta)){
			$layout = $item_meta["_ewf-page-layout"][0];
			
			if ($layout!=null) { 
				$default = $layout;
			}			
		}
			
		return $default;	
	} 
	
	function ewf_get_sidebar_id($default = null, $post_id = 0){
		global $post;
		
		if ($post_id){
			$item_meta = get_post_custom($post_id);
		}else{
			if (is_object($post)){
				$item_meta = get_post_custom($post->ID);
			}else{
				$item_meta = null;
			}
		}
		
		if ( is_array($item_meta) &&  array_key_exists('_ewf-page-sidebar',$item_meta)){
			$sidebar_id = $item_meta["_ewf-page-sidebar"][0];
			
			if ($sidebar_id != null) { 
				$default = $sidebar_id; 
			}		
		}
			
		apply_filters("debug", "Sidebar ID:".$default );
			
		return $default;	
	}
	
	function ewf_get_footer_layout($default = "layout-footer-four"){
		global $post;
		$item_meta = get_post_custom($post->ID);	// get the item custom variables
		
		if (is_array($item_meta) && array_key_exists('_ewf-footer-layout',$item_meta)){
			$layout = $item_meta["_ewf-footer-layout"][0];
			
			if ($layout!=null) { 
				$default = $layout; 
			}
		}
			
		return $default;
	}
	
	
	
	
	
	
	
	//##
	//## It get's the related ID, returns the following
	//## - Page ID if this is a single page
	//## - Blog page ID from theme options if this is a blog post or an archive page
	//## - Parent page ID if this is a child page
	//##
		
	function ewf_get_page_relatedID(){
		global $post;
		
		if (is_object($post)){
			$ewf_page_id = $post->ID;
			}
		
		if (is_single()){
			$ewf_page_data = null;
			
			switch($post->post_type){
				case "post":
					$ewf_page_data = get_page_by_title( get_option(EWF_SETUP_THNAME."_page_blog", null ) );
					apply_filters("debug", "Related ID: Post Single");
					
					break;
			
				case EWF_PROJECTS_SLUG:
					$ewf_page_data = get_page_by_title( get_option(EWF_SETUP_THNAME."_page_portfolio", null ) );
					apply_filters("debug", "Related ID: EWF_PROJECTS_SLUG Single"); 
					
					break;		
			}
			
			if (is_object($ewf_page_data)){
				$ewf_page_id = $ewf_page_data->ID;
				}	

		}elseif(is_page() && count($post->ancestors)){
		
			$ewf_page_id = $post->ancestors[0];
			apply_filters("debug", "Related ID: Child Page");
		
		}elseif(is_archive()){
			
			if (is_tax(EWF_PROJECTS_TAX_SERVICES)){
				
				$ewf_page_data = get_page_by_title( get_option(EWF_SETUP_THNAME."_page_portfolio", null ) );
				apply_filters("debug", "Related ID: EWF_PROJECTS_SLUG Taxonomy"); 			
				
			}else{
			
				$ewf_page_data = get_page_by_title( get_option(EWF_SETUP_THNAME."_page_blog", null ) );
				apply_filters("debug", "Related ID: Archive Page");
				
			}
			
			if (is_object($ewf_page_data)){
				$ewf_page_id = $ewf_page_data->ID;
			}else{
				$ewf_page_id = 0;
			}

		}elseif(is_search()){
			$ewf_page_data = get_page_by_title( get_option(EWF_SETUP_THNAME."_page_blog", null ) );
			
			if (is_object($ewf_page_data)){
				
				apply_filters("debug", "Related ID: Search Page");
				$ewf_page_id = $ewf_page_data->ID;
			}	
		}

		
		
		return $ewf_page_id;
	}
	
	
	
	
	?>