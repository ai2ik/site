<?php

	$src = null;
	$count = 0;
	
	if ( have_posts() ) while ( have_posts() ) : the_post(); 										

		$count++;
	
		$post_class = get_post_class();
		$post_class_fin = null;
		
		foreach($post_class as $key=> $ctclass){
			$post_class_fin.= ' '.$ctclass;
		}
		 
		$src .= '<div class="blog-post '.$post_class_fin.'">';

			$src .= '<h3 class="blog-post-title search"><a href="' . get_permalink() . '">'.get_the_title($post->ID).'</a></h3>' ;	
			
				
			if ($post->post_excerpt != null){
				$src .= '<p>'.get_the_excerpt().'</p>';   
			}
			
			$src .= '
			<div class="fixed">
					<p class="last"><a href="'.get_permalink().'" class="more-link">'.__('Read More', EWF_SETUP_THEME_DOMAIN).'</a></p>
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
