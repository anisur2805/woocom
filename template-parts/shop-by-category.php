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
			<div class="row">
				<?php printf( '<h2 class="wc__shop_by_cat_title">%s</h2>', esc_html( 'Shop By Category', 'woocom' ) );?>
				<div class="wc__shop_by_cat_inner swiper">
					<div class="wc__shop_by_cat_content swiper-wrapper">
						<?php 
						if( is_array($woo_product_cats)):
							foreach ( $woo_product_cats as $cat ):
								if( $cat->category_parent == 0 ):
									$cat_id = $cat->term_id;
									$thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true ); 
									$thumbnail_url = wp_get_attachment_url( $thumbnail_id );
								?>
								<div class="wc__shop_by_cat_item swiper-slide">
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
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section>
