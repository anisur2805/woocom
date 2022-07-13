<?php

function woocom_pl_customize( $wp_customizer ) {
	/*
	 * Partners Logo
	 */
	$pl_section_id = 'woocom_pl_section';
	$wp_customizer->add_section( 
		$pl_section_id, 
		array(
			'title'       => __( 'Partners Logo', 'woocom' ),
			'description' => __( 'Upload Logos', 'woocom' ),
		) 
	);

	$logo_names = [
		'Logo One' => 'logo_one',
		'Logo Two' => 'logo_two',
		'Logo Three' => 'logo_three',
		'logo Four' => 'logo_four',
		'logo Five' => 'logo_five',
		'logo Six' => 'logo_six',
	];

	foreach( $logo_names as $logo_label => $logo_name ) {
		$setting_id = sprintf('woocom_%s', $logo_name );
		$wp_customizer->add_setting( $setting_id );

		$wp_customizer->add_control(
		new \WP_Customize_Image_Control(
			$wp_customizer,
			$setting_id,
			[
				'label'    => __( $logo_label, 'woocom' ),
				'section'  => $pl_section_id,
				'settings' => $setting_id,
			]
		) );
	}

	// $wp_customizer->add_setting( 'woocom_pl', array(
	// 	'sanitize_callback' => 'wp_filter_nohtml_kses', //removes all HTML from content
	// 	'type'              => 'theme_mod',
	// 	'default'           => '',
	// 	'transport'         => 'refresh',
	// ) );



}

add_action( 'customize_register', 'woocom_pl_customize' );