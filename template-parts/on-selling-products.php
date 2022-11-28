<?php
    $query = new WP_Query( array(
        'posts_per_page'      => 10,
        'post_type'           => 'product',
        'post_status'         => 'publish',
        'ignore_sticky_posts' => 1,
        'meta_key'            => 'total_sales',
        'orderby'             => 'meta_value_num',
        'order'               => 'DESC',
    ) );
?>

	<section class="on-selling-products-wrapper">
		<div class="container-fluid">
			<div class="row align-items-center">
				<h3 class="wc__shop_by_cat_title wc__shop_by_cat_title_2" data-aos="fade-right" data-aos-duration="1000"><?php esc_attr_e( 'On Selling Products', 'woocom' );?></h3>

    			<div class="woocommerce on-selling-products">
					<ul class="products">
						<?php
						if ( $query->have_posts() ):
						while ( $query->have_posts() ): $query->the_post(); 

							$product    = wc_get_product( $query->post->ID );
							$short_desc = $product->get_short_description();
							$price      = $product->get_price_html();

							if( $query->current_post === 0 ): ?>

							<li <?php post_class("first-product"); ?>>
								<a href="<?php echo esc_url(get_the_permalink()); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
									<img width="150" height="150" src="<?php echo get_the_post_thumbnail_url(); ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy" />
									<div class="on-selling-contents">
										<h2 class="woocommerce-loop-product__title"><?php echo __('SALE OFFER!', 'woocom') ?></h2>
										<a href="#" class="on-selling-discount">50%</a>
										<br/>
										<p><?php echo __('LIMITED TIME VALID', 'woocom'); ?></p>
									</div>
								</a>  

							</li>
						<?php
							else: 
							 ?>

							<li <?php post_class("not-first-product"); ?>>
								<a href="<?php echo esc_url(get_the_permalink()); ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
									<img width="150" height="150" src="<?php echo get_the_post_thumbnail_url(); ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" decoding="async" loading="lazy" />
								</a>  

								<div class="on-selling-contents">
									<h2 class="woocommerce-loop-product__title"><?php echo esc_attr( get_the_title() ); ?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<?php echo $price; ?>
								</div>


							</li>
							<?php 
							endif; 
						endwhile;
						wp_reset_postdata();
						endif; 
						?>
					</ul>
				</div>
			</div>
		</div>
	</section>