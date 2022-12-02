<?php
$defaults = [
    [
        'link_text' => esc_html__( 'Facebook', 'kirki' ),
        'link_url'  => 'https://facebook.com/',
    ],
    [
        'link_text' => esc_html__( 'Github', 'kirki' ),
        'link_url'  => 'https://github.com/',
    ],
];

$socials                  = get_theme_mod( 'woocom_socials', $defaults );
$woocom_footer_desc 	  = get_theme_mod( 'woocom_site_desc' );
$footer_logo_fallback     = get_template_directory_uri() . '/assets/images/logo-2.1.png';
$woocom_footer_logo 	  = get_theme_mod( 'woocom_footer_logo_url', $footer_logo_fallback );
$woocom_footer1_title 	  = get_theme_mod( 'woocom_menu1_title' );
$woocom_footer2_title 	  = get_theme_mod( 'woocom_menu2_title' );
$woocom_footer3_title 	  = get_theme_mod( 'woocom_menu3_title' );
$woocom_app_url 	 	  = get_theme_mod( 'woocom_app_store_url' );
$woocom_ps_url 	 	  	  = get_theme_mod( 'woocom_play_store_url' );
$woocom_copyright	  	  = get_theme_mod( 'woocom_copyright' );
$woocom_app_url 	 	  = get_theme_mod( 'woocom_app_store_url' );
$woocom_ps_url 	 	  	  = get_theme_mod( 'woocom_play_store_url' );

?>

<footer id="site-footer" class="site-footer footer-wrap footer-layout-2">
	<div class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div id="-2" class="widget widget_woocom_about">
                        <div class="woocom-img">
                            <img src="<?php echo esc_url( $woocom_footer_logo ) ; ?>" width="196" height="41" alt="">
                        </div>
                        <p class="woocom-des"><?php echo $woocom_footer_desc; ?></p>
                        <?php do_action( 'woocom_social_icons' );?>
		            </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div id="nav_menu-4" class="widget widget_nav_menu">
                        <h3 class="widgettitle"><?php echo $woocom_footer1_title;?></h3>
                        <div class="menu-selling-container">
                            <ul id="menu-selling" class="menu">
                                <li id="menu-item-2111" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2111"><a href="#">Selling TIps</a></li>
                                <li id="menu-item-2112" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2112"><a href="#">Buy and Sell Quickly</a></li>
                                <li id="menu-item-2387" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2387"><a href="#">Membership</a></li>
                                <li id="menu-item-2388" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2388"><a href="#">Banner Advertising</a></li>
                                <li id="menu-item-2389" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2389"><a href="#">Promote Your Ad</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div id="nav_menu-5" class="widget widget_nav_menu">    
                        <h3 class="widgettitle"><?php echo $woocom_footer2_title;?></h3>
                        <div class="menu-information-container">
                            <ul id="menu-information" class="menu">
                                <li id="menu-item-2137" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2137"><a href="#">Company &amp; Contact Info</a></li>
                                <li id="menu-item-2138" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2138"><a href="#">Blog &amp; Articles</a></li>
                                <li id="menu-item-2382" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2382"><a href="#">Sitemap</a></li>
                                <li id="menu-item-2383" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2383"><a href="#">Terms of Service</a></li>
                                <li id="menu-item-2135" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2135"><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-12">
                    <div id="nav_menu-3" class="widget widget_nav_menu">
                        <h3 class="widgettitle"><?php echo $woocom_footer3_title;?></h3>
                        <div class="menu-support-container">
                            <ul id="menu-support" class="menu">
                                <li id="menu-item-2116" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2116"><a href="#">Live Chat</a></li>
                                <li id="menu-item-2117" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2117"><a href="#">FAQ</a></li>
                                <li id="menu-item-2118" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2118"><a href="#">How to Stay Safe</a></li>
                                <li id="menu-item-2127" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2127"><a href="#">Terms &amp; Conditions</a></li>
                                <li id="menu-item-2119" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2119"><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto footer-copyright-area">
                    <p class="footer-copyright"><?php echo esc_attr( $woocom_copyright ) ; ?></p>
                </div>
                <div class="col-auto">
                    <div class="woocom-app-wrap text-lg-end">
                        <a class="woocom-play-store-app" href="#">
                            <img src="<?php echo esc_url( $woocom_app_url ) ; ?>" width="140" height="48" alt="App Link">
                        </a>

                        <a class="woocom-app-store-app" href="#">
                            <img src="<?php echo esc_url( $woocom_ps_url ) ; ?>" width="140" height="48" alt="App Link">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
