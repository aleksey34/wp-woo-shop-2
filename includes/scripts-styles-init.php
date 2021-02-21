<?php

if(!defined("ABSPATH")) exit;

/**
 * Enqueue scripts and styles.
 */
function estore_scripts() {

	wp_enqueue_script( 'estore-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'estore-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'bootstrap-3.1.1.min', get_template_directory_uri() . '/assets/js/bootstrap-3.1.1.min.js', array("jquery"), null, true );
	wp_enqueue_script( 'easyResponsiveTabs', get_template_directory_uri() . '/assets/js/easyResponsiveTabs.js', array('jquery'), null, true );
	wp_enqueue_script( 'imagezoom', get_template_directory_uri() . '/assets/js/imagezoom.js', array("jquery"), null, true );
	wp_enqueue_script( 'jquery.countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array("jquery"), null, true );
	wp_enqueue_script( 'jquery.flexisel', get_template_directory_uri() . '/assets/js/jquery.flexisel.js', array("jquery"), null, true );
	wp_enqueue_script( 'jquery.flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js', array("jquery"), null, true );
	wp_enqueue_script( 'jquery.magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array("jquery"), null, true );
	wp_enqueue_script( 'jquery.wmuSlider', get_template_directory_uri() . '/assets/js/jquery.wmuSlider.js', array("jquery"), null, true );
	wp_enqueue_script( 'minicart', get_template_directory_uri() . '/assets/js/minicart.js', array("jquery"), null, true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/script.js', array("jquery"), null, true );



	wp_enqueue_script( 'ajax-search', get_template_directory_uri() . '/assets/js/ajax-search.js', array("jquery"), null, true );
	if(!is_admin()){

		wp_localize_script( 'ajax-search', 'headerSearchData', array(
			"url" => admin_url("admin-ajax.php"),
			"nonce" => wp_create_nonce("ajax-search")
		) );

	}




	wp_enqueue_script( 'ajax-quick-view', get_template_directory_uri() . '/assets/js/ajax-quick-view.js', array("jquery"), null, true );
	if(!is_admin()){

		wp_localize_script( 'ajax-quick-view', 'quickViewData', array(
			"url" => admin_url("admin-ajax.php"),
			"nonce" => wp_create_nonce("ajax-quick-view")
		) );

	}




	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}









}


function estore_styles(){

	wp_enqueue_style( 'bootstrap', get_template_directory_uri()."/assets/css/bootstrap.css");
	wp_enqueue_style( 'fasthover', get_template_directory_uri()."/assets/css/fasthover.css");
	wp_enqueue_style( 'flexslider', get_template_directory_uri()."/assets/css/flexslider.css");
	wp_enqueue_style( 'font-awesome', get_template_directory_uri()."/assets/css/font-awesome.css");
	wp_enqueue_style( 'jquery.countdown', get_template_directory_uri()."/assets/css/jquery.countdown.css");
	wp_enqueue_style( 'popuo-box', get_template_directory_uri()."/assets/css/popuo-box.css");


	wp_enqueue_style( 'roboto-fonts', "https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Roboto:300,400,400i,700,700i&display=swap&subset=cyrillic");

	wp_enqueue_style( 'estore-style', get_stylesheet_uri(), array(), _S_VERSION );
//	wp_style_add_data( 'estore-style', 'rtl', 'replace' );

}


add_action( 'wp_enqueue_scripts', 'estore_scripts' );
add_action( 'wp_enqueue_scripts', 'estore_styles' );


// remove style of quantity btn
add_action( 'wp_enqueue_scripts', 'wcs_dequeue_quantity' );
function wcs_dequeue_quantity() {
	wp_dequeue_style( 'wcqi-css' );
}


/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function estore_woocommerce_scripts() {
	wp_enqueue_style( 'estore-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'estore-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'estore_woocommerce_scripts' );
