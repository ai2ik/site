	<div class="blog-post">
		<?php
		
		if ( have_posts() ) while ( have_posts() ) : the_post(); 										
			global $post; 
			
			//## Get post featured image
			//##
			$image_id = get_post_thumbnail_id($post->ID);  
			$image_url = wp_get_attachment_image_src($image_id,'blog-featured-image'); 
			
			
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

		
				echo '<h3 class="blog-post-title"><a href="' . get_permalink() . '">'.get_the_title($post->ID).'</a></h3>' ;
				echo '<div class="blog-post-date">'.get_the_time('d').' <span>'.get_the_time('M').'</span></div>' ;
			
			
			echo '<ul class="blog-post-info fixed">
					<li class="author">'.__('posted by', EWF_SETUP_THEME_DOMAIN).' <strong>'.get_the_author().'</strong></li>
					<li class="categories">'.__('posted in', EWF_SETUP_THEME_DOMAIN).' '.$post_categories.'</li>
				 </ul>';
			
			echo the_content(); 
			
		endwhile; 
		?>
	</div>
	
	<div class="hr"></div>
	
	<?php comments_template( '', true ); ?>