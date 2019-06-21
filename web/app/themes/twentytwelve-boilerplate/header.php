<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title(''); ?></title>
<link rel="profile" href="//gmpg.org/xfn/11" />
<link rel="icon" type="image/png" href="favicon.png">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<link href='//fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>


<link href="//addiction-treatment-services.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<script src="//7034.tctm.co/t.js"></script>

<?php if(is_page('144')) { ?>

  <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<link rel="stylesheet" href="//addiction-treatment-services.com/wp-content/uploads/2014/05/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>
  <script src="//addiction-treatment-services.com/wp-content/uploads/2014/05/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="//addiction-treatment-services.com/wp-content/uploads/2014/05/jquery-jvectormap-us-aea-en.js"></script>

 <script>
        $(function(){
            $('#map').vectorMap({
                map: 'us_aea_en',
    zoomButtons : false,
                backgroundColor: 'transparent',
            regionStyle: {
              initial: {
                fill: '#235691'
              },
                selected: {
                    fill: '#4cabce'
                }
            },
                regionsSelectable: true,
                onRegionClick: function(event, code) 
                {
                    if (code === 'US-AL') {
                        window.location = '//addiction-treatment-services.com/resource-directory/alabama/'
                    }
                    else if (code === 'US-AK') {
                        window.location = '//addiction-treatment-services.com/resource-directory/alaska/'
                    }
                    else if (code === 'US-AZ') {
                        window.location = '//addiction-treatment-services.com/resource-directory/arizona/'
                    }
                    else if (code === 'US-AR') {
                        window.location = '//addiction-treatment-services.com/resource-directory/arkansas/'
                    }
                    else if (code === 'US-CA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/california/'
                    }
                    else if (code === 'US-CO') {
                        window.location = '//addiction-treatment-services.com/resource-directory/colorado/'
                    }
                    else if (code === 'US-CT') {
                        window.location = '//addiction-treatment-services.com/resource-directory/connecticut/'
                    }
                    else if (code === 'US-DE') {
                        window.location = '//addiction-treatment-services.com/resource-directory/delaware/'
                    }
                    else if (code === 'US-DC') {
                        window.location = '//addiction-treatment-services.com/resource-directory/washington-dc/'
                    }
                    else if (code === 'US-FL') {
                        window.location = '//addiction-treatment-services.com/resource-directory/florida/'
                    }
                    else if (code === 'US-GA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/georgia/'
                    }
                    else if (code === 'US-HI') {
                        window.location = '//addiction-treatment-services.com/resource-directory/hawaii/'
                    }
                    else if (code === 'US-ID') {
                        window.location = '//addiction-treatment-services.com/resource-directory/idaho/'
                    }
                    else if (code === 'US-IL') {
                        window.location = '//addiction-treatment-services.com/resource-directory/illinois/'
                    }
                    else if (code === 'US-IN') {
                        window.location = '//addiction-treatment-services.com/resource-directory/florida/'
                    }
                    else if (code === 'US-IA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/indiana/'
                    }
                    else if (code === 'US-KS') {
                        window.location = '//addiction-treatment-services.com/resource-directory/kansas/'
                    }
                    else if (code === 'US-KY') {
                        window.location = '//addiction-treatment-services.com/resource-directory/kentucky/'
                    }
                    else if (code === 'US-LA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/louisiana/'
                    }
                    else if (code === 'US-ME') {
                        window.location = '//addiction-treatment-services.com/resource-directory/maine/'
                    }
                    else if (code === 'US-MD') {
                        window.location = '//addiction-treatment-services.com/resource-directory/maryland/'
                    }
                    else if (code === 'US-MA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/massachusetts/'
                    }
                    else if (code === 'US-MI') {
                        window.location = '//addiction-treatment-services.com/resource-directory/michigan/'
                    }
                    else if (code === 'US-MN') {
                        window.location = '//addiction-treatment-services.com/resource-directory/minnesota/'
                    }
                    else if (code === 'US-MS') {
                        window.location = '//addiction-treatment-services.com/resource-directory/mississippi/'
                    }
                    else if (code === 'US-MO') {
                        window.location = '//addiction-treatment-services.com/resource-directory/missouri/'
                    }
                    else if (code === 'US-MT') {
                        window.location = '//addiction-treatment-services.com/resource-directory/montana/'
                    }
                    else if (code === 'US-NE') {
                        window.location = '//addiction-treatment-services.com/resource-directory/nebraska/'
                    }
                    else if (code === 'US-NV') {
                        window.location = '//addiction-treatment-services.com/resource-directory/nevada/'
                    }
                    else if (code === 'US-NH') {
                        window.location = '//addiction-treatment-services.com/resource-directory/new-hampshire/'
                    }
                    else if (code === 'US-NJ') {
                        window.location = '//addiction-treatment-services.com/resource-directory/new-jersey/'
                    }
                    else if (code === 'US-NM') {
                        window.location = '//addiction-treatment-services.com/resource-directory/new-mexico/'
                    }
                    else if (code === 'US-NY') {
                        window.location = '//addiction-treatment-services.com/resource-directory/new-york/'
                    }
                    else if (code === 'US-NC') {
                        window.location = '//addiction-treatment-services.com/resource-directory/north-carolina/'
                    }
                    else if (code === 'US-ND') {
                        window.location = '//addiction-treatment-services.com/resource-directory/north-dakota/'
                    }
                    else if (code === 'US-OH') {
                        window.location = '//addiction-treatment-services.com/resource-directory/ohio/'
                    }
                    else if (code === 'US-OK') {
                        window.location = '//addiction-treatment-services.com/resource-directory/oklahoma/'
                    }
                    else if (code === 'US-OR') {
                        window.location = '//addiction-treatment-services.com/resource-directory/oregon/'
                    }
                    else if (code === 'US-PA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/pennsylvania/'
                    }
                    else if (code === 'US-RI') {
                        window.location = '//addiction-treatment-services.com/resource-directory/rhode-island/'
                    }
                    else if (code === 'US-SC') {
                        window.location = '//addiction-treatment-services.com/resource-directory/south-carolina/'
                    }
                    else if (code === 'US-SD') {
                        window.location = '//addiction-treatment-services.com/resource-directory/south-dakota/'
                    }
                    else if (code === 'US-TN') {
                        window.location = '//addiction-treatment-services.com/resource-directory/tennessee/'
                    }
                    else if (code === 'US-TX') {
                        window.location = '//addiction-treatment-services.com/resource-directory/texas/'
                    }
                    else if (code === 'US-UT') {
                        window.location = '//addiction-treatment-services.com/resource-directory/utah/'
                    }
                    else if (code === 'US-VT') {
                        window.location = '//addiction-treatment-services.com/resource-directory/vermont/'
                    }
                    else if (code === 'US-VA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/virginia/'
                    }
                    else if (code === 'US-WA') {
                        window.location = '//addiction-treatment-services.com/resource-directory/washington/'
                    }
                    else if (code === 'US-WV') {
                        window.location = '//addiction-treatment-services.com/resource-directory/west-virginia/'
                    }
                    else if (code === 'US-WI') {
                        window.location = '//addiction-treatment-services.com/resource-directory/wisconsin/'
                    }
                    else if (code === 'US-WY') {
                        window.location = '//addiction-treatment-services.com/resource-directory/wyoming/'
                    }
                }
            });
        });

    </script>
<?php } else {} ?>



