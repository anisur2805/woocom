<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();

$woocom_sidebar = '';

if (class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_account_page() || is_checkout() || is_product())) {
	$woocom_sidebar_name = 'shop-sidebar';
} else {
	$woocom_sidebar = 'sidebar-1';
}
?>
<div id="primary" class="woocom-content-area">
	<main class="site-main">

		<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<?php
	if (is_active_sidebar( $woocom_sidebar ) ) {
		do_action('woocom_sidebar');
	}
	?>

</div>

<?php
get_footer();