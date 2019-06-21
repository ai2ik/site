<?php

	/**

	 *

	*/

 

	$footer_layout = ewf_get_footer_layout();

?>
		<div id="footer" class="fixed">
		<div class="fixed">
			<div class="col430" id="footer-widget-5">
					<?php
						ewf_setZone(220);
						if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar('footer-bottom-left') ); 
				?>
				</div><!-- end .col430 -->
				<div class="col430 last" id="footer-widget-6">
					<?php
					ewf_setZone(220);
						if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar('footer-bottom-right') ); 
					?>
				</div><!-- end .col430 -->	
			</div><!-- end .fixed -->
		</div><!-- end #footer -->
	<?php wp_footer(); ?>
	</div><!-- end #wrap -->
<div style="margin: 0 auto; text-align: center; margin-top: -30px; margin-bottom: 20px; font-size: 11px; color: #111111;"><a href="http://addiction-treatment-services.com/site-map/" style=" color: #111111;">Sitemap</a> | <a href="http://addiction-treatment-services.com/privacy-policy/" style=" color: #111111;">Privacy Policy</a></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10269680-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script async src="http://tp.multiview.com/dpx.js?cid=9494&action=100&segment=familyfirstats&m=1"></script>

</body>
</html>