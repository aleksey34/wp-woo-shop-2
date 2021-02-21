<?php
if(!defined("ABSPATH")) exit;


add_filter("woocommerce_form_field_args" ,"estore_chechout_custom_checkout_fields_args" );

function estore_chechout_custom_checkout_fields_args($args){
	$args["input_class"][] = "form-control mb-20";

	//get_pr($args , false);
    return $args;
}

add_filter("woocommerce_default_address_fields" , "estore_woocommerce_custom_checkout_row_fields");
//
function estore_woocommerce_custom_checkout_row_fields($fields){
	$fields["address_2"]["label"] = "Квартира, дом...";

//	$fields["address_1"]["class"][] = "form-row-first";
//	$fields["address_2"]["class"][] = "form-row-last";
//	$fields["city"]["class"][] = "col-sm-4 row";
//	$fields["state"]["class"][] = "col-sm-4 row";
//	$fields["postcode"]["class"][] = "col-sm-4 row";
	return $fields;
}

add_filter("woocommerce_billing_fields" , "estore_woocommerce_custom_checkout_billing_fields" , 10 , 2);
function estore_woocommerce_custom_checkout_billing_fields($billing_fields , $country){

	//get_pr($billing_fields , false);

	$billing_fields["billing_address_1"]["class"][] = "form-row-first";
	$billing_fields["billing_address_2"]["class"][] = "form-row-last";
	//$billing_fields["billing_address_2"]["label"] = "Квартира, дом...";
	$billing_fields["billing_city"]["class"][] = "col-sm-4 row";
	$billing_fields["billing_state"]["class"][] = "col-sm-4 row";
	$billing_fields["billing_postcode"]["class"][] = "col-sm-4 row";
	$billing_fields["billing_phone"]["class"][] = "form-row-first";
	$billing_fields["billing_email"]["class"][] = "form-row-last";
	$billing_fields["billing_country"]["class"][] = "mb-20";

	return $billing_fields;
}

// checkout form  setting layout
add_action("woocommerce_before_checkout_form" , "estore_form_checkout_start" );
function estore_form_checkout_start(){
?>
<div class="row">
<?php
}
add_action("woocommerce_after_checkout_form" , "estore_form_checkout_end" );
function estore_form_checkout_end(){
	?>
	</div>
	<?php
}



add_action("woocommerce_checkout_before_customer_details" , "estore_form_checkout_details_start" );
function estore_form_checkout_details_start(){
	?>
	<div class="col-md-8">
	<?php
}
add_action("woocommerce_checkout_after_customer_details" , "estore_form_checkout_details_end" );
function estore_form_checkout_details_end(){
	?>
	</div>
	<?php
}


add_action("woocommerce_checkout_before_order_review_heading" , "estore_form_checkout_order_review_start" );
function estore_form_checkout_order_review_start(){
	?>
	<div class="col-md-4">
	<?php
}
add_action("woocommerce_checkout_after_order_review" , "estore_form_checkout_order_review_end" );
function estore_form_checkout_order_review_end(){
	?>
	</div>
	<?php
}


