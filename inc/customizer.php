<?php
/**
 * woocom Theme Customizer
 *
 * @package woocom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customizer Theme Customizer object.
 */
function woocom_customize_register( $wp_customizer ) {
	$wp_customizer->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customizer->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customizer->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customizer->selective_refresh ) ) {
		$wp_customizer->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'woocom_customize_partial_blogname',
			)
		);
		$wp_customizer->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'woocom_customize_partial_blogdescription',
			)
		);
	}
}

add_action( 'customize_register', 'woocom_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function woocom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function woocom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function woocom_customize_preview_js() {
	wp_enqueue_script( 'woocom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}

add_action( 'customize_preview_init', 'woocom_customize_preview_js' );

/**
 * Footer Copyright Customizer
 *
 * @param [type] $wp_customizer
 * @return void
 */
function woocom_customize( $wp_customizer ) {

	/*
	 *   Footer Copyright
	 */
	// $wp_customizer->add_section( 'woocom_footer_copyright_section', array(
	// 	'title'       => __( 'Copyright Text', 'woocom' ),
	// 	'description' => __( 'Copyright Text', 'woocom' ),
	// 	'priority'    => 30,
	// ) );

	// $wp_customizer->add_setting( 'woocom_copyright', array(
	// 	'sanitize_callback' => 'wp_filter_nohtml_kses',
	// 	'type'              => 'theme_mod',
	// 	'default'           => '',
	// 	'transport'         => 'refresh',
	// ) );

	// $wp_customizer->add_control( 'woocom_copyright', array(
	// 	'label'    => __( 'Copyright Text', 'woocom' ),
	// 	'section'  => 'woocom_footer_copyright_section',
	// 	'settings' => 'woocom_copyright',
	// 	'type'     => 'textarea',
	// ) );

	/**
	 * Hero Slider
	 * Logo, Title, Button Text & Url
	 */
	$wp_customizer->add_section( 'woocom_hero_slider', array(
		'title'    => __( 'Home Page Hero Slider', 'woocom' ),
		'priority' => 20,
	) );

	$wp_customizer->add_setting( 'woocom_display_hero_slider', array(
		'default' => 1,
	) );

	$wp_customizer->add_control( 'woocom_display_hero_slider_ctrl', array(
		'label'    => __( 'Display hero Slider', 'woocom' ),
		'section'  => 'woocom_hero_slider',
		'settings' => 'woocom_display_hero_slider',
		'type'     => 'checkbox',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_bg_color', array(
		'default'   => '#f5e5d7',
		'transport' => 'postMessage',
	) );

	$wp_customizer->add_control( new WP_Customize_Color_Control( $wp_customizer, '$woocom_hero_slider_bg_color_ctrl', array(
		'label'           => __( 'Hero Slider Bg Color', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'settings'        => 'woocom_hero_slider_bg_color',
		'active_callback' => 'is_front_page',
	) ) );

	// Field Group 1 - Home Page Hero Slider
	$wp_customizer->add_setting( 'woocom_hero_logo1', array(
		'type'              => 'theme_mod',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_logo1', array(
		'label'           => __( 'Home Page Hero Logo', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'mime_type'       => 'image',
		'active_callback' => 'is_front_page',
	) ) );

	$wp_customizer->add_setting( 'woocom_hero_feature_img1', array(
		// 'type'              => 'theme_mod',
		// 'default'           => 'Upload Image',
		'transport' => 'refresh',
		// 'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_feature_img01',
		array(
			'label'           => __( 'Home Page Hero Image', 'woocom' ),
			'section'         => 'woocom_hero_slider',
			'settings'        => 'woocom_hero_feature_img1',
			'mime_type'       => 'image',
			'active_callback' => 'is_front_page',
		)
	) );

	$wp_customizer->add_setting( 'woocom_hero_title1', array(
		'type'              => 'theme_mod',
		'default'           => __( 'WooCom Hero Title', 'woocom' ),
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	) );

	$wp_customizer->add_control( 'woocom_hero_title1', array(
		'label'           => __( 'Hero Slider Title', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_text1', array(
		'type'              => 'theme_mod',
		'default'           => __( 'Learn More', 'woocom' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_text1', array(
		'label'           => __( 'Hero Slider Button Text', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_url1', array(
		'type'              => 'theme_mod',
		'default'           => '/learn-more',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_url1', array(
		'label'           => __( 'Hero Slider Button Url', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'url',
		'active_callback' => 'is_front_page',
	) );

	// Field Group 2 - Home Page Hero Slider
	$wp_customizer->add_setting( 'woocom_hero_logo2', array(
		'type'              => 'theme_mod',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_logo2', array(
		'label'           => __( 'Home Page Hero Logo', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'mime_type'       => 'image',
		'active_callback' => 'is_front_page',
	) ) );

	$wp_customizer->add_setting( 'woocom_hero_feature_img2', array(
		'type'              => 'theme_mod',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_feature_img2', array(
		'label'           => __( 'Home Page Hero Image', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'mime_type'       => 'image',
		'active_callback' => 'is_front_page',
	) ) );

	$wp_customizer->add_setting( 'woocom_hero_title2', array(
		'type'              => 'theme_mod',
		'default'           => 'WooCom Hero Title 2',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customizer->add_control( 'woocom_hero_title2', array(
		'label'           => __( 'Hero Slider Title', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_text2', array(
		'type'              => 'theme_mod',
		'default'           => __( 'Read More', 'woocom' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_text2', array(
		'label'           => __( 'Hero Slider Button Text', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_url2', array(
		'type'              => 'theme_mod',
		'default'           => '/read-more',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_url2', array(
		'label'           => __( 'Hero Slider Button Url Test', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'url',
		'active_callback' => 'is_front_page',
		'allow_addition'  => true,
	) );

	// Field Group 3 - Home Page Hero Slider
	$wp_customizer->add_setting( 'woocom_hero_logo3', array(
		'type'              => 'theme_mod',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_logo3', array(
		'label'           => __( 'Home Page Hero Logo 0001', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'mime_type'       => 'image',
		'active_callback' => 'is_front_page',
	) ) );

	$wp_customizer->add_setting( 'woocom_hero_feature_img3', array(
		'type'              => 'theme_mod',
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customizer->add_control( new WP_Customize_Media_Control( $wp_customizer, 'woocom_hero_feature_img3', array(
		'label'           => __( 'Home Page Hero Image', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'mime_type'       => 'image',
		'active_callback' => 'is_front_page',
	) ) );

	$wp_customizer->add_setting( 'woocom_hero_title3', array(
		'type'              => 'theme_mod',
		'default'           => 'WooCom Hero Title 3',
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customizer->add_control( 'woocom_hero_title3', array(
		'label'           => __( 'Hero Slider Title', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_text3', array(
		'type'              => 'theme_mod',
		'default'           => __( 'Shop Now', 'woocom' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_text3', array(
		'label'           => __( 'Hero Slider Button Text', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'text',
		'active_callback' => 'is_front_page',
	) );

	$wp_customizer->add_setting( 'woocom_hero_slider_button_url3', array(
		'type'              => 'theme_mod',
		'default'           => '/shop',
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customizer->add_control( 'woocom_hero_slider_button_url3', array(
		'label'           => __( 'Hero Slider Button Url', 'woocom' ),
		'section'         => 'woocom_hero_slider',
		'type'            => 'url',
		'active_callback' => 'is_front_page',
	) );

	/**
	 * WooCommerce Products
	 */
	$wp_customizer->add_section( 'woocom_woocommerce_product_section', array(
		'title'       => __( 'WooCommerce Products', 'woocom' ),
		'description' => __( 'WooCommerce Products', 'woocom' ),
		'priority'    => 32,
	) );

	//select sanitization function
	function woocom_new_arrivals_sanitize_select( $input, $setting ) {

		//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
		$input = sanitize_key( $input );

		//get the list of possible select options
		$choices = $setting->manager->get_control( $setting->id )->choices;

		//return input if valid or return default option
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

	$wp_customizer->add_setting( 'woocom_new_arrivals_columns', array(
		'sanitize_callback' => 'woocom_new_arrivals_sanitize_select', //removes all HTML from content
		'type'              => 'theme_mod',
		'default'           => '',
		'transport'         => 'refresh',
	) );

	$wp_customizer->add_control( 'woocom_new_arrivals_columns', array(
		'label'    => __( 'WooCommerce New Arrivals Product per Columns', 'woocom' ),
		'section'  => 'woocom_woocommerce_product_section',
		'settings' => 'woocom_new_arrivals_columns',
		'type'     => 'select',
		'choices'  => array(
			''  => __( 'Please select per columns', 'woocom' ),
			'2' => __( 'Two Columns', 'woocom' ),
			'3' => __( 'Three Columns', 'woocom' ),
			'4' => __( 'Four Columns', 'woocom' ),
		),
	) );

	/*
	 *  Selective Refresh
	 */
	$wp_customizer->add_section( 'woocom_about_section', array(
		'title'    => __( 'About Services', 'woocom' ),
		'priority' => 30,
	) );

	$wp_customizer->add_setting( 'woocom_about_title', array(
		'type'      => 'theme_mod',
		'default'   => __( 'Hello World', 'woocom' ),
		'transport' => 'postMessage',
	) );

	$wp_customizer->add_control( 'woocom_about_title', array(
		'label'   => __( 'Title', 'woocom' ),
		'section' => 'woocom_about_section',
		'type'    => 'text',
	) );

	$wp_customizer->add_setting( 'woocom_about_desc', array(
		'type'      => 'theme_mod',
		'default'   => __( 'Hello World', 'woocom' ),
		'transport' => 'postMessage',
	) );

	$wp_customizer->add_control( 'woocom_about_desc', array(
		'label'   => __( 'Description', 'woocom' ),
		'section' => 'woocom_about_section',
		'type'    => 'textarea',
	) );

	$wp_customizer->add_setting( 'woocom_about_align', array(
		'type'      => 'theme_mod',
		'default'   => 'center',
		// 'transport' => 'postMessage',
	) );

	$wp_customizer->add_control( 'woocom_about_align', array(
		'label'   => __( 'Content Alignment', 'woocom' ),
		'section' => 'woocom_about_section',
		'type'    => 'select',
		'choices' => array(
			'left'   => __( 'Left', 'woocom' ),
			'center' => __( 'Center', 'woocom' ),
			'right'  => __( 'Right', 'woocom' ),
		),
	) );

	$wp_customizer->selective_refresh->add_partial( 'woocom_about_title', array(
		'selector'        => '#wc-about-title',
		'settings'        => 'woocom_about_title',
		'render_callback' => function () {
			return get_theme_mod( 'woocom_about_title' );
		},
	) );

	$wp_customizer->selective_refresh->add_partial( 'woocom_about_desc', array(
		'selector'        => '#wc-about-desc',
		'settings'        => 'woocom_about_desc',
		'render_callback' => function () {
			return apply_filters( 'the_content', get_theme_mod( 'woocom_about_desc' ) );
		},
	) );
	
	$wp_customizer->add_section( 'woocom_image_upload', array(
		'title'       => __( 'Image and Upload', 'woocom' ),
		'description' => __( 'Image and Upload', 'woocom' ),
		'priority'    => 30,
	) );
	
	$wp_customizer->add_setting( 'woocom_image_upload', array(
		'type'      => 'theme_mod',
		'default'   => __( 'Upload an Image', 'woocom' ),
		// 'transport' => 'postMessage',
	) );

	$wp_customizer->add_control( new WP_Customize_Image_Control( $wp_customizer, 'woocom_image_upload', array(
		'label'   => __( 'Add Logo', 'woocom' ),
		'section' => 'woocom_image_upload',
	) ) );

}

add_action( 'customize_register', 'woocom_customize' );

// function is_front_page() {
// 	if ( 1 == get_theme_mod( 'woocom_display_hero_slider' ) ) {
// 		return true;
// 	}
// 	return false;
// }
