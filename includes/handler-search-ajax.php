<?php
if(!defined("ABSPATH")) exit;

if( wp_doing_ajax() ){
	add_action('wp_ajax_search-ajax', 'estore_handler_search_ajax');
	add_action('wp_ajax_nopriv_search-ajax', 'estore_handler_search_ajax');
}

function estore_handler_search_ajax (){

	check_ajax_referer( 'ajax-search', 'nonce' , true );
$str = trim($_POST['s']);
if(empty($str))  die;

	$search_wp_query = [
'post_type' => ["post" , "page" , "product"],
	"post_status"=> "publish",
	"s"=> $str,
];
$query = new WP_Query( $search_wp_query );


//	$search_result = [];
//	while ( $query->have_posts() ) {
//		$query->the_post();
//		$item["permalink"] = get_permalink();
//		$item["title"] = get_the_title();
//		$item["id"] = get_the_ID();
//		$search_result[] = $item;
//	}

$json_data = "";
ob_start();
?>
<div class="search-list">
	<?php
    if($query->have_posts()) :
	while($query->have_posts()) :  $query->the_post();
	?>
		<a href="<?php  echo get_the_permalink() ?>" class="search-list__item">
			<?php echo get_the_title();  ?>
		</a>
	<?php
	endwhile;
	else:
	?>
		<span  class="list-group-item list-group-item-action">
			not found
		</span>
	<?php endif; ?>
</div>
<?php
$json_data = ob_get_contents();
ob_end_clean();


wp_send_json($json_data);

	wp_die();

}