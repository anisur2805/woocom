<div class="inspirational_post_wrapper">
	<h2 class="text-center inspiration_title">Inspirational Posts</h2>
	<div class="container">
		<div class="row"> 
		
		<?php  
		
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
			);
			$the_query = new WP_Query( $args );
			
			// The Loop
			if ( $the_query->have_posts() ) { 
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					$tags = get_terms(array('taxonomy'=>'post_tag'));
					
			?>
			<div class="col-md-4 col-12">
					<div class="inspiration_item">
						<div class="inspiration_thumb-area">
							<a class="inspiration_thumb metro-scale-animation" href="<?php echo get_the_permalink(); ?>">
								<?php if(has_post_thumbnail()): the_post_thumbnail(); endif;?>
							</a>
							<div class="inspiration_date"><div class="inspiration_d1">23</div><div class="inspiration_d2">Dec</div></div>
						</div>
						<div class="inspiration_content">
							<div class="inspiration_cats">
							<?php
								if(is_array($tags )) {
									foreach ($tags as $tag) {
										printf('<a href="%s">%s</a>', get_term_link($tag->term_id), $tag->name);
									}
								}
							 ?> 
							
						 
						</div>
							<h3 class="inspiration_title"><a href="<?php echo get_the_permalink(); ?>"> <?php echo get_the_title(); ?></a></h3>
						</div>
					</div>
				</div>
				
				<?php 
				} 
			} else {
				echo "NO posts found";
			}
			/* Restore original Post Data */
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>