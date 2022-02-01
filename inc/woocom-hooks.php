<?php
/**
 * Default Hooks.
 */

/**
 * ----------------------------------------------------------------------
 * Declaration of all footer hooks
 * ----------------------------------------------------------------------*/
add_action( 'woocom_ig_feed', 'woocom_render_ig_feed' );
add_action( 'woocom_footer_contents', 'woocom_render_footer_main', 50 );
add_action( 'woocom_social_icons', 'woocom_render_social_icons' );
add_action( 'woocom_footer_copyright', 'woocom_render_footer_copyright', 200 );
