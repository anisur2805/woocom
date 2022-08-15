<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package woocom
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

		<div class="woocom-preloader">
			<img src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/grid.svg'; ?>" alt="<?php esc_attr__( bloginfo('name') ); ?>"/>
		</div>

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'woocom'); ?></a>
		
		<?php 
			/**
			 * Header Top Content
			 */
			do_action('woocom_header_top');

			do_action('woocom_before_header'); 

		?>
		<header id="masthead" class="site-header">
			<?php
			/**
			 * Functions hooked into woocom_header action
			 *
			 * @hooked woocom_header_wrapper_start                 - 0
			 * @hooked woocom_header_site_branding                 - 5
			 * @hooked woocom_header_menu                 - 10
			 * @hooked woocom_header_menu_right                 - 15
			 * @hooked woocom_header_wrapper_end                 - 20
			 */
			do_action('woocom_header');
			?>
		</header>
		<?php do_action('woocom_after_header'); ?>

		<div id="page" class="site">
			<?php 
			/**
			 * Functions hooked in to woocom_before_content
			 *
			 */
			do_action('woocom_before_content');
			do_action('woocom_content_top'); 
			?>