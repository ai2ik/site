<?php get_header(); ?>
				 <td width="1"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/space.gif" width="1" height="1" alt="spacer" /></td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="36" background="http://addiction-treatment-services.com/wp-content/themes/ATS/images/main_title_bg.gif" class="main_title"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/space.gif" width="20" height="10" alt="spacer" />Welcome to Addiction Treatment Services</td>
            <td width="191" background="http://addiction-treatment-services.com/wp-content/themes/ATS/images/main_title_bg.gif" class="main_title">&nbsp;</td>
          </tr>
          <tr>
            <td height="31" align="left" valign="middle" bgcolor="#C9D7E6"><span class="subtitle1"><span class="main_title"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/space.gif" width="20" height="10" alt="spacer" /><?php dynamic_sidebar ('main-content-quote'); ?></td>
            <td class="searchbox"><?php dynamic_sidebar ('search-bar'); ?></td>
          </tr>
          <tr>
            <td valign="top" class="space1"><!-- start main content area -->
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(''); ?>
							<?php endwhile; else: ?>
							<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
							<?php endif; ?><!-- end main content area --></td>
<?php get_footer(); ?>