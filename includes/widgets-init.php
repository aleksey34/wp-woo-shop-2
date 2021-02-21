<?php
if(!defined("ABSPATH")) exit;
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function estore_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'estore' ),
			'id'            => 'main-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'estore' ),
			'before_widget' => '<section id="%1$s" class="w3ls_mobiles_grid_left_grid  widget %2$s">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><div class="w3ls_mobiles_grid_left_grid_sub">',
		)
	);

	register_sidebar([
		"name"=>"Footer Widgets",
		"id"=>"footer_widgets",
		'description'   => esc_html__( 'Add Footer Widgets here.', 'estore' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 w3_footer_grid  widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>'
	]);


	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'estore' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'estore' ),
			'before_widget' => '<section id="%1$s" class="w3ls_mobiles_grid_left_grid  widget %2$s">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3><div class="w3ls_mobiles_grid_left_grid_sub">',
		)
	);



}
add_action( 'widgets_init', 'estore_widgets_init' );