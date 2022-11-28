<?php
	$taxonomyName = "product_cat";
	$prod_categories = get_terms($taxonomyName, array(
		'orderby'=> 'name',
		'number' => 10,
		'order' => 'ASC',
		'hide_empty' => 1,
		'offset' => 0,
	));

?>
<section class="woocom-discount-wrapper pt-4rem"> 
	<div class="">
	<div class="woocom-discount-inner swiper swiper-h woocom-discount-swiper swiper-container"> 
		<div class="swiper-wrapper"> 
			<?php
			
			foreach( $prod_categories as $prod_cat ) :
				// if ( $prod_cat->parent != 0 ){
				// 	continue;
				// }
				
				$cat_thumb_id  = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
				$cat_desc      = $prod_cat->description;
			
				$cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id, 'large' );
				$cat_thumb_url = $cat_thumb_url ? $cat_thumb_url : get_template_directory_uri() . '/assets/images/hero-slider/1.webp';
				$term_link     = get_term_link( $prod_cat, 'product_cat' );

				?>
				<a class="swiper-slide" href="<?php echo esc_url($term_link); ?>" target="_blank" rel="nofollow">
					<img src="<?php echo esc_url($cat_thumb_url); ?>" class="" alt="Coupon Image">
					<div class="relative z-10 single_coupon_contents">
						<?php
						printf( '<h2 class="woocom-discount-title"> %s </h2>', $cat_desc );
						printf( '<h3 class="woocom-discount-subtitle"> %s <strong>%s</strong></h3>', __('All', 'woocom'), $prod_cat->name );						
						printf('<span class="show-now-btn"> %s </span>',  __('SHOP NOW', 'woocom') );
						?>
					</div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="swiper-scrollbar"></div>
		</div>
	</div>
	<div class="woocom-swiper-pagination"></div>
</section>