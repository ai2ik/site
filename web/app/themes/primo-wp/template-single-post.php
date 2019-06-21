<?php

	$src = null;
	$count = 0;
	
	if ( have_posts() ) while ( have_posts() ) : the_post(); 										

		$count++;
		
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
			 
			 

		 
		$src .= '<div class="blog-post '.$post_class_fin.'">';
			
			//## Get post featured image
			//##
			$image_id = get_post_thumbnail_id($post->ID);  
			$image_url = wp_get_attachment_image_src($image_id,'blog-featured-image');  
			
				$src .= '<h3 class="blog-post-title"><a href="' . get_permalink() . '">'.get_the_title($post->ID).'</a></h3>' ;
				$src .= '<div class="blog-post-date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>' ;
				
			
			$src .= '<ul class="blog-post-info fixed">
						<li class="author">'.__('posted by', EWF_SETUP_THEME_DOMAIN).' <strong>'.get_the_author().'</strong></li>
						<li class="categories">'.__('posted in', EWF_SETUP_THEME_DOMAIN).' '.$post_categories.'</li>
					 </ul>';
			
			
				global $more;
				
				$more = false; 
				$src .= '<p>'.do_shortcode(efw_get_content_formatted('&nbsp;')).'</p>';   
				$more = true;
			
				$src .= '
					<div class="fixed">
						<p class="blog-post-comments"><a href="'.get_permalink().'/#comments">'.get_comments_number().' '.__('Comments', EWF_SETUP_THEME_DOMAIN).'</a></p>
						<p class="blog-post-readmore"><a href="'.get_permalink().'">'.__('Read More', EWF_SETUP_THEME_DOMAIN).'</a></p>
					</div>';
		
		$src .= '</div>';  
				
		if ($wp_query->post_count != $count ){ 
			$src .= '<div class="hr"></div>'; 
		}

	endwhile; 
	
	if ($wp_query->found_posts > $wp_query->query_vars['posts_per_page']){
		$src .= ewf_sc_blog_navigation_steps($wp_query->query_vars['posts_per_page'], $wp_query);
		}
		
	echo $src;

?>