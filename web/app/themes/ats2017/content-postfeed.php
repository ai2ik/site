<?php
/**
 * The default template for displaying content. Used for index page.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

<li>
<div>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<a href="<?php the_permalink(); ?>" rel="bookmark"><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>"></a>	
		<div class="postfeed-content"><div class="postfeed-date updated"><?php the_time('l, F jS, Y') ?></div>
		<header class="entry-header"><h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1></header><!-- .entry-header -->
		<div class="postfeed-excerpt"><?php echo excerpt(30); ?></div>
		<a href="<?php the_permalink(); ?>" class="postfeed-readmore" rel="bookmark">Read More</a></div>
	</article>
</div>
</li>
