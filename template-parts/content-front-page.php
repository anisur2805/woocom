<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

if( !function_exists('is_plugin_active') ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <header class="entry-header">

	<?php echo get_template_part('/template-parts/hero', 'slider'); ?>

	<?php echo get_template_part('/template-parts/shop-by', 'category'); ?>
	
	<?php echo get_template_part('/template-parts/about' ); ?>
	
	<?php get_template_part('/template-parts/support', 'area'); ?>

	<?php //echo get_template_part('/template-parts/ajax-load-more' ); ?>
	
	<?php //echo get_template_part('/template-parts/custom-posts' ); ?>

	<?php get_template_part('/template-parts/product', 'area'); ?>
	
	<?php //get_template_part('/template-parts/promotion'); ?>
	
	<?php //get_template_part('/template-parts/featured', 'cat'); ?>
	
	<?php //get_template_part('/template-parts/inspirational', 'post'); ?>
	
	<?php get_template_part('/template-parts/subscribe'); ?>

	<?php echo get_template_part( '/template-parts/reservation' ); ?>

	<?php
	if ( is_plugin_active( 'wpforms-lite/wpforms.php' ) ) :
		get_template_part('/template-parts/subscribe2'); 
	endif;
	?>
	
	<?php get_template_part('/template-parts/new', 'arrival'); ?>
	
	<?php get_template_part('/template-parts/hero', 'slider2'); ?>
	
	<?php get_template_part('/template-parts/product', 'gallery'); ?>

	<?php get_template_part('/template-parts/discount'); ?>

	<?php get_template_part('/template-parts/partners-logo', 'gallery'); ?>

	<?php get_template_part('/template-parts/woocom', 'app'); ?>

	<?php get_template_part('/template-parts/discount', 'category'); ?>

	<?php get_template_part('/template-parts/service', 'section'); ?>

	<?php get_template_part('/template-parts/on-selling', 'products'); ?>
	
</article> 