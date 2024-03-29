<?php
$taxonomy = 'product_cat';
$orderby  = 'name';
$title    = '';

$woocom_products_cats_args = array(
	'taxonomy' => $taxonomy,
	'orderby'  => $orderby,
	'title_li' => $title,
);

$woo_product_cats = get_categories( $woocom_products_cats_args );
?>
	<section class="wc__shop_by_cat_wrapper">
		<div class="container-fluid">
			<div class="row align-items-center">
				<h2 class="wc__shop_by_cat_title wc__shop_by_cat_title_2" data-aos="fade-right" data-aos-duration="1000"><?php esc_attr_e('Shop By Category', 'woocom'); ?></h2>
				<?php // printf( '<h2 class="wc__shop_by_cat_title ez-animate" data-animation="fadeInUp" data-animation-delay="0.5s" data-animation-offset="60%">%s</h2>', esc_html( 'Shop By Category', 'woocom' ) );?>
				<!-- <h2 class="wc__shop_by_cat_title ez-animate" data-animation="fadeInUp" data-animation-delay="0.5s" data-animation-offset="60%"><?php esc_html( 'Shop By Category', 'woocom' ); ?></h2> -->
				<div class="wc__shop_by_cat_inner swiper">
					<div class="wc__shop_by_cat_content swiper-wrapper">
						<?php 
						$aos_duration = 0;
						if( is_array($woo_product_cats)):
							foreach ( $woo_product_cats as $cat ):
								$aos_duration += '100';
								if( $cat->category_parent == 0 ):
									$cat_id = $cat->term_id;
									$thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true ); 
									$thumbnail_url = wp_get_attachment_url( $thumbnail_id );
								?>
								<div class="wc__shop_by_cat_item swiper-slide" data-aos="fade-right" data-aos-duration="<?php echo '100' + $aos_duration; ?>">
									<a href="<?php echo esc_url( get_term_link($cat->slug, 'product_cat')); ?>">
										<img class="wc__shop_by_cat_image" src="<?php echo esc_url( $thumbnail_url ); ?>" />
										<img src="<?php echo get_template_directory_uri() . '/assets/images/link.png'; ?>" />
										<h4><?php echo esc_html($cat->name); ?></h4>	
									</a>
								</div>
								<?php 
								endif; 
							endforeach; 
						endif; ?>
					</div>
					</a>
				</div>
				<div class="swiper-button-next"></div>
      			<div class="swiper-button-prev"></div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
