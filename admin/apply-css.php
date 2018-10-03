<?php
/**
* Custom WP Admin Login Apply CSS
*
* @package    custom-wp-admin-login
* @subpackage custom-wp-admin-login/admin
* @since      1.0.0
* @author     Anshul G.
*/


/**
* Change Logo href URL
*/
if ( !function_exists('cwpal_custom_url_login')) {
    add_filter('login_headerurl', 'cwpal_custom_url_login');
    function cwpal_custom_url_login()  {
        return get_bloginfo( 'url' );
    }
}


/**
* Add Custom css on Login Screen
*/
if ( !function_exists('cwpal_apply_custom_login_css')) {
    add_action( 'login_enqueue_scripts', 'cwpal_apply_custom_login_css' );
    function cwpal_apply_custom_login_css() {
        // Get login style 
        $login_css = get_option( 'custom_wp_admin_login' );

        // Logo Style
        $logo_img = $login_css['logo-img']['url'];
        if ( $logo_img != '' ) {
            $logo_width  = $login_css['logo-img']['width'];
            $logo_height = $login_css['logo-img']['height'];
            echo '<style type="text/css">
                    #login h1 a {
                        background-image: url("'.$logo_img.'");
                        -webkit-background-size: '.$logo_height.'px !important;
                        background-size: 100% !important;
                        background-position: center top;
                        background-repeat: no-repeat;
                        height: '.$logo_height.'px !important;
                        margin: 0 auto '.$login_css['logo-bm'].'px;
                        padding: 0;
                        text-decoration: none;
                        width: '.$logo_width.'px !important;
                        max-width: 320px;
                        text-indent: -9999px;
                        outline: 0;
                        overflow: hidden;
                        display: block;
                    }
                </style>';
        }

        // Check if logo title tag have or not.
        $logo_alt = $login_css['logo-alt'];
        if ( $logo_alt != '' ) {
            echo '<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>';
            echo '<script>
                    jQuery(document).ready(function($) {
                        jQuery("#login > h1 > a").attr("title","'.$logo_alt.'");
                    });
                  </script>';
        }

        // background css
        $background = $login_css['bg-opt'];
        if ( is_array($background) && !empty($background) ) {
            $background_css  = '<style type="text/css">';
            $background_css  .= 'body.login{';
            if ( $background['background-color'] != '' ) {
                $background_css  .= 'background-color:'.$background["background-color"].';';
            }
            if ( $background['background-repeat'] != '' ) {
                $background_css  .= 'background-repeat:'.$background["background-repeat"].';';
            }
            if ( $background['background-size'] != '' ) {
                $background_css  .= 'background-size:'.$background["background-size"].';';
            }
            if ( $background['background-attachment'] != '' ) {
                $background_css  .= 'background-attachment:'.$background["background-attachment"].';';
            }
            if ( $background['background-position'] != '' ) {
                $background_css  .= 'background-position:'.$background["background-position"].';';
            }
            if ( $background['background-image'] != '' ) {
                $background_css  .= ' background-image: url("'.$background["background-image"].'");';
            }
            $background_css  .= '}';
            $background_css  .= '</style>';
            echo $background_css;
        }

        // Add Custom CSS Code
        $custom_css_code = $login_css['custom-css'];
        $custom_css_code_sanitized = esc_textarea($custom_css_code);
        if ($custom_css_code != '') {
            echo '<style>' . $custom_css_code_sanitized . '</style>';
        }
    }
}
