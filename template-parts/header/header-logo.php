<div class="w3l_logo">
	<h1>
		<?php $logo_id = carbon_get_theme_option("estore_header_logo") ;
		$logo = $logo_id ? wp_get_attachment_image_src($logo_id , 'full') : "";

		$is_select_logo = carbon_get_theme_option("estore_header_logic");

		$site_name =
			carbon_get_theme_option("estore_header_sitename") ?
				carbon_get_theme_option("estore_header_sitename") :
				get_bloginfo("name") ;
		$site_description =
			carbon_get_theme_option("estore_header_description") ?
				"<span>".carbon_get_theme_option("estore_header_description")."</span>" :
				'<span>'.get_bloginfo("description").'</span>';

		?>

		<?php   if( is_front_page()  ||  is_home() ) :   ?>
			<a>
				<?php

				if(!empty($logo) && "yes" ===  $is_select_logo   ) :  ?>
					<img src="<?php echo $logo[0];  ?>" width="45" height="45" alt="logo">
				<?php  else : ?>

					<?php echo $site_name ; ?>
					<?php echo $site_description ;?>

				<?php endif;  ?>
			</a>
		<?php  else : ?>

		<a href="<?php echo  esc_url(home_url("/") )  ; ?>">

			<?php  if(!empty($logo) && "yes" === $is_select_logo  ) :  ?>
				<img src="<?php echo $logo[0];  ?>" width="45" height="45" alt="logo"></a>
			<?php  else : ?>

				<?php echo $site_name ; ?>
				<?php echo $site_description ;?>

			<?php  endif;  ?>
			</a>
		<?php   endif;  ?>
	</h1>
</div>