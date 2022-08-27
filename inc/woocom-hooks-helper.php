<?php

	if ( !defined( 'ABSPATH' ) ) {
		exit( 'Direct script access denied.' );
	}

	if( !function_exists('is_plugin_active') ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	}

	if ( !function_exists( 'woocom_header_topbar' ) ) {
		/**
		 * woocom_header_topbar
		 *
		 * @return void
		 */
		function woocom_header_topbar() {
			$template = 'template-parts/header/site-topbar';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_header_wrapper_start' ) ) {
		/**
		 * woocom_header_wrapper_start
		 *
		 * @return void
		 */
		function woocom_header_wrapper_start() {
			$template = 'template-parts/header/site-wrapper-start';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_header_site_branding' ) ) {
		/**
		 * woocom_header_site_branding
		 *
		 * @return void
		 */
		function woocom_header_site_branding() {
			$template = 'template-parts/header/site-branding';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_header_menu' ) ) {
		/**
		 * woocom_header_menu
		 *
		 * @return void
		 */
		function woocom_header_menu() {
			$template = 'template-parts/header/header-menu';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_header_menu_right' ) ) {
		/**
		 * woocom_header_menu_right
		 *
		 * @return void
		 */
		function woocom_header_menu_right() {
			$template = 'template-parts/header/header-menu-right';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_header_wrapper_end' ) ) {
		/**
		 * woocom_header_wrapper_end
		 *
		 * @return void
		 */
		function woocom_header_wrapper_end() {
			$template = 'template-parts/header/site-wrapper-end';
			get_template_part( $template );
		}
	}

	if ( !function_exists( 'woocom_render_ig_feed' ) ) {
		/**
		 * Function Name        : woocom_render_ig_feed
		 * Function Hooked      : woocom_render_ig_feed
		 * Function return Type : html
		 * Function Since       : 1.0.0
		 *
		 * @return void
		 */
		function woocom_render_ig_feed() {
			if ( is_plugin_active( 'instagram-feed/instagram-feed.php' ) ): ?>
				<section class="ig_feed">
					<?php echo do_shortcode( '[instagram-feed]' ); ?>
				</section>
			<?php endif;
		}
	}

	if ( !function_exists( 'woocom_render_footer_main' ) ) {
		/**
		 * Function Name        : woocom_render_footer_main
		 * Function Hooked      : themeoo_footer_top_widget
		 * Function return Type : html
		 * Function Since       : 1.0.0
		 *
		 * @return void
		 */

		function woocom_render_footer_main() { ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-sm-4">
						<div class="copyright mb-30 ">
							<div class="footer-logo">
							<?php
								if ( get_theme_mod( 'custom_logo' ) ):
									the_custom_logo();
								else: ?>
								<a href="<?php echo esc_url( site_url() ); ?>">
									<img alt="WooCom Logo" src="<?php echo get_template_directory_uri() . "/assets/images/logo-for-website-2.png" ?>">
								</a>
							<?php endif;?>
							</div>
							<div class="app-store-google">
								<a><img src="<?php echo get_template_directory_uri() . "/assets/images/apps-google.png" ?>"></a>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-sm-4">
						<div class="footer-widget mb-30 ml-30">
							<div class="footer-title">
								<h3><?php _e( 'ABOUT US', 'woocom' );?></h3>
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
								<h3><?php _e( 'USEFUL LINKS', 'woocom' );?></h3>
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
								<h3><?php _e( 'FOLLOW US', 'woocom' );?></h3>
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
								<h3><?php _e( 'SUBSCRIBE', 'woocom' );?></h3>
							</div>
							<div class="subscribe-style">
								<?php
									if ( is_active_sidebar( 'subscribe' ) ) {
										dynamic_sidebar( 'subscribe' );
									}
								?>
								<?php do_action( 'woocom_social_icons' );?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }
	}

	if ( !function_exists( 'woocom_render_social_icons' ) ) {
		function woocom_render_social_icons() { ?>
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
		<?php }
	}

	if ( !function_exists( 'woocom_render_footer_copyright' ) ) {
		function woocom_render_footer_copyright() { ?>
			<div class="footer-bottom footer-copyright">
				<div class="container">
					<div class="row">
						<div class="col-md-4"><?php echo get_theme_mod( 'woocom_copyright' ) ?></div>
						<div class="col-md-8 payment">
							<img class="payment_methods" src="<?php echo get_template_directory_uri() . "/assets/images/payment-accept.png" ?>" alt="payment">
						</div>
					</div>
				</div>
			</div>
		<?php }
	}


	if (!function_exists('woocom_get_sidebar')) {
		/**
		 * Display woocom sidebar
		 *
		 * @uses get_sidebar()
		 */
		function woocom_get_sidebar()
		{
			get_sidebar();
		}
	}

	
	/**
	 * 
	 * Page Hook Functions
	 *
	 */

	if (!function_exists('woocom_page_header')) {
		/**
		 * woocom_page_header
		 *
		 * @return void
		 */
		function woocom_page_header()
		{
			if (is_front_page()) {
				return;
			}
			
			// if (is_front_page() && is_page_template('template-fullwidth.php')) {
			// 	return;
			// }

			?>
			<header class="entry-header">
				<?php
				the_title('<h1 class="entry-title">', '</h1>');
				?>
			</header><!-- .entry-header -->
		<?php
		}
	}

	if (!function_exists('woocom_banner')) {
		/**
		 * Woocom banner.
		 *
		 * @return void
		 */
		function woocom_banner()
		{
			// if (woocom_is_blog()) {
			// 	$name = 'banner-blog';
			// } elseif (woocom_is_woo_page()) {
			// 	$name = 'banner-woo';
			// } else {
				$name = 'banner';
			// }
	
			$template = woocom_get_banner_template_slug() . '/' . $name;
	
			get_template_part($template);
		}
	}

	if (!function_exists('woocom_page_content')) {
		/**
		 *
		 * Display the post content
		 *
		 * @return void
		 */
		function woocom_page_content()
		{
		?>
			<div class="entry-content">
				<?php the_content(); ?>
				<?php
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'woocom'),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
	<?php
		}
	}


	if (!function_exists('woocom_get_banner_template_slug')) {
		/**
		 * Banner templates slug
		 *
		 * @since 1.2
		 */
		function woocom_get_banner_template_slug()
		{
		  return 'template-parts/banner';
		}
	  }