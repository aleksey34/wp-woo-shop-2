<?php
if(!defined("ABSPATH")) exit;

if( wp_doing_ajax() ){
    add_action('wp_ajax_ajax-quick-view', 'estore_handler_quick_view_ajax');
	add_action('wp_ajax_nopriv_ajax-quick-view', 'estore_handler_quick_view_ajax');
}

function estore_handler_quick_view_ajax (){

	check_ajax_referer( 'ajax-quick-view', 'nonce' , true );

	$id = trim($_POST['productId']);
if(empty($id))  die;


$product = wc_get_product(esc_attr($id));

//get_pr($product , true);



	$json_data = [];
	ob_start();
?>
    <div class="col-md-5 modal_body_left">
        <img src="<?php
        $attachment_id = get_post_thumbnail_id($product->get_id());
        echo wp_get_attachment_image_url($attachment_id, "shop_single");
       // echo get_the_post_thumbnail_url($product->get_id()) ;
        ?>" alt="thumbnail" class="img-responsive" />
    </div>
    <div class="col-md-7 modal_body_right">
        <h4><?php echo $product->get_title(); ?></h4>
        <p>
			<?php  echo $product->get_short_description();  ?>
        </p>
        <div class="modal_body_right_cart simpleCart_shelfItem">
            <p>
                <?php $regular_price = $product->get_regular_price() ; ?>
                <?php if(!empty($regular_price) && $regular_price > $product->get_price() ): ?>
                <span><?php  echo $regular_price; ?>руб.</span>
                <?php  endif;  ?>
                <i class="item_price"><?php  echo $product->get_price();  ?>руб.</i>
            </p>
            <a href="<?php echo $product->add_to_cart_url()  ?>" data-quantity="1"
               class="button product_type_simple add_to_cart_button ajax_add_to_cart"
               data-product_id="<?php echo $product->get_id();  ?>"
               data-product_sku="<?php echo $product->get_sku();  ?>"
               aria-label="Добавить &quot;<?php echo $product->get_title();  ?>&quot; в корзину"
               rel="nofollow">В корзину</a>
        </div>
		<?php ?>
    </div>
    <div class="clearfix"> </div>
<?php

	$json_data['product'] = ob_get_contents();

	ob_end_clean();

wp_send_json($json_data);

	wp_die();
}