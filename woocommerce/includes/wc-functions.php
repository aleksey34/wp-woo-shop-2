<?php
if(!defined("ABSPATH")) exit;

remove_action("woocommerce_before_main_content" , "woocommerce_breadcrumb" , 20);

//add_action("woocommerce_before_main_content" , function(){
//	echo '<div class="breadcrumb_dress">';
//} , 15);
//add_action("woocommerce_before_main_content" , function(){
//	echo '</div>';
//} , 25);

add_action("woocommerce_before_main_content" , "estore_add_breadcrumb" , 20);
function estore_add_breadcrumb(){
	$args = 	array(
		'delimiter'   => '&nbsp;&#47;&nbsp;',
		//'wrap_before' => '<nav class="woocommerce-breadcrumb">',
		'wrap_before' => '<div class="breadcrumb_dress">',
	//	'wrap_before' => '<div class="breadcrumb_dress"><a><span class="glyphicon glyphicon-home11" aria-hidden="true"></span></a>',
	//	'wrap_after'  => '</nav>',
		'wrap_after'  => '</div>',
		'before'      => '',
		'after'       => '',
		'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
	);
woocommerce_breadcrumb($args);
}

// shop sidebar
add_action("woocommerce_before_main_content", 'estore_add_sidebar_only_archive' , 50);
function estore_add_sidebar_only_archive(){
	if(!is_product()){
		woocommerce_get_sidebar();
	}
}

// check shortcod or not   -- if(wc_get_loop_prop("is_shortcode"))
