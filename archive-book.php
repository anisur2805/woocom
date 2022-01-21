<?php
/**
 * Template Name: Books
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woocom
 */

get_header();

$posts_per_page = 3;
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

$books = new WP_Query([
	'post_type' 	 => 'book',
	'posts_per_page' => $posts_per_page,
	'paged'			 => $paged,
])

?>

	<main id="primary" class="site-main">
	
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( $books->have_posts() ) :
							$books->the_post();

							/*
							* Include the Post-Type-specific template for the content.
							* If you want to override this in a child theme, then include a file
							* called content-___.php (where ___ is the Post Type name) and that will be used instead.
							*/
							get_template_part( 'template-parts/content', get_post_type() );

						endwhile;

						// the_posts_navigation();
						
						wp_reset_postdata();
						
						echo '<div class="woocom_pg">';
						echo paginate_links([
							'current' 	=> $paged,
							'total'   	=> $books->max_num_pages,
							'prev_next' => false,
						]);
						echo '</div>';
					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
		
		
		

	</main><!-- #main -->

<?php
get_footer();
