<?php   if(!defined("ABSPATH")) exit;

$isShowWidgets = carbon_get_theme_option("estore_footer_is_show_widgets");

 if("on" === $isShowWidgets) :
	 if(is_active_sidebar("footer_widgets")) :
     ?>
	<div class="container">
		<div class="w3_footer_grids">
            <?php dynamic_sidebar("footer_widgets"); ?>
			<div class="clearfix"> </div>
		</div>
	</div>
<?php endif; endif;    ?>
