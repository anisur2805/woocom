	<?php if( get_theme_mod('woocom_display_hero_slider', 1) ): ?>
	<div class="slider-area swiper">
		<div class="swiper-wrapper">
			<?php

				for ( $i = 1; $i < 4; ++$i ):
					$woocom_hero_logo[$i]          = get_theme_mod( 'woocom_hero_logo' . $i );
					$woocom_hero_feature_img[$i]   = get_theme_mod( 'woocom_hero_feature_img' . $i );
					$woocom_hero_title[$i]         = get_theme_mod( 'woocom_hero_title' . $i );
					$woocom_slider_button_text[$i] = get_theme_mod( 'woocom_hero_slider_button_text' . $i );
					$woocom_slider_button_url[$i]  = get_theme_mod( 'woocom_hero_slider_button_url' . $i );

				endfor;

				$args = array(
					'post_type'      => 'page',
					'posts_per_page' => 3,
					//'post__in'       => $woocom_slider_page,
					'orderby'        => 'post__in',
				);

				$slider_loop = new WP_Query( $args );

				$j = 1;
				if ( $slider_loop->have_posts() ):
					while ( $slider_loop->have_posts() ):
						$slider_loop->the_post();
					?>
					<div class="swiper-slide slider-height-1">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
									<div class="slider-content slider-animated-1">

										<!-- <p><?php the_title();?></p> -->
										<!-- <h3 class="animated">Wonders Tech SmartShop</h3> -->

										<?php if ( !empty( $woocom_hero_logo[$j] ) ): ?>
											<img data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-delay="300" class="woocom_hero_logo" src="<?php echo wp_get_attachment_image_url( $woocom_hero_logo[$j] ); ?>" />
										<?php endif;?>

									<?php if ( !empty( $woocom_hero_title[$j] ) ): ?>
										<h1 data-aos="fade-up" data-aos-delay="300"><?php echo $woocom_hero_title[$j]; ?></h1>
									<?php endif;?>

								<?php if ( !empty( $woocom_slider_button_text[$j] ) ): ?>
									<div class="slider-btn btn-hover">
										<a data-aos="fade-up" data-aos-delay="450" href="<?php echo esc_url( $woocom_slider_button_url[$j] ); ?>">
											<?php echo $woocom_slider_button_text[$j]; ?>
										</a>
									</div>
								<?php endif;?>

							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
							<div class="slider-single-img slider-animated-1">
								<img  data-aos="fade-down" data-aos-easing="linear" data-aos-duration="500" src="<?php echo wp_get_attachment_image_url( $woocom_hero_feature_img[$j], 'full' ); ?>" />
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
				++$j;
				endwhile;
				wp_reset_postdata();
				endif;

			?>
		</div>
		<div class="swiper-pagination"></div>
		<div class="carousel-pagination"></div>
		<!-- <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"></div>
		<div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide"></div>
		<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span> -->
	</div>
	<?php endif; ?>