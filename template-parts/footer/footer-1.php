<footer id="colophon" class="footer-area bg-gray pt-100 pb-70 footer-layout-1">
    <?php do_action( 'woocom_before_footer_container' );?>

    <?php
        /**
         * Render Footer Widgets.
         *
         * @hooked woocom_render_footer_top 30
         * @hooked woocom_render_footer_main 50
         * @hooked woocom_render_footer_copyright 210
         */
        do_action( 'woocom_footer_contents' );

        /**
         * Render Footer Copyright Section.
         */
        do_action( 'woocom_footer_copyright' );
    ?>
    <button class="scroll-top"><i class="bi-arrow-up"></i></button>
<?php do_action( 'woocom_after_footer_container' );?>
</footer>