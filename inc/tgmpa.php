<?php 

require_once get_theme_file_path('/lib/class-tgm-plugin-activation.php');

function woocom_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		
		array(
			'name'      => 'YITH WooCommerce Wishlist',
			'slug'      => 'yith-woocommerce-wishlist',
			'required'  => true,
		),	
		
		array(
			'name'      => 'YITH WooCommerce Compare',
			'slug'      => 'yith-woocommerce-compare',
			'required'  => true,
		),
		
		array(
			'name'      => 'Show Current Template',
			'slug'      => 'show-current-template',
			'required'  => false,
		),
		
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => true,
		),
		
		array(
			'name'      => 'Classic Widgets',
			'slug'      => 'classic-widgets',
			'required'  => false,
		),
		
		array(
			'name'      => 'Wpforms',
			'slug'      => 'wpforms-lite',
			'required'  => true,
		),	
		
		array(
			'name'      => 'Smash Balloon Social Photo Feed',
			'slug'      => 'instagram-feed',
			'required'  => true,
		),
		
		array(
			'name'      => 'CMB2 Attached Posts Field',
			'slug'      => 'cmb2-attached-posts',
			'required'  => true,
			'external_url'	=> 'https://github.com/CMB2/cmb2-attached-posts/archive/refs/heads/master.zip',
		),
		
		// <snip />
	);

	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			// <snip>...</snip>
			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		)
		*/
	);

	tgmpa( $plugins, $config );

}

add_action( 'tgmpa_register', 'woocom_register_required_plugins' );