<?php
 get_header(); ?>
				 <td width="1px"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/space.gif" width="1" height="1" alt="spacer" /></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" height="100%">
          <tr>
            <td class="main_title">Welcome to Addiction Treatment Services</td>
            <td class="searchbox"><form role="search" method="get" id="searchform" action="http://addiction-treatment-services.com/" >
				<input type="text" value="" name="s" id="s" />
					<input type="submit" id="searchsubmit" value="Search" />
					</form></td>
          </tr>
          <tr>
            <td colspan="2" valign="top" class="space2"><!-- start main content area -->
					<div id="maincontent">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(''); ?>
						<?php endwhile; else: ?>
							<p><?php _e('Sorry, no posts matched your criteria. Please use our search box to try again.'); ?></p>
							<?php endif; ?>
						</div>
					<!-- end main content area --></td>
		          </tr>
        </table></td>
      </tr>
    </table></div></td> 
	
<?php get_footer(); ?>