<?php

if (!defined('ABSPATH')) {
  exit('Direct script access denied.');
}

?>
<div class="woocom-page-title-wrapper woocom-main-banner-area" style="--woocomBannerBGColor: <?php echo get_theme_mod( 'woocom_default_banner_bg' ); ?>; --woocomBannerTextColor: <?php echo get_theme_mod( 'woocom_default_banner_text_color' ); ?>">
  <div class="woocom-page-title">
    <div class="woocom-page-title-content">
      <?php
      if (is_search()) {
        if (isset($_GET['s'])) { ?>
          <h1><?php echo esc_html__('Search for: ', 'cartsy-lite') . esc_html(sanitize_text_field($_GET['s'])); ?></h1>
        <?php } ?>
      <?php } else {
        if (!empty($post->post_title)) { ?>
          <h1><?php the_title(); ?></h1>
        <?php }
      }
      ?>
    </div>
  </div>
</div>