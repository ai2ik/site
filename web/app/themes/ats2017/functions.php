<?php
/**
 * Twenty Twelve functions and definitions.
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/**
 * Sets up the content width value based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Sets up theme defaults and registers the various WordPress features that
 * Twenty Twelve supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_setup() {
	/*
	 * Makes Twenty Twelve available for translation.
	 *
	 * Translations can be added to the /languages/ directory.
	 * If you're building a theme based on Twenty Twelve, use a find and replace
	 * to change 'twentytwelve' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentytwelve', get_template_directory() . '/languages' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
	register_nav_menu( 'secondary', __( 'Top Bar Secondary Menu', 'twentytwelve' ) );
	register_nav_menu( 'footerone', __( 'Footer Menu 1', 'twentytwelve' ) );
	register_nav_menu( 'footertwo', __( 'Footer Menu 2', 'twentytwelve' ) );



	/*
	 * This theme supports custom background color and image, and here
	 * we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'twentytwelve_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Returns the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Twenty Twelve 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
function twentytwelve_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 by Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language, translate
		 this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language. */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,300,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" );
	}

	return $font_url;
}

/**
 * Enqueues scripts and styles for front-end.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/*
	 * Adds JavaScript for handling the navigation menu hide-and-show behavior.
	 */
	wp_enqueue_script( 'twentytwelve-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '1.0', true );

	$font_url = twentytwelve_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'twentytwelve-fonts', esc_url_raw( $font_url ), array(), null );

	/*
	 * Loads our main stylesheet.
	 */
	wp_enqueue_style( 'twentytwelve-style', get_stylesheet_uri() );

	/*
	 * Loads the Internet Explorer specific stylesheet.
	 */
	wp_enqueue_style( 'twentytwelve-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentytwelve-style' ), '20121010' );
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'twentytwelve_scripts_styles' );

/**
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses twentytwelve_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Twenty Twelve 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string
 */
function twentytwelve_mce_css( $mce_css ) {
	$font_url = twentytwelve_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'twentytwelve_mce_css' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Twenty Twelve 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function twentytwelve_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'twentytwelve_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'twentytwelve_page_menu_args' );

/**
 * Registers our main widget area and the front page widget areas.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'twentytwelve' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'twentytwelve' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'twentytwelve' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	
}
add_action( 'widgets_init', 'twentytwelve_widgets_init' );

if ( ! function_exists( 'twentytwelve_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_nav( $html_id ) {
	global $wp_query;

	$html_id = esc_attr( $html_id );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $html_id; ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentytwelve' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?></div>
		</nav><!-- #<?php echo $html_id; ?> .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'twentytwelve_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentytwelve_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'twentytwelve' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'twentytwelve' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'twentytwelve' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentytwelve' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'twentytwelve' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'twentytwelve' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'twentytwelve_entry_meta' ) ) :
/**
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own twentytwelve_entry_meta() to override in a child theme.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'twentytwelve' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date updated" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'twentytwelve' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'twentytwelve' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Twenty Twelve 1.0
 *
 * @param array Existing class values.
 * @return array Filtered class values.
 */
function twentytwelve_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'twentytwelve-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'twentytwelve_body_class' );

/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'twentytwelve_content_width' );

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since Twenty Twelve 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function twentytwelve_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'twentytwelve_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Twenty Twelve 1.0
 */
function twentytwelve_customize_preview_js() {
	wp_enqueue_script( 'twentytwelve-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}
add_action( 'customize_preview_init', 'twentytwelve_customize_preview_js' );


/**
 * Fix Gravity Form Tabindex Conflicts
 * http://gravitywiz.com/fix-gravity-form-tabindex-conflicts/
 */
add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}


add_filter('widget_text', 'do_shortcode');


function clearfix() {
    return '<div class="clearfix"></div>';
}
add_shortcode("clearfix", "clearfix");

function clearfixspace() {
    return '<div class="clearfixspace"></div>';
}
add_shortcode("clearfixspace", "clearfixspace");

function center( $atts, $content = null ) {
    return do_shortcode('<div style="text-align: center; margin: 0 auto;">'.$content.'</div>');
}
add_shortcode("center", "center");

function hpcenter( $atts, $content = null ) {
    return do_shortcode('<div style="text-align: center; margin: 0 auto; font-size: 20px; border-bottom: 1px solid #999; padding-bottom: 24px; margin-bottom: 24px; max-width: 960px;">'.$content.'</div>');
}
add_shortcode("hpcenter", "hpcenter");

function quote( $atts, $content = null ) {
    return do_shortcode('<div class="testimonial"><i class="fa fa-quote-left" aria-hidden="true"></i>'.$content.'</div>');
}
add_shortcode("quote", "quote");

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(($post->post_parent==$pid)) 
               return true;   // we're at the page or at a sub page
	else 
               return false;  // we're elsewhere
};

function header_phone() { 
return '<a href="tel:1-855-713-7262" class="phone" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fa fa-volume-control-phone" aria-hidden="true"></i> (855) 713-7262</a>'; 
}
add_shortcode('header_phone', 'header_phone');

