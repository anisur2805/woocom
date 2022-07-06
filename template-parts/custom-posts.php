<section class="about-services py-5 bg-gray">
    <div class="container">
        <?php 
            $categories = get_categories(); 
            $post_types = get_post_types();
            unset( $post_types['nav_menu_item'] );
            unset( $post_types['nav_menu_item'] );
            unset( $post_types['revision'] );
            unset( $post_types['attachment'] );
            // print_r( $post_types );
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