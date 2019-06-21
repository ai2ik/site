<!DOCTYPE html>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KCNCG86');</script>
<!-- End Google Tag Manager -->
<meta name="ahrefs-site-verification" content="23a954ef8a4effbe70dfdc69f1e13f6d96ea6197baef2c2982ff7eba3c962017">
<script async src="//186366.tctm.co/t.js"></script>

<!--Start of Tawk.to Script-
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a0b4ba1bb0c3f433d4c9321/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//measurablemetrics.co/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '8']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->

<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0070/2951.js" async="async"></script>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link href="//addiction-treatment-services.com/favicon.ico" rel="shortcut icon" type="image/x-icon" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

<meta name="google-site-verification" content="czKPdg_HrKXx_ZMiaHQ6XfsfxGTBsG3M9giIvCdlUsc" />
<meta name="msvalidate.01" content="CADD481C39272ABD196924F1BC20454C" />
<meta name="p:domain_verify" content="707bdce3db3debd71b43ad75f4122537" />

<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/classie.js"></script>
<script>   
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 0,
                header = document.querySelector("#headerinsidewrap");

if (jQuery(window).width() > 800) {
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
		
                    classie.remove(header,"smaller");
                }
            }
}
        });
    }
    window.onload = init();
function addMargin() {
    window.scrollTo(0, window.pageYOffset - 0);
}
window.addEventListener('hashchange', addMargin);
</script>

<?php if(is_page('144')) { ?>

  <script src="//code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>


<link rel="stylesheet" href="/app/uploads/2014/05/jquery-jvectormap-1.2.2.css" type="text/css" media="screen"/>
  <script src="/app/uploads/2014/05/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="/app/uploads/2014/05/jquery-jvectormap-us-aea-en.js"></script>

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

<link rel="stylesheet" href="https://addiction-treatment-services.com/wp-content/themes/ats2017/flexslider.css" type="text/css">
<script src="https://addiction-treatment-services.com/wp-content/themes/ats2017/js/jquery.flexslider.js"></script>
<!-- Place in the <head>, after the three links -->
<script type="text/javascript" charset="utf-8">
  jQuery(window).load(function() {
    jQuery('.flexslider').flexslider();
  });
</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119802973-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119802973-1');
</script>

</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KCNCG86"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php if(is_front_page()) { ?><div id="headerwrap">

	<?php } else { ?>

		<?php if(is_single() || is_tag() || is_category() || is_archive() || is_404() || is_home()) { ?>

			<div id="headerwrapint">

		<?php } elseif(has_post_thumbnail()) { ?>

			<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <div id="headerwrapint">
			<!--<div id="headerwrapint" style="background: linear-gradient(rgba(19, 35, 74, .62), rgba(19, 35, 74, .62)), url('<?php echo $url; ?>') no-repeat; background-size: cover; background-position: 40% 50%;">-->

		<?php } elseif(is_page_template('page-overview.php')) { ?>

			<div id="headerwrapint" class="overviewhead">

		<?php } else { ?>

			<div id="headerwrapint">

		<?php } ?>

<?php } ?>

<!--<div id="headerinsidewrap">
		<div id="headerinside" class="container">
			<a href="<?php echo site_url(); ?>" class="logo"><img src="/wp-content/themes/ats2017/img/atslogo-nbt.png" alt="Addiction Treatment Services Logo"></a>

			

            <div id="topcta">

                <div id="topcta-text" style="width:100%;">

                    Start Your Recovery Today<span class="hidden-sm hidden-md hidden-lg">. Call Now:</span><br>
                <?php echo do_shortcode('[header_phone]'); ?>

                </div>

            </div>
</div>-->
                
<div id="headerinsidewrap">
    <div id="headerinside">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-12">
	                <!-- old logo /wp-content/themes/ats2017/img/atslogo-nbt.png -->
                <a href="<?php echo site_url(); ?>" class="logo">
	                
  <img src="/app/uploads/2019/05/logo-1.png" alt="Addiction Treatment Services Logo" height="63.75px">

	                </a>
                </div>
                <div class="col-sm-6 col-12">
                    <div id="topcta">
                        <div id="topcta-text" style="width:100%;">Start Your Recovery Today<span class="hidden-sm hidden-md hidden-lg">. Call Now:</span><br>
                    <?php echo do_shortcode('[header_phone]'); ?></div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="navwrap">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <nav id="site-navigation" class="main-navigation container pl-2 pr-2" role="navigation">
                        <h3 class="menu-toggle"><i class="fa fa-bars"></i> <?php _e( 'Menu', 'twentytwelve' ); ?></h3><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
                    </nav>
                </div>
                <div class="col-md-3 d-none d-md-block search-column">
                    <?php get_search_form();?>
                </div>
            </div>
        </div>
    </div>

</div>

