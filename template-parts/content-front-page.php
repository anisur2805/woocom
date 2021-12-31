<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <header class="entry-header">

	<?php echo get_template_part('/template-parts/hero', 'slider'); ?>
	
	<div class="support-area pt-100 pb-60">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-sm-6">
					<div class="support-wrap mb-30">
						<div class="support-icon">
							<img class="animated" src="<?php echo get_template_directory_uri() . "/assets/images/support-1.png"?>" alt="">
						</div>
						<div class="support-content">
							<h5>Free Shipping</h5>
							<p>Free shipping on all order</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="support-wrap mb-30">
						<div class="support-icon"><img class="animated" src="<?php echo get_template_directory_uri() . "/assets/images/support-2.png"?>" alt=""></div>
						<div class="support-content">
							<h5>Support 24/7</h5>
							<p>Free shipping on all order</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="support-wrap mb-30">
						<div class="support-icon"><img class="animated" src="<?php echo get_template_directory_uri() . "/assets/images/support-3.png" ?>" alt=""></div>
						<div class="support-content">
							<h5>Money Return</h5>
							<p>Free shipping on all order</p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-sm-6">
					<div class="support-wrap mb-30">
						<div class="support-icon"><img class="animated" src="<?php echo get_template_directory_uri() . "/assets/images/support-4.png"?>" alt=""></div>
						<div class="support-content">
							<h5>Order Discount</h5>
							<p>Free shipping on all order</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="product-area ">
		<div class="container">
			<div class="section-title text-center  ">
				<h2>DAILY DEALS!</h2>
				<p class=""></p>
			</div>
			<ul class="product-tab-list pt-30 pb-55 text-center nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
						type="button" role="tab" aria-controls="home" aria-selected="true">New Arrivals</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
						type="button" role="tab" aria-controls="profile" aria-selected="false">Best Sellers</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
						type="button" role="tab" aria-controls="contact" aria-selected="false">Sale Items</button>
				</li>
			</ul>
			
			<?php
				$new_arrivals_columns = get_theme_mod('woocom_new_arrivals_columns', 4);
			?>
			
			<div class="tab-content" id="myTab">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				<div class="row">
					<div class="col-md-12">
							<?php echo do_shortcode('[products orderby="date" columns="'. $new_arrivals_columns .'" limit=4]'); ?>
					</div>
				</div>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row">
						<div class="col-md-12">
							<?php echo do_shortcode('[top_rated_products limit=4]'); ?>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-md-12">
							<?php echo do_shortcode('[sale_products limit=4]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php get_template_part('/template-parts/promotion'); ?>
	
	<?php get_template_part('/template-parts/featured', 'cat'); ?>
	<?php get_template_part('/template-parts/inspirational', 'post'); ?>
	<?php get_template_part('/template-parts/subscribe'); ?>
	
	<?php get_template_part('/template-parts/new', 'arrival'); ?>
	
	<?php get_template_part('/template-parts/hero', 'slider2'); ?>
	
</article> 