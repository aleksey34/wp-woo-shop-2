<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package estore
 */

get_header();
?>
<div class="mobiles">
    <div class="container">
        <div class="w3ls_mobiles_grids">
            <main id="primary" class="site-main  col-md-8 w3ls_mobiles_grid_left">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'estore' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'estore' ) . '</span> <span class="nav-title">%title</span>',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	        </main><!-- #main -->
            <?php get_sidebar(); ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php get_footer();