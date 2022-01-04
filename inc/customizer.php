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
    
    /*
    *   Footer Copyright
    */
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
    
    /**
     *  Hero Slider
     */
    $wp_customize->add_section('woocom_hero_slider', array(
		'title'      => esc_html__('Home Page Hero Slider', 'woocom'),
		'description'      => esc_html__('Hero Slider Settings', 'woocom'),
		'priority'   => 20,
	));
    
    // Field Group 1 - Home Page Hero Slider 
	$wp_customize->add_setting('woocom_hero_logo1', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_logo1', array(
		'label' => __( 'Home Page Hero Logo', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );
	
	$wp_customize->add_setting('woocom_hero_feature_img1', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_feature_img1', array(
		'label' => __( 'Home Page Hero Image', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );
	
	$wp_customize->add_setting('woocom_hero_title1', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_title1', array(
		'label'        => esc_html__('Hero Slider Title 1', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_text1', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_text1', array(
		'label'        => esc_html__('Hero Slider Button Text', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_url1', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_url1', array(
		'label'        => esc_html__('Hero Slider Button Url', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'url',
	) );
	
	// Field Group 2 - Home Page Hero Slider 
	$wp_customize->add_setting('woocom_hero_logo2', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_logo2', array(
		'label' => __( 'Home Page Hero Logo', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting('woocom_hero_feature_img2', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_feature_img2', array(
		'label' => __( 'Home Page Hero Image', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );
		
	$wp_customize->add_setting('woocom_hero_title2', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_title2', array(
		'label'        => esc_html__('Hero Slider Title', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_text2', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_text2', array(
		'label'        => esc_html__('Hero Slider Button Text', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_url2', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_url2', array(
		'label'        => esc_html__('Hero Slider Button Url Test', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'url',
		'allow_addition' => true,
	) );
	
	// Field Group 3 - Home Page Hero Slider 
	$wp_customize->add_setting('woocom_hero_logo3', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_logo3', array(
		'label' => __( 'Home Page Hero Logo', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );

	$wp_customize->add_setting('woocom_hero_feature_img3', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'woocom_hero_feature_img3', array(
		'label' => __( 'Home Page Hero Image', 'woocom' ),
		'section' => 'woocom_hero_slider',
		'mime_type' => 'image',
	) ) );
		
	$wp_customize->add_setting('woocom_hero_title3', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_title3', array(
		'label'        => esc_html__('Hero Slider Title', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_text3', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_text3', array(
		'label'        => esc_html__('Hero Slider Button Text', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'text',
	) );
    
	$wp_customize->add_setting('woocom_hero_slider_button_url3', array(
		'type'			  => 'theme_mod',
		'default'     => '',
		'sanitize_callback' => 'esc_url_raw',
	));
	
	$wp_customize->add_control(  'woocom_hero_slider_button_url3', array(
		'label'        => esc_html__('Hero Slider Button Url', 'woocom'),
		'section'    => 'woocom_hero_slider',
		'type'			=> 'url',
	) );
    
    
    
    /**
     * WooCommerce Products
     */
    $wp_customize->add_section('woocom_woocommerce_product_section', array(
		'title'      => esc_html__('WooCommerce Products', 'woocom'),
		'description'      => esc_html__('WooCommerce Products', 'woocom'),
		'priority'   => 32,
	));
    
    //select sanitization function
    function woocom_new_arrivals_sanitize_select( $input, $setting ){
        
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);

        //get the list of possible select options 
        $choices = $setting->manager->get_control( $setting->id )->choices;
                            
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
            
    }

	$wp_customize->add_setting('woocom_new_arrivals_columns', array(
		'sanitize_callback' => 'woocom_new_arrivals_sanitize_select', //removes all HTML from content
		'type'			  => 'theme_mod',
		'default'     => '',
		'transport'   => 'refresh',
	));
	
	$wp_customize->add_control(  'woocom_new_arrivals_columns', array(
		'label'        => esc_html__('WooCommerce New Arrivals Product per Columns', 'woocom'),
		'section'    => 'woocom_woocommerce_product_section',
		'settings'   => 'woocom_new_arrivals_columns',
		'type'			=> 'select',
        'choices' => array(
            '' => esc_html__('Please select per columns','woocom'),
            '2' => esc_html__('Two Columns','woocom'),
            '3' => esc_html__('Three Columns','woocom'),
            '4' => esc_html__('Four Columns','woocom'),
        )
	) );
}

add_action('customize_register', 'woocom_customize');
