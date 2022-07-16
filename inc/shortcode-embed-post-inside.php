<?php
/*
 * Usage:
 *
 * [woocom_embed_post slug="my-post"]
 * [woocom_embed_post slug="my-post" full="false"]
 * [woocom_embed_post type="movie" slug="inception"]
 */
function woocom_embed_post_shortcode( $atts ) {
	extract(
		shortcode_atts(
			array( 
				'type' => 'post', 
				'slug' => '',
				'full' => false
			),
			$atts
		)
	);

	$args = array(
		'post_type' => $type,
		'name' => $slug,
	);

	$post_query = new WP_Query( $args );

	if( $post_query->have_posts() ) {
		while( $post_query->have_posts() ) {
			$post_query->the_post();

			$html = '<section class="woocom__embedded-post">';
			$html .= '<h2 class="embedded-post-title">' . get_the_title() . '</h2>';
			if( true == $full ) {
				$html .= '<div class="embedded-post-content">' . get_the_content() . '</div>';
			} else {
				$html .= '<div class="embedded-post-content">' . get_the_excerpt() . '</div>';
				$html .= '&hellip;<a href="' . esc_url(get_the_permalink()) . '">' . __('See full post', 'woocom') . '&raquo;</a>';
			}
			$html .= '</section>';
		}
	} else {
		$html = '<section class="embedded-post-error">' . '<p>' . __( 'No posts found.', 'woocom' ) . '</p>' . '</section>';
	}

	wp_reset_postdata();

	return $html;
}

add_shortcode( 'woocom_embed_post', 'woocom_embed_post_shortcode' );