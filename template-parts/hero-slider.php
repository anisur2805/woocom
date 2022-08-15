<?php if( ! get_theme_mod('woocom_display_hero_slider' ) ){
		return;
	} ?>
	<div class="slider-area swiper">
		<div class="swiper-wrapper">
			<?php

				$sliders = [];
				for($start = 1; $start <= 3; $start++ ){
					$sliders[$start]['woocom_hero_img'] = 	get_theme_mod( 'woocom_hero_feature_img'.$start);
					$sliders[$start]['woocom_hero_title'] = 	get_theme_mod( 'woocom_hero_title'.$start);
					$sliders[$start]['woocom_hero_btn_text'] = 	get_theme_mod( 'woocom_hero_slider_button_text'.$start);
					$sliders[$start]['woocom_hero_btn_url'] = 	get_theme_mod( 'woocom_hero_slider_button_url'.$start);	
				}
					?>
					<?php  
					foreach($sliders as $key => $sliderItem ):
					?>
					<div class="swiper-slide slider-height-1">
						<div class="container">
							
							<div class="row align-items-center">
								<div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
									<div class="slider-content slider-animated-1"> 
										<?php if ( $sliderItem['woocom_hero_title'] ): ?>
											<h1 class="animated"><?php echo $sliderItem['woocom_hero_title']; ?></h1> 
										<?php endif; ?>

										<?php if ( $sliderItem['woocom_hero_btn_text'] ): ?>
											<div class="slider-btn btn-hover">
												<a href="<?php echo esc_url( $sliderItem['woocom_hero_btn_url'] ); ?>">
													<?php echo $sliderItem['woocom_hero_btn_text']; ?>
												</a>
											</div>
										<?php endif; ?>

									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-12 col-sm-6">
									<div class="slider-single-img slider-animated-1">
										<?php if( $sliderItem['woocom_hero_img'] ): ?>
											<img src="<?php echo wp_get_attachment_image_url( $sliderItem['woocom_hero_img'], 'full' ); ?>" />
										<?php endif; ?>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<?php endforeach; ?>
		</div>
		<div class="swiper-pagination"></div>
		<div class="carousel-pagination"></div>
	</div> 