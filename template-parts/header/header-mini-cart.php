<!--<div class="cart cart box_1 site-header-cart">-->
<div class="cart cart box_1">
	<?php  estore_woocommerce_cart_link();  ?>

	<div class="header-minicart-content header-minicart-content_hidden">
		<?php the_widget("WC_Widget_Cart" , 'title=' , '' );
		?>
	</div>

</div>
