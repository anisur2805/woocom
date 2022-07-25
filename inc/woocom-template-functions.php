<?php

!defined('ABSPATH') || exit('Direct script access denied.');

if (!function_exists('woocom_header_site_branding')) {
    /**
     * woocom_header_site_branding
     *
     * @return void
     */
    function woocom_header_site_branding()
    {
        $template = 'template-parts/header/site-branding';
        get_template_part($template);
    }
}

if (!function_exists('woocom_header_menu')) {
    /**
     * woocom_header_menu
     *
     * @return void
     */
    function woocom_header_menu()
    {
        $template = 'template-parts/header/header-menu';
        get_template_part($template);
    }
}

if (!function_exists('woocom_header_menu_right')) {
    /**
     * woocom_header_menu_right
     *
     * @return void
     */
    function woocom_header_menu_right()
    {
        $template = 'template-parts/header/header-menu-right';
        get_template_part($template);
    }
}