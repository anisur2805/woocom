<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */
if ( class_exists( 'woocommerce' ) ):
    if (is_shop() && !is_active_sidebar('shop-sidebar')) {
        return;
    } else if (!is_shop() && !is_active_sidebar('sidebar-1')) {
        return;
    }
endif;

    if (!is_active_sidebar('sidebar-1')) {
        return;
    }
?>

<aside id="secondary" class="widget-area">
    <?php
        if (class_exists('woocommerce')) :
            if (is_shop()) {
                dynamic_sidebar('shop-sidebar');
            } else {
                dynamic_sidebar('sidebar-1');
            }
        endif;
    ?>
</aside><!-- #secondary -->