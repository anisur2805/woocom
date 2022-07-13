<section class="ajax-load-more-post-category py-5 bg-gray ajax-load-post">
    <div class="container">
        <?php 
        printf( '<h2 class="ajax-post-section-title">%s</h2>', __( 'Load Ajax Posts Based on Category', 'woocom' ) );

        $categories = get_categories(); 
        $post_types = get_post_types();
        unset( $post_types['nav_menu_item'] );
        unset( $post_types['nav_menu_item'] );
        unset( $post_types['revision'] );
        unset( $post_types['attachment'] );
        ?>
        <ul class="cat-list">
            <li><a class="cat-list_item active" href="#!" data-slug="" data-post="">All projects</a></li>
            <?php foreach ($categories as $category) : ?>
                <li>
                    <a class="cat-list_item" href="#!" data-slug="<?php echo $category->slug; ?>" data-post="post">
                        <?php echo $category->name; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="project-tiles"></div>

    </div>
</section>