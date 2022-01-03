<?php

require_once get_template_directory() .'/lib/cs/codestar-framework.php';
require_once get_template_directory() . '/inc/cs.php';

define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false

 /**
  * woocom functions and definitions
  *
  * @link https://developer.wordpress.org/themes/basics/theme-functions/
  *
  * @package woocom
  */

 if ( !defined( '_S_VERSION' ) ) {
  // Replace the version number of the theme on each release.
  define( '_S_VERSION', '1.0.0' );
 }

 if ( !function_exists( 'woocom_setup' ) ):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function woocom_setup() {
   /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on woocom, use a find and replace
    * to change 'woocom' to the name of your theme in all the template files.
    */
   load_theme_textdomain( 'woocom', get_template_directory() . '/languages' );

   // Add default posts and comments RSS feed links to head.
   add_theme_support( 'automatic-feed-links' );

   /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
   add_theme_support( 'title-tag' );

   /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
   add_theme_support( 'post-thumbnails' );

   // This theme uses wp_nav_menu() in one location.
   register_nav_menus(
    array(
     'primary-menu' => esc_html__( 'Primary', 'woocom' ),
     'mobile-menu'  => esc_html__( 'Mobile Menu', 'woocom' ),
     'about-menu'   => esc_html__( 'About Us', 'woocom' ),
     'useful-menu'  => esc_html__( 'Useful Link', 'woocom' ),
     'follow-menu'  => esc_html__( 'Follow Us', 'woocom' ),
    )
   );

   /*
    * Switch default core markup for search form, comment form, and comments
    * to output valid HTML5.
    */
   add_theme_support(
    'html5',
    array(
     'search-form',
     'comment-form',
     'comment-list',
     'gallery',
     'caption',
     'style',
     'script',
    )
   );

   // Set up the WordPress core custom background feature.
   add_theme_support(
    'custom-background',
    apply_filters(
     'woocom_custom_background_args',
     array(
      'default-color' => 'ffffff',
      'default-image' => '',
     )
    )
   );

   // Add theme support for selective refresh for widgets.
   add_theme_support( 'customize-selective-refresh-widgets' );

   /**
    * Add support for core custom logo.
    *
    * @link https://codex.wordpress.org/Theme_Logo
    */
   add_theme_support(
    'custom-logo',
    array(
     'height'      => 250,
     'width'       => 250,
     'flex-width'  => true,
     'flex-height' => true,
    )
   );

  }

 endif;
 add_action( 'after_setup_theme', 'woocom_setup' );

 /**
  * Set the content width in pixels, based on the theme's design and stylesheet.
  *
  * Priority 0 to make it available to lower priority callbacks.
  *
  * @global int $content_width
  */
 function woocom_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'woocom_content_width', 640 );
 }

 add_action( 'after_setup_theme', 'woocom_content_width', 0 );

 /**
  * Register widget area.
  *
  * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
  */
 function woocom_widgets_init() {
  register_sidebar(
   array(
    'name'          => esc_html__( 'Sidebar', 'woocom' ),
    'id'            => 'sidebar-1',
    'description'   => esc_html__( 'Add widgets here.', 'woocom' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
   )
  );

  /**
   * WooCommerce Shop Sidebar
   */
  register_sidebar(
   array(
    'name'          => esc_html__( 'Shop Sidebar', 'woocom' ),
    'id'            => 'shop-sidebar',
    'description'   => esc_html__( 'Add widgets for shop page.', 'woocom' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</d>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
   )
  );

  register_sidebar(
   array(
    'name'          => esc_html__( 'Subscribe Widget', 'woocom' ),
    'id'            => 'subscribe',
    'description'   => esc_html__( 'Add Subscribe Content here.', 'woocom' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<div class="footer-title"><h3>',
    'after_title'   => '</h3></div>',
   )
  );
 }

 add_action( 'widgets_init', 'woocom_widgets_init' );

 /**
  * Enqueue scripts and styles.
  */
 function woocom_scripts() {
  wp_enqueue_style( 'woocom-style', get_stylesheet_uri(), array(), _S_VERSION );

  wp_enqueue_style( 'woocom-main', get_template_directory_uri() . '/css/main.css' );

  wp_style_add_data( 'woocom-style', 'rtl', 'replace' );

  wp_enqueue_script( 'woocom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
   wp_enqueue_script( 'comment-reply' );
  }

  if ( !is_admin() ) {
   wp_enqueue_script( 'woocom-popper', get_template_directory_uri() . '/js/popper.min.js', array(), time(), true );
   wp_enqueue_script( 'woocom-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), time(), true );

   /*
    * Swiper Slider
    */
   wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper/swiper-min.css' );
   wp_enqueue_script( 'swiper-script', get_template_directory_uri() . '/css/swiper/swiper-min.js', array(), time(), true );
   wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main-script.js', array( 'swiper-script' ), time(), true );
  }
 }

 add_action( 'wp_enqueue_scripts', 'woocom_scripts' );

 /**
  * Custom Fonts
  *
  */
 add_action( 'wp_enqueue_scripts', 'woocom_custom_fonts' );
 function woocom_custom_fonts() {
  if ( !is_admin() ) {
   wp_register_style( 'source_sans_pro', 'https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600&family=Source+Sans+Pro:wght@200;400;700' );
   wp_enqueue_style( 'source_sans_pro' );
   wp_register_style( 'nunito_pro', ':https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600' );
   wp_enqueue_style( 'nunito_pro' );
   wp_enqueue_style( 'woocom-fonts', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css' );
  }
 }

 /**
  * Implement the Custom Header feature.
  */
 require get_template_directory() . '/inc/custom-header.php';

 /**
  * Custom template tags for this theme.
  */
 require get_template_directory() . '/inc/template-tags.php';

 /**
  * Functions which enhance the theme by hooking into WordPress.
  */
 require get_template_directory() . '/inc/template-functions.php';

 /**
  * Customizer additions.
  */
 require get_template_directory() . '/inc/customizer.php';

 /**
  * Load Jetpack compatibility file.
  */
 if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/inc/jetpack.php';
 }

 /**
  * Load WooCommerce compatibility file.
  */
 if ( class_exists( 'WooCommerce' ) ) {
  require get_template_directory() . '/inc/woocommerce.php';
  
  require get_template_directory() . '/inc/wc-functions.php';
 }

 /**
  * Attach icon class to the menu title
  *
  * @param $sorted_menu_items
  * @param $args
  * @return mixed
  */
 function wti_add_arrow_to_parent_menu_item( $sorted_menu_items, $args ) {
  foreach ( $sorted_menu_items as $menu_item ) {
   if ( array_search( 'menu-item-has-children', $menu_item->classes ) != false ) {
    $menu_item->title = $menu_item->title . '<i class="bi-chevron-down"></i>';
   }
  }

  return $sorted_menu_items;
 }

 // Dropdown arrows to parent menu items
 add_filter( 'wp_nav_menu_objects', 'wti_add_arrow_to_parent_menu_item', 10, 2 );

 add_action( 'woocommerce_after_shop_loop_item_title', 'woocom_show_rating_on_shop_page', 5 );
 function woocom_show_rating_on_shop_page() {
  // The "echo '</a>';" line below MAY BE needed to close the anchor tag (link/href) added for product images
  // That way, we can use a different (custom) link for our star ratings and star rating text
  // Comment this out if it is not applicable in your case.
  // echo '</a>';
  global $product;
  $rating = $product->get_average_rating();
  if ( $rating > 0 ) {
   $title = sprintf( __( 'Rated %s out of 5:', 'woocommerce' ), $rating );
  } else {
   $title  = '';
   $rating = 0;
  }
  $rating_html = '</a><a href="' . get_the_permalink() . '#respond"><div class="star-rating ehi-star-rating"><span style="width:' . (  ( $rating / 5 ) * 100 ) . '%"></span></div><span style="font-size: 0.857em;"><em><strong>' . $title . '</strong></em></span></a>';
  echo $rating_html;
  // Now we display the product short description. This is optional.
  // wc_get_template('single-product/short-description.php');
 }

 // Custom Breadcrumb
 function get_breadcrumb() {
  echo '<a href="' . home_url() . '" rel="”nofollow”">Home</a>';
  if ( is_category() || is_single() ) {
   echo " / ";
   the_category( ' . ' );
   if ( is_single() ) {
    echo " / ";
    the_title();
   }
  } elseif ( is_page() ) {
   echo " / ";
   echo the_title();
  } elseif ( is_search() ) {
   echo " / Search Results for…";
   echo '<em>';
   echo the_search_query();
   echo '</em>';
  }
 }

 /**
  * Show cart contents / total Ajax
  */
 add_filter( 'woocommerce_add_to_cart_fragments', 'woocom_woocommerce_header_add_to_cart_fragment' );

 function woocom_woocommerce_header_add_to_cart_fragment( $fragments ) {
  global $woocommerce;

  ob_start();

 ?>
		<span class="count-style cart_count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
  $fragments['span.count-style.cart_count'] = ob_get_clean();
   return $fragments;
  }

//   add_action( 'after_setup_theme', 'woocom_after_setup_theme' );
//   function woocom_after_setup_theme() {
//    add_image_size( 'woocom-slider', 1920, 800, ); // Hard crop left top
//    add_image_size( 'small-thumb', 60, 60, true );

//    add_image_size( 'team-thumb', 60, 60, true );
   add_image_size( 'product-thumbnail', 233, 233 );
//   }


/**
* Remove WooCommerce default breadcrumb
 */
 remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
 
 remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);


// Remove responsive media sizes 
add_filter('wp_calculate_image_srcset', '__return_null');
add_filter('wp_calculate_image_sizes', '__return_null');