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

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30); 
add_filter('woocommerce_single_product_summary', 'woocom_single_product_summery');
function woocom_single_product_summery(){
	echo "<div class='woocom_add_to_cart_wrapper'>";
	woocommerce_template_single_add_to_cart();
	echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	echo "</div>";
}

// add_filter('yith_wcwl_add_to_wishlist_params', 'woocom_yith_wcwl_add_to_wishlist_params');
function woocom_yith_wcwl_add_to_wishlist_params( $text ) {
	$text = '';
	return $text;
}


add_action('woocommerce_before_single_product', 'woocom_woocommerce_before_single_product');
function woocom_woocommerce_before_single_product() { 
	if( is_singular() ) {
	echo '<header class="woocommerce-products-header">';
		if ( apply_filters( 'woocommerce_show_page_title', true ) ): ?>
			<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title();?></h1>
		<?php endif;
			echo woocommerce_breadcrumb(); 
	echo '</div>';
	}
}

add_action( 'wp_enqueue_scripts', 'woocom_woo_enqueue_scripts' );
function woocom_woo_enqueue_scripts() {
	wp_enqueue_style( 'slick-style', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css' );
	wp_enqueue_script( 'slick-script', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js' );
}

add_action('woocommerce_before_cart', 'woocom_woocommerce_before_cart');
function woocom_woocommerce_before_cart() {
	echo '<div class="container"><div class="row">';
}

add_action('woocommerce_after_cart', 'woocom_woocommerce_after_cart');
function woocom_woocommerce_after_cart() {
	echo '</div></div>';
}

// Clear Cart 
// add_action( 'woocommerce_cart_coupon', 'custom_woocommerce_empty_cart_button' );
// function custom_woocommerce_empty_cart_button() {
// 	echo '<a href="' . esc_url( add_query_arg( 'empty_cart', 'yes' ) ) . '" class="button" title="' . esc_attr( 'Empty Cart', 'woocommerce' ) . '">' . esc_html( 'Empty Cart', 'woocommerce' ) . '</a>';
// }

add_action( 'wp_loaded', 'custom_woocommerce_empty_cart_action', 18);
function custom_woocommerce_empty_cart_action() {
	if ( isset( $_GET['empty_cart'] ) && 'yes' === esc_html( $_GET['empty_cart'] ) ) {
		WC()->cart->empty_cart();

		$referer  = wp_get_referer() ? esc_url( remove_query_arg( 'empty_cart' ) ) : wc_get_cart_url();
		wp_safe_redirect( $referer );
	}
}


/**
 * @snippet       Add Content to Empty Cart Page - WooCommerce
 * @how-to        Get CustomizeWoo.com FREE 
 * @compatible    WooCommerce 4.5 
 */
   
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message' );
add_action( 'woocommerce_cart_is_empty', 'woocom_add_content_empty_cart' );
  
function woocom_add_content_empty_cart() {
   ?>
	<div class="container">
		<div class="row">		
			<div class="item-empty-area text-center">
				<div class="item-empty-area__icon mb-30">
					<i class="bi-basket"></i>
				</div>
				<div class="item-empty-area__text">
					<h3><?php _e('No items found in cart', 'woocom'); ?></h3>
					<a href="<?php echo esc_url('/shop') ?>">Shop Now</a>
				</div>
			</div> 
		</div>
	</div>
   
   <?php 
}