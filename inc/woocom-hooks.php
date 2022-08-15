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
 * General
 *
 * @see  woocom_get_sidebar()
 * 
 */
add_action('woocom_sidebar', 'woocom_get_sidebar', 10);

/**
 * Page
 *
 * @see  woocom_page_header()
 * @see  woocom_page_content()
 * 
 */
add_action('woocom_page', 'woocom_page_header', 10);
add_action('woocom_page', 'woocom_page_content', 20);
// add_action('woocom_page', 'woocom_edit_post_link', 30);


/**
 * Before content
 *
 * @see  template-functions.php
 * @see woocom_banner()
 */
add_action('woocom_before_content', 'woocom_banner', 5);

/**
 * ----------------------------------------------------------------------
 * Declaration of all footer hooks
 * ----------------------------------------------------------------------*/
add_action( 'woocom_ig_feed', 'woocom_render_ig_feed' );
add_action( 'woocom_footer_contents', 'woocom_render_footer_main', 50 );
add_action( 'woocom_social_icons', 'woocom_render_social_icons' );
add_action( 'woocom_footer_copyright', 'woocom_render_footer_copyright', 200 );
