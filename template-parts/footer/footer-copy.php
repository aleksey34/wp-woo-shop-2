<?php if(!defined("ABSPATH")) exit;
$copyright = carbon_get_theme_option("estore_footer_copy");
?>
<div class="footer-copy">
	<div class="footer-copy1">
		<div class="footer-copy-pos">
			<a href="#home1" class="scroll"><img src="<?php echo get_template_directory_uri()  ?>/assets/images/arrow.png" alt="top" class="img-responsive" /></a>
		</div>
	</div>
	<?php if(!empty($copyright)): ?>
		<div class="container">
			<?php  echo htmlspecialchars_decode($copyright);   ?>
		</div>
	<?php endif;  ?>
</div>
