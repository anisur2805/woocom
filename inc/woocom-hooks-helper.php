<?php

if (!function_exists('woocom_render_ig_feed')) {
	/**
	 * Function Name        : woocom_render_ig_feed
	 * Function Hooked      : woocom_render_ig_feed
	 * Function return Type : html
	 * Function Since       : 1.0.0
	 *
	 * @return void
	 */
	function woocom_render_ig_feed() {
		if( is_plugin_active( 'instagram-feed/instagram-feed.php' ) ):
	?>
		<section class="ig_feed">
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</section>
	<?php
	endif;
	}
}

if (!function_exists('woocom_render_footer_main')) {
	/**
	 * Function Name        : woocom_render_footer_main
	 * Function Hooked      : themeoo_footer_top_widget
	 * Function return Type : html
	 * Function Since       : 1.0.0
	 *
	 * @return void
	 */

	function woocom_render_footer_main() {
	?>
		<div class="container">
			<div class="row">

				<div class="col-lg-2 col-sm-4">
					<div class="copyright mb-30 ">
						<div class="footer-logo">
							<a href="/">
								<img alt="Logo" src="<?php echo get_template_directory_uri() . "/assets/images/logo-2.1.png" ?>">
							</a>
						</div>
						<div class="app-store-google">
							<a><img src="<?php echo get_template_directory_uri() . "/assets/images/apps-google.png" ?>"></a>
						</div>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4">
					<div class="footer-widget mb-30 ml-30">
						<div class="footer-title">
							<h3><?php _e('ABOUT US', 'woocom'); ?></h3>
						</div>

						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'about-menu',
								'menu_id'         => 'about-menu',
								'container_class' => 'footer-list',
							)
						);
						?>
					</div>
				</div>

				<div class="col-lg-2 col-sm-4">
					<div class="footer-widget mb-30 ml-50">
						<div class="footer-title">
							<h3><?php _e('USEFUL LINKS', 'woocom'); ?></h3>
						</div>
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'useful-menu',
								'menu_id'         => 'useful-menu',
								'container_class' => 'footer-list',
							)
						);
						?>
					</div>
				</div>

				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget mb-30 ml-75">
						<div class="footer-title">
							<h3><?php _e('FOLLOW US', 'woocom'); ?></h3>
						</div>
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'follow-menu',
								'menu_id'         => 'about-menu',
								'container_class' => 'footer-list',
							)
						);
						?>
					</div>
				</div>

				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget mb-30 ml-70 ">
						<div class="footer-title d-none">
							<h3><?php _e('SUBSCRIBE', 'woocom'); ?></h3>
						</div>
						<div class="subscribe-style">
							<?php
							if (is_active_sidebar('subscribe')) {
								dynamic_sidebar('subscribe');
							}
							?>


							<?php do_action('woocom_social_icons'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}

if (!function_exists('woocom_render_social_icons')) {
	function woocom_render_social_icons() {
	?>

		<div class="footer-social">
			<ul>
				<li>
					<a class="facebook" target="_blank" rel="noopener noreferrer" href="/">
						<i class="bi-facebook"></i>
					</a>
				</li>
				<li>
					<a class="twitter" target="_blank" rel="noopener noreferrer" href="/">
						<i class="bi-twitter"></i>
					</a>

				</li>
				<li>
					<a class="instagram" target="_blank" rel="noopener noreferrer" href="/">
						<i class="bi-instagram"></i>
					</a>
				</li>
				<li>
					<a class="youtube" target="_blank" rel="noopener noreferrer" href="/">
						<i class="bi-youtube"></i>
					</a>
				</li>
			</ul>
		</div>

	<?php
	}
}

if (!function_exists('woocom_render_footer_copyright')) {
	function woocom_render_footer_copyright() {
	?>
		<div class="footer-bottom footer-copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-4"><?php echo get_theme_mod('woocom_copyright') ?></div>
					<div class="col-md-8 payment">
						<img class="payment_methods" src="<?php echo get_template_directory_uri() . "/assets/images/payment-accept.png" ?>" alt="payment">
					</div>
				</div>
			</div>
		</div>

<?php
	}
}
