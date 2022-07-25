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