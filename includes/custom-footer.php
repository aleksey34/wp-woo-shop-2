<?php
if(!defined("ABSPATH")) exit;

/**
 * @hooked estore_footer_get_newsletters 20
 * @hooked estore_footer_get_footer_open 25
 * @hooked estore_footer_get_widgets 30
 * @hooked estore_footer_get_copyright 35
 * @hooked estore_footer_get_footer_close 40
 *
 */

add_action("estore-footer-parts" , "estore_footer_get_newsletters", 20);
function estore_footer_get_newsletters(){
	get_template_part("template-parts/footer/footer-newsletters" );
}

add_action("estore-footer-parts" , "estore_footer_get_footer_open", 25);
function estore_footer_get_footer_open(){
?>
	<!-- footer -->
	<footer class="footer">
<?php
}

add_action("estore-footer-parts" , "estore_footer_get_widgets", 30);
function estore_footer_get_widgets(){
	get_template_part("template-parts/footer/footer-widgets" );
}


add_action("estore-footer-parts" , "estore_footer_get_copyright", 35);
function estore_footer_get_copyright(){
	get_template_part("template-parts/footer/footer-copy" );
}


add_action("estore-footer-parts" , "estore_footer_get_footer_close", 40);
function estore_footer_get_footer_close(){
	?>
	</footer>
	<!-- //footer -->
	<?php
}

