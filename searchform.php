<?php 

$woocom_unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form woocom-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" placeholder="Search here..." id="<?php echo esc_attr( $woocom_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
	<!-- <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocom' ); ?>" /> -->
	<button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocom' ); ?>"><i class="bi-search"></i></button>
	
	<!-- If there is WooCommerce class is exists only search on product -->
	<?php if( class_exists('WooCommerce')) : ?>
		<input type="hidden" value="product" name="post_type" id="post_type" />
	<?php endif; ?>
	
</form>
