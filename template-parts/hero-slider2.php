<div class="featured_cat_slider">
	<div class="container">
		<div class="row swiper mySwiper">
			<div class="col-md-8 swiper-wrapper">
 
			<?php
			
				$taxonomyName = "product_cat";
				$prod_categories = get_terms($taxonomyName, array(
					'orderby'=> 'name',
					'number' => 2,
					'order' => 'ASC',
					'hide_empty' => 1,
					'offset' => 1,
				));  

				foreach( $prod_categories as $prod_cat ) :
					if ( $prod_cat->parent != 0 ){
						continue;
					}
					
					$cat_thumb_id = get_term_meta( $prod_cat->term_id, 'thumbnail_id', true );
					$cat_desc = get_term_meta( $prod_cat->term_id, 'description', true );
					$cat_thumb_url = wp_get_attachment_image_url( $cat_thumb_id, 'large' );
					$term_link = get_term_link( $prod_cat, 'product_cat' );
					
				?>
					<div class="row align-items-center swiper-slide">
						<div class="col-md-6">
							<div class="featured_cat_slider_content"> 
								<h3 class="featured_cat_slider_title" href="<?php echo esc_url($term_link); ?>"> 
									<?php echo $prod_cat->name; ?> <span>Sale</span>
								</h3> 
								<p class="featured_cat_slider_subtitle"><?php echo $prod_cat->description; ?></p>
								<a class="featured_cat_slider_btn" href="<?php echo esc_url($term_link); ?>">
									<?php _e('Shop Now', 'woocom'); ?>
								</a>
							</div>
						</div>
						<div class="col-md-6">
							<div class="featured_cat_img" style="background-image: url(<?php echo $cat_thumb_url; ?>)">
							</div>
						</div>
					</div> 
					
				<?php endforeach; wp_reset_query(); 
			?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
</div>
