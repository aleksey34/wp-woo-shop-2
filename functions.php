<?php
/**
 * estore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package estore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * helpers functions
 */
require_once  get_template_directory()."/includes/estore-helpers.php";


/**
 * handler search ajax
 */
require_once  get_template_directory()."/includes/handler-search-ajax.php";

/**
 * handler quick view  ajax
 */
require_once  get_template_directory()."/includes/estore-handler-quick-view-modal-window-ajax.php";


/**
 * carbon fields setting
 */
require_once  get_template_directory()."/includes/carbon-fields/carbon-fields-init.php";
require_once  get_template_directory()."/includes/carbon-fields/carbon-fields-options.php";
require_once  get_template_directory()."/includes/carbon-fields/carbon-fields-metaboxes.php";



/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
require_once  get_template_directory()."/includes/theme-settings.php";


/**
 * register nav menus
 */
require_once  get_template_directory()."/includes/menu-init.php";

/**
 *  header nav menu walker
 */
require_once  get_template_directory() . "/includes/estore_header_nav_menu_walker.php";

/**
 * Enqueue scripts and styles.
 */
require_once  get_template_directory()."/includes/scripts-styles-init.php";



/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
require_once  get_template_directory()."/includes/widgets-init.php";



/**
 * Implement the Custom Header feature.
 *
 *@hooked estore_get_header_modal 10
 *@hooked  start container 15
 *@hooked estore_get_header_login_register_btn 18
 *@hooked  estore_get_header_logo  21
 *@hooked estore_get_header_search  23
 * @hooked estore_get_header_minicart 25
 *@hooked close container 28
 *@hooked estore_get_header_nav   30
 */
 require get_template_directory() . '/includes/custom-header.php';


/**
 * @hooked estore_footer_get_newsletters 20
 * @hooked estore_footer_get_footer_open 25
 * @hooked estore_footer_get_widgets 30
 * @hooked estore_footer_get_copyright 35
 * @hooked estore_footer_get_footer_close 40
 *
 */
 require_once get_template_directory()."/includes/custom-footer.php";

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/includes/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/includes/jetpack.php';
}


/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once get_template_directory() . '/includes/woocommerce.php';
	require_once get_template_directory() . '/woocommerce/includes/wc-functions.php';
	require_once get_template_directory() . '/woocommerce/includes/wc-functions-single.php';
	require_once get_template_directory() . '/woocommerce/includes/wc-functions-archive.php';
	require_once get_template_directory() . '/woocommerce/includes/wc-functions-product-card.php';
	require_once get_template_directory() . '/woocommerce/includes/wc-functions-remove.php';
	require_once get_template_directory() . "/woocommerce/includes/wc-functions-cart.php";
	require_once get_template_directory() . "/woocommerce/includes/wc-functions-checkout.php";
	require_once get_template_directory() . "/woocommerce/includes/wc-functions-my-account.php";
}
