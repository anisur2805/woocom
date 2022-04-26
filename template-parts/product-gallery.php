<?php
if (class_exists('woocommerce')) :
	$tax_query   = WC()->query->get_tax_query();
	$tax_query[] = array(
		'operator' => 'NOT IN',
	);

	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => 6,
	);

	$featured_query = new WP_Query($args);
?>

	<section class="product_gallery">
		<div class="container">
			<div class="custom_row row">

				<?php
				if ($featured_query->have_posts()) {
					while ($featured_query->have_posts()) :
						$featured_query->the_post();
						$product = wc_get_product($featured_query->post->ID);

				?>
						<div class="pg_item">
							<?php echo woocommerce_get_product_thumbnail('medium'); ?>
							<i class="custom_plus"></i>
						</div>

				<?php
					endwhile;

					wp_reset_query();
				} ?>

			</div>
		</div>
	</section>
<?php endif;
