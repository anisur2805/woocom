<?php
/**
 * The template for displaying the footer * * Contains the closing of the #content div and all content after.
 * * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom */
?>
	<footer class="footer-area bg-gray pt-100 pb-70 d -none  ">
		<div class="container">
			<div class="row">
			
				<div class="col-lg-2 col-sm-4">
					<div class="copyright mb-30 ">
						<div class="footer-logo">
							<a href="/">
								<img alt="Logo"	src="<?php echo get_template_directory_uri() . "/assets/images/logo-2.1.png" ?>">
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
							<h3>ABOUT US</h3>
						</div>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'about-menu',
									'menu_id'        => 'about-menu',
									'container_class'			 => 'footer-list'
								)
							);
						?>
					</div>
				</div>
				
				<div class="col-lg-2 col-sm-4">
					<div class="footer-widget mb-30 ml-50">
						<div class="footer-title">
							<h3>USEFUL LINKS</h3>
						</div>
						<div class="footer-list">
							<ul>
								<li><a href="/#/">Returns</a></li>
								<li><a href="/#/">Support Policy</a></li>
								<li><a href="/#/">Size guide</a></li>
								<li><a href="/#/">FAQs</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<div class="col-lg-2 col-sm-6">
					<div class="footer-widget mb-30 ml-75">
						<div class="footer-title">
							<h3>FOLLOW US</h3>
						</div>
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'follow-menu',
									'menu_id'		=> 'about-menu',
									'container_class'			 => 'footer-list'
								)
							);
						?>
					</div>
				</div>
				
				<div class="col-lg-4 col-sm-6">
					<div class="footer-widget mb-30 ml-70 ">
						<div class="footer-title d-none">
							<h3>SUBSCRIBE</h3>
						</div>
						<div class="subscribe-style">
							<?php dynamic_sidebar('subscribe') ?>
							<div class="footer-social">
								<ul>
									<li><a class="facebook" target="_blank" rel="noopener noreferrer" href="/"> 
										<i class="bi-facebook"></i></a>
									</li>
									<li><a class="twitter" target="_blank" rel="noopener noreferrer" href="/">
										<i class="bi-twitter"></i></a>
									</li>
									<li><a class="instagram" target="_blank" rel="noopener noreferrer" href="/">
										<i class="bi-instagram"></i></a>
									</li>
									<li><a class="youtube" target="_blank" rel="noopener noreferrer" href="/"> 
										<i class="bi-youtube"></i></a>
								  </li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row footer-bottom">
				<!-- <div class="col-md-4">© <?php echo date('Y'); ?> WondersTech.
					All Rights Reserved</div> -->
					
						<div class="col-md-4"><?php echo get_theme_mod('woocom_copyright') ?></div>
					
				<div class="col-md-8 payment"><img class="payment_methods"
						src="<?php echo get_template_directory_uri() . "/assets/images/payment-accept.png" ?>"
						alt="payment"></div>
			</div>
		</div>
		<button class="scroll-top show"><i class="bi-arrow-up"></i></button>
	</footer> 

<?php wp_footer(); ?>
</body>
</html>