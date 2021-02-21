<?php
/**
 * @hooked estore_footer_get_newsletters 20
 * @hooked estore_footer_get_footer_open 25
 * @hooked estore_footer_get_widgets 30
 * @hooked estore_footer_get_copyright 35
 * @hooked estore_footer_get_footer_close 40
 *
 */
do_action("estore-footer-parts");

wp_footer(); ?>
</body>
</html>
