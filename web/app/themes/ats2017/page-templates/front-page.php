<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
</div></div></div>

<div class="sitewrap" id="hpmain"><div class="site"><div class="wrapper">

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry-page-image">
						<?php the_post_thumbnail(); ?>
					</div><!-- .entry-page-image -->
				<?php endif; ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
    <div class="home-facilities mb-5">
        <h2 class="section-title pb-4">Our Facilities</h2>
            <div class="row">
                <div class="col-md-3 white-bg">
                    <div class="card box-shadow grow">
                        <a href="https://www.northboundtreatment.com/drug-rehab-orange-county/" target="_blank"><img class="card-img-top" alt="northbound treatment california" src="/app/themes/ats2017/img/northbound-orange-county.jpg"></a>
                        <div class="card-body text-center">
                            <a href="https://www.northboundtreatment.com/drug-rehab-orange-county/" target="_blank"><h3>Northbound Treatment<br>California</h3></a>
                            <h4>Orange County, CA</h4>
                            <a href="https://www.northboundtreatment.com/drug-rehab-orange-county/" class="btn btn-primary btn-block" target="_blank">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 white-bg">
                    <div class="card box-shadow grow">
                        <a href="https://www.northboundtreatment.com/drug-rehab-seattle/" target="_blank"><img class="card-img-top" alt="northbound treatment seattle" src="/app/themes/ats2017/img/northbound-seattle.jpg"></a>
                        <div class="card-body text-center">
                            <a href="https://www.northboundtreatment.com/drug-rehab-seattle/" target="_blank"><h3>Northbound Treatment<br>Seattle</h3></a>
                            <h4>Seattle, WA</h4>
                            <a href="https://www.northboundtreatment.com/drug-rehab-seattle/" class="btn btn-primary btn-block" target="_blank">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 white-bg">
                    <div class="card box-shadow grow">
                        <a href="https://www.northboundtreatment.com/drug-rehab-st-louis/" target="_blank"><img class="card-img-top" alt="northbound treatment st louis" src="/app/themes/ats2017/img/northbound-st-louis.jpg"></a>
                        <div class="card-body text-center">
                            <a href="https://www.northboundtreatment.com/drug-rehab-st-louis/" target="_blank"><h3>Northbound Treatment<br>St. Louis</h3></a>
                            <h4>St. Louis, MO</h4>
                            <a href="https://www.northboundtreatment.com/drug-rehab-st-louis/" class="btn btn-primary btn-block" target="_blank">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 white-bg">
                    <div class="card box-shadow grow">
                        <a href="https://joshuahouserecovery.com/" target="_blank"><img class="card-img-top" alt="joshua house recovery" src="/app/themes/ats2017/img/j-house.jpg"></a>
                        <div class="card-body text-center">
                            <a href="https://joshuahouserecovery.com/" target="_blank"><h3>J House<br>Recovery</h3></a>
                            <h4>Orange County, CA</h4>
                            <a href="https://joshuahouserecovery.com/" class="btn btn-primary btn-block" target="_blank">Learn More</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
               
    
</div></div></div>


<div id="hpmidimg">
    <h2>In Need of an Interventionist?</h2>
    <p>We have helped thousands of families with performing interventions on their loved ones. Learn more about the intervention process.</p>
    <a href="/admissions/intervention-specialist/" class="bluebutton">Intervention Assistance</a>
</div>



<div class="sitewrap" id="hpmid"><div class="site">
<div class="entry-content"><?php the_field('hp_mid'); ?></div>
</div></div>

<div class="sitewrap hpwhy">
	<div class="hpwhy-left-image" id="hpwhy-1"></div>
	<div class="hpwhy-right-content"><div class="entry-content"><?php the_field('hp_left'); ?></div></div>
	<div style="clear: both;"></div>
</div>

<div class="sitewrap hpwhy">
	<div class="hpwhy-right-image" id="hpwhy-2"></div>
	<div class="hpwhy-left-content"><div class="entry-content"><?php the_field('hp_right'); ?></div></div>
	<div style="clear: both;"></div>
</div>

<div class="sitewrap" id="hpcta"><div class="site">
Addiction Help Hotline<br>
<span style="font-size: 21px;">Compassionate admissions specialists are available 24 hours a day to take your call and answer any questions you might have.</span><br>
<?php echo do_shortcode('[header_phone]'); ?>
</div></div>


<div class="sitewrap"><div class="site"><div class="wrapper">

<?php get_footer(); ?>