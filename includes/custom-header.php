<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package estore
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses estore_header_style()
 */
function estore_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'estore_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'estore_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'estore_custom_header_setup' );

if ( ! function_exists( 'estore_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see estore_custom_header_setup().
	 */
	function estore_header_style() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		 */
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
				}
			<?php
			// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;



add_action("estore-header-parts" , "estore_get_header_modal", 10);

function estore_get_header_modal(){
	get_template_part("template-parts/header/header-modal");
}

// open container
add_action("estore-header-parts" , function(){
?>
    <!-- header -->
    <div class="header" id="home1">
        <div class="container">
<?php
} , 15);



add_action("estore-header-parts" , "estore_get_header_login_register_btn", 18);
function estore_get_header_login_register_btn(){
    if(!is_user_logged_in()){
	    get_template_part("template-parts/header/header-login-register-btn");
    }else{
        return false;
    }
}


add_action("estore-header-parts" , "estore_get_header_logo", 21);
function estore_get_header_logo(){
	get_template_part("template-parts/header/header-logo");
}


add_action("estore-header-parts" , "estore_get_header_search", 23);
function estore_get_header_search(){
	get_template_part("template-parts/header/header-search");
}


add_action("estore-header-parts" , "estore_get_header_minicart", 25);
function estore_get_header_minicart(){
	get_template_part("template-parts/header/header-mini-cart");
}


// close container
add_action("estore-header-parts" , function(){
?>
    </div>
    </div>
    <!-- //header -->
    <?php
} , 28);



add_action("estore-header-parts" , "estore_get_header_nav", 30);

function estore_get_header_nav(){
	get_template_part("template-parts/header/header-nav");
}
