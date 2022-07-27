<?php
/**
 * Default Hooks.
 */

 /**
  * Header Hooks
  */

add_action('woocom_header_top', 'woocom_header_topbar', -1);

add_action('woocom_header', 'woocom_header_wrapper_start', 0);
add_action('woocom_header', 'woocom_header_site_branding', 5);
add_action('woocom_header', 'woocom_header_menu', 10);
add_action('woocom_header', 'woocom_header_menu_right', 15);
add_action('woocom_header', 'woocom_header_wrapper_end', 20);


/**
 * ----------------------------------------------------------------------
 * Declaration of all footer hooks
 * ----------------------------------------------------------------------*/
add_action( 'woocom_ig_feed', 'woocom_render_ig_feed' );
add_action( 'woocom_footer_contents', 'woocom_render_footer_main', 50 );
add_action( 'woocom_social_icons', 'woocom_render_social_icons' );
add_action( 'woocom_footer_copyright', 'woocom_render_footer_copyright', 200 );
