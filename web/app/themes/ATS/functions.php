<?php

function remove_generator() {
	return '';
}

add_filter('the_generator', 'remove_generator');

add_action( 'init', 'register_navmenus' );
function register_navmenus() {
	register_nav_menus( array(
		'Header' 	=> __( 'Main Menu' ),
		)
	);
}

if (function_exists('register_sidebar')) {

 register_sidebar(array(

  'name' => __('Left Sidebar', 'ATS'),

  'id' => 'left-sidebar',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '',

  'after_title' => ''

 ));
 register_sidebar(array(

  'name' => __('Insurance Companies', 'ATS'),

  'id' => 'insurance-companies',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '<h1 style="color:#464646; font-size:11px;margin:8px; line-height:1.5em;">',

  'after_title' => '</h1>'

 ));

 register_sidebar(array(

  'name' => __('Main Content Quote', 'ATS'),

  'id' => 'main-content-quote',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '',

  'after_title' => ''

 ));

 register_sidebar(array(

  'name' => __('Search Bar', 'ATS'),

  'id' => 'search-bar',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '',

  'after_title' => ''

 ));

 register_sidebar(array(

  'name' => __('Right Sidebar', 'ATS'),

  'id' => 'right-sidebar',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '<h2 class="right_titles">',

  'after_title' => '</h2>'

 ));

 register_sidebar(array(

  'name' => __('Footer Copy', 'ATS'),

  'id' => 'footer-copy',

  'before_widget' => '',

  'after_widget' => '',

  'before_title' => '',

  'after_title' => ''

 ));

}

?>