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
	abstract class WooCom_Meta_Box {
		public static function add() {
			$screens = ['post'];
			foreach ( $screens as $screen ) {
				add_meta_box( 'woocom_mb_id', 'WooCom Metabox', [self::class, 'html'], $screen );
			}
		}

		public static function save( int $post_id ) {
			if ( array_key_exists( 'woocom_filed', $_POST ) ) {
				update_post_meta( $post_id, '_woocom_filed_key', $_POST['woocom_filed'] );
			}
		}

		public static function html( $post ) {
			$value = get_post_meta( $post->ID, '_woocom_filed_key', true );
			?>
			<label for="woocom_filed">Description: </label>
			<select name="woocom_filed" id="woocom_filed">
				<option value="">-Select Option-</option>
				<option value="something" <?php selected( $value, 'something' )?>>Something</option>
				<option value="else" <?php selected( $value, 'else' )?>>Else</option>
			</select>
			<?php
		}
	}

add_action( 'add_meta_boxes', ['WooCom_Meta_Box', 'add'] );
add_action( 'save_post', ['WooCom_Meta_Box', 'save'] );