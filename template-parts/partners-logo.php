<?php 
	$logo_names = [
		'Logo One' => 'logo_one',
		'Logo Two' => 'logo_two',
		'Logo Three' => 'logo_three',
		'logo Four' => 'logo_four',
		'logo Five' => 'logo_five',
		'logo Six' => 'logo_six',
	];
?>

	<section class="partners-logo">
		<div class="container text-center">
			<h2><?php _e( 'Partners Logo', 'woocom' ); ?></h2>
			<p><?php _e('Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, suscipit ullam dolorem non debitis ipsum!', 'woocom'); ?></p>
		</div>
		<div class="container marginTop40px">
			<div class="row">
				<?php
					$index = 0;
					foreach( $logo_names as $logo_label => $logo_name ) {
						$setting_id 	= sprintf('woocom_%s', $logo_name );
						$logo_url 		= get_theme_mod( $setting_id );
						$default_url    = get_template_directory_uri() . '/assets/images/hero-slider/1.webp';
						if( $logo_url ):
						?>
							<div class="col-md-3 col-xs-6 mb-4 a">
								<div class="partner-logo">
									<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_label ); ?>" class="img-responsive" />
								</div>
							</div>
						<?php
						else:
							?>
							<div class="col-md-3 col-xs-6 mb-4 b">
								<div class="partner-logo">
									<img src="<?php echo esc_url( $default_url ); ?>" alt="Logo" class="img-responsive" />
								</div>
							</div>
							<?php
						endif;
					}
				?>

			</div>
		</div>
	</section>