<?php
if(!defined("ABSPATH")) exit;


// single product
add_action("woocommerce_before_single_product" , "estore_wrapper_product_start" , 5);
function estore_wrapper_product_start(){
?>
	<div class="single">
		<div class="container">
<?php
}
add_action("woocommerce_after_single_product" , "estore_wrapper_product_close" , 5);
function estore_wrapper_product_close(){
?>
</div>
	</div>
<?php
}

// column  gallery and content
	add_action("woocommerce_before_single_product_summary" , "estore_single_product_imgs_column_open", 5);
function estore_single_product_imgs_column_open(){
	?>
	<div class="col-md-4 single-left">
<?php
}
	add_action("woocommerce_before_single_product_summary" , "estore_single_product_imgs_column_close", 30);
function estore_single_product_imgs_column_close(){
	?>
	</div>
<?php
}

add_action("woocommerce_before_single_product_summary" , "estore_single_product_content_column_open", 40);
function estore_single_product_content_column_open(){
	?>
	<div class="col-md-8 single-right">
	<?php
}

add_action("woocommerce_after_single_product_summary" , "estore_imgs_content_columns_close" , 5);
function estore_imgs_content_columns_close(){
	?>
	</div>
	<div class="clearfix"> </div>
	<?php
}



add_filter("woocommerce_short_description" , "estore_short_description" , 10);
function estore_short_description($content){
    ?>
    <div class="description">
<!--        <h5>Description</h5>-->
        <?php echo  $content ;  ?>
    </div>
    <?php
}

// tabs
remove_filter("woocommerce_after_single_product_summary" , "woocommerce_output_product_data_tabs" , 10);
    add_filter("woocommerce_after_single_product_summary" , "estore_single_product_tabs", 10);
function estore_single_product_tabs($tabs){

	$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

	if ( ! empty( $product_tabs ) ) : ?>


<!--        <div class="additional_info">-->
<!--        <div class="container">-->
<!--        <div class="sap_tabs">-->

<!------------------------------------------------------------>
<!--            class="resp-tab-item" aria-controls="tab_item-0" role="tab"-->

    <div class="woocommerce-tabs wc-tabs-wrapper additional_info ">
        <div class="container">
            <div class="sap_tabs">
                <div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
                    <ul class="tabs wc-tabs" role="tablist">
                        <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                            <li class="<?php echo esc_attr( $key ); ?>_tab  resp-tab-item" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
<!--                                <span>-->
<!--                                    --><?php //echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
<!--                                </span>-->

                                <a href="#tab-<?php echo esc_attr( $key ); ?>">
		                            <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
            <div class="resp-tab-content additional_info_grid  woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
            </div>
		<?php endforeach; ?>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
    </div>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    jQuery('#horizontalTab1').easyResponsiveTabs({
                        type: 'default', //Types: default, vertical, accordion
                        width: 'auto', //auto or any width like 600px
                        fit: true   // 100% fit in a container
                    });
                });
            </script>
        </div>
        </div>
	<?php  endif;
}

add_filter("woocommerce_product_description_heading" , "__return_false" );
add_filter("woocommerce_product_additional_information_heading" , "__return_false" );
//add_filter("woocommerce_reviews_title" , "__return_false" );

add_filter("woocommerce_review_gravatar_size" , "estore_review_gravatar_size");
function estore_review_gravatar_size($size){
    return "80";
}


// upsells crossels  -- slider  --down for single page

/**
 * Hook: woocommerce_after_single_product_summary.
 * @hooked estore_imgs_content_columns_close 5
 *
 * @hooked woocommerce_output_product_data_tabs - 10
 * remove --temp!! ???
 *
 * @hooked woocommerce_upsell_display - 15
 * @hooked woocommerce_output_related_products - 20
 */
