<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <script type="application/x-javascript">
        addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
        </script>

    <!-- web fonts -->
    <link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- //web fonts -->
</head>

<body <?php  body_class(); ?>>
<?php   wp_body_open(); ?>


<?php
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
do_action("estore-header-parts");   ?>
