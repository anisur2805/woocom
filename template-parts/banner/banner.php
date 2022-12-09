<?php
die("hla");

if (!defined('ABSPATH')) {
  exit('Direct script access denied.');
}
if( is_front_page() ) return;

?>
<div class="woocom-page-title-wrapper woocom-main-banner-area" style="--woocomBannerBGColor: <?php echo get_theme_mod( 'woocom_default_banner_bg' ); ?>; --woocomBannerTextColor: <?php echo get_theme_mod( 'woocom_default_banner_text_color' ); ?>">
  <div class="woocom-page-title">
    <div class="woocom-page-title-content text-center">
      <?php
      if (is_search()) {
        if (isset($_GET['s'])) { ?>
          <h1><?php echo esc_html__('Search for: ', 'woocom') . esc_html(sanitize_text_field($_GET['s'])); ?></h1>
        <?php } ?>
      <?php } else  if ( is_shop() && class_exists( 'WooCommerce' ) ) { ?>
        <h1>Hello world, Man!!!!!!!</h1>
        <h1><?php woocommerce_page_title(); ?></h1>
      <?php
      } else {
        if (!empty($post->post_title)) { ?>
          <h1><?php the_title(); ?></h1>
        <?php }
      }

      echo get_breadcrumb(); 
      ?>
    </div>
  </div>
</div>