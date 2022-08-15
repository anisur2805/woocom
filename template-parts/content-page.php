<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package woocom
 */

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="display: none;" >
		
		<?php 
			if ( class_exists( 'woocommerce' ) ):
				if( !is_shop() ):
					echo get_template_part( '/template-parts/breadcrumb' );
				endif;
			endif;
		?>

		<?php woocom_post_thumbnail(); ?>

		<div class="container">
			<div class="row">
				<div class="entry-content">
					<?php
					the_content();

					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'woocom' ),
							'after'  => '</div>',
						)
					);
					?>
				</div><!-- .entry-content -->
			</div><!-- .entry-content -->
		</div><!-- .entry-content -->

		<?php if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Edit <span class="screen-reader-text">%s</span>', 'woocom' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post( get_the_title() )
						),
						'<span class="edit-link">',
						'</span>'
					);
				?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
		
	</article><!-- #post-<?php the_ID(); ?> -->

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		/**
		 * Function hooked in to woocom_page add_action
		 * 
		 * @hooked woocom_page_header 				- 10
		 * @hooked woocom_page_content 				- 20
		 */
		do_action('woocom_page');
		?>
	</article><!-- #post-## -->