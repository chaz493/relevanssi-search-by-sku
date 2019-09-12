/*Relevanssi Search by SKU*/
add_filter('relevanssi_content_to_index', 'rlv_index_variation_skus', 10, 2);
function rlv_index_variation_skus($content, $post) {
	if ($post->post_type == "product") {
		$args = array('post_parent' => $post->ID, 'post_type' => 'product_variation', 'posts_per_page' => -1);
		$variations = get_posts($args);
		if (!empty($variations)) {
			foreach ($variations as $variation) {
				$sku = get_post_meta($variation->ID, '_sku', true);
				$content .= " $sku";
			}
		}
	}
 
	return $content;
}
