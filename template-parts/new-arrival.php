<?php
 $meta_query  = WC()->query->get_meta_query();
 $tax_query   = WC()->query->get_tax_query();
 $tax_query[] = array(
  'taxonomy' => 'product_visibility',
  'field'    => 'name',
  'terms'    => 'featured',
  'operator' => 'IN',
 );

 $args = array(
  'post_type'      => 'product',
  'post_status'    => 'publish',
  'posts_per_page' => 1,
  'meta_query'     => $meta_query,
  'tax_query'      => $tax_query,
 );

 $featured_query = new WP_Query( $args );

 if ( $featured_query->have_posts() ) {

  while ( $featured_query->have_posts() ):

   $featured_query->the_post();

   $product = wc_get_product( $featured_query->post->ID );
   $sd      = $product->get_short_description();

   $price = $product->get_price_html();

  ?>

	<section class="new-arrivals">
		<div class="container-fluid customize-container-fluid">
			<div class="row text-center">
				<h2><?php __( 'Featured Product', 'woocom' )?></h2>
			</div>
			<div class="row align-items-center">
				<div class="col-md-6 img_col">
					<a href="<?php the_permalink();?>">
						<?php echo woocommerce_get_product_thumbnail( 'large' ); ?>
					</a>
				</div>
				<div class="col-md-6">
					<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
					<h3><?php echo esc_html( $sd ) ?></h3>
					<p class="na_featured_price"><?php echo $price; ?></p>
					<a class="order-btn" href="<?php the_permalink();?>">Order Now</a>
				</div>
			</div>
		</div>
	</section>

	<?php

		endwhile;

   }
   ?>