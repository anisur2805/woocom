<?php

namespace CEW;

class Widget_Loader {
    private static $_instance = null;
    public static function instance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    private function load_widget_files() {
        require_once(__DIR__ . '/advertisements.php');
    }

    public function register_widgets() {
        $this->load_widget_files();
        \Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Advertisements());
    }

    function my_plugin_frontend_stylesheets() {

        // wp_register_style( 'ela-style', __DIR__ . '/style.css' );
        // wp_register_style( 'ela-style', plugins_url( '/style.css', __FILE__ ) );
    
        // wp_enqueue_style( 'ela-style' );

        // echo plugins_url(__DIR__ );
    
    }

    public function __construct() {
        add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
        add_action( 'elementor/editor/before_enqueue_scripts', [$this, 'my_plugin_frontend_stylesheets'] );
    }


}

Widget_Loader::instance();
