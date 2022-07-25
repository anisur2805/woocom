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