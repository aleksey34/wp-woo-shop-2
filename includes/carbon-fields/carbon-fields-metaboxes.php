<?php

if(!defined("ABSPATH")) exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_metaboxes' );
function crb_attach_theme_metaboxes() {


	Container::make( 'post_meta', 'Custom Data' )
	         ->where( 'post_type', '=', 'page' )
	         ->add_fields( array(
		         Field::make( 'map', 'crb_location' )
		              ->set_position( 37.423156, -122.084917, 14 ),
		         Field::make( 'sidebar', 'crb_custom_sidebar' ),
		         Field::make( 'image', 'crb_photo' ),
	         ));



}