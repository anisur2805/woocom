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

	<?php echo get_template_part('/template-parts/shop-by', 'category'); ?>
	
	<?php echo get_template_part('/template-parts/about' ); ?>
	
	<?php get_template_part('/template-parts/support', 'area'); ?>

	<?php echo get_template_part('/template-parts/ajax-load-more' ); ?>
	
	<?php echo get_template_part('/template-parts/custom-posts' ); ?>

	<?php get_template_part('/template-parts/product', 'area'); ?>
	
	<?php get_template_part('/template-parts/promotion'); ?>
	
	<?php get_template_part('/template-parts/featured', 'cat'); ?>
	
	<?php get_template_part('/template-parts/inspirational', 'post'); ?>
	
	<?php get_template_part('/template-parts/subscribe'); ?>

	<?php get_template_part('/template-parts/subscribe2'); ?>
	
	<?php get_template_part('/template-parts/new', 'arrival'); ?>
	
	<?php get_template_part('/template-parts/hero', 'slider2'); ?>
	
	<?php get_template_part('/template-parts/product', 'gallery'); ?>

	<?php get_template_part('/template-parts/discount'); ?>

	<?php get_template_part('/template-parts/partners-logo', 'gallery'); ?>
	
</article> 