
  </tr>
  <tr>
    <td height="34"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/bottom_bar.jpg" width="945" height="34" alt="bottom bar" /></td>
  </tr>
  <tr>
    <td class="footer">&copy;<?php echo date("Y"); ?> Addiction Treatment Services.  All rights reserved.
	</td>
  </tr>
  <tr>
  	<td><div id="footer"><?php
			// Using wp_nav_menu() to display menu
			wp_nav_menu( array(
				'menu' => 'Footer Menu', // Select the menu to show by Name
				'id' => 'FootermenuWrapper',
				'class' => 'menu',
				'container' => false, // Remove the navigation container div
				'theme_location' => 'Footer'
				)
			);
			?></div></td></tr>
</table>
<?php wp_footer(); ?>
</body>
</html>