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
					
					<?php 
						echo '<h3>';
						_e('Chapters', 'woocom');
						echo '</h3>';
						
						$woocom_chapters = array(
							'post_type' 	 => 'chapter',	
							'posts_per_page' => -1,
							'meta_key'		 => 'parent_book',
							'meta_value' 	 => get_the_ID(),
						);
						
						echo '<ul>';
						
						$woocom_args = new WP_Query( $woocom_chapters );
						while( $woocom_args->have_posts() ) {
							$woocom_args->the_post();
							$woocom_link = get_the_permalink();
							$woocom_title = get_the_title();
							
							// printf( '<li><a href="%s">%s</a></li>', $woocom_link, $woocom_title );
							
						} 
						
						echo '</ul>';
						
						wp_reset_postdata();
						
						$attached = get_post_meta( get_the_ID(), 'attached_cmb2_attached_posts', true );
						
						echo '<ul>';
						foreach ( $attached as $attached_post ) {
							$post = get_post( $attached_post );
							$woocom_title = get_the_title( $post );
							$woocom_link = get_the_permalink( $post );
							// echo $title . "<br />";
							printf( '<li><a href="%s">%s</a></li>', $woocom_link, $woocom_title );
							
						}
						echo '</ul>'

					?>
				</div>
				<div class="col-md-4">
					<?php
						get_sidebar();
					?>
				</div>

			</div>
		</div>		

	</main><!-- #main -->

<?php
get_footer();