<style>body {background-image: url('//addiction-treatment-services.com/wp-content/uploads/2014/05/bg1.jpg'); background-attachment: fixed;}</style>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-10269680-2', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>

<div class="navwrap"><div style="margin: 0 auto; max-width: 1140px; text-align: right;">
<div style="position: relative; right: 0; padding: 8px 0;"><?php wp_nav_menu( array( 'theme_location' => 'topbar', 'menu_class' => 'top-menu' ) ); ?></div>
</div></div>
<div id="page" class="hfeed site">

<div id="headerwrap">
<div id="headerinside">
	<header id="masthead" class="site-header" role="banner">

		<a href="//addiction-treatment-services.com/"><img src="//addiction-treatment-services.com/wp-content/uploads/2014/05/ats-logo2.png" id="logo"></a>
<div id="topcta">
Start Your Recovery Today. <span style="font-weight: bold;">Call Now:</span>
<div id="topcta-phone"><a href="tel:877-455-0055" class="clicknum">877-455-0055</a></div>
</div>
	
	</header><!-- #masthead -->
</div>
</div>
</div>

<div class="navwrap">
<div style="margin: 0 auto; max-width: 1140px;">
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><i class="fa fa-bars"></i> <?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

</div>
</div>



<?php if ( is_page_template('page-templates/state-directory.php') ) { ?>

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

<div style="background-image: url('<?php echo $image[0]; ?>');" id="stateheader">
<div style="margin: 0 auto; max-width: 960px;">

<h2 id="state-line1">Drug & Alcohol Rehab Resources: State Directory</h2>
<h1 id="state-line2"><?php $key1="state"; echo get_post_meta($post->ID, $key1, true); ?></h1>
<h2 id="state-line3">State Resources, Non-Profits, and Helpful Information</h2>
</div>
</div>
<?php endif; ?>

<?php } elseif ( is_front_page() ) { ?>
<div id="mainheader">
<div style="margin: 0 auto; max-width: 1140px;">
<h1 id="main-line1">Drug & Alcohol Addiction Treatment</h1>
<h2 id="main-line2"><span style="font-weight: 600;">Call Toll Free <a href="tel:877-455-0055" class="clicknum">877-455-0055</a></span><br>Immediate Assessment &mdash; 100% Confidential</h2>
</div>
</div>


<?php } elseif(is_home()) { ?>
<div id="interiorheader">
<div style="margin: 0 auto; max-width: 1140px; text-align: left;">
<h1 id="interior-line1">Addiction Treatment Services Blog</h1>
</div>
</div>



<?php } elseif(is_tag() || is_category() || is_archive() || is_404()) { ?>

<div id="interiorheader">
<div style="margin: 0 auto; max-width: 1140px; text-align: left; padding: 40px 0;">

</div>
</div>
<?php } else { ?>

<div id="interiorheader">
<div style="margin: 0 auto; max-width: 1140px; text-align: left;">
<h1 id="interior-line1"><?php the_title(); ?> </h1>
</div>
</div>


<?php } ?>

<div class="sitecontent">
<div class="inner">



	<div id="main" class="wrapper">