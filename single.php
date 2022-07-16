<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package woocom
 */

get_header();
?>

	<main id="primary" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'woocom' ) . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'woocom' ) . '</span> <span class="nav-title">%title</span>',
								)
							);

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>
				</div>
				<div class="col-md-4">
					<?php
						get_sidebar();
					?>
				</div>

			</div>
		</div>
		
		<div class="woocom__related_posts">
			<div class="container">
				<div>
					<?php
					printf('<h3 class="woocom__related_posts_title">%s</h3>', esc_html('You may like') );
					$current_post_id = get_the_ID();
					$current_post_cat = get_the_category();
					// echo '<pre>';
					// print_r( $current_post_cat );
					$current_post_first_cat_id = $current_post_cat[0]->term_id;
					
					$args = array(
						'cat' => $current_post_first_cat_id,
						'post__not_in' => array( $current_post_id )
					);
					
					
					$cat_current_post = new WP_Query( $args );

					if( $cat_current_post->have_posts() ):
						while ( $cat_current_post->have_posts() ) :
							$cat_current_post->the_post();
							printf('<h5 class="post-title"><a href="%s" rel="bookmark">%s</a></h5>', esc_url( get_the_permalink() ), esc_html( get_the_title() ) );
						endwhile;
						wp_reset_query();
					else:
						echo 'No posts found.';
					endif;
					?>
				</div>
			</div>
		</div>
		<?php 
		
		?>

	</main><!-- #main -->

<?php
get_footer();
