<section class="about-services py-5 bg-gray" style="background-color: #ddd;">
    <div class="container ajax-load-post">
        <?php        
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
            $ajaxLoadMorePosts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3, 
                'paged' => $paged,
            ]);
            $response = '';
        
            if ($ajaxLoadMorePosts->have_posts()) {
                while ($ajaxLoadMorePosts->have_posts()) : $ajaxLoadMorePosts->the_post();
                    $response .= get_template_part('template-parts/ajax-load-more-post');
                endwhile;
            } else {
                $response = 'empty';
            }

            wp_reset_postdata();
        ?>
</div>
<div class="ajax-load-post-append"></div>

    <div class="btn_wrapper">
            <a href="#!" id="wc_load_more_btn">Load More</a>
        </div>

</section>