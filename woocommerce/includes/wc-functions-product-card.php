<?php
if(!defined("ABSPATH")) exit;

// card of product
//w3ls_mobiles_grid_right_grid1
add_filter("post_class" , function($classes){
    if(is_shop() || is_product_taxonomy()){
	    $classes[] = 'col-md-4 agileinfo_new_products_grid agileinfo_new_products_grid_mobiles' ;
    }

	return $classes;
});

// add layout  for card


// remove link  to product and add it  remove title and add it
remove_action("woocommerce_before_shop_loop_item" , "woocommerce_template_loop_product_link_open" , 10);
remove_action("woocommerce_after_shop_loop_item" , "woocommerce_template_loop_product_link_close"  , 5);

remove_action("woocommerce_shop_loop_item_title" , "woocommerce_template_loop_product_title"  , 10);

// wrap title with link

// link  title wrap
add_action( 'woocommerce_shop_loop_item_title' , function () {
	?>
    <h5>
		<?php
	//	woocommerce_template_loop_product_link_open();
        ?>
        <a href="<?php echo get_the_permalink();   ?>"><?php the_title();  ?></a>
		<?php
	//	woocommerce_template_loop_product_link_close();
		?>
    </h5>
	<?php

}, 10);




// open wrapper tag
add_action("woocommerce_before_shop_loop_item" , function(){
    ?>
    <div class="agile_ecommerce_tab_left mobiles_grid">
<?php
} , 5);





// close wrapper tag
    add_action("woocommerce_after_shop_loop_item" , function(){
        ?>
        </div>
        <?php
    } , 20);




// replace flash! out of img wrapper
remove_action("woocommerce_before_shop_loop_item_title" , 'woocommerce_show_product_loop_sale_flash' , 10);
add_action( "woocommerce_before_shop_loop_item_title",  "woocommerce_show_product_loop_sale_flash" , 5);

  //   wrapper thumbnails open
add_action("woocommerce_before_shop_loop_item_title" , function (){
    ?>
    <div class="hs-wrapper hs-wrapper2 mobiles_grid" style="background: url(<?php  echo get_the_post_thumbnail_url(get_the_ID())   ?>) center center / cover no-repeat;">
<?php
}, 10);


// quick gallery in card - remove single thumb add images of gallery
remove_action("woocommerce_before_shop_loop_item_title" , "woocommerce_template_loop_product_thumbnail" , 10);
add_action("woocommerce_before_shop_loop_item_title" , "estore_add_gallery_to_product_card" , 12);
function estore_add_gallery_to_product_card(){
	// get_pr( get_post_gallery_images(get_the_ID()) , false);

	global $product;
	$attachment_ids = $product->get_gallery_attachment_ids();

	echo woocommerce_get_product_thumbnail();

	foreach( $attachment_ids as $attachment_id ) {
		echo wp_get_attachment_image( $attachment_id, 'shop_catalog' ,'',["class"=>"img-responsive","alt"=>"img"]);
	}

}



     //wrapper thumbnails close
add_action("woocommerce_before_shop_loop_item_title" , function (){
?>
	<div class="w3_hs_bottom w3_hs_bottom_sub1">
        <ul>
            <li>
                <a href="#" class="modal-product-link" data-toggle="modal" data-product_id="<?php  the_ID();  ?>" data-target="#modal_product"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
            </li>
        </ul>
   </div>
    </div>
<?php
}, 30);


// remove  btn add to cart
remove_action("woocommerce_after_shop_loop_item" , "woocommerce_template_loop_add_to_cart" , 10);

// wrap price and btn tag open
add_action("woocommerce_after_shop_loop_item_title" , function(){
 ?>
    <div class="simpleCart_shelfItem">
<?php
} , 7);
//add btn to cart
add_action("woocommerce_after_shop_loop_item_title" , "woocommerce_template_loop_add_to_cart" , 20);
// wrap price and btn tag close
add_action("woocommerce_after_shop_loop_item_title" , function(){
  ?>
    </div>
        <?php
} , 30);


// modal window
add_action("wp_footer" ,  'estore4_modal_window_quick_view', 100);
function estore4_modal_window_quick_view(){
    ?>
    <div class="modal video-modal fade" id="modal_product" tabindex="-1" role="dialog" aria-labelledby="modal_product">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <section>
                    <div class="modal-body">

                    </div>
                </section>
            </div>
        </div>
    </div>

	<?php
}






/**
 * Hook: woocommerce_single_product_summary.
 *
 * @hooked woocommerce_template_single_title - 5
 * @hooked woocommerce_template_single_rating - 10
 * @hooked woocommerce_template_single_price - 10
 * @hooked woocommerce_template_single_excerpt - 20
 * @hooked woocommerce_template_single_add_to_cart - 30
 * @hooked woocommerce_template_single_meta - 40
 * @hooked woocommerce_template_single_sharing - 50
 * @hooked WC_Structured_Data::generate_product_data() - 60
 */


//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);
//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);
//add_action("woocommerce_before_main_content" , "estore_wrapper_product_start" , 5);















