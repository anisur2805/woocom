<?php
/**
* Template Name: Wishlist
 */
 
 get_header();
?>

	<main id="primary" class="site-main wishlist-page-template">
	
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'page' ); 
		endwhile;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();