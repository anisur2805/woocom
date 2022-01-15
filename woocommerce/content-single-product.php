<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}

		$vertical_layout = isset( $_GET['single_product_gallery_layout'] ) ? $_GET['single_product_gallery_layout'] : '';
		if( 'vertical' == $vertical_layout ) {
			$vertical_layout = "vertical_product";
		}else {
			$vertical_layout = "";
		}

?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="single_product_wrapper">
		<div class="container">
			<div class="row">
			
				<div class="col-md-6 <?php echo esc_html( $vertical_layout ); ?>">
					<?php
						/**
						* Hook: woocommerce_before_single_product_summary.
						*
						* @hooked woocommerce_show_product_sale_flash - 10
						* @hooked woocommerce_show_product_images - 20
						*/
						//do_action( 'woocommerce_before_single_product_summary' );
					?>
					
					<?php $attachment_ids = $product->get_gallery_image_ids();
						if ( !empty( $attachment_ids ) ) {?>

						<script>
							jQuery(document).ready(function($){
								 $('.product-large-image').slick({
									slidesToShow: 1,
									slidesToScroll: 1,
									arrows: false,
									fade: true,
									asNavFor: '.product-gallery-image'
								});
								$('.product-gallery-image').slick({
									slidesToShow: 3,
									slidesToScroll: 1,
									asNavFor: '.product-large-image',
									dots: false,
									centerMode: true,
									focusOnSelect: true
								});
							});
						</script>

						<div class="product-large-image">
							<?php foreach ( $attachment_ids as $large_img ) { ?>
								<div class="product-large-single-image">
									<img src="<?php echo wp_get_attachment_image_url( $large_img, 'large' ) ?>" />
								</div>
							<?php } ?>
						</div>


						<div class="product-gallery-image">
							<?php foreach ( $attachment_ids as $small_img ) { ?>
								<div class="product-gallery-single-image">
									<img src="<?php echo wp_get_attachment_url( $small_img, 'large' ) ?>" />
								</div>
							<?php } ?>
						</div>
						
						<?php } else { ?>
						
						<div class="product-large-image">
							<div class="product-large-single-image">
									<?php echo woocommerce_get_product_thumbnail( get_the_ID() ); ?>
							</div>
						</div>
					
					<?php } ?>
				</div>
				
				<div class="col-md-6">
					<div class="summary entry-summary">
						<?php
						/**
						* Hook: woocommerce_single_product_summary.
						*
						* @hooked woocommerce_template_single_title - 5
						* @hooked woocommerce_template_single_rating - 10
						* @hooked woocommerce_template_single_price - 10
						* @hooked woocommerce_template_single_excerpt - 20
						* @hooked woocommerce_template_single_add_to_cart - 30
						* @hooked woocommerce_template_single_meta - 40
						* @hooked woocommerce_template_single_sharing - 50
						* @hooked WC_Structured_Data::generate_product_data() - 60
						*/
						do_action( 'woocommerce_single_product_summary' );
						?>
					</div>
				</div>
				
			</div>
		</div>
		
		<div class="container single_product_summery">
			<div class="row">
				<div class="col-md-12">
					<?php
						/**
						* Hook: woocommerce_after_single_product_summary.
						*
						* @hooked woocommerce_output_product_data_tabs - 10
						* @hooked woocommerce_upsell_display - 15
						* @hooked woocommerce_output_related_products - 20
						*/
						do_action( 'woocommerce_after_single_product_summary' );
					?>
				</div>
			</div>
		</div>		
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
