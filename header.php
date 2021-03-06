<?php
	/**
	 * The header for our theme
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package woocom
	 */

?>
<!doctype html>
<html <?php language_attributes();?>> 
	<head>
		<meta charset="<?php bloginfo( 'charset' );?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php wp_head();?>
	</head>
	<body <?php body_class();?>><?php wp_body_open();?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'woocom' );?></a>

			<div class="announced-top d-none">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<ul class="list_item">
								<li><i class="bi-phone"></i><a href="#">+880 1749798294</a></li>
								<li><i class="bi-envelope"></i><a
										href="mailto:anisur2805@gmail.com">hello-anisur@mail.com</a></li>
							</ul>
						</div>
						<div class="col-md-8">
							<ul class="list_item">
								<li><a href="#">Free EU Shipping</a></li>
								<li><a href="mailto:anisur2805@gmail.com">30 Days Money back</a></li>
								<li><a href="mailto:anisur2805@gmail.com">24/7 Customer Supports</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div class="d-none d-lg-block header-top-area">
				<div class="container">
					<div class="header-top-wap d-flex align-items-center justify-content-between">
						<div class="language-currency-wrap d-flex align-items-center">
							<div class="same-language-currency language-style">
								<span>English <i class="fa fa-angle-down"></i></span>
								<div class="lang-car-dropdown">
									<ul>
										<li><button value="en">English</button></li>
										<li><button value="en">Bangla</button></li>
									</ul>
								</div>
							</div>
							<div class="same-language-currency">
								<p>Call Us +8801150338042 </p>
							</div>
						</div>
						<div class="header-offer">
							<p><strong>E-mail:</strong><a href="mailto:wonderstech@gmail.com">wonderstech@gmail.com</a></p>
						</div>
					</div>
				</div>
			</div>
			
			<header id="masthead" class="site-header">


		<!-- Main Header Start -->

			<div class="header-padding-1 sticky-bar header-res-padding clearfix">
				<div class="container-fluid">
					<div class="row">

						<div class="col-xl-2 col-lg-3 col-md-6 col-4 logo-wrapper">
							<div class="logo site-branding">
								<?php 
								if( get_theme_mod('custom_logo') ):
									the_custom_logo(); 
								else :
								?>
									<a href="<?php echo esc_url( site_url() ); ?>">
										<img alt="WooCom Logo" src="<?php echo get_template_directory_uri() . "/assets/images/logo-for-website-2.png" ?>">
									</a>
								<?php endif; ?>
								<div>
								<h2 class="site-title"><a href="<?php echo esc_url( site_url('/') ); ?>" title="<?php bloginfo( 'name' ); ?>" itemprop="url"><?php echo get_bloginfo('name'); ?></a></h2>
								<?php
								$description = get_bloginfo( 'description' );
								if( $description ) {
									echo sprintf('<p class="site-description">%s</p>', esc_html( $description ));
								}
								?>
								</div>
							</div><!-- .site-branding -->
						</div>

						<div class="col-xl-6 col-lg-5 d-none d-lg-block">
							<div class="main-menu">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary-menu',
										'menu_id'        => 'main-menu',
										'container'      => 'nav',
									) 
								);
								?>
							</div>
							
							<?php 
							$menu_name = 'primary-menu';
							$locations = get_nav_menu_locations();
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
							$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
							?>
							<div class="main-menu d-none">
								<nav class="menu-woocom-primary-menu-container">
								
								<?php if( !empty( $menuitems ) && is_array( $menuitems )): ?>
								
									<ul id="main-menu" class="menu">
									
										<?//php foreach ($menuitems as $v) : // $pid = $v->ID; var_dump( $pid); 
										// echo "<pre>";
										// print_r( $v);
										
										// if( !$v->menu_item_parent) {
										// 	$child_menu_items = $v->get_child_menu_items($menuitems, $v->ID );
										// 	$has_children = !empty( $child_menu_items) && is_array( $child_menu_items);
										// 	$has_submenu_class = !empty( $has_children) ? 'test-menu' : '';
											
										// 	if( !$has_children) { ?>
											
											<!-- <li id="menu-item-<?//php echo esc_attr( $v->ID ) ?>" class="menu-item menu-item-type<?//php echo esc_attr($v->post_type); ?> menu-item-object-<?//php echo esc_attr($v->object); ?> menu-item-<?//php esc_attr($v->post_name) ?> menu-item-<?//php echo esc_attr( $v->ID ) ?>">
												<a href="<?//php echo esc_url($v->url); ?>"><?//php echo esc_html($v->title) ?></a> 
											</li> -->
											
											<?//php } else { ?>
												<!-- <li id="menu-item-<?//php echo esc_attr( $v->ID ) ?>" class="menu-item menu-item-type<?//php echo esc_attr($v->post_type); ?> menu-item-object-<?//php echo esc_attr($v->object); ?> menu-item-<?//php esc_attr($v->post_name) ?> menu-item-<?//php echo esc_attr( $v->ID ) ?>">
												<a href="<?//php echo esc_url($v->url); ?>"><?//php echo esc_html($v->title) ?></a>
													<ul class="sub-menu">
														<li id="menu-item-<?//php echo $v; ?>" class="menu-item menu-item-type-<?//php echo esc_attr($v->post_type); ?> menu-item-object-custom menu-item-"><a href="/shop/?wc_nc=2"><?//php echo $v; ?></a></li>
													</ul>
											</li> -->
												
											<?//php }
										// }
										
										//?>
											
										<?//php endforeach; ?>
									</ul>

								<?php endif; ?>
								</nav>						
							</div>

						</div>
						

						<div class="col-xl-4 col-lg-4 col-md-6 col-8 ">
							<div class="header-right-wrap ">

								<div class="same-style account-setting d-none d -lg-block">
									<?php echo get_search_form(); ?>
								</div>

								<div class="same-style account-setting account d-none d-lg-block">


								<?php if ( class_exists( 'WooCommerce' ) ): ?>

									<ul>
								<?php if ( is_user_logged_in() ): ?>
										<li><a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">My Account</a></li>
										<li><a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ); ?>">Logout</a></li>
								<?php else: ?>
								<li><a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">Login/ Register</a></li>
								<?php endif;?>
									</ul>
								<?php endif;?>


									<button class="account-setting-active">
										<i class="bi-person"></i>
									</button>
									<div class="account-dropdown">
										<ul>
											<li><a href="/login">Login</a></li>
											<li><a href="/register">Register</a></li>
										</ul>
									</div>
								</div>

								<div class="same-style header-compare">
									<a href="/compare">
										<i class="bi-arrow-left-right"></i>
										<span class="count-style">0</span>
									</a>
								</div>

								<div class="same-style header-wishlist">
									<a href="/wishlist">
										<i class="bi-heart"></i>
										<span class="count-style">0</span>
									</a>
								</div>

								<!-- <div class="same-style cart-wrap d-none d -lg-block mt-8">
									<a class="icon-cart"><i class="bi-heart"></i>
										<span class="count-style"><?//php echo WC()->cart->get_cart_contents_count(); ?></span>
									</a>
									<div class="shopping-cart-content">
										<p class="text-center">No items added to cart</p>
									</div>
								</div> -->

								<div class="same-style cart-wrap d-block d -lg-none">
									<a class="icon-cart" href="<?php if ( class_exists( 'WooCommerce' ) ) { echo wc_get_cart_url(); } ?>" >
										<i class="bi-basket"></i>
										<span class="count-style cart_count"><?php if ( class_exists( 'WooCommerce' ) ){ echo WC()->cart->get_cart_contents_count(); }?></span>
									</a>
								</div>

								<div class="same-style mobile-off-canvas d-block d-lg-none">
									<button class="mobile-aside-button">
										<i class="bi-list"></i>
									</button>
								</div>

							</div>
						</div>

				</div>
				</div>

				<!-- M<obile menu -->
				<div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
					<button class="offcanvas-menu-close" id="mobile-menu-close-trigger"><i class="bi-x"></i> </button>
					<div class="offcanvas-wrapper">
						<div class="offcanvas-inner-content">
							<nav class="offcanvas-navigation" id="offcanvas-navigation">
								<div class="main-menu">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'mobile-menu',
											'menu_id'        => 'main-menu',
											'container'      => 'nav',
										) );
								?>
							</div>
							</nav>
							<div class="offcanvas-widget-area">
								<div class="off-canvas-contact-widget">
									<div class="header-contact-info">
										<ul class="header-contact-info__list">
											<li><i class="bi-phone"></i> <a href="tel://8801150338042">8801150338042</a></li>
											<li><i class="bi-envelope"></i> <a href="mailto:info@yourdomain.com">wonderstech@gmail.com</a></li>
										</ul>
									</div>
								</div>
								<div class="off-canvas-widget-social"><a href="//twitter.com" title="Twitter"><i
											class="bi-twitter"></i></a><a href="//instagram.com" title="Instagram"><i
											class="bi-instagram"></i></a><a href="//facebook.com" title="Facebook"><i
											class="bi-facebook"></i></a><a href="//pinterest.com" title="Pinterest"><i
											class="bi-pinterest"></i></a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</header>