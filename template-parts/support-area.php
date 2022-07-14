<?php 
	$woocom_support_items = get_theme_mod( 'woocom_support_items' );
	$woocom_support_items_per_row = get_theme_mod( 'woocom_support_items_per_row' );
?>

	<div class="support-area pt-100 pb-60">
		<div class="container">
			<div class="row">
				<?php 
				printf( '<h2 class="woocom-section-title">%s</h2>', __('Our Support Area', 'woocom' ) );

				if( is_array( $woocom_support_items ) ){
					foreach( $woocom_support_items as $woocom_support_item): ?>
						<div class="col-sm-<?php echo $woocom_support_items_per_row; ?>">
							<div class="support-wrap mb-30">
								<div class="support-icon">
									<?php 
										$woocom_support_icon = $woocom_support_item['woocom_support_item_icon'];
										echo wp_get_attachment_image( $woocom_support_icon );
									?>
								</div>
								<div class="support-content">
									<h5><?php echo $woocom_support_item['woocom_support_item_title'] ?></h5>
									<p><?php echo $woocom_support_item['woocom_support_item_subtitle'] ?></p>
								</div>
							</div>
						</div>
					<?php 
					endforeach; 
				}
				?>
				
			</div>
		</div>
	</div>