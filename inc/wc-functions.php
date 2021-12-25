<?php
// remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');

remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');
add_action('woocommerce_shop_loop_item_title', 'woocom_shop_product_title');
function woocom_shop_product_title() {
	
	// woocommerce_template_loop_product_link_open();
	woocommerce_template_loop_product_title(); 
	// woocommerce_template_loop_product_link_close();
}

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

add_action('woocommerce_before_shop_loop_item_title', 'woocom_product_rating');
function woocom_product_rating(){
	// woocommerce_template_loop_rating();
	?>
	
	<div class="products-button">
		<a href="<?php echo site_url() ?>/shop/?add-to-cart=<?php echo get_the_ID(); ?>" data-quantity="1" class="overlay_btn button add_to_cart_button ajax_add_to_cart" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow">
			<i class="fa fa-cart-plus"></i> 
		</a>
		<?php echo do_shortcode( '[yith_wcwl_add_to_wishlist]' ); ?>
			<a href="<?php echo site_url(); ?>/?action=yith-woocompare-add-product&id=<?php echo get_the_ID(); ?>" class="compare overlay_btn" data-product_id="<?php echo get_the_ID(); ?>" rel="nofollow">
				<i class="fa fa-plus"></i>
			</a>
	</div>
	
	<?php 
}

// WooCommerce Change Per Row Products 
add_filter('loop_shop_columns', 'woocom_loop_columns', 999);
function woocom_loop_columns( ) {
	return 3;
}