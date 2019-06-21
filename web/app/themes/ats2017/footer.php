<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>


	</div><!-- #main .wrapper -->
</div><!-- #page -->
</div><!-- .sitewrap -->



<?php if(is_front_page()) {} else { ?>
<!-- div class="sitewrap" id="accreditation"><div class="site">
<img src="https://family-intervention.com/wp-content/uploads/2017/05/naadac.jpg" alt="NAADAC Logo">
<img src="https://family-intervention.com/wp-content/uploads/2017/05/bbb.jpg" alt="BBB Logo">
<img src="https://family-intervention.com/wp-content/uploads/2017/05/naatp.jpg" alt="NAATP Logo">
</div></div -->

<div class="sitewrap" id="hpcta"><div class="site">
Addiction Help Hotline<br>
<span style="font-size: 21px;">Compassionate admissions specialists are available 24 hours a day to take your call and answer any questions you might have.</span><br>
<?php echo do_shortcode('[header_phone]'); ?>
</div></div>

<?php } ?>
<?php if(is_single() || is_tag() || is_category() || is_archive() || is_404() || is_home()) { } else { ?>
<!--<div id="footerblogs"><div class="site">
<div class="entry-content">
<h2>Addiction Treatment Services Blog</h2>
<h3>Addiction services news and articles</h3>
</div>
<div id="blog-search"><form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
</div>



<div class="flexslider" style="max-width: 100%; margin-bottom: 0px; border: 0px; -webkit-border-radius: 0px; border-radius: 0px; -webkit-box-shadow: none; box-shadow: none;">
   <ul id="blog-block" class="slides">



	<?php remove_all_filters('posts_orderby'); $the_query = new WP_Query(array('showposts' => 3) ); while ($the_query -> have_posts()) : $the_query -> the_post(); $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?> 


	<li>
		<a href="<?php the_permalink() ?>" class="blogimage"><img src="<?php echo $url; ?>" alt="<?php the_title(); ?>"></a>
		<div class="blog-contentblock"><div class="blog-date"><?php the_date(); ?></div>
		<div class="blog-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
		<div class="blog-excerpt"><?php echo excerpt(25); ?></div></div>
	</li><?php endwhile; wp_reset_query(); ?>


  </ul>
</div>
<div style="clear: both; height: 0px;"></div>
<a href="/blog/" class="bluebutton">Read More Blogs</a>
</div></div>-->

<section class="container footer-recent-posts pt-5 pb-5 mb-5">
    <div class="container">
        <div class="col-12 text-center pt-3 pb-3">
            <h3 class="mb-0">Recent Articles from Northbound Addiction Treatment Services</h3>
        </div>
        <div class="row">
            <?php echo do_shortcode("[pt_view id=1c5283bhd3]"); ?>
        </div>
    </div>
</section>

<?php } ?>


<div id="footer-newsletter"><div class="site">
<div id="footer-newsletter-text">Get Up-to-Date Addiction News</div>


<div id="footer-newsletter-form"><?php echo do_shortcode('[gravityform id="2" title="false" description="false"]'); ?></div>



</div><div style="clear: both; height: 0px;"></div></div>



<div id="footertext"><div class="site"><div class="entry-content">

<?php the_field('why_family_first_intervention', 'option'); ?>

</div></div></div>

<footer id="footer">
<div id="footerinside">

<ul class="block-with-icons clearfix">
    <li class="b1"><?php wp_nav_menu( array( 'theme_location' => 'footerone', 'menu_class' => 'footer-menu' ) ); ?></li>
	 <li class="b2"><?php wp_nav_menu( array( 'theme_location' => 'footertwo', 'menu_class' => 'footer-menu' ) ); ?></li>
    <li class="b3">
	<a href="https://addiction-treatment-services.com/resource-directory/"><img src="/app/uploads/2017/05/footermap.jpg" alt="Map: Visit Our Directory of Drug and Alcohol Treatment Resources by State"></a>
	<br><h3 class="center white thin thirty" style="line-height: 1.2; max-width: 80%; margin: 0 10%;">Do You Need Addiction Treatment Help?</h3>
        <p class="center white thin ten" style="max-width: 80%; margin: 0 10%;">Our Addiction Specialists Are Available 24/7<br><span style="font-size:23px;margin-top:15px;margin-bottom:15px;" class="bluebutton"><strong>Call Now: <?php echo do_shortcode('[phone]'); ?></strong></span></p>
	<div class="center white thin ten"><strong>Fill Out The Form Below, And We’ll Call You</strong>
	<br>All Calls And Emails Are 100% Confidential</div>
	<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
	
	<!--<div id="footer-social">
	<a href="https://www.facebook.com/addictiontreatmentservice/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a href="https://twitter.com/AddictionSVCS" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	<a href="https://www.instagram.com/addictiontreatmentservices/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	
	</div>-->
</ul>


<div style="clear: both;"></div>


</div>		
</footer><!-- #colophon -->

<div class="copyright-top">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center pt-2 pb-2">
                <p><img src="/app/uploads/2019/01/FAVICON_152.png" style="height: 70px; margin-top:-20px;" alt="northbound treatment"></p>
                <p style="margin-top:-20px;">Brought to you by Northbound Treatment</p>
            </div>
            <div class="col-sm-6 text-center pt-2 pb-2">
                <p>Addiction Treatment Services supports:</p>
                <p><img src="/app/uploads/2019/01/samhsa-logo.png" style="height: 30px;" alt="samhsa logo"></p>
            </div>
        </div>
    </div>
</div>
<div id="copyright">
&copy; Copyright <?php echo date('Y'); ?> <a href="https://www.northboundtreatment.com" target="_blank">Northbound Addiction Treatment Services, Inc.</a> | All Rights Reserved <br> <a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a> | <a href="<?php echo site_url(); ?>/sitemap/">Sitemap</a> <!--| <?php echo do_shortcode( '[su_tooltip style="bootstrap" position="top" shadow="no" rounded="yes" size="default" title="Where do calls go?" content="Calls to numbers dedicated to a specific treatment center profile will be routed to that treatment center. All other calls will be routed to Northbound Addiction Treatment" behavior="hover" close="no" class=""]Where do calls go?[/su_tooltip]' ); ?>--><br><br>
    <div style="padding:0 10%">Addiction-Treatment-Services.com is a website that provides information about substance abuse and addiction treatment. Addiction-Treatment-Services.com is not a medical provider and does not provide medical advice. The information provided by Addiction-Treatment-Services.com is not a substitute for professional treatment advice from a licensed medical professional.</div>
</div>
<?php wp_footer(); ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Start of LiveChat (www.livechatinc.com) code --> <script type="text/javascript">   window.__lc = window.__lc || {};   window.__lc.license = 10795912;   (function() {     var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;     lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';     var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);   })(); </script> <noscript> <a href="https://www.livechatinc.com/chat-with/10795912/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a> </noscript> <!-- End of LiveChat code -->
<script type="text/javascript" src="https://cdn.mailshake.com/2018-05-01/mailshake.js"></script>
</body>
</html>