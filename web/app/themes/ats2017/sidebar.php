<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */


if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar-container">
    <aside id="secondary" class="widget-area col-sm-12 col-lg-4" role="complementary">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
        <aside id="text-21" class="widget widget_text">
            <div class="textwidget">
                <p>
                    <a class="bluebutton" href="tel:8774550055">We Can Help - Call Now
                        <span class="twenty semibold">(877) 455-0055</span></a>
                </p>
                <p>
                    <a class="darkbluebutton" href="https://addiction-treatment-services.com/resource-directory/"><img src="/app/uploads/2017/05/state.jpg" alt="USA Map" />Recovery Resources</a>
                </p>
            </div>
        </aside>
    </aside><!-- #secondary -->