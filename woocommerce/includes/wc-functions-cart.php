<?php
/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
<?php
if ( function_exists( 'estore_woocommerce_header_cart' ) ) {
estore_woocommerce_header_cart();
}
?>
 */

if ( ! function_exists( 'estore_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function estore_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		estore_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'estore_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'estore_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function estore_woocommerce_cart_link() {
		?>

			<a class="cart-contents w3view-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'estore' ); ?>">
				<i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
				<?php
				$item_count_text = WC()->cart->get_cart_contents_count();
				?>
				<span class="count">
				<?php // echo WC()->cart->get_cart_contents_count(); ?>
				<?php echo esc_html( $item_count_text ); ?>
				</span>
			</a>

		<?php
	}
}

if ( ! function_exists( 'estore_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function estore_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php estore_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

// cart page crossel classes   ??  ????
add_filter("post_class" , "estore_cart_page_cross_sell_classes");
function estore_cart_page_cross_sell_classes($classes){
    if(is_cart()){
        if(in_array("product" , $classes)){
$classes[] = "col-md-4";
        }
    }
    return $classes;
}