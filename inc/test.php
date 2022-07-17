<?php
	//hook into the init action and call create_book_taxonomies when it fires
	add_action( 'init', 'create_topics_hierarchical_taxonomy', 0 );

	//create a custom taxonomy name it topics for your posts
	function create_topics_hierarchical_taxonomy() {

		// Add new taxonomy, make it hierarchical like categories

		//first do the translations part for GUI
		$labels = array(
			'name'              => _x( 'Topics', 'taxonomy general name' ),
			'singular_name'     => _x( 'Topic', 'taxonomy singular name' ),
			'search_items'      => __( 'Search Topics' ),
			'all_items'         => __( 'All Topics' ),
			'parent_item'       => __( 'Parent Topic' ),
			'parent_item_colon' => __( 'Parent Topic:' ),
			'edit_item'         => __( 'Edit Topic' ),
			'update_item'       => __( 'Update Topic' ),
			'add_new_item'      => __( 'Add New Topic' ),
			'new_item_name'     => __( 'New Topic Name' ),
			'menu_name'         => __( 'Topics' ),
		);

		// Now register the taxonomy
		register_taxonomy( 'topics', array( 'post' ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'topics' ),
			'with_front'        => false, // Don't display the category base before "/locations/"
		) );

	}

	//
	abstract class WPOrg_Meta_Box {
 
 
		/**
		 * Set up and add the meta box.
		 */
		public static function add() {
			$screens = [ 'post', 'wporg_cpt' ];
			foreach ( $screens as $screen ) {
				add_meta_box(
					'wporg_box_id',
					'Custom Meta Box AJAX Handler',
					[ self::class, 'html' ],
					$screen
				);
			}
		}
	 
	 
		/**
		 * Save the meta box selections.
		 *
		 * @param int $post_id  The post ID.
		 */
		public static function save( int $post_id ) {
			if( !isset( $_POST['woocom_post_field_nonce'])) return;
			if( !wp_verify_nonce($_POST['woocom_post_field_nonce'])) return;
			if( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

			if ( array_key_exists( 'wporg_field', $_POST ) ) {
				$wporg_field = sanitize_title( $_POST['wporg_field']);
				update_post_meta(
					$post_id,
					'wporg_field',
					$wporg_field
				);
			}
		}
	 
	 
		/**
		 * Display the meta box HTML to the user.
		 *
		 * @param \WP_Post $post   Post object.
		 */
		public static function html( $post ) {
			wp_nonce_field( 'woocom_post_field_nonce', 'woocom_post_field_nonce' );
			$value = get_post_meta( $post->ID, 'wporg_field', true );
			?>
			<label for="wporg_field">Description for this field</label>
			<select name="wporg_field" id="wporg_field" class="postbox">
				<option value="">Select something...</option>
				<option value="something" <?php selected( $value, 'something' ); ?>>Something</option>
				<option value="else" <?php selected( $value, 'else' ); ?>>Else</option>
			</select>
			<?php
		}
	}
	 
	add_action( 'add_meta_boxes', [ 'WPOrg_Meta_Box', 'add' ] );
	add_action( 'save_post', [ 'WPOrg_Meta_Box', 'save' ] );

	  // The piece after `wp_ajax_`  matches the action argument being sent in the POST request.
add_action( 'wp_ajax_wporg_ajax_change', 'my_ajax_handler' );
  
/**
 * Handles my AJAX request.
 */
function my_ajax_handler() {
    // Handle the ajax request here
    if ( array_key_exists( 'wporg_field_value', $_POST ) ) {
        $post_id = (int) $_POST['post_ID'];
        if ( current_user_can( 'edit_post', $post_id ) ) {
            update_post_meta(
                $post_id,
                'wporg_field',
                $_POST['wporg_field_value']
            );
        }
    }
  
    wp_die(); 
  }