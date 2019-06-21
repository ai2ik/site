<?php  
	global $doctype; 
	global $class; 
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7 ]> <html class="ie6" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9" xmlns="http://www.w3.org/1999/xhtml"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html xmlns="http://www.w3.org/1999/xhtml"> <!--<![endif]-->
<head>
<script src="//7034.tctm.co/t.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php wp_title(''); ?></title>
	<link href="http://addiction-treatment-services.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<?php wp_head(); ?>
</head>
<body <?php body_class($class); ?>> 



	<div id="wrap">

	<!--<div style="background-image: url(http://addiction-treatment-services.com/wp-content/themes/primo-wp/images/topnav.png); position: absolute; right: 20px; top: -36px; width: 400px; height: 36px;">
<a href="http://addiction-treatment-services.com/" style="display: block; position: absolute; left: 10px; width: 70px; height: 36px;"></a>
<a href="http://addiction-treatment-services.com/blog/" style="display: block; position: absolute; left: 80px; width: 60px; height: 36px;"></a>
<a href="http://addiction-treatment-services.com/feed/" style="display: block; position: absolute; left: 140px; width: 55px; height: 36px;"></a>
<a href="http://addiction-treatment-services.com/about/" style="display: block; position: absolute; left: 195px; width: 90px; height: 36px;"></a>
<a href="http://addiction-treatment-services.com/contact/" style="display: block; position: absolute; left: 285px; width: 100px; height: 36px;"></a>

</div>-->

		<noscript>
			<link href="<?php echo get_template_directory_uri(); ?>/style-nojs.css" rel="stylesheet" type="text/css" /> 
			<div class="nojs-warning"><strong><?php _e('JavaScript seems to be Disabled!', EWF_SETUP_THEME_DOMAIN); ?></strong> <?php  _e('Some of the website features are unavailable unless JavaScript is enabled.', EWF_SETUP_THEME_DOMAIN); ?></div>
		</noscript>
		<div id="header" class="fixed">
				<div id="logo-header-widget-1" class="fixed" >
				<a href="http://addiction-treatment-services.com/" title="Back Home"><img src="http://addiction-treatment-services.com/wp-content/themes/primo-wp/_layout/images/ats-logo.png" alt=""  id="logo" /></a>
	
<div style="background-image: url(http://addiction-treatment-services.com/wp-content/uploads/2013/07/topcall.png); background-repeat: no-repeat; position: absolute; right: 20px; top: 10px; font-size: 20px; width: 492px; height: 100px; text-align: right;"><div style="position: relative; top: 45px; right: 105px; font-size: 40px; font-weight: bold; color: #22558e; text-shadow: 1px 1px 1px #ffffff; letter-spacing: 1px;">877-455-0055</div></div>


				<div id="header-widget-1" class="col205 last text-right">
					<?php  if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar('header-top') ); ?>
				</div>
			</div><!-- end .fixed -->
		<div id="menu-header-wigdet-2" class="fixed">
				<div class="col655">
					<?php 
						$walker = new My_Walker;
						wp_nav_menu( array( 
						'theme_location' => 'top-menu',
						'container_class' => null,
						'container' => null,
						'menu_id' => 'dropdown-menu',
						'class' => null,
						'menu_class' => 'fixed',
						'walker' => $walker			) );  
					?><!-- end #dropdown-menu -->
				</div><!-- end .col605 -->
				<div id="header-widget-2" class="col205 last">
				<?php  if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar('header-top-search') ); ?>
				</div><!-- end .col205 -->
			</div><!-- end .fixed -->
		</div><!-- end #header --> 	