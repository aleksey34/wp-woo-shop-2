<?php

if(!defined("ABSPATH")) exit;


use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_attach_theme_options' );
function crb_attach_theme_options() {
	Container::make( 'theme_options', __( 'Настройки темы' ) )
		->set_icon("dashicons-carrot")
		->add_tab( __( 'Шапка' ), array(

			Field::make("select" , "estore_header_logic" , "Будет использоваться логотип?")
				->add_options( array(
					'yes' => 'Yes',
					'no' => 'No',
				)  ),


			Field::make( 'image', 'estore_header_logo', __( 'Logo' ) )
		//->set_width(30),
		->set_conditional_logic( array(
			'relation' => 'AND', // Optional, defaults to "AND"
			array(
				'field' => 'estore_header_logic',
				'value' => 'yes', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
				'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
			)
		) ),


			Field::make( 'text', 'estore_header_sitename', __( 'Название сайта' ) )
		//->set_width("33"),
		->set_conditional_logic( array(
			'relation' => 'AND', // Optional, defaults to "AND"
			array(
				'field' => 'estore_header_logic',
				'value' => 'no', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
				'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
			)
		) ),

			Field::make( 'text', 'estore_header_description', __( 'Краткое описание сайта' ) )
				->set_conditional_logic( array(
					'relation' => 'AND', // Optional, defaults to "AND"
					array(
						'field' => 'estore_header_logic',
						'value' => 'no', // Optional, defaults to "". Should be an array if "IN" or "NOT IN" operators are used.
						'compare' => '=', // Optional, defaults to "=". Available operators: =, <, >, <=, >=, IN, NOT IN
					)
				) ),

		) )
		->add_tab( __( 'Подвал' ), array(
			Field::make( 'text', 'estore_footer_copy', __( 'Copyright' ) )
				->set_default_value('<p>&copy; 2017 Electronic Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>')
				->set_width(100),
			Field::make( 'radio', 'estore_footer_is_show_newsletters', __( 'Show Section Newsletters' ) )
				->add_options(["on"=>"show" , "off"=>"hidden"])
				->set_width(50),
			Field::make( 'radio', 'estore_footer_is_show_widgets', __( 'Show Section Widgets' ) )
				->add_options(["on"=>"show" , "off"=>"hidden"])
				->set_width(50),
		) );
}
