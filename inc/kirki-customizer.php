<?php

//General configuration for Kirki
Kirki::add_config( 'woocom_config_id', [
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
] );

add_filter( 'kirki_telemetry', '__return_false' );


// Support Area sections
Kirki::add_section( 'woocom_section_id', [
    'priority'    => 4,
    'title'       => esc_html__( 'Support Area', 'woocom' ),
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'repeater',
	'settings'    => 'woocom_support_title',
	'label'       => __( 'Support Title', 'woocom' ),
	'section'     => 'woocom_section_id',
    'default'     => 'Free Shipping',
	'row_label' => [
		'type'  => 'text',
		'value' => esc_html__( 'Support Item', 'kirki' ),
	],
	'button_label' => esc_html__('Add New Item', 'kirki' ),
	'settings'     => 'woocom_support_items',
	'fields' => [
		'woocom_support_item_icon' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Support Icon', 'kirki' ),
		],
		'woocom_support_item_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Support Title', 'kirki' ),
			'default'     => esc_html__('Free Shipping', 'woocom'),
		],
		'woocom_support_item_subtitle' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Support Title', 'kirki' ),
			'default'     => esc_html__('Free shipping on all order', 'woocom'),
		],
	]
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'select',
	'settings'    => 'woocom_support_items_per_row',
	'label'       => __( 'Columns Per Row', 'woocom' ),
	'section'     => 'woocom_section_id',
    'default'     => '3',
	'choices'		=> [
		'6' => esc_html__('Two Columns', 'woocom'),
		'4' => esc_html__('Three Columns', 'woocom'),
		'3' => esc_html__('Four Columns', 'woocom'),
	],
] );

Kirki::add_field( 'woocom_config_id', [ 
	'type'        => 'typography',
	'settings'    => 'woocom_support_title_typography',
	'label'       => esc_html__( 'Title Typography', 'woocom' ),
	'section'     => 'woocom_section_id',
	'default'     => [
		'font-family'    => 'Noto Serif',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.support-content h5',
		],
    ],
] );

Kirki::add_field( 'woocom_config_id', [ 
	'type'        => 'typography',
	'settings'    => 'woocom_support_subtitle_typography',
	'label'       => esc_html__( 'Sub Title Typography', 'woocom' ),
	'section'     => 'woocom_section_id',
	'default'     => [
		'font-family'    => 'Noto Serif',
		'variant'        => '400',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.support-content p',
		],
    ],
] );

Kirki::add_field( 'woocom_config_id', [ 
	'type'        => 'background',
	'settings'    => 'woocom_support_bg',
	'label'       => esc_html__( 'Support Area BG Color', 'woocom' ),
	'section'     => 'woocom_section_id',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
	],
	
	
	
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.support-area',
		],
    ],
] );

// Discount section
Kirki::add_section( 'woocom_discount_section_id', [
    'priority'    => 4,
    'title'       => esc_html__( 'Discount section', 'woocom' ),
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'switch',
	'settings'    => 'wc_show_discount',
	'label'       => __( 'Toggle Discount Section', 'woocom' ),
	'section'     => 'woocom_discount_section_id',
	'default'     => 'on',
	'transport' => 'auto',
	'choices'       => [
		'on'  => esc_html__( 'Enable', 'kirki' ),
		'off' => esc_html__( 'Disable', 'kirki' )
	],
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'image',
	'settings'    => 'wc_discount_image',
	'label'       => __( 'Set Discount Image', 'woocom' ),
	'section'     => 'woocom_discount_section_id',
	'default'     => get_template_directory_uri() . '/assets/images/sell-banner-2.png',
	'transport' => 'auto',
	'active_callback' => [
		[
			'setting'  => 'wc_show_discount',
			'operator' => '===',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'color',
	'settings'    => 'wc_discount_overlay_color',
	'label'       => __( 'Banner Overlay', 'woocom' ),
	'section'     => 'woocom_discount_section_id',
	'default'     => '#fff',
	'transport' => 'auto',
	'output' => [
		[
			'element' => '.wc__discount_overlay',
			'property' => 'background-color',
		],
	],
	'active_callback' => [
		[
			'setting'  => 'wc_show_discount',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'background',
	'settings'    => 'wc_discount_bg_image',
	'label'       => __( 'Set Background Image', 'woocom' ),
	'section'     => 'woocom_discount_section_id',
	'default'     => [
		'background-color'      => 'transparent',
		'background-image'      => get_template_directory_uri() . '/assets/images/sell-banner-2.png',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport' => 'auto',
	'output' => [
		//['element' => '.wc__discount_wrapper .wc__discount_inner']
	],
	'active_callback' => [
		[
			'setting'  => 'wc_show_discount',
			'operator' => '==',
			'value'    => true,
		]
	],
] );

Kirki::add_field( 'woocom_config_id', [
	'type'        => 'text',
	'settings'    => 'wc_discount_title',
	'label'       => __( 'Discount Title', 'woocom' ),
	'section'     => 'woocom_discount_section_id',
    'default'     => __('Up To 60% Off Holiday Bit', 'woocom'),
	'active_callback' => [
		[
			'setting'  => 'wc_show_discount',
			'operator' => '==',
			'value'    => true,
		]
	],
] );