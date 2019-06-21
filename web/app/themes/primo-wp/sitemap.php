<?php
/*
Template Name: Sitemap
*/
?>

<?php get_header(); ?>

	<div id="content" class="fixed"> 
		<?php 
		
		
			//## Check for homepage
			//##
			$location = str_replace(array(strtolower(get_bloginfo('url'))),'',strtolower(get_permalink()));
			if (strlen($location)>2){ $is_home = false; }else{ $is_home = true; }
			
			
			//## Load Header OR Slider
			//##			
			if ($is_home){		
				get_template_part('template', 'page-slider');
			}else{
				get_template_part('template', 'page-header');
			}
			
			
			//## Load current page sidebar
			//##
			$sidebar_id = ewf_get_sidebar_id('sidebar-page');		
			
			
			//## Load Header OR Slider
			//##
			$page_layout = ewf_get_sidebar_layout();
			switch ($page_layout) {
			
				case "layout-sidebar-single-left": 
					echo '<div class="row fixed">';
						echo '<div class="col280 no-print">';
							
							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>';
						echo '<div class="col580 last">';
						
							if ( have_posts() ) while ( have_posts() ) : the_post(); 										
								echo the_content();
							endwhile; 
						?>
				<h2>Pages</h2>
					<ul><?php wp_list_pages("title_li=" ); ?></ul>
				 <h2>Feeds</h2>
					  <ul>
					  <li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
					   <li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
					</ul>
				<h2>Categories</h2>
					   <ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul>
				<h2>All Blog Posts</h2>
					   <ul><?php $archive_query = new WP_Query('showposts=1000&cat=-8');
						 while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
						   <li>
						   <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
				 (<?php comments_number('0', '1', '%'); ?>)
							 </li>
				<?php endwhile; ?>
					   </ul>
				<h2>Archives</h2>
					   <ul>
				<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
						</ul>
<?php
						echo '</div>';
					echo '</div>';
					break;
			
				case "layout-sidebar-single-right": 
					echo '<div class="row fixed">';
						echo '<div class="col580">';

							if ( have_posts() ) while ( have_posts() ) : the_post(); 
								echo the_content();
							endwhile; 

						echo '</div>';
						echo '<div class="col280 last no-print">';
						
							if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( $sidebar_id ));
							
						echo '</div>';
					echo '</div>';
					break; 
			
				case "layout-full": 
					if ( have_posts() ) while ( have_posts() ) : the_post(); 
						echo the_content();
					endwhile; 
					break; 
			}

		?>
	</div>	
	
<?php get_footer(); ?>