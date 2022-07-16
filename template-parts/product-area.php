<?php $new_arrivals_columns = get_theme_mod('woocom_new_arrivals_columns', 4); ?>

	<div class="product-area ">
		<div class="container">
			<div class="section-title text-center ">
				<?php printf('<h2>%s</h2>', __('DAILY DEALS!', 'woocom')); ?>
			</div>

			<ul class="product-tab-list pt-30 pb-55 text-center nav nav-tabs" id="product-tab-list" role="tablist">
				<li class="nav-item" role="presentation">

						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">New Arrivals</button>

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

			
			<div class="tab-content">
				<div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
					<div class="row">
						<div class="col-md-12">
							<?php
							if ( class_exists( 'WooCommerce' ) ):								
								echo do_shortcode('[products orderby="date" columns="'. $new_arrivals_columns .'" limit=4]'); 
							endif;
							?>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="row">
						<div class="col-md-12">
							<?php
							if ( class_exists( 'WooCommerce' ) ):
								echo do_shortcode('[top_rated_products limit=4]'); 
							endif;
							?>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					<div class="row">
						<div class="col-md-12">
							<?php
							if ( class_exists( 'WooCommerce' ) ):
								echo do_shortcode('[sale_products limit=4]'); 
							endif;
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>