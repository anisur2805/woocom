<?php

/**
 * woocom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package woocom
 */

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

/** @define "WOOCOM_THEME_DIR" "./" */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
define('WOOCOM_THEME_DIR', untrailingslashit(get_template_directory()) . '/');
define('WOOCOM_THEME_URI', untrailingslashit(get_template_directory_uri()) . '/');

require WOOCOM_THEME_DIR . 'inc/woocom-includes.php';
require WOOCOM_THEME_DIR . 'inc/test.php';
require WOOCOM_THEME_DIR . 'inc/shortcode-embed-post-inside.php';

/**
 * Content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
  /* pixels */
  $content_width = 1170; // phpcs:ignore WPThemeReview.CoreFunctionality.PrefixAllGlobals.NonPrefixedVariableFound
}

define('CS_ACTIVE_LIGHT_THEME', true); // default false

if (!function_exists('woocom_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function woocom_setup()
  {
    /*
    * Make theme available for translation.
    * Translations can be filed in the /languages/ directory.
    * If you're building a theme based on woocom, use a find and replace
    * to change 'woocom' to the name of your theme in all the template files.
    */
    load_theme_textdomain('woocom', WOOCOM_THEME_URI . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
    * Let WordPress manage the document title.
    * By adding theme support, we declare that this theme does not use a
    * hard-coded <title> tag in the document head, and expect WordPress to
    * provide it for us.
    */
    add_theme_support('title-tag');

    /*
    * Enable support for Post Thumbnails on posts and pages.
    *
    * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
    */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'primary-menu' => esc_html__('Primary', 'woocom'),
        'mobile-menu'  => esc_html__('Mobile Menu', 'woocom'),
        'about-menu'   => esc_html__('About Us', 'woocom'),
        'useful-menu'  => esc_html__('Useful Link', 'woocom'),
        'follow-menu'  => esc_html__('Follow Us', 'woocom'),
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
    add_theme_support('customize-selective-refresh-widgets');

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

    add_theme_support('post-formats', array('aside', 'audio', 'video', 'gallery', 'link', 'chat', 'quote', 'status'));
  }

endif;
add_action('after_setup_theme', 'woocom_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function woocom_content_width()
{
  $GLOBALS['content_width'] = apply_filters('woocom_content_width', 640);
}

add_action('after_setup_theme', 'woocom_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function woocom_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'woocom'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'woocom'),
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
      'name'          => esc_html__('Shop Sidebar', 'woocom'),
      'id'            => 'shop-sidebar',
      'description'   => esc_html__('Add widgets for shop page.', 'woocom'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</d>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Subscribe Widget', 'woocom'),
      'id'            => 'subscribe',
      'description'   => esc_html__('Add Subscribe Content here.', 'woocom'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="footer-title"><h3>',
      'after_title'   => '</h3></div>',
    )
  );
}

add_action('widgets_init', 'woocom_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function woocom_scripts()
{
  wp_enqueue_style('woocom-style', get_stylesheet_uri(), array(), _S_VERSION);

  wp_enqueue_style('woocom-main', get_template_directory_uri() . '/css/main.css');

  $woocom_hero_slider_bg_color = get_theme_mod('woocom_hero_slider_bg_color', '#f5e5d7');
  $hero_slider_style           = <<<EOD
  .slider-area .swiper-slide {
    background: {$woocom_hero_slider_bg_color};
}
EOD;
  wp_add_inline_style('woocom-main', $hero_slider_style);

  wp_style_add_data('woocom-style', 'rtl', 'replace');

  wp_enqueue_script('woocom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  if (!is_admin()) {
    // wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.min.css' );
    wp_enqueue_style('aos-css', get_template_directory_uri() . '/css/aos.css');

    wp_enqueue_script('woocom-popper', get_template_directory_uri() . '/js/popper.min.js', array(), time(), true);
    wp_enqueue_script('woocom-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), time(), true);

    // Enqueue _ JS && WP UTIL
    wp_enqueue_script('underscore');
    wp_enqueue_script('wp-util');

    /*
    * Swiper Slider
    */
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/css/swiper/swiper-min.css');
    wp_enqueue_script('swiper-script', get_template_directory_uri() . '/css/swiper/swiper-min.js', array(), time(), true);

    // Justified Gallery
    wp_enqueue_style('justified-gallery-css', get_template_directory_uri() . '/css/justifiedGallery.min.css', array(), '3.8');
    wp_enqueue_script('justified-gallery-script', get_template_directory_uri() . '/js/jquery.justifiedGallery.min.js', array(), '3.8');
    wp_enqueue_script( 'justified-gallery-main-script', get_template_directory_uri() . '/js/justified.main.js', array('jquery', 'justified-gallery-script' ), time());

    //  wp_enqueue_script( 'jquery-waypoints-script', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), time(), true );
    //  wp_enqueue_script( 'wow-script', get_template_directory_uri() . '/js/wow.min.js', array(), '1.3.0', true );
    wp_enqueue_script('aos-script', get_template_directory_uri() . '/js/aos.js', array(), '1.0', true);

    wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main-script.js', array('jquery'), time(), true);

    // Reservation Form
    wp_enqueue_script('reservation-js', get_template_directory_uri() . '/js/reservation.js', array('jquery'), time(), true);
    $siteUrl = admin_url('admin-ajax.php');
    wp_localize_script(
      'reservation-js',
      'reserveObj',
      array(
        'siteUrl' => $siteUrl,
        'duplicate_msg' => __('No need to reserved again', 'woocom'),
        'success_msg' => __('Reservation Successful', 'woocom'),
        'err_msg' => __('Something went wrong', 'woocom'),
      )
    );
  }
}

add_action('wp_enqueue_scripts', 'woocom_scripts');

/**
 * Custom Fonts
 *
 */
add_action('wp_enqueue_scripts', 'woocom_custom_fonts');
function woocom_custom_fonts()
{
  if (!is_admin()) {
    wp_register_style('source_sans_pro', 'https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600&family=Source+Sans+Pro:wght@200;400;700');
    wp_enqueue_style('source_sans_pro');
    wp_register_style('nunito_pro', ':https://fonts.googleapis.com/css2?family=Nunito:wght@200;400;600');
    wp_enqueue_style('nunito_pro');
    wp_enqueue_style('woocom-fonts', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css');
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
require get_template_directory() . '/inc/pl-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
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
function wti_add_arrow_to_parent_menu_item($sorted_menu_items, $args)
{
  foreach ($sorted_menu_items as $menu_item) {
    if (array_search('menu-item-has-children', $menu_item->classes) != false) {
      $menu_item->title = $menu_item->title . '<i class="bi-chevron-down"></i>';
    }
  }

  return $sorted_menu_items;
}

// Dropdown arrows to parent menu items
add_filter('wp_nav_menu_objects', 'wti_add_arrow_to_parent_menu_item', 10, 2);

add_action('woocommerce_after_shop_loop_item_title', 'woocom_show_rating_on_shop_page', 5);
function woocom_show_rating_on_shop_page()
{
  // The "echo '</a>';" line below MAY BE needed to close the anchor tag (link/href) added for product images
  // That way, we can use a different (custom) link for our star ratings and star rating text
  // Comment this out if it is not applicable in your case.
  // echo '</a>';
  global $product;
  $rating = $product->get_average_rating();
  if ($rating > 0) {
    $title = sprintf(__('Rated %s out of 5:', 'woocommerce'), $rating);
  } else {
    $title  = '';
    $rating = 0;
  }
  $rating_html = '</a><a href="' . get_the_permalink() . '#respond"><div class="star-rating ehi-star-rating"><span style="width:' . (($rating / 5) * 100) . '%"></span></div><span style="font-size: 0.857em;"><em><strong>' . $title . '</strong></em></span></a>';
  echo $rating_html;
  // Now we display the product short description. This is optional.
  // wc_get_template('single-product/short-description.php');
}

// Custom Breadcrumb
// function get_breadcrumb() {
//   echo '<div class="woocom-breadcrumb">';
//   echo '<a href="' . home_url() . '" rel="”nofollow”">Home</a>';
//   if (is_category() || is_single()) {
//     echo '<span class="breadcrumb_delimiter">' . " / " . '</span>';
//     the_category(' . ');
//     if (is_single()) {
//       echo '<span class="breadcrumb_delimiter">' . " / " . '</span>';
//       echo '<span class="current abc">' . get_the_title() . '</span>';
//     }
//   } elseif (is_page()) {
//     echo '<span class="breadcrumb_delimiter">' . " / " . '</span>';
//     echo '<span class="current">' . get_the_title() . '</span>';
//   } elseif (is_search()) {
//     echo " / Search Results for…";
//     echo '<em>';
//     echo the_search_query();
//     echo '</em>';
//   }
//   echo '</div>';
// }


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'woocom_woocommerce_header_add_to_cart_fragment');

function woocom_woocommerce_header_add_to_cart_fragment($fragments)
{
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
add_image_size('product-thumbnail', 233, 233);
//   }

/**
 * Remove WooCommerce default breadcrumb
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);

// Remove responsive media sizes
add_filter('wp_calculate_image_srcset', '__return_null');
add_filter('wp_calculate_image_sizes', '__return_null');

function woocom_customize_preview_init()
{
  wp_enqueue_script('woocom-customizer-script', get_theme_file_uri('/js/woocom-customizer.js'), array('jquery', 'customize-preview'), time(), true);
}

add_action('customize_preview_init', 'woocom_customize_preview_init');

/**
 * Parent Child Relationship with two different CPT
 * One is 'book', Another is 'chapter'
 *
 * the previous link was:
 * @link http://wp.local/book/%book%/chapter/chapter-two/
 *
 * the current link is:
 * @link http://wp.local/book/the-great-gatsby/chapter/chapter-two/
 *
 * Here is the true expectation:: combine two post types
 *
 * @param string $post_link
 * @param object $id
 * @return $post_link
 */
function woocom_book_post_type_link($post_link, $id)
{
  $p = get_post($id);
  if (is_object($p) && 'chapter' == get_post_type($p)) {
    $parent_id   = get_field('parent_book');
    $parent_post = get_post($parent_id);
    if ($parent_post) {
      $post_link = str_replace("%book%", $parent_post->post_name, $post_link);
    }
  }

  return $post_link;
}

add_filter('post_type_link', 'woocom_book_post_type_link', 1, 2);

// Book CPT based tags show
function woocom_footer_tags_title($title)
{
  if (is_post_type_archive('book') || is_tax('language')) {
    wp_die("Hello");
    $title = __('Books Tags', 'woocom');
  }

  return $title;
}

add_filter('woocom_footer_tags_title', 'woocom_footer_tags_title');

function woocom_footer_tags_items($tags)
{
  if (is_post_type_archive('book') || is_tax('language')) {
    $tags = get_terms([
      'taxonomy' => 'language',
    ]);
  }

  return $tags;
}

add_filter('woocom_footer_tags_items', 'woocom_footer_tags_items');

function wdc_word_count_heading($heading)
{
  $heading .= __('Al total words are', 'woocom');

  return $heading;
}

add_filter('wdc_word_count_heading', 'wdc_word_count_heading');

function wdc_word_count_tag($tag)
{
  return 'p';
}

add_filter('wdc_word_count_tag', 'wdc_word_count_tag');

function woocom_pqrcode_qrcode_image_attr($image_attr)
{
  return $image_attr = 'test';
}

add_filter('pqrcode_qrcode_image_attr', 'woocom_pqrcode_qrcode_image_attr');

function woocom_pqrcode_qrcode_dimension($dimension)
{
  return $dimension = "100x100";
}

// add_filter('pqrcode_qrcode_dimension', 'woocom_pqrcode_qrcode_dimension' );

function woocom_pqrcode_exclude_post_types($exc_post_types)
{
  $exc_post_types[] = "page";
  return $exc_post_types;
}

add_filter('pqrcode_exclude_post_types', 'woocom_pqrcode_exclude_post_types');

function woocom_qrc_countries($countries)
{
  array_push($countries, 'Test C');
  $countries = array_diff($countries, array('India', 'pakistan'));
  return $countries;
}

add_filter('qrc_countries', 'woocom_qrc_countries');

// add class to body
add_filter('body_class', function ($classes) {
  $site_title = sanitize_title_with_dashes(get_the_title());
  $classes[]  = 'prefix-' . $site_title;
  return $classes;
});

// Add custom text/textarea attachment field
function add_custom_text_field_to_attachment_fields_to_edit($form_fields, $post)
{
  $text_field                = get_post_meta($post->ID, 'text_field', true);
  $form_fields['text_field'] = array(
    'label' => 'Custom text field',
    'input' => 'text', // you may also use 'textarea' field
    'value' => $text_field,
    'helps' => 'This is help text',
  );
  return $form_fields;
}

add_filter('attachment_fields_to_edit', 'add_custom_text_field_to_attachment_fields_to_edit', null, 2);

// Save custom text/textarea attachment field
function save_custom_text_attachment_field($post, $attachment)
{
  if (isset($attachment['text_field'])) {
    update_post_meta($post['ID'], 'text_field', sanitize_text_field($attachment['text_field']));
  } else {
    delete_post_meta($post['ID'], 'text_field');
  }
  return $post;
}

add_filter('attachment_fields_to_save', 'save_custom_text_attachment_field', null, 2);

/**
 * Added bunch of fields to to attachment edit screen
 *
 * @param [type] $form_fields
 * @param [type] $post
 * @return void
 */
// Add custom checkbox attachment field
function add_custom_checkbox_field_to_attachment_fields_to_edit($form_fields, $post)
{
  $checkbox_field                = (bool) get_post_meta($post->ID, 'checkbox_field', true);
  $form_fields['checkbox_field'] = array(
    'label' => 'Checkbox',
    'input' => 'html',
    'html'  => '<input type="checkbox" id="attachments-' . $post->ID . '-checkbox_field" name="attachments[' . $post->ID . '][checkbox_field]" value="1"' . ($checkbox_field ? ' checked="checked"' : '') . ' /> ',
    'value' => $checkbox_field,
    'helps' => '',
  );
  return $form_fields;
}

add_filter('attachment_fields_to_edit', 'add_custom_checkbox_field_to_attachment_fields_to_edit', null, 2);

// Save custom checkbox attachment field
function save_custom_checkbox_attachment_field($post, $attachment)
{
  if (isset($attachment['checkbox_field'])) {
    update_post_meta($post['ID'], 'checkbox_field', sanitize_text_field($attachment['checkbox_field']));
  } else {
    delete_post_meta($post['ID'], 'checkbox_field');
  }
  return $post;
}

add_filter('attachment_fields_to_save', 'save_custom_checkbox_attachment_field', null, 2);

function woocom_attachment_location_field($form_fields, $post)
{
  $field_value                               = get_post_meta($post->ID, 'woocom_attachment_location', true);
  $form_fields['woocom_attachment_location'] = array(
    'value' => $field_value ? $field_value : '',
    'label' => __('Location', 'woocom'),
    'helps' => __('Set a location', 'woocom'),
  );

  return $form_fields;
}

add_filter('attachment_fields_to_edit', 'woocom_attachment_location_field', 10, 2);

function woocom_edit_location_attachment($attachment_id)
{
  if (isset($_REQUEST['attachments'][$attachment_id]['woocom_attachment_location'])) {
    $location = $_REQUEST['attachments'][$attachment_id]['woocom_attachment_location'];
    update_post_meta($attachment_id, 'woocom_attachment_location', $location);
  }
}

add_action('edit_attachment', 'woocom_edit_location_attachment');

add_action('wp_footer', 'myFunction');

function myFunction()
{ ?>
  <script type="text/html" id="myFunction">
    <li class="list-item <%= className %>">
      <div class="details">
        <h3><%= title %></h3>
        <p><%= description %></p>
      </div>
    </li>
  </script>

<?php
};


/* 
   * check if Yoast is active 
   * if yes than execute the following code
   * generate custom meta tag based on yoast 
   * urls: [http://i.imgur.com/OPepoUD.png]
   */
if (in_array('wordpress-seo/wp-seo.php', apply_filters('active_plugins', get_option('active_plugins')))) {

  /**
   * useable variable tag is %%WPWC%%
   * 
   */
  add_action('wpseo_register_extra_replacements', function () {
    if (function_exists('wpseo_register_var_replacement')) {
      wpseo_register_var_replacement("%%WPWC%%", function () {
        return __('WooCom - WordPress Custom Meta Tag based on Yoast SEO.', 'woocom');
      }, 'advanced', 'WPWC Replacement');
    }
  });

  /**
   * Modify default title tag 
   */
  add_filter('wpseo_replacements', function ($replacements) {
    if (isset($replacements['%%title%%'])) {
      $replacements['%%title%%'] .= ' | Test Title After Title';
    }

    return $replacements;
  });
}


//Add admin page to the menu
// add_action( 'admin_menu', 'add_admin_page');
function add_admin_page()
{
  // add top level menu page
  add_menu_page(
    'My Custom Settings', //Page Title
    'My Plugin', //Menu Title
    'manage_options', //Capability
    'my-plugin', //Page slug
    'admin_page_html' //Callback to print html
  );
}


//Admin page html callback
//Print out html for admin page
function admin_page_html()
{
  // check user capabilities
  if (!current_user_can('manage_options')) {
    return;
  }

  //Get the active tab from the $_GET param
  $default_tab = null;
  $tab = isset($_GET['tab']) ? $_GET['tab'] : $default_tab;

?>
  <!-- Our admin page content should all be inside .wrap -->
  <div class="wrap">
    <!-- Print the page title -->
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <!-- Here are our tabs -->
    <nav class="nav-tab-wrapper">
      <a href="?page=my-plugin" class="nav-tab <?php if ($tab === null) : ?>nav-tab-active<?php endif; ?>">Default Tab</a>
      <a href="?page=my-plugin&tab=settings" class="nav-tab <?php if ($tab === 'settings') : ?>nav-tab-active<?php endif; ?>">Settings</a>
      <a href="?page=my-plugin&tab=tools" class="nav-tab <?php if ($tab === 'tools') : ?>nav-tab-active<?php endif; ?>">Tools</a>
    </nav>

    <div class="tab-content">
      <?php switch ($tab):
        case 'settings':
          echo get_template_part('template-parts/tabs/settings');
          break;
        case 'tools':
          echo 'Tools';
          break;
        default:
          echo 'Default tab';
          break;
      endswitch; ?>
    </div>
  </div>
<?php
}

// post display with ajax
function filter_custom_posts()
{
  $catSlug = $_POST['category'];
  $post_type = $_POST['post_type'];

  $ajaxposts = new WP_Query([
    'post_type' => $post_type,
    'posts_per_page' => -1,
    'category_name' => $catSlug,
    'orderby' => 'menu_order',
    'order' => 'desc',
  ]);
  $response = '';

  if ($ajaxposts->have_posts()) {
    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      $response .= get_template_part('template-parts/content', get_post_format());
    endwhile;
  } else {
    $response = 'empty';
  }

  echo $response;
  exit;
}
add_action('wp_ajax_filter_custom_posts', 'filter_custom_posts');
add_action('wp_ajax_nopriv_filter_custom_posts', 'filter_custom_posts');

// Ajax load more
function display_ajax_post()
{
  $paged = $_POST['paged'];

  $ajaxposts = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
    'paged' => $paged,
  ]);

  $max_pages = $ajaxposts->max_num_pages;

  if ($ajaxposts->have_posts()) {
    while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
      get_template_part('template-parts/content', get_post_format());
    endwhile;
  }
  $result = [
    'max' => $max_pages
  ];
  echo json_encode($result);

  wp_reset_query();
  exit;
}

add_action('wp_ajax_display_ajax_post', 'display_ajax_post');
add_action('wp_ajax_nopriv_display_ajax_post', 'display_ajax_post');

// add_filter('posts_where', 'woocom_posts_where', 10, 2);
$args = array(
  'post_type'      => 'post',
  'posts_per_page' => -1,
);
$latest_post_ids = new WP_Query($args);
// remove_filter('posts_where', 'woocom_posts_where');

function woocom_posts_where($where, &$wp_query)
{
  global $wpdb;

  if ($search_term = $wp_query->get('search_post_title')) {
    $where .= ' AND ' . $wpdb->posts . 'post_title LIKE \'%' . $wpdb;
  }
}

// remove specific post from display
function remove_4350_post_from_query($query)
{
  if ($query->is_home() && $query->is_main_query()) {
    $query->set('post__not_in', array(4350));
  }
}
add_action('pre_get_posts', 'remove_4350_post_from_query');

function woocom_admin_enqueue_scripts()
{
  // get current admin screen, or null
  $screen = get_current_screen();
  if (is_object($screen)) {
    // enqueue only for specific post types
    if (in_array($screen->post_type, ['post', 'wporg_cpt'])) {
      wp_enqueue_script('woocom-mb', get_template_directory_uri() . '/js/woocom-metabox.js', array('jquery'), '1.0', true);
      wp_localize_script('woocom-mb', 'woocom_meta_box_obj', array(
        'url' => admin_url('admin-ajax.php')
      ));
    }
  }
}
add_action('admin_enqueue_scripts', 'woocom_admin_enqueue_scripts');

// Reservation Ajax handler
function reservation_callback()
{
  if (check_ajax_referer('reservation', 'rn')) {
    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $phone   = sanitize_text_field($_POST['phone']);
    $persons = sanitize_text_field($_POST['persons']);
    $date    = sanitize_text_field($_POST['date']);
    $time    = sanitize_text_field($_POST['time']);

    $data = array(
      'name'    => $name,
      'email'   => $email,
      'phone'   => $phone,
      'persons' => $persons,
      'date'    => $date,
      'time'    => $time,
    );

    $reservation_args = array(
      'post_type' => 'reservation',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_date' => date('Y-m-d H:i:s'),
      'post_title' => sprintf('%s reserved %s persons sit on - %s %s', $name, $persons, $date . " : " . $time, $email),
      'meta_input' => $data,
    );

    // reservation duplicate insert prevent
    $reservation_posts = new WP_Query(array(
      'post_type' => 'reservation',
      'post_status' => 'publish',
      'meta_query' => array(
        'relation' => 'AND',
        'email_check' => array(
          'key' => 'email',
          'value' => $email
        ),
        'date_check' => array(
          'key' => 'date',
          'value' => $date
        ),
        'time_check' => array(
          'key' => 'time',
          'value' => $time
        ),
      )
    ));

    $woocom_res_trans = get_transient('woocom-res') ? get_transient('woocom-res') : 0;
    if ($reservation_posts->found_posts > 0) {
      echo __('Duplicate', 'woocom');
    } else {
      $wp_error = '';
      $reservation_id = wp_insert_post($reservation_args, $wp_error);
      if (!$wp_error) {
        $woocom_res_trans++;
        if ($woocom_res_trans > 0) {
          set_transient('woocom-res', $woocom_res_trans, 0);
        }

        $_name = explode(" ", $name);
        $order_data    = array(
          'first_name' => $_name[0],
          'last_name'  => isset($_name[1]) ? $_name[1] : '',
          'email'      => $email,
          'phone'      => $phone
        );

        $order = wc_create_order();
        $order->set_address($order_data);
        $order->add_product(wc_get_product(149), 1);
        $order->set_customer_note($reservation_id);
        $order->calculate_totals();
        echo $order->get_checkout_payment_url();
      } else {
        echo __('Error', 'woocom');
      }
    }
  } else {
    die("Not allowed");
  }

  die();
}

add_action('wp_ajax_reservation_callback', 'reservation_callback');
add_action('wp_ajax_nopriv_reservation_callback', 'reservation_callback');

/**
 * Register a reservation post type.
 */
function woocom_register_reservation_post_type()
{
  $args = array(
    'public' => true,
    'label'  => __('Reservations', 'woocom'),
  );
  register_post_type('reservation', $args);
}
add_action('init', 'woocom_register_reservation_post_type');

// Show new reservation insert in menu with bubble
add_filter('add_menu_classes', 'woocom_reservation_menu');

function woocom_reservation_menu($menus)
{

  foreach ($menus as $menu_id => $menu_name) {
    if (in_array('Reservations', $menu_name)) {
      $woocom_res_trans = get_transient('woocom-res') ? get_transient('woocom-res') : '';
      if ($woocom_res_trans > 0) {
        $menu_name = "Reservations <span class='awaiting-mod'>{$woocom_res_trans}</span>";
        $menus[$menu_id][0] = $menu_name;
      }
    }
  }

  return $menus;
}

// Remove reservation menu bubble
add_action('admin_enqueue_scripts', 'woocom_reservation_bubble_remove');

function woocom_reservation_bubble_remove($hooks)
{

  $screen = get_current_screen();
  if ('edit.php' == $hooks && 'reservation' == $screen->post_type) {
    delete_transient('woocom-res');
  }
}

// Remove woocommerce default checkout fields
add_filter('woocommerce_checkout_fields', 'woocom_remove_default_checkout_fields');
function woocom_remove_default_checkout_fields($fields)
{
  unset($fields['billing']['billing_company']);
  unset($fields['billing']['billing_address_1']);
  unset($fields['billing']['billing_address_2']);
  unset($fields['billing']['billing_city']);
  unset($fields['billing']['billing_postcode']);
  unset($fields['billing']['billing_country']);
  unset($fields['billing']['billing_state']);

  unset($fields['shipping']['shipping_company']);
  unset($fields['shipping']['shipping_address_1']);
  unset($fields['shipping']['shipping_address_2']);
  unset($fields['shipping']['shipping_city']);
  unset($fields['shipping']['shipping_postcode']);
  unset($fields['shipping']['shipping_country']);
  unset($fields['shipping']['shipping_state']);

  unset($fields['order']['order_comments']);

  return $fields;
}


// Process Reservation 
add_filter('woocommerce_order_status_processing', 'woocom_order_status_processing');
function woocom_order_status_processing($order_id)
{

  $order          = wc_get_order($order_id);
  $reservation_id = $order->get_customer_note();

  if ($reservation_id) {

    $reservation = get_post($reservation_id);
    wp_update_post(array(
      'ID'         => $reservation_id,
      'post_title' => '[Paid] - ' . $reservation->post_title
    ));

    add_post_meta($reservation_id, 'paid', 1);
  }
}


  
  /*
  * Add product category before shop loop item
  * simple pass query string as ?cg=1
  * @example http://localhost:10013/shop/?cg=1
  */
  add_action( 'woocommerce_before_shop_loop', 'woocom_woocommerce_before_shop_loop_item', 8 );
  function woocom_woocommerce_before_shop_loop_item() {
    if( isset( $_GET['cg'] ) && $_GET['cg'] == 1 ) {
    $cat_args = array(
      'orderby'    => 'name',
      'order'      => 'ase',
      'hide_empty' => true,
    );

    $product_categories = get_terms('product_cat', $cat_args); ?>

    <div id="woocom-justified-gallery" class="woocom-justified-gallery">
      <?php foreach ($product_categories as $product_category) {

        $thumbnail_id  = get_term_meta($product_category->term_id, 'thumbnail_id', true);
        $thumbnail_url = wp_get_attachment_image_url($thumbnail_id, 'large');

        if (!$thumbnail_url) {
          continue;
        }

      ?>

        <a href="<?php echo esc_url(get_term_link($product_category, 'product_cat')); ?>">
          <?php if ($thumbnail_url) : ?>
            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($product_category->name); ?>" />
          <?php endif; ?>
          <div class="product-content">
            <?php if ($product_category->name) : ?>
              <h3><?php echo esc_attr($product_category->name); ?></h3>
            <?php endif; ?>
            <?php if ($product_category->description) : ?>
              <p><?php echo esc_attr($product_category->description); ?></p>
            <?php endif; ?>
          </div>
        </a>

      <?php

      }

      ?>

    </div>
    
    <?php
    }
  }

// Add custom routing for character 
// this will match routing ex. character/john, character/alex
add_action('init', function () {
  add_rewrite_rule('characters/([a-z]+)[/]?$', 'index.php?character=$matches[1]', 'top');
});

add_filter('query_vars', function ($query_vars) {
  $query_vars[] = 'character';
  return $query_vars;
});

add_action('template_include', function ($template) {
  if (get_query_var('character') == false || get_query_var('character') == '') {
    return $template;
  }
  return get_template_directory() . '/character.php';
});