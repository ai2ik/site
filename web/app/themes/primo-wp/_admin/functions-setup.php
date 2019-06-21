<?php
	
	if ( ! isset( $content_width ) ) $content_width = 940;
	
	
	add_action('init', 'loadSetupReference');
	
	add_action('admin_init', 'ewf_add');
	add_action('admin_head', 'loadJSVariables', 1);
	
	add_action('wp_head', 'loadJSVariables', 1); 
	
	

	add_theme_support( 'post-thumbnails', array( 'post', 'page', 'slide', 'project') );
	add_theme_support('automatic-feed-links');
	
	add_post_type_support( 'page', 'excerpt' );
	set_post_thumbnail_size( 50, 50, true ); 
	
	add_image_size( 'blog-featured-image', 530, 9999, true);
	add_image_size( 'blog-featured-thumb', 50, 50, true);
	add_image_size( 'service-featured-image', 280, 130, true); 
	
	
	function loadJSVariables(){
	  
		echo '
		<script type="text/javascript">
			var siteURL = "'.site_url().'";
			var themePath = "'.get_template_directory_uri().'";
			var themeSliderTimeout = '.get_option( EWF_SETUP_THNAME.'_slider_timeout', '5000').';
			var msg_newsletter_error = "'.__('please enter a valid email...', EWF_SETUP_THEME_DOMAIN).'";
			var msg_newsletter_label = "'.__('subscribe to newsletter...', EWF_SETUP_THEME_DOMAIN).'";
		</script>';
		
	}
	
	
	function loadSetupReference(){
		if (is_admin()){
		
			wp_enqueue_script('setup-js', get_template_directory_uri().'/_admin/js/custom-setup.js');    		
			wp_enqueue_style('setup-css', get_template_directory_uri().'/_admin/css/options-panel.css');
			
		}else{
		
			wp_enqueue_style('theme-style', get_template_directory_uri().'/style.css');
			wp_enqueue_style('theme-skin', get_template_directory_uri().'/_skins/'.ewf_current_skin());
			wp_enqueue_style('theme-style-print', get_template_directory_uri().'/style-print.css', array(), '1.0', 'print');

			wp_enqueue_style('webfonts-opensans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700');
			wp_enqueue_style('webfonts-droidsans', 'http://fonts.googleapis.com/css?family=Droid+Sans:400,700');  
		
			wp_deregister_script('jquery'); 
			wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js', false, '1.5', true);
			wp_enqueue_script('jquery');
			
			
			//**  Tipsy - tooltips
			wp_enqueue_script('plugin-tipsy', get_template_directory_uri().'/_layout/js/tipsy/jquery.tipsy.js', array('jquery'),'1.0', true );    		
			wp_enqueue_style('plugin-tipsy-css', get_template_directory_uri().'/_layout/js/tipsy/css.tipsy.css');
			
			//**  prettyPhoto - lightbox
			wp_enqueue_script('plugin-prettyPhoto', get_template_directory_uri().'/_layout/js/prettyphoto/jquery.prettyPhoto.js', array('jquery'),'1.0', true );    		
			wp_enqueue_style('plugin-prettyPhoto-css', get_template_directory_uri().'/_layout/js/prettyphoto/css.prettyPhoto.css');
			
			//**  Validity - form validation
			wp_enqueue_script('plugin-validity', get_template_directory_uri().'/_layout/js/validity/jquery.validity.js', array('jquery'),'1.0', true );    		
			wp_enqueue_style('plugin-validity-css', get_template_directory_uri().'/_layout/js/validity/css.validity.css');			
			
			//**  Cycle - content slider
			wp_enqueue_script('plugin-cycle', get_template_directory_uri().'/_layout/js/cycle/jquery.cycle.all.min.js', array('jquery'),'1.0', true );    		
			
			//**  Tabify - create tabs
			wp_enqueue_script('plugin-tabify', get_template_directory_uri().'/_layout/js/tabify/jquery.tabify-1.4.js', array('jquery'),'1.0', true );    		
			
			//**  Accordion - create accordions
			wp_enqueue_script('plugin-acordion', get_template_directory_uri().'/_layout/js/accordion/jquery.accordion.js', array('jquery'),'1.0', true );    		
			
			//**  GMap - for google maps
			$gmaps_api_key = get_option(EWF_SETUP_THNAME."_maps_api_key");
			if ( $gmaps_api_key != null){
				wp_enqueue_script('plugin-gmap-api','http://maps.google.com/maps?file=api&amp;v=2&amp;key='.$gmaps_api_key, array('jquery'),'1.0', true );    		
				wp_enqueue_script('plugin-gmap', get_template_directory_uri().'/_layout/js/gmap/jquery.gmap-1.1.0-min.js', array('jquery'),'1.0', true );    		
			}

			//**  Custom JS
			wp_enqueue_script('js-scripts', get_template_directory_uri().'/_layout/js/scripts.js', array('jquery'),'1.0', true );    		
			wp_enqueue_script('js-plugins', get_template_directory_uri().'/_layout/js/plugins.js', array('jquery'),'1.0', true );    		
			
			if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 
		
		}
	}


	function ewf_comments( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div class="blog-post-comment">
				<?php echo get_avatar( $comment, 60 ); ?>
				
				<p class="who">
					<strong><?php comment_author();  ?></strong> / 
					<span class="date"><?php comment_date('d M, Y'); ?></span> - <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</p>
				

				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', SETUP_THEME_DOMAIN ); ?></em>
				<?php endif; ?>
				
				<?php comment_text(); ?>
				
				<?php edit_comment_link( __( 'Edit', SETUP_THEME_DOMAIN ), ' ' );?>
			</div>
		<?php
				break;
			case 'pingback'  :
			case 'trackback' :
		?>
		
		<li class="post pingback">
			<p><?php _e( 'Pingback:', SETUP_THEME_DOMAIN ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('Edit', SETUP_THEME_DOMAIN), ' ' ); ?></p>
		<?php
				break;
		endswitch;
	}
	
	function ewf_column($cols) {
		$cols['item-id'] = '<span>ID</span>'; 
		return $cols;
	} 

	function ewf_value($column_name, $id) { 
		if ($column_name == 'item-id') echo $id;
	}

	function ewf_return_value($value, $column_name, $id) {
		if ($column_name == 'item-id') $value = $id;
		return $value;
	}

	function ewf_css() {
		echo ' <style type="text/css"> #item-id { width: 50px; }</style>';
	}

	function ewf_add() {
		add_action('admin_head', 'ewf_css');

		add_filter('manage_posts_columns', 'ewf_column');
		add_action('manage_posts_custom_column', 'ewf_value', 10, 2);

		add_filter('manage_pages_columns', 'ewf_column');
		add_action('manage_pages_custom_column', 'ewf_value', 10, 2);

		foreach ( get_taxonomies() as $taxonomy ) {
			add_action("manage_edit-${taxonomy}_columns", 'ewf_column');			
			add_filter("manage_${taxonomy}_custom_column", 'ewf_return_value', 10, 3);
		}
	}

	if (!function_exists('is_post_type')){
		function is_post_type($type = null){
			global $post;
			
			if (get_post_type($post) == strtolower($type)){
				return true;
			}else{
				return false;
			}
		}
	}
	
		
	function efw_get_content_formatted ($more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
		$content = get_the_content($more_link_text, $stripteaser, $more_file);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content); 
		return $content;
	}
?>