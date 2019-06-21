<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php wp_title('');?> |  <?php bloginfo('name'); ?></title>
<meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
<meta http-equiv="content-language" content="en-us" />
<meta name="robots" content="all,index,follow" />
<link href="http://addiction-treatment-services.com/wp-content/themes/ATS/style.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link rel="shortcut icon" type="image/x-icon" href="http://addiction-treatment-services.com/favicon.ico">
<?php wp_head(); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-10269680-2']);
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>s

</head>
<body onLoad="MM_preloadImages('http://addiction-treatment-services.com/wp-content/themes/ATS/images/supertop_menu_home_on.gif','images/supertop_menu_contact_on.gif')">
<table width="945" height="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="34" align="right" valign="bottom"><table width="151" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="51" height="21"><a href="http://addiction-treatment-services.com" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home button','','http://addiction-treatment-services.com/wp-content/themes/ATS/images/supertop_menu_home_on.gif',1)"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/supertop_menu_home_off.gif" name="home button" width="51" height="21" border="0"></a></td>
        <td width="66"><a href="/contact/" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('contact button','','http://addiction-treatment-services.com/wp-content/themes/ATS/images/supertop_menu_contact_on.gif',1)"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/supertop_menu_contact_off.gif" name="contact button" width="66" height="21" border="0"></a></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="92"><div style="position: relative; background-image: url('http://addiction-treatment-services.com/wp-content/themes/ATS/images/top_with_logo.jpg'); background-repeat: no-repeat; width: 945px; height: 92px;"><a href="http://addiction-treatment-services.com/" style="display: block; position: absolute; top: 5px; left: 50px; width: 330px; height: 82px;"></a></div></td>
  </tr>
  <tr>
    <td class="menubkgrnd">
	<div id="nav">
	<?php
			// Using wp_nav_menu() to display menu
			wp_nav_menu( array(
				'menu' => 'Main Menu', // Select the menu to show by Name
				'id' => 'menu',
				'class' => 'menu',
				'container' => false, // Remove the navigation container div
				'theme_location' => 'Header'
				)
			);
			?>
		</div>
	</td>

  </tr>

  <tr>

    <td height="157"><img src="http://addiction-treatment-services.com/wp-content/themes/ATS/images/top_main_banner.jpg" width="945" height="157" alt="top banner" /></td>

  </tr>

  <tr>

    <td class="middle-mainbox-bg"><div id="container"><table border="0" width="922" height="100%" cellpadding="0" cellspacing="0">

      <tr>

        <td width="203" align="left" valign="top" bgcolor="#BBCC94"><table width="100%" border="0" cellspacing="0" cellpadding="0">

          <tr>

            <td class="leftmenu-title-bg"><span class="gethelp">Get Help Now!</span></td>

          </tr>

          <tr>

            <td class="space1"><?php dynamic_sidebar ('left-sidebar'); ?></td>

          </tr>

          <tr>

            <td class="insurance-co"><?php dynamic_sidebar ('insurance-companies'); ?></td>

          </tr>

        </table></td>