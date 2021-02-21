<?php
if(!defined("ABSPATH")) exit;

add_filter("woocommerce_account_menu_item_classes" , "estore_my_account_nav_item_classes" ,  2);

function estore_my_account_nav_item_classes($classes ){
   // get_pr($classes , false);
      //  print_r($classes);
        if(in_array("is-active" , $classes)){
            array_push($classes , "active");
            foreach ($classes as $class=>$val){
                if($val === "is-active"){
                    unset($classes[$class]);
                }
            }
        }
       // get_pr($classes , false);
        return $classes;
}

function estore_account_menu_items($items) {
	// unset($items['dashboard']);         // убрать вкладку Консоль
	// unset($items['orders']);             // убрать вкладку Заказы
	unset($items['downloads']);         // убрать вкладку Загрузки
	// unset($items['edit-address']);         // убрать вкладку Адреса
	// unset($items['edit-account']);         // убрать вкладку Детали учетной записи
	// unset($items['customer-logout']);     // убрать вкладку Выйти



	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'estore_account_menu_items', 10 );