<?php if(is_front_page()) { ?>
<div id="hpherotext">

<div id="hpherotext-line1">Are Insurance Policies So Hard To Understand That You Or Your Loved One Can’t Find Addiction Treatment? Let Us Help.</div>
<div id="hpherotext-line2">Call Toll Free <?php echo do_shortcode('[phone]'); ?></div>
<div id="hpherotext-line3">We Offer Quick and Confidential Assessments</div>
</div>
	<div id="hpbtns">
		<a href="https://addiction-treatment-services.com/insurance/" class="hpbtn1">Insurance for Rehab</a>
		<a href="https://addiction-treatment-services.com/contact-us/" class="hpbtn2">Get Help Today!</a>
	</div>

<?php } elseif(is_single() || is_category() || is_tag() || is_archive()) { ?>

<div class="site" id="inthead"><header class="entry-header container text-center text-sm-left"><h1 class="entry-title"><?php the_title(); ?></h1></header></div>

<?php } elseif(is_home()) { ?>

<div class="site" id="inthead"><header class="entry-header container"><h1 class="entry-title">Addiction Blog</h1></header></div>

<?php } elseif(is_404()) { ?>

<div class="site" id="inthead"><header class="entry-header container"><h1 class="entry-title">Page Not Found</h1></header></div>

<?php } else { ?>

	
		<div class="site" id="inthead">
            <header class="entry-header pt-5 pb-5">
                <div class="row h-100">
                    <div class="col-md-8 text-center text-sm-left entry-header-left">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <p class="entry-subtitle"><?php the_field('page_subtitle');?></p>
                    </div>
                    <div class="col-md-4 text-center text-sm-right my-auto entry-header-right">
                        <p>Ready to get the help you deserve?</p>
                        <a href="/contact-us" class="btn btn-primary btn-lg">Contact Us</a>
                    </div>
                </div>
                
            
            </header>
		  <div class="crumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <?php
                if (function_exists( 'menu_breadcrumb') ) {
                    menu_breadcrumb(
                        'primary',                             // Menu Location to use for breadcrumb
                        ' &raquo; ',                        // separator between each breadcrumb
                        '<p class="menu-breadcrumb"><a href="https://addiction-treatment-services.com/" itemprop="url"><span itemprop="title">Home</span></a>&nbsp;&nbsp;&nbsp;&raquo;&nbsp;&nbsp;&nbsp;',      // output before the breadcrumb
                        '</p>'                              // output after the breadcrumb
                    );
                }
            ?>
		  </div>	
        </div>

<?php } ?>


</div>


<?php if(is_page()) { } elseif (is_home()) { ?>

<div class="site" id="blogintro"><div class="entry-content" style="padding:15px;"><p>Welcome to the Addiction Treatment Services blog. Our goal is to put reliable information about addiction, treatment and recovery into the hands of concerned family members, and this blog helps us do just that.</p>

<p>Check back often for regular updates about mental health, family interventions, insurance coverage, the nation’s growing opioid epidemic, and much more. Please feel free to share anecdotes, feedback and encouragement in the comment section of our blog posts as well.</p>

<p>Knowledge and communication are key to beating addiction, so please take full advantage of everything that our blog has to offer. </p>
</div></div>

<?php } if(is_home() || is_category() || is_tag() || is_archive()) { ?>

		<div id="blog-functions-wrap"><div id="blog-functions">
<div id="blog-functions-category"><form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

		<?php
		$args = array(
			'show_option_none' => __( 'Categories &#9660;' ),
			'show_count'       => 1,
			'orderby'          => 'name',
			'echo'             => 0,
		);
		?>

		<?php $select  = wp_dropdown_categories( $args ); ?>
		<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
		<?php $select  = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

		<?php echo $select; ?>

		<noscript>
			<input type="submit" value="View" />
		</noscript>

	</form>

</div><div id="blog-functions-archives">

<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
  <option value=""><?php echo esc_attr( __( 'Archives &#9660;' ) ); ?></option> 
  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
</select>
</div><div id="blog-functions-search">
<form action="/" method="get">
    <input type="text" name="s" id="search" placeholder="Search" value="<?php the_search_query(); ?>" />
    <input type="submit" alt="Search" id="blog-functions-searchbtn"/>
</form>
</div>
<div style="clear: both;"></div>
</div>
</div>

<?php } else {} ?>

<?php if(is_tree('69')) {?>
<div class="sitewrap hidemobile" id="insurancebar">
<div id="insurance-text">Understand Your<span id="insurance-text-line2">Insurance Coverage:</span></div>
<img src="/app/uploads/2017/05/bcbs.jpg" alt="BCBS Logo">
<img src="/app/uploads/2017/05/united.jpg" alt="United Logo">
<img src="/app/uploads/2017/05/umr.jpg" alt="UMR Logo">
<img src="/app/uploads/2017/05/beacon.jpg" alt="Beacon Logo">
<img src="/app/uploads/2017/05/cigna.jpg" alt="CIgna Logo">
<img src="/app/uploads/2017/05/ohio.jpg" alt="Ohio Logo">
<img src="/app/uploads/2017/05/humana.jpg" alt="Humana Logo">
<img src="/app/uploads/2017/05/aetna.jpg" alt="Aetna Logo">
<img src="/app/uploads/2017/05/healthnet.jpg" alt="Healthnet Logo">
<img src="/app/uploads/2017/05/assurant.jpg" alt="Assurant Logo">
</div>
<?php } else { ?>
<div class="sitewrap" id="insurancebar">
<div id="insurance-text">Understand Your<span id="insurance-text-line2">Insurance Coverage:</span></div>
<img src="/app/uploads/2017/05/bcbs.jpg" alt="BCBS Logo">
<img src="/app/uploads/2017/05/united.jpg" alt="United Logo">
<img src="/app/uploads/2017/05/umr.jpg" alt="UMR Logo">
<img src="/app/uploads/2017/05/beacon.jpg" alt="Beacon Logo">
<img src="/app/uploads/2017/05/cigna.jpg" alt="CIgna Logo">
<img src="/app/uploads/2017/05/ohio.jpg" alt="Ohio Logo">
<img src="/app/uploads/2017/05/humana.jpg" alt="Humana Logo">
<img src="/app/uploads/2017/05/aetna.jpg" alt="Aetna Logo">
<img src="/app/uploads/2017/05/healthnet.jpg" alt="Healthnet Logo">
<img src="/app/uploads/2017/05/assurant.jpg" alt="Assurant Logo">
</div>
<?php } ?>

<div class="sitewrap" id="mainbody">
<div id="page" class="site">
	<div id="main" class="wrapper">