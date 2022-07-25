<?php
/**
 * Default Hooks.
 */

 /**
  * Header Hooks
  */

add_action('woocom_header', 'woocom_header_site_branding', 0);
add_action('woocom_header', 'woocom_header_menu', 5);
add_action('woocom_header', 'woocom_header_menu_right', 10);


/**
 * ----------------------------------------------------------------------
 * Declaration of all footer hooks
 * ----------------------------------------------------------------------*/
add_action( 'woocom_ig_feed', 'woocom_render_ig_feed' );
add_action( 'woocom_footer_contents', 'woocom_render_footer_main', 50 );
add_action( 'woocom_social_icons', 'woocom_render_social_icons' );
add_action( 'woocom_footer_copyright', 'woocom_render_footer_copyright', 200 );
