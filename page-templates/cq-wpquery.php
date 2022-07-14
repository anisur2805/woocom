<?php
	/**
	 * Template Name: WP Query
	 */
	
	get_header();

	$paged          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
	$posts_per_page = 2;
	$post_ids       = array( 589, 4681, 5410, 5411, 152, 5409 );

	echo '<h2>New WP Query</h2>';
	// WP_Query #1
	$_p = new WP_Query( array(
		'post__in'       => $post_ids,
		'posts_per_page' => $posts_per_page,
		'orderby'        => 'post__in',
		'paged'          => $paged,
	) );

	while ( $_p->have_posts() ) {
		$_p->the_post();
		?>
		
		<h4>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h4>
		<?php
	}
	wp_reset_query();

	echo paginate_links( array(
		'total' => $_p->max_num_pages,
		'current' => $paged,
		'prev_text' => __('<< Old Post', 'woocom'),
		'next_text' => __('New Post >>', 'woocom'),
	) );

	echo '<hr/>';
	
	echo '<h2>New WP Category Query</h2>';
	// WP_Query #2
	$_q = new WP_Query( array(
		'category_name' => 'uncategorized',
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
	));

	while ( $_q->have_posts() ) {
		$_q->the_post();
		?>
		
		<h4>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h4>
		<?php
	}
	wp_reset_query();

	echo paginate_links( array(
		'total' => $_q->max_num_pages,
		'current' => $paged,
		'prev_text' => __('<< Old Post', 'woocom'),
		'next_text' => __('New Post >>', 'woocom'),
	) );

	echo '<hr/>';

	echo '<h2>New WP Relationship Query</h2>';
	// WP_Query #3
	$_mq = new WP_Query( array(
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
		'tax_query' 	 => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => array('invisalign'),
			),
			array(
				'taxonomy' => 'post_tag',
				'field' => 'slug',
				'terms' => array('special'),
			)
		)
	));

	while ( $_mq->have_posts() ) {
		$_mq->the_post();
		?>
		<h4>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h4>
		<?php
	}
	wp_reset_query();

	echo paginate_links( array(
		'total' => $_mq->max_num_pages,
		'current' => $paged,
		'prev_text' => __('<< Old Post', 'woocom'),
		'next_text' => __('New Post >>', 'woocom'),
	) );

	echo '<hr/>';
	echo '<h2>New WP Query - Post Format</h2>';
	// WP_Query #4 - Post Format
	$post_format_query = new WP_Query( array(
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
		'tax_query' 	 => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-audio', 'post-format-video' ),
			),
		)
	));

	while ( $post_format_query->have_posts() ) {
		$post_format_query->the_post();
		?>
		<h4>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h4>
		<?php
	}
	wp_reset_query();

	echo paginate_links( array(
		'total' => $post_format_query->max_num_pages,
		'current' => $paged,
		'prev_text' => __('<< Old Post', 'woocom'),
		'next_text' => __('New Post >>', 'woocom'),
	) );

	echo '<hr/>';

	echo '<h2>WP Query - Meta Key Value</h2>';
	// WP_Query #5
	$post_format_query = new WP_Query( array(
		'posts_per_page' => $posts_per_page,
		'paged'          => $paged,
		// single meta key value query
		// 'meta_key'		 => 'featured',
		// 'meta_value'	 => 1,

		// relational meta query
		'meta_query' 	 => array(
			'relation' => 'AND',
			array(
				'key' => 'featured',
				'value' => '1', 
				'compare' => '='
			),
			array(
				'key' => 'homepage',
				'value' => '1', 
				'compare' => '='
			),
		)
	));

	while ( $post_format_query->have_posts() ) {
		$post_format_query->the_post();
		?>
		<h4>
			<a href="<?php the_permalink() ?>">
				<?php the_title() ?>
			</a>
		</h4>
		<?php
	}
	wp_reset_query();

	echo paginate_links( array(
		'total' => $post_format_query->max_num_pages,
		'current' => $paged,
		'prev_text' => __('<< Old Post', 'woocom'),
		'next_text' => __('New Post >>', 'woocom'),
	) );

	get_footer();