<?php
	add_filter('widget_text', 'do_shortcode');
	add_action('wp_footer', 'ewf_map_javascript_handler');


	add_shortcode("hr"						, "ewf_sc_hr");						//
	add_shortcode("br"						, "ewf_sc_br");						//
	add_shortcode("map"						, "ewf_sc_map");					//
	add_shortcode("template-url"			, "ewf_sc_url");					//

	add_shortcode("services-overview"		, "ewf_sc_services_overview");		// 
	add_shortcode("services-summary"		, "ewf_sc_services_summary");		// 
	add_shortcode("services-list"			, "ewf_sc_services_list");			// 
 
	add_shortcode("blog-summary"			, "ewf_sc_blog_summary");			//
	add_shortcode("blog"					, "ewf_sc_blog_overview");			//
	
	add_shortcode("form-contact"			, "ewf_sc_form_contact");			//
	
	add_shortcode( "message"				, "ewf_sc_message");				//
	add_shortcode( "clientlogo"				, "ewf_sc_client_logo");			//
	add_shortcode( "blockquote"				, "ewf_sc_quote");
	add_shortcode( "highlight"				, "ewf_sc_highlight");				//
	add_shortcode( "highlight2"				, "ewf_sc_highlight2");				//
	add_shortcode( "checklist"				, "ewf_sc_checklist");				//
	
	add_shortcode( "lightbox"				, "ewf_sc_lightbox");				//
	add_shortcode( "code"					, "ewf_sc_code");					//
	
	add_shortcode( "acordion"				, "ewf_sc_acordion");				//
	add_shortcode( "slide"					, "ewf_sc_acordion_slide");			//

	add_shortcode( "tabs"	 				, "ewf_sc_tabs");					//
	add_shortcode( "tab"			 		, "ewf_sc_tabs_tab");				//
	
	add_shortcode( "newsletter"				, "ewf_sc_newsletter"); 			// 


	$_ewf_maps_instances = null;
	$_ewf_links_extra_slide_instances = null;
	
	$_ewf_acordion_instances = array('0'=>null);
	$_ewf_acordion_slides_instances = array('0'=>null);
	
	$_ewf_tabs_instances = array('0'=>null);
	
	
	function ewf_sc_tabs_tab ( $atts, $content = null ){
		global $_ewf_tabs_instances;
		
		$current_tab_instance_id =  count($_ewf_tabs_instances)-1;
		$current_tab_id =  count($_ewf_tabs_instances[$current_tab_instance_id]);
		
		extract(shortcode_atts(array(
			"current" => false,
			"title" => "Tab ".$current_tab_id
		), $atts));
			
		$_ewf_tabs_instances[$current_tab_instance_id][$current_tab_id]['title'] = $title;
		$_ewf_tabs_instances[$current_tab_instance_id][$current_tab_id]['current'] = $current;
		$_ewf_tabs_instances[$current_tab_instance_id][$current_tab_id]['content'] = do_shortcode($content);
	}	

	function ewf_sc_tabs ( $atts, $content = null ){
		global $_ewf_tabs_instances;
					
		$tab_instance_id =  count($_ewf_tabs_instances);
		$_ewf_tabs_instances[$tab_instance_id] = null;
				
		do_shortcode($content);
				
		$src_tabs = null;
		$src_content = null;
		
		$src_tabs.='<ul id="tab-'.$tab_instance_id.'" class="tabs-menu fixed">';
		foreach($_ewf_tabs_instances[$tab_instance_id] as $key=> $tab){
			$src_tabs.= '<li ';
			if ($tab['current']){ $src_tabs.= 'class="current"'; }
			$src_tabs.= '><a href="#content-tab-'.$tab_instance_id.'-'.$key.'">'.$tab['title'].'</a></li>';
			
			$src_content.= '<div id="content-tab-'.$tab_instance_id.'-'.$key.'" class="tabs-content" ';
			if (!$tab['current']){ $src_content.= 'style="display:none;"'; }
			$src_content.= '>'.$tab['content'].'</div>';
			
		}
		$src_tabs.='</ul>';
		
		return $src_tabs.$src_content;
	}		
	
	function ewf_sc_acordion_slide ( $atts, $content = null ){
		global $_ewf_acordion_instances;
		global $_ewf_acordion_slides_instances;

		$current_acordion_id = count($_ewf_acordion_instances)-1;
		$slide_id =  count($_ewf_acordion_slides_instances);
		$_ewf_acordion_slides_instances[$slide_id] = null;
		
		$src = null;
		
		extract(shortcode_atts(array(
			"title" => 'Slide '.$slide_id,
			"current" => false
		), $atts));		
				
		if ($current){ 
			$src .= '<li class="current"><a rel="#accordion-'.$current_acordion_id.'-slide-'.$slide_id.'">'.$title.'</a><div style="display:block;"><p>'.$content.'</p></div></li>';
		}else{
			$src .= '<li><a rel="#accordion-'.$current_acordion_id.'-slide-'.$slide_id.'">'.$title.'</a><div style="display: none;"><p>'.$content.'</p></div></li>';
		}
		
		return $src;
	}
	
	function ewf_sc_url( $atts, $content = null ){
		return get_template_directory_uri();
	}
				
	function ewf_sc_acordion ( $atts, $content = null ){
		global $_ewf_acordion_instances;
		
		extract(shortcode_atts(array(
			//"align" => 'left'
		), $atts));
			
		$acordion_id =  count($_ewf_acordion_instances);
		$_ewf_acordion_instances[$acordion_id] = null;
				
		return '<ul class="accordion fixed"  id="accordion-'.$acordion_id.'">'.do_shortcode($content).'</ul>';
	}	
	
	function ewf_sc_checklist ( $atts, $content = null ){
		extract(shortcode_atts(array(
			//"align" => 'left'
		), $atts));
			
		return '<div class="checklist">'.$content.'</div>';
	}

	function ewf_sc_newsletter ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"align" => 'left'
		), $atts));
			
			
		$src = null;
		
		$src.= 	'<form method="get" action="#" id="newsletter-subscribe">';
		$src.= 		'<fieldset>';
		$src.= 			'<input type="text" onblur="if(this.value=='."'"."'".') this.value='."'email address ..';".'"'.' value="'.__('email address ..', EWF_SETUP_THEME_DOMAIN).'" id="subscribe-email" class="text" />';
		$src.= 			'<input type="submit" value="'.__('Submit', EWF_SETUP_THEME_DOMAIN).'" class="subscribe-submit-btn">';
		$src.=		'</fieldset>';
		$src.=	'</form>';
					
		return $src;
	}	
				
	function ewf_sc_br ( $atts, $content = null ){
		return '<br/>';
	}	
	
	function ewf_sc_highlight2 ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"style" => 'small'
		), $atts));
			
		return '<span class="text-highlight2">'.$content.'</span>';
	}	
	
	function ewf_sc_highlight ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"style" => 'small'
		), $atts));
			
		return '<span class="text-highlight">'.$content.'</span>';
	}
	 
	function ewf_sc_message ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"type" => 'success'
		), $atts));
		
		$class = null;
		
		switch($type){
			case "success":
				$class="successmsg";
				break;
			
			case "error":
				$class="errormsg";
				break;
			
			case "info":
				$class="infomsg";
				break;
			
			case "notice":
				$class="noticemsg";
				break;
		}
			
		return '<div class="'.$class.'">'.$content.'</div>';
	}
	
	function ewf_sc_client_logo ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"src" => null,
			"href" => null,
			"size" => 'large', 
			"margin" => null
		), $atts));
		
		$class = 'client';
			
		if (array_key_exists('0', $atts) && $atts[0]=='small' ||  array_key_exists('1', $atts) && $atts[1]=='small' && array_key_exists('2', $atts) && $atts[2]=='small'){
			$size = 'small';
			$class = 'client-small';
		}
			
		if ($margin == 'left') { $class .= ' mleft'; }
		if ($margin == 'right') { $class .= ' mright'; }
			
		$_src  = null;
			if ($href != null) { 
				$_src .= '<div class="'.$class.'"><div style="background:url('.$src.') no-repeat center center;" class="client-logo"><a class="fixed" href="'.$href.'"></a></div></div>';
			}else{
				$_src .= '<div class="'.$class.'"><div style="background:url('.$src.') no-repeat center center;" class="client-logo"></div></div>';
			}			
				
		return ewf_shortcode_fix($_src);
	}
		
	function ewf_sc_quote ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"class" => null,
			"style" => 'normal',
			"align" => null,
			"author"=>null
		), $atts));
		
		$extra = null;
		
		$src  = null;
		$src .= '<blockquote class="clear ';
			if ($align == 'left') {
				$src .= 'blockquote-left ';
				}
				
			if ($align == 'right') {
				$src .= 'blockquote-right';
				}
				
				$src .= $class;
		$src .= '"><p>';
			
		$src .= $content;
		
		if($author){
			$src .= '<br/><span>'.$author.'</span>';
			}
			
		$src .= '</p></blockquote>';
			
		return $src;
	}
	
	function ewf_sc_code ( $atts, $content = null ){
		return '<code>'.$content.'</code>';
	}


	function ewf_sc_services_list	( $atts, $content = null ){
		$params = shortcode_atts(array( 
			"items" 		=> -1, 
			"id"			=> null, 
			"page" 			=> 0, 
			"order" 		=> 'ASC'
		), $atts ); 
		
		extract($params);
		
		$src = null;
		$count_row = 0;
		$row_limit = $itemsperrow;
		
		$count = 0;
		
		if ($items>0) $row_limit = $items; 

		if ($page == 0 && $id == null){
			$page_services_title = get_option(EWF_SETUP_THNAME."_page_services", null );
			$page_services = get_page_by_title( $page_services_title );
			

			if (is_object($page_services)){
				$page = $page_services->ID;
				}
			
			apply_filters("debug", "Page Services: ".$page_services_title);
			apply_filters("debug", "Page Services ID: ".$page);
		}
		
		$count_row_all = 0;

		$include_posts = array(); 
		$tmp_nav = null;
		$tmp_row = null;
		$order = strtoupper($order);
		
		$query = array( 'post_type' => 'page', "sort_column" => "id", "order"=>$order, "orderby"=>"date" ,'post_parent'=>$page, 'posts_per_page'=> $items );		
		 
		if ($id != null){
			if (is_numeric($id)){
				$include_posts[] = $id ;
			}else{
				$tmp_id = explode(',', trim($id));
				foreach($tmp_id as $key => $item_id){
					if (is_numeric($item_id)){
						$include_posts[] = $item_id ;
					}
				}
			}

			unset( $query['posts_per_page'] );
			unset( $query['post__not_in'] 	);
			unset( $query['sort_column']	);
			unset( $query['post_parent'] 	);
			
			$query['orderby'] = 'none';
			$query['order'] = 'none';
			$query['post_type'] = 'page';
			$query['post__in'] = $include_posts;
			
		}
		
		if ($page > 0 || count($include_posts) > 0 ){
			$wp_query_childs =  new WP_Query($query);
		
			while ($wp_query_childs->have_posts()) : $wp_query_childs->the_post();		
				global $post;
				
				//###
				//### Generate the service item
 				//###
				$src .= '<li><a href="'.get_permalink().'">'.get_the_title().'</a></li>';
				
			endwhile;
			wp_reset_query();
			
		}
				
		return '<ul class="side-nav fixed">'.$src.'</ul>';  
	}
	
	
	
	function ewf_sc_services_summary	( $atts, $content = null ){
		$params = shortcode_atts(array( 
			"items" 		=> 3, 
			"id"			=> null, 
			"page" 			=> 0, 
			"order" 		=> 'ASC',
			"showreadmore" 	=> 'true',
			"readmoretitle" =>  __("more", EWF_SETUP_THEME_DOMAIN)
		), $atts ); 
		
		extract($params);
		
		
		$src = null;
		$count_row = 0;		
		$count = 0;
		
		if ($items>0){
			$row_limit = $items;
			}			

		if ($page == 0 && $id == null){
			$page_services_title = get_option(EWF_SETUP_THNAME."_page_services", null );
			$page_services = get_page_by_title( $page_services_title );
			

			if (is_object($page_services)){
				$page = $page_services->ID;
				}
			
			apply_filters("debug", "Page Services: ".$page_services_title);
			apply_filters("debug", "Page Services ID: ".$page);
		}
		
		$count_row_all = 0;

		$include_posts = array(); 
		$tmp_nav = null;
		$tmp_row = null;
		$order = strtoupper($order);
		
		$query = array( 'post_type' => 'page', "sort_column" => "id", "order"=>$order, "orderby"=>"date" ,'post_parent'=>$page, 'posts_per_page'=> $items );
		$read_more_label = get_option(EWF_SETUP_THNAME."_services_more_title", __('Read More', EWF_SETUP_THEME_DOMAIN));
		 
		 
		if ($id != null){
			if (is_numeric($id)){
				$include_posts[] = $id ;
			}else{
				$tmp_id = explode(',', trim($id));
				foreach($tmp_id as $key => $item_id){
					if (is_numeric($item_id)){
						$include_posts[] = $item_id ;
					}
				}
			}
			

			
			$items = count($include_posts);

			unset( $query['posts_per_page'] );
			unset( $query['post__not_in'] 	);
			unset( $query['sort_column']	);
			unset( $query['post_parent'] 	);
			unset( $query['orderby'] 		);
			
			$query['order'] = 'none';
			$query['post_type'] = 'page';
			$query['post__in'] = $include_posts;
			
		}
		
		if ($page > 0 || count($include_posts) > 0 ){
			$wp_query_childs =  new WP_Query($query);
		
			while ($wp_query_childs->have_posts()) : $wp_query_childs->the_post();		
				global $post;
				
				$count_row++;
				$count++;				
				
				//###
				//### Attach the last class at the row end
 				//###
				if ($count_row==$items){ $class_extra='last'; }else{ $class_extra = null; }
				
				
				//###
				//### Generate the service item
 				//###
				$src .= '<li class="'.$class_extra.'">';

						//### Post Title
						//$src .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
						$src .= '<a href="#accordion-1-slide-3">'.get_the_title().'</a>';
						
						
						//### Post Excerpt
						$src .= '<div><p>'.substr($post->post_excerpt,0,150);
						
						if($showreadmore == "true"){
							$src .= ' <a href="'.get_permalink().'">'.$readmoretitle.'</a>';
							}
						
						$src .= '</p></div>';					

				$src .= '</li>';
				
			endwhile;
			wp_reset_query();
			
		}
		
		
		global $_ewf_acordion_instances;
		global $_ewf_acordion_slides_instances;

		$current_acordion_id = count($_ewf_acordion_instances)-1;
		$_ewf_acordion_instances[] = '*';
		
		return '<ul id="services-summary-'.$current_acordion_id.'" class="accordion fixed">'.$src.'</ul>';  
	}
	
	
	function ewf_sc_services_overview	( $atts, $content = null ){
		
		$params = shortcode_atts(array( 
			"items" => -1, 
			"id" => null, 
			"page" => 0, 
			"order"=> 'ASC', 
			"showreadmore"=>null , 
			"title"=>"true", 
			"thumbnail"=>"true", 
			'itemsperrow' => 3
		), $atts ); 
		
		extract($params);
			
		$src = null;
		$count_row = 0;
		$row_limit = $itemsperrow;
		
		$count = 0;
		
		if ($items>0) $row_limit = $items; $hr = "false";

		if ($showreadmore == null){
			$showreadmore = get_option(EWF_SETUP_THNAME."_services_more_link", 'true');
			}
		
		if ($page == 0 && $id == null){
			$page_services_title = get_option(EWF_SETUP_THNAME."_page_services", null );
			$page_services = get_page_by_title( $page_services_title );
			
			
			if (is_object($page_services)){
				$page = $page_services->ID;
				}
			
			apply_filters("debug", "Page Services: ".$page_services_title);
			apply_filters("debug", "Page Services ID: ".$page);
		}
		
		$count_row_all = 0;

		$include_posts = array(); 
		$tmp_nav = null;
		$tmp_row = null;
		$order = strtoupper($order);
		
		$query = array( 'post_type' => 'page', "sort_column" => "id", "order"=>$order, "orderby"=>"date" ,'post_parent'=>$page, 'posts_per_page'=> $items );
		$read_more_label = get_option(EWF_SETUP_THNAME."_services_more_title", __('Read More', EWF_SETUP_THEME_DOMAIN));
		
		 
		if ($id != null){
			if (is_numeric($id)){
				// if we have only one ID
				$include_posts[] = $id ;
			}else{
				//If there are more ids separated by comma
				$tmp_id = explode(',', trim($id));
				foreach($tmp_id as $key => $item_id){
					if (is_numeric($item_id)){
						$include_posts[] = $item_id ;
					}
				}
			}

			unset( $query['posts_per_page'] );
			unset( $query['post__not_in'] 	);
			unset( $query['sort_column']	);
			unset( $query['post_parent'] 	);
			unset( $query['orderby'] 	);
			
			$query['order'] = 'none';
			$query['post_type'] = 'page';
			$query['post__in'] = $include_posts;
			
		}
		
		if ($page > 0 || count($include_posts) > 0 ){
			$wp_query_childs =  new WP_Query($query);
		
			while ($wp_query_childs->have_posts()) : $wp_query_childs->the_post();		
				global $post;
				
				$count_row++;
				$count++;
				
				//###
				//### Attach the last class at the row end
 				//###
				if ($count_row==$row_limit){ $class_extra='last'; }else{ $class_extra = null; }
				
				
				//###
				//### Generate the service item
 				//###
				$src .= '<li class="'.$class_extra.'">';

						//### Post Title
						$src .= '<h5><a href="'.get_permalink().'">'.get_the_title().'</a></h5>';
						
						
						//### Post Excerpt
						$src .= '<p>'.substr($post->post_excerpt,0,150).'</p>';					
						
						
						//### Post featured image
						if ($thumbnail == 'true'){
							$image_id = get_post_thumbnail_id();  
							$image_url = wp_get_attachment_image_src($image_id,'service-featured-image'); 
							
							if ($image_id){
								$src.='<div><a href="'.get_permalink().'"><img src="'.$image_url[0].'" width="280" height="130" alt="'.get_the_title().'"></a></div>';
								}
						}

							
				$src .= '</li>';
				
				//###
				//### When the current row is full
 				//###
				if ($count_row==$row_limit && $wp_query_childs->post_count > $count){
					$count_row = 0;
				}
				
			endwhile;
			wp_reset_query();
			
		}
		
		return '<ul class="service-overview rows-'.$itemsperrow.' fixed">'.$src.'</ul>';  
	}
	 
	function ewf_sc_form_contact( $atts, $content = null ){	
		$src='
			<form action="javascript:void(0);" class="fixed" id="contact-form">
				<fieldset>
					<p id="formstatus">&nbsp;</p> 
					<div>
						<div><label for="name">'.__('Your name', EWF_SETUP_THEME_DOMAIN).': <span class="required">*</span></label></div>
						<div><input type="text" value="" name="name" id="name" class="text"/></div>
					</div>
					<div>
						<div><label for="email">'.__('Your Email Adress', EWF_SETUP_THEME_DOMAIN).': <span class="required">*</span></label></div>
						<div><input type="text" value="" name="email" id="email" class="text"></div>
					</div> 
					<div>
						<div><label for="subject">'.__('Subject', EWF_SETUP_THEME_DOMAIN).': <span class="required">*</span></label></div>
						<div><input type="text" value="" name="subject" id="subject" class="text"></div>
					</div> 
					<div>
						<div><label for="message">'.__('Message', EWF_SETUP_THEME_DOMAIN).': </label></div>
						<div><textarea cols="25" rows="3" name="message" id="message"></textarea></div>
					</div>
					<div>
						<div><input type="submit" value="'.__('Send!', EWF_SETUP_THEME_DOMAIN).'" name="submit"></div>
					</div>
				</fieldset>
			</form>';
		 
		return ewf_shortcode_fix($src);
	}
		
	function erm_get_post_categs($post_id){
		$categs_ids = wp_get_post_categories( $post_id );
		$categs_src = null;
		$categs_arr = array();
		
		foreach($categs_ids as $c){
			$cat = get_category( $c );
			$categs_src .= '<a href="'.$cat->slug.'" >'.$cat->name.'</a> ';
		}
		
		return $categs_src;
	}
	
	function ewf_sc_hr ( $atts, $content = null ){
		extract(shortcode_atts(array(
			"spacing" => null,
		), $atts));
		
		return '<div class="hr '.$spacing.'"></div>';
	}	
	
	function ewf_map_javascript_handler($return = false){
		global $_ewf_maps_instances;
		
		$src = null;
		
		if (is_array($_ewf_maps_instances)){
			$src.='<script type="text/javascript">window.onload=function(){';
				foreach($_ewf_maps_instances as $map_id => $atts){
					$first = false;
					$last = false;
					
					$src.= '$("#'.$map_id.'").gMap({ ';
						
						if ($atts['marker']==true ){
							 $src.= 'markers: [{ ';
							 
							if (array_key_exists('popup', $atts) && $atts['lat'] != 0 ){
								 $src.= 'popup: '.$atts['popup']; $first = true;
								}
							 							 
							if (array_key_exists('lat', $atts) && $atts['lat']>0 ){
								if ($first) { $src.=','; }
								 $src.= 'latitude: '.$atts['lat']; $first = true;
								}
							 
							if (array_key_exists('long', $atts) && $atts['lat']>0  ){
								if ($first) { $src.=','; }
								 $src.= 'longitude: '.$atts['long']; $first = true;
								}
								
							if (array_key_exists('address',$atts) && $atts['address'] != '' ){
								if ($first) { $src.=','; }
								 $src.= 'address: "'.$atts['address'].'"'; $first = true;
								}
								
							if (array_key_exists('details',$atts) && $atts['details'] != '' ){
								 if ($first) { $src.=','; }
								 $src.= 'html: "'.$atts['details'].'"'; $first = true;
								}
							 
							 $src.= '}]'; 
							 
							 $last = true;
						} 
						
						
						if (array_key_exists('address',$atts) && $atts['address'] != '' ){
							 if ($last) { $src.=','; }
							 $src.= 'address: "'.$atts['address'].'"'; $last = true;
							}						
						
						if (array_key_exists('zoom', $atts)){
							if ($last) { $src.=','; }
							 $src.= 'zoom: '.$atts['zoom']; $last = true;
							}
					$src.='});';
				} 
			$src.='}</script>';
		}
				
		if ($return){
			return $src;
		}else{
			echo $src;
		}
	}
	
	function ewf_sc_map($atts, $content){
		global $_ewf_maps_instances;
		
		$att_fin = shortcode_atts(array(
			"zoom" => 14,
			"address" => null,
			"lat" => 0,
			"long" => 0, 
			"details" => null, 
			"marker" => 1, 
			"height" => 200, 
			"width" => 1000, 
			"popup" => 0
		), $atts);
		
		extract($att_fin);
		
		$gmaps_api_key = get_option(EWF_SETUP_THNAME."_maps_api_key", null);
		
		apply_filters("debug", "map-height: [".$height."]");	 
		
		if ($gmaps_api_key != null) {
			$map_id = "map_sc_".count($_ewf_maps_instances);
			$_ewf_maps_instances[$map_id] = $att_fin;  
			
			return '<div id="'.$map_id.'" class="map" style="height:'.$height.'px"></div>'; 
		}else{
			return ewf_message(__('You need to generate a <a href="https://developers.google.com/maps/documentation/javascript/tutorial#api_key" >Google Maps API Key</a>, add it in theme options before using [map] shortcode!', EWF_SETUP_THEME_DOMAIN ));
		}
	}
	
	function ewf_sc_lightbox($atts, $content){
		global $_ewf_maps_instances;
		
		extract( shortcode_atts(array(
			"group" => null,
			"url" => null,
			"src" => null
		), $atts));
		
		$rel = null;
		$cnt = null;
		
		if ( $group!=null){
			$rel = 'prettyPhoto['.$group.']';
		}else{
			$rel = 'prettyPhoto';
		}
		
		if ($content != null){
			$cnt = $content;
		} else{
			if ($src != null) {
				$cnt = $cnt='<img src="'.$src.'" alt="" />';
			}else{
				return null;
			}
		}
		
		return '<a href="'.$url.'" rel="'.$rel.'">'.$cnt.'</a>';
	}
	
	function ewf_sc_blog_navigation_steps( $range = 4, $query, $label_next = null, $label_prev = null ){
		$src_nav = null;
		$max_page = 0;
		
		$data_pages = array();
		
		$class_current = 'current';
		
		$current_page = $query->query_vars['paged'];
		if ($current_page == 0) { $current_page = 1; }
	
	  // How much pages do we have?
	  if ( !$max_page ) {
		$max_page = $query->max_num_pages;
	  }

	  // We need the pagination only if there are more than 1 page
	  if($max_page > 1){
	  
		if ( !$current_page ) 		{ $current_page = 1; }
		if ( $current_page != 1 )	{ }
		
		if($max_page > $range){
		  // When closer to the beginning
		  if($current_page < $range){
			for($i = 1; $i <= ($range + 1); $i++){		  
			  $data_pages['curent'] = $current_page;
			  $data_pages['pages'][$i] =  get_pagenum_link($i);
			}
		  } 
		  // When closer to the end
		  elseif($current_page >= ($max_page - ceil(($range/2)))){
			$extra = 0;
		  
			if (($max_page - ($max_page - $range)) < 2 ) $extra = 1;
		  
			for($i = $max_page - $range - $extra; $i <= $max_page; $i++){
			  $data_pages['curent'] = $current_page;
			  $data_pages['pages'][$i] =  get_pagenum_link($i); 
			}
		  }
		  // Somewhere in the middle
		  elseif($current_page >= $range && $current_page < ($max_page - ceil(($range/2)))){
			$extra = 0;
			if ($current_page - ceil($range/2) == 0 ) $extra = 1;
			
			for($i = ( $current_page - ceil($range/2) + $extra); $i <= ($current_page + ceil(($range/2))+$extra); $i++){
			  $data_pages['curent'] = $current_page;
			  $data_pages['pages'][$i] =  get_pagenum_link($i);  
			}
		  }
		} 
		// Less pages than the range, no sliding effect needed
		else{
		  for($i = 1; $i <= $max_page; $i++){
			$data_pages['curent'] = $current_page;
			$data_pages['pages'][$i] =  get_pagenum_link($i);
		  }
		}

		// On the last page, don't put the Last page link
		if($current_page != $max_page){}
	  }
	   
		$src_nav = null;
		
		$label_prev = __('View Older Entries', EWF_SETUP_THEME_DOMAIN);
		$label_next = __('View New Entries', EWF_SETUP_THEME_DOMAIN); 
	  
		$pos_curent = $data_pages['curent'];

	  
		$src_nav.= '<div class="hr"></div>'; 
		
		$src_nav.= '<div class="fixed">';	
			$src_nav .= '<div class="col315">';
				if ($pos_curent < (count($data_pages['pages']))){
					$src_nav.= '<a href="'.$data_pages['pages'][$pos_curent+1].'">'.$label_prev.'</a>'; 
				}
			$src_nav .= '&nbsp;</div>';
			
			$src_nav .= '<div class="col315 last text-right">&nbsp;';
				if ($pos_curent != 1){
					$src_nav.= '<a href="'.$data_pages['pages'][$pos_curent-1].'">'.$label_next.'</a>';
				}
			$src_nav .= '</div>';
		$src_nav.= '</div>'; 

	  
	  return $src_nav; 
	}
	
	function ewf_sc_blog_summary( $atts, $content = null ){
		global $post;
		$src = null;
		
		extract(shortcode_atts(array(
			"posts" => 3,
			"id" => null, 
			"exclude" => null,
			"order" => "ASC",
			"showreadmore" => "true",
			"readmoretitle" => __('blog archive', EWF_SETUP_THEME_DOMAIN)
		), $atts));
		
		
		$query = array( 'post_type' => 'post',
						'order'=> 'DESC', 
						'orderby' => 'date',  
						'posts_per_page'=>$posts); 
		
		
		if ($exclude != null){
			if (is_numeric($id)){
				$exclude_items[] = $id ;
			}else{
				$tmp_id = explode(',', trim($id));
				foreach($tmp_id as $key => $item_id){
					if (is_numeric($item_id)){
						$exclude_items[] = $item_id ;
					}
				}
			}
			
			$query['post__not_in'] = $exclude_items;
		}
		
		
		if ($id != null){
			if (is_numeric($id)){
				$include_posts[] = $id ;
			}else{
				$tmp_id = explode(',', trim($id));
				foreach($tmp_id as $key => $item_id){
					if (is_numeric($item_id)){
						$include_posts[] = $item_id ;
					}
				}
			}
			
			unset($query['post__not_in']);
			unset($query['tax_query']);
			
			$query['post__in'] = $include_posts;
			$query['posts_per_page'] = count($include_posts);
		}
		
		$posts_count = 0;
		$src .= '<ul class="blog-overview shortcode">';
		
			$blog_summary = new WP_Query($query);
			 while ($blog_summary->have_posts()) : $blog_summary->the_post();
				global $post;
				$posts_count++;
				
				if ($posts_count == 1){
					$extra_class = 'first'; 
				}else{
					$extra_class = null;
				}
				
				$image_id = get_post_thumbnail_id($post->ID);  
				$image_url = wp_get_attachment_image_src($image_id,'blog-featured-thumb');  
				
				$src .= '<li class="fixed '.$extra_class.'">';
					$src .=  '<div class="date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>';
					
					if ($image_id){
						$src .=  '<img width="50" height="50" alt="" src="'.$image_url[0].'">'; 
						}

						$src .=  '<a href="'. get_permalink($post->ID) .'">'.$post->post_title.'</a><br/>'.substr(get_the_excerpt(),0,25).'
					</li>'; 
				
			endwhile;
			
			if ($showreadmore == "true"){
				$src .= '<li class="last fixed"><a href="#">'.$readmoretitle.'</a></li>';
			}
			
		$src .=  '</ul>';
			
		return $src;
	}
	
	function ewf_sc_blog_overview( $atts, $content = null ){
		global $post;
		$src = null;
		
		extract(shortcode_atts(array(
			"posts" => get_option(EWF_SETUP_THNAME."_blog_items_per_page", "3"),
			"categ_include" => null, 
			"categ_exclude" => null,
			"posts_exclude" => null,
			"layout" => "single", 
			"height" => "auto",
			"width" => "auto",
			"date"=>"true",
			"info"=>"true",
			"style" => "featured"
		), $atts));
		
		wp_reset_query();
		
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
		$wp_query_blog = new WP_Query(array( 'post_type' => 'post', 'posts_per_page' => $posts, 'orderby'=>'date', 'order'=>'DESC','paged' =>$paged ));
		
		$count = 0;
		$total = 0;
		$position = array('odd last', 'even');
		
		 while ($wp_query_blog->have_posts()) : $wp_query_blog->the_post();
			$count++;
			$total++;
			$pair = $count % 2;
			
			
			//## Get post classes
			//##
				$post_class = get_post_class();
				$post_class_fin = null;
			
				foreach($post_class as $key=> $ctclass){
					$post_class_fin.= ' '.$ctclass;
				}
			
			
			//## Get post categories
			//##
				 get_the_category( $post->ID );

				 $post_categories = null;
				 foreach((get_the_category( $post->ID )) as $category) { 
					if ($post_categories == null){
						$post_categories.= '<a href="'.get_category_link( $category->term_id ).'" >'.$category->cat_name.'</a>';
					}else{
						$post_categories.= ', <a href="'.get_category_link( $category->term_id ).'" >'.$category->cat_name.'</a>';
					}
				 }
				 
			//## Get post featured image
			//##
			$image_id = get_post_thumbnail_id($post->ID);  
			$image_url = wp_get_attachment_image_src($image_id,'blog-featured-image');  
			 
			$src .= '<div class="blog-post '.$position[$pair].' '.$post_class_fin.'">';
				
				if ($image_id){
					$src .= '<h3 class="blog-post-title"><a href="' . get_permalink() . '">'.get_the_title($post->ID).'</a></h3>' ;
					$src .= '<div class="blog-post-date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>' ;
					$src .= '<div><a href="'.get_permalink().'"><img class="blog-post-thumb" src="'.$image_url[0].'" width="530" height="210" alt="" /></a></div>';
				}else{
					$src .= '<h3 class="blog-post-title"><a href="' . get_permalink() . '">'.get_the_title($post->ID).'</a></h3>' ;
					$src .= '<div class="blog-post-date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>' ;
				}
				
				$src .= '<ul class="blog-post-info fixed">
							<li class="author">'.__('posted by', EWF_SETUP_THEME_DOMAIN).' <strong>'.get_the_author().'</strong></li>
							<li class="categories">'.__('posted in', EWF_SETUP_THEME_DOMAIN).' '.$post_categories.'</li>
						 </ul>';
				
				
				global $more;
				
				$more = false; 
				$src .= '<p>'.do_shortcode(get_the_content('&nbsp;')).'</p>';   
				$more = true;
				
				$src .= '
					<div class="fixed">
						<p class="blog-post-comments"><a href="'.get_permalink().'#comments">'.get_comments_number().' '.__('Comments', EWF_SETUP_THEME_DOMAIN).'</a></p>
						<p class="blog-post-readmore"><a href="'.get_permalink().'">'.__('Read More', EWF_SETUP_THEME_DOMAIN).'</a></p>
					</div>';
			
			$src .= '</div>'; 
			
			
			if ($wp_query_blog->post_count != $count ){
				$src .= '<div class="hr"></div>'; 
				}
			
		endwhile;		
		
		apply_filters("debug", "Query Post - Count:".$wp_query_blog->post_count.' - Showing Posts:'.$posts); 
		 
		if ($wp_query_blog->max_num_pages > 1){
			$src .= ewf_sc_blog_navigation_steps(4, $wp_query_blog); 
		}
				
		return $src;
	}	

 
?>