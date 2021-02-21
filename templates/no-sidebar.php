<?php
/**
 * Template name: Full Width
 */

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estore
 */

get_header();
?>
	<div class="mobiles">
		<div class="container">
			<div class="w3ls_mobiles_grids">
				<main id="primary" class="site-main col-md-12 w3ls_mobiles_grid_left">
<!--				<main id="primary" class="site-main col-md-8 w3ls_mobiles_grid_left">-->

					<?php
					while ( have_posts() ) :
						the_post(); ?>

                    <div class="row">
						<?php if( is_wc_endpoint_url("order-received")):
//                        is_order_received_page() // all the same
						?>

                        <div class="col-md-6 col-md-offset-3">
<?php endif;  ?>
                            <?php
                            if(is_wc_endpoint_url("lost-password")) :
                            ?>
                            <div class="col-md-4 col-md-offset-4">
                            <?php  endif; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header" style="text-align: center;">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->

	<?php estore_post_thumbnail(); ?>

    <div class="entry-content">
		<?php
	        the_content();
//		wp_link_pages(
//			array(
//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'estore' ),
//				'after'  => '</div>',
//			)
//		);
		?>
    </div><!-- .entry-content -->

<!--	--><?php //if ( get_edit_post_link() ) : ?>
<!--    <footer class="entry-footer">-->
<!--		--><?php
//		edit_post_link(
//			sprintf(
//				wp_kses(
//				/* translators: %s: Name of current post. Only visible to screen readers */
//					__( 'Edit <span class="screen-reader-text">%s</span>', 'estore' ),
//					array(
//						'span' => array(
//							'class' => array(),
//						),
//					)
//				),
//				wp_kses_post( get_the_title() )
//			),
//			'<span class="edit-link">',
//			'</span>'
//		);
//		?>
<!--    </footer><!-- .entry-footer -->
<!--	--><?php //endif; ?>
    </article><!-- #post-<?php the_ID(); ?> -->
                                <?php if(is_wc_endpoint_url("lost-password")
                                         ||
                                         is_wc_endpoint_url("order-received") ) : ?>
                            </div>
                        <?php endif; ?>


                    </div>

<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
				<?php //  get_sidebar();  ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<?php
get_footer();
