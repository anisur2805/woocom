<div class="col-xl-2 col-lg-3 col-md-6 col-4 logo-wrapper">
	<div class="logo site-branding">
		<?php
			if ( get_theme_mod( 'custom_logo' ) ):
				the_custom_logo();
			else:
		?>
			<a href="<?php echo esc_url( site_url() ); ?>">
				<img alt="WooCom Logo" src="<?php echo get_template_directory_uri() . "/assets/images/logo-for-website-2.png" ?>" />
			</a>
		<?php endif;?>
		<div>
			<h2 class="site-title"><a href="<?php echo esc_url( site_url( '/' ) ); ?>" title="<?php bloginfo( 'name' );?>" itemprop="url"><?php echo get_bloginfo( 'name' ); ?></a></h2>
			<?php
				$description = get_bloginfo( 'description' );
				if ( $description ) {
					echo sprintf( '<p class="site-description">%s</p>', esc_html( $description ) );
				}
			?>
		</div>
	</div>
</div>