<?php
if(!defined("ABSPATH")) exit;


function  estore_reqister_menus(){


// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'header-menu' => esc_html__( 'Primary', 'estore' ),
			"footer-menu"  => esc_html__('Footer menu' , 'estore'),
			"footer-menu-categories"=> "Footer Categories Menu"
		)
	);


}

add_action( 'after_setup_theme', 'estore_reqister_menus' );


// footer menu  change
add_filter( 'wp_nav_menu_args', 'change_nav_menu_args' );
function change_nav_menu_args( $args ) {

	if( $args['menu']->slug === "footer-menu" ||  $args["menu"]->slug === "footer-menu-categories" ){
		$args['menu_class']   = 'info ';
	}
	return $args;
}
// end footer menu


function estore_get_header_menu(){
	$args = [
		'theme_location' => 'header-menu',
		// 'menu'            => '',
		'container'       => 'div',
		// 'container'       => false,
		'container_class' => 'collapse navbar-collapse',
		'container_id'    => 'bs-megadropdown-tabs',
		// 'menu_class'      => 'menu',
		'menu_class'      => 'nav navbar-nav',
		// 'menu_id'         => '',
		'echo'            => false,
		//   'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => new Estore_Header_Walker_Nav_Menu(),
	];
	return wp_nav_menu(
		$args
	);

}



