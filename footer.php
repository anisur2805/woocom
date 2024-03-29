<?php
	/**
	 * The template for displaying the footer * * Contains the closing of the #content div and all content after.
	 * * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package woocom */

	$woocom_footer_layout 	  = get_theme_mod( 'woocom_footer_layout', 'footer-1' );

?>
</div>
	<div class="tags-area bg-gray py-4 mb-4">
		<div class="container">
			<div class="row text-center">
				<?php
					$woocom_footer_tags_title = apply_filters( 'woocom_footer_tags_title', __( 'Tags', 'woocom' ) );
					$woocom_footer_tags_items = apply_filters( 'woocom_footer_tags_items', get_tags() );

				?>
				<h3>
					<?php echo esc_html( $woocom_footer_tags_title ); ?>
				</h3>
				<?php
					echo '<div class="woocom-tags">';

					if ( is_array( $woocom_footer_tags_items ) ) {
						foreach ( $woocom_footer_tags_items as $wc_item ) {
							printf( '<a href="%s">%s</a>', get_term_link( $wc_item->term_id ), $wc_item->name );
						}
					}

					echo "</div>";

				?>
			</div>
		</div>
	</div>
	
	<?php do_action( 'woocom_ig_feed' ); ?>

	<?php do_action( 'woocom_before_footer' );
	
	if( 1 == $woocom_footer_layout ) {
		get_template_part( 'template-parts/footer/footer-1' );
	} else {
		get_template_part( 'template-parts/footer/footer', '2' );
	}
	
	do_action( 'woocom_after_footer' );?>

	<?php
	do_action( 'woocom_after_page' );
	wp_footer();
	?>
</body>
</html>