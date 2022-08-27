<div class="col-xl-6 col-lg-5 d-none d-lg-block">
	<div class="main-menu">
		<?php
		if(has_nav_menu('primary-menu')):
			wp_nav_menu(
				array(
					'theme_location' => 'primary-menu',
					'menu_id'        => 'main-menu',
					'container'      => 'nav',
				)
			);
		else:
			printf(
				'<a href="%1$s">%2$s</a>',
				esc_url(admin_url('/nav-menus.php')),
				esc_html__('Add your menu', 'woocom')
			);
		endif;
		?>
	</div>
</div>