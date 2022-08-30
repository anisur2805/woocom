<?php

require WOOCOM_THEME_DIR . 'inc/woocom-hooks.php';
require WOOCOM_THEME_DIR . 'inc/woocom-hooks-helper.php';
require_once WOOCOM_THEME_DIR . '/lib/cs/codestar-framework.php';
// require_once WOOCOM_THEME_DIR . '/inc/cs.php';

locate_template( '/lib/kirki/kirki.php', true, true );
require_once WOOCOM_THEME_DIR . '/inc/kirki-customizer.php';

require_once get_theme_file_path( '/inc/tgmpa.php' );
require_once WOOCOM_THEME_DIR . '/inc/cmb2-attached-posts.php';

require_once WOOCOM_THEME_DIR . '/inc/breadcrumb.php';
