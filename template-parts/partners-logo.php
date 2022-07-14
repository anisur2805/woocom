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
			<h2>Partners Logo</h2>
			<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Mollitia, suscipit ullam dolorem non debitis ipsum!</p>
		</div>
		<div class="container marginTop40px">
			<div class="row">
				<?php 
					foreach( $logo_names as $logo_label => $logo_name ) {
						$setting_id = sprintf('woocom_%s', $logo_name );
						$logo_url = get_theme_mod( $setting_id );
						if( $logo_url ):
						?>
							<div class="col-md-3 col-xs-6 mb-4">
								<div class="partner-logo">
									<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_label ); ?>" class="img-responsive" />
								</div>
							</div>
						<?php
						endif;
					}
				?>

			</div>
		</div>
	</section>