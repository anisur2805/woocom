<?php
	/**
	 * Template Name: Custom Query
	 */
	
	get_header();

	$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$posts_per_page = 2;
	$post_ids       = array( 589, 4681, 5410, 5411, 152, 5409 );
	$total			= 9;

	$_p = get_posts( array(
		// 'post__in'       => $post_ids,
		'posts_per_page' => $posts_per_page,
		'orderby'        => 'post__in',
		'paged'          => $paged,
		'numberposts'	 => $posts_per_page,
		'author__in'     => array(1),
	) );

	foreach ( $_p as $post ) {
		// echo '<pre>';
		// print_r($post);
		// with setup postdata()
		// setup_postdata( $post );
		// echo '<h2>'. get_the_title().'</h2>';

		// without setup postdata()
		?>
		<h2>
			<a href="<?php echo $post->guid ?>">
				<?php echo apply_filters( 'the_title', $post->post_title ); ?>
			</a>
		</h2>
		<?php
	}
	wp_reset_postdata();

	echo paginate_links( array(
		// 'total' => ceil( count( $post_ids ) / $posts_per_page ),
		'total' => ceil( $total / $posts_per_page ),	// show author posts 
	) );

	get_footer();