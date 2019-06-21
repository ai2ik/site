<?php  get_header(); ?>
	
<div id="content" class="fixed">

<?php


	echo '<div class="hr-header"></div><div class="row fixed">';
		echo '<div class="col280 no-print">';
			if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar('sidebar-page') );
		echo '</div>';
		
		echo '<div class="col580 last">';
				if ( have_posts() ) while ( have_posts() ) : the_post(); 										
					
					$blog_items = ' posts="'.get_option(EWF_SETUP_THNAME."_blog_items_per_page", 4).'" ';
					echo do_shortcode('[blog '.$blog_items.']');
					
				endwhile; 
		echo '</div>';
	echo '</div>'; 

?>

</div>
	
<?php	get_footer();  ?>