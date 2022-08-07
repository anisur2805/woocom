<?php 
	$wc_discount_image = get_theme_mod( 'wc_discount_image' ); 
	$wc_discount_title 	  = get_theme_mod( 'wc_discount_title' ); 
?>
<?php if( $wc_discount_image || $wc_discount_title ): ?>
	<section class="wc__discount_wrapper">
		<div class="wc__discount_inner">
			<div class="wc__discount_overlay"></div>
			<a href="#">
				<?php if( $wc_discount_image ): ?>
					<img src="<?php echo esc_url( $wc_discount_image ); ?>" />
				<?php endif; ?>
				<?php if( $wc_discount_title ): ?>
				<div class="wc__discount_content">
					<?php printf( '<h2 class="wc__discount_title">%s</h2>', esc_html( $wc_discount_title, 'woocom' ) ); ?>
				</div>
				<?php endif; ?>
			</a>
		</div>
	</section>
<?php endif; ?>