function phone() {
return '<a href="tel:1-855-713-7262" class="phone" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);">(855) 713-7262</a>';
}
add_shortcode('phone', 'phone');

function suboxone_cta1_link( $atts, $content = null) {
return '<section class="suboxone-cta1 page-cta container-fluid">
        <div class="container">
          <h2>Questions About Suboxone?</h2>
            <p class="white">Speak to one of our experienced treatment specialists to learn more about how this miracle drug can help you beat an addiction to opiates.</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('suboxone_cta1', 'suboxone_cta1_link');

function get_help_cta1_link( $atts, $content = null) {
return '<section class="get-help-cta1 page-cta container-fluid">
        <div class="container">
          <h2>Recovery is One Phone Call Away</h2>
            <p class="white">You deserve to live a life free from the grips of addiction. Contact us today to learn how to find the right treatment options for you!</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta1', 'get_help_cta1_link');

function get_help_cta2_link( $atts, $content = null) {
return '<section class="get-help-cta2 page-cta container-fluid">
        <div class="container">
          <h2>Are You Ready to Get Help?</h2>
            <p class="white">Our treatment specialists are available 24/7 to help you or your loved one find a treatment program that suits your needs. It only takes one call to start your new life in recovery!</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta2', 'get_help_cta2_link');

function get_help_cta3_link( $atts, $content = null) {
return '<section class="get-help-cta3 page-cta container-fluid">
        <div class="container">
          <h2>Let Us Help You!</h2>
            <p class="white">Regardless of where you live, there is a treatment center nearby that can help you overcome your addiction. Call us today for assistance in finding the best treatment for your situation!</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta3', 'get_help_cta3_link');

function get_help_cta4_link( $atts, $content = null) {
return '<section class="get-help-cta4 page-cta container-fluid">
        <div class="container">
          <h2>Questions About Treatment?</h2>
            <p class="white">If you or your loved one is struggling with addiction, you probably have many questions regarding your options for treatment. Our admissions counselors are standing by to answer your questions!</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta4', 'get_help_cta4_link');

function get_help_cta5_link( $atts, $content = null) {
return '<section class="get-help-cta5 page-cta container-fluid">
        <div class="container">
          <h2>We Put Families Back Together</h2>
            <p class="white">Often times, the families of individuals suffering from substance abuse will struggle the most. Let us help you get your family back on track!</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta5', 'get_help_cta5_link');

function get_help_cta6_link( $atts, $content = null) {
return '<section class="get-help-cta6 page-cta container-fluid">
        <div class="container">
          <h2>Get Your Family Back</h2>
            <p class="white">Addiction affects the entire family dynamic. Getting help for your loved one is the first step to putting your family back together. Call us today.</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta6', 'get_help_cta6_link');

function get_help_cta7_link( $atts, $content = null) {
return '<section class="get-help-cta7 page-cta container-fluid">
        <div class="container">
          <h2>Is Your Loved One Addicted?</h2>
            <p class="white">Being supportive of your addicted loved one is crucial to their recovery being successful. Take the first step now by speaking with our admissions counselors regarding treatment options.</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta7', 'get_help_cta7_link');

function get_help_cta8_link( $atts, $content = null) {
return '<section class="get-help-cta8 page-cta container-fluid">
        <div class="container">
          <h2>Get Your Loved One Back</h2>
            <p class="white">If you have a loved one struggling with substance abuse, the greatest gift you can give is your support. Call us today to learn about your options for treatment.</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta8', 'get_help_cta8_link');

function get_help_cta9_link( $atts, $content = null) {
return '<section class="get-help-cta9 page-cta container-fluid">
        <div class="container">
          <h2>Questions About Insurance?</h2>
            <p class="white">Navigating your insurance plan to determine what type of substance abuse coverage you qualify for can be overwhelming. Our insurance specialists are available 24 hours a day to assist you.</p>
          
            <a href="tel:8557137262" class="bluebutton" onClick="_gaq.push([\'_trackEvent\', \'Phone Call\', \'Click\', \'CTA\',, false]);"><i class="fas fa-phone"></i> (855) 713-7262</a>
          
        </div>
    </section>';
}
add_shortcode('get_help_cta9', 'get_help_cta9_link');

function wpb_author_info_box( $content ) {
 
global $post;
 
// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {
 
// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );
 
// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );
 
// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );
 
// Get author's website URL 
$user_website = get_the_author_meta('url', $post->post_author);
 
// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
  
if ( ! empty( $display_name ) )
 
$author_details = '<p class="author_intro">Article Reviewed by <span class="author_name">' . $display_name . '</span></p>';
 
if ( ! empty( $user_description ) )
// Author avatar and bio
 
$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';
 
$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';  
 
// Check if author has a website in their profile
if ( ! empty( $user_website ) ) {
 
// Display author website link
$author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';
 
} else { 
// if there is no author website then just close the paragraph
$author_details .= '</p>';
}
 
// Pass all this info to post content  
$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
}
return $content;
}
 
// Add our function to the post content filter 
add_action( 'the_content', 'wpb_author_info_box' );
 
// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');
