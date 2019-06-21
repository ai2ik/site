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
</div>

<div id="newsletterfooterwrap"><div id="newsletterfooter">
<div class="site">

<!-- Begin MailChimp Signup Form -->

<div id="mc_embed_signup">
<form action="//addiction-treatment-services.us14.list-manage.com/subscribe/post?u=251c8f95ada3302b2c64d4070&id=7d1e75e650" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
<div id="mc_embed_signup_scroll">
<h2>Get Up-to-Date Addiction News in Your Inbox</h2>
<div class="mc-field-group">
<label for="mce-EMAIL">Email Address <span class="asterisk"></span>
</label>
<input type="email" value="" placeholder="Email Address" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
<div id="mce-responses">
<div class="response" id="mce-error-response" style="display:none"></div>
<div class="response" id="mce-success-response" style="display:none"></div>
</div> <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_251c8f95ada3302b2c64d4070_7d1e75e650" tabindex="-1" value=""></div>
<input type="submit" value="Sign Up to Get Our Newsletter" name="subscribe" id="mc-embedded-subscribe" class="button"></div>

</form>
</div>

<!--End mc_embed_signup-->
</div>
</div></div>

<div id="footercta">
<div style="margin: 0 auto; max-width: 960px; text-align: left;">
<h1 id="footercta-line1">Help is Available 24/7 &mdash; Call Today <span style="font-weight: bold;"><a href="tel:877-455-0055" class="clicknum">877-455-0055</a></span></h1>
</div>
</div>

<footer id="footer">
<div id="footerinside">

<ul class="block-with-icons clearfix">
    <li class="b1">
        <h3>Site Navigation</h3>
<?php 
	wp_nav_menu(array(
		'theme_location' => 'footer', // menu slug from step 1
		'container' => false, // 'div' container will not be added
		'menu_class' => 'footernav'
	));
?>
    </li>
    <li class="b2" style="text-align: center;">
      <img src="//addiction-treatment-services.com/wp-content/uploads/2014/05/ats-bw.png" style="margin: 0px auto 0;">

<h3 style="margin: 24px 0 12px 0; text-align: center; font-size: 16px; font-weight: 300;">In Partnership With:</h3>
<img src="//addiction-treatment-services.com/wp-content/uploads/2014/05/ffi-bw.png" style="margin: 0px auto;">
    </li>
    <li class="b3">
        <h3>Contact Us</h3>

<?php echo do_shortcode('[gravityform id="1" title="false" description="false"]'); ?>
    </li>
</ul>


<div style="clear: both;"></div>

<div id="copyright">
&copy; Copyright <?php echo date('Y'); ?> Addiction Treatment Services, Inc.  All Rights Reserved.<br>
<a href="//addiction-treatment-services.com/privacy-policy/" style="color:#fff;">Privacy Policy</a> | <a href="//addiction-treatment-services.com/site-map/" style="color:#fff;">Sitemap</a>
</div>
</div>		
</footer><!-- #colophon -->


<?php wp_footer(); ?>




</body>
</html>