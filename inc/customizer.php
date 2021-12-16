<?php
/**
 * woocom Theme Customizer
 *
 * @package woocom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function woocom_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'woocom_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'woocom_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'woocom_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function woocom_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function woocom_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function woocom_customize_preview_js()
{
    wp_enqueue_script('woocom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true);
}
add_action('customize_preview_init', 'woocom_customize_preview_js');

/**
 * Footer Copyright Customizer
 *
 * @param [type] $wp_customize
 * @return void
 */
function woocom_customize( $wp_customize ) {
	$wp_customize->add_section('woocom_footer_copyright_section', array(
		'title'      => esc_html__('Footer Copyright Text', 'woocom'),
		'description'      => esc_html__('Footer Copyright Text', 'woocom'),
		'priority'   => 30,
	));

	$wp_customize->add_setting('woocom_copyright', array(
		'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
		'type'			  => 'theme_mod',
		'default'     => '',
		'transport'   => 'refresh',
	));
	
	$wp_customize->add_control(  'woocom_copyright', array(
		'label'        => esc_html__('Copyright Text', 'woocom'),
		'section'    => 'woocom_footer_copyright_section',
		'settings'   => 'woocom_copyright',
		'type'			=> 'textarea',
	) );

}

add_action('customize_register', 'woocom_customize');
