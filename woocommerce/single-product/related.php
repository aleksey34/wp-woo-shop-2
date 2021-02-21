<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

	<section class="related products w3l_related_products">
      <div class="container">
		<?php
		$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

		if ( $heading ) :
			?>
			<h3><?php echo esc_html( $heading ); ?></h3>
		<?php endif; ?>
		
		<?php // woocommerce_product_loop_start(); ?>
          <ul id="flexiselDemo7" class="related-list product columns-<?php   echo esc_attr(wc_get_loop_prop("columns"))  ?>">

			<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

			<?php endforeach; ?>
          </ul>
		<?php // woocommerce_product_loop_end(); ?>
          <script type="text/javascript">
              jQuery(window).load(function() {
                  jQuery("section.related  ul.product.related-list").flexisel({
                      visibleItems:4,
                      animationSpeed: 1000,
                      autoPlay: true,
                      autoPlaySpeed: 3000,
                      pauseOnHover: true,
                      enableResponsiveBreakpoints: true,
                      responsiveBreakpoints: {
                          portrait: {
                              changePoint:480,
                              visibleItems: 1
                          },
                          landscape: {
                              changePoint:640,
                              visibleItems:2
                          },
                          tablet: {
                              changePoint:768,
                              visibleItems: 3
                          }
                      }
                  });

              });
          </script>
      </div>
	</section>
	<?php
endif;

wp_reset_postdata();
