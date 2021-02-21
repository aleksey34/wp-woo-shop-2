<?php
if(!defined("ABSPATH")) exit;


// wrap main -- products and sidebar
add_action("woocommerce_before_main_content" , "estore_archive_wrapper_start" , 40);
function estore_archive_wrapper_start(){
?>
		<div class="mobiles">
		<div class="container">
			<div class="w3ls_mobiles_grids">
<?php
}


add_action("woocommerce_after_main_content" , "estore_archive_wrapper_close" , 30);
function estore_archive_wrapper_close(){
?>
    <div class="clearfix"> </div>
    </div>
    </div>
    </div>
                <?php
}


// wrap main product
add_action("woocommerce_before_main_content" , "estore_wrapper_products_tag_start" , 60);
function estore_wrapper_products_tag_start(){
    ?>
    <div class="col-md-8 w3ls_mobiles_grid_right">
<?php
}
add_action("woocommerce_after_main_content" , "estore_wrapper_products_tag_close" , 25);
function estore_wrapper_products_tag_close(){
    ?>
        <div class="clearfix"> </div>
    </div>
        <?php
}

// remove title on shop page

add_filter( "woocommerce_show_page_title", function () {
    return  is_shop() ?  false : true;
} );

// top lines -- categories show
// remove them
    remove_filter("woocommerce_product_loop_start" ,
        "woocommerce_maybe_show_product_subcategories" );
// add into new place
add_filter("woocommerce_before_shop_loop" , "estore_output_subcategories" , 40);
function estore_output_subcategories(){
    $cat_out = woocommerce_output_product_categories([
            "before"=> '<ul class="w3ls_mobiles_grid_right_grid4 products column-3" >',
        'after'=>"<div class='clearfix'></div></ul>",
        "product_id"=> is_product_category() ? get_queried_object_id() : 0
    ]);
    return $cat_out;
}

// remove count mark  subcategory
add_filter("woocommerce_subcategory_count_html" , "__return_empty_string" , 20);


add_filter('product_cat_class' , function($classes){
    $classes[] = "col-md-6 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles";
    return $classes;
});

// up of page -- search count and sort products
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count' , 20);
remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering' , 30);
// wrapper start and first element - count search
	add_action( 'woocommerce_before_shop_loop' , function(){
	    ?>
        <div class="w3ls_mobiles_grid_right_grid2">
        <div class="w3ls_mobiles_grid_right_grid2_left">
        <h3>
            <?php woocommerce_result_count();  ?>
        </h3>
        </div>
<?php
    } , 15 );
	//wrapper close and last element - form sorting product
	add_action( 'woocommerce_before_shop_loop' , function(){
	    ?>
        <div class="w3ls_mobiles_grid_right_grid2_right">
               <?php woocommerce_catalog_ordering();   ?>
        </div>
<div class="clearfix"></div>
        </div>
<?php
    } , 35 );



//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);
//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);
//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);















