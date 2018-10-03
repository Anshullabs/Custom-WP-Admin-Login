<?php
    /**
     * ReduxFramework Custom WP Admin Login Config File
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $mpopt_name = "custom_wp_admin_login";

    /** SET ARGUMENTS For plugin Options **/
    $args = array(
                    'opt_name'          => $mpopt_name, // This is where your data is stored in the database and also becomes your global variable name.
                    'display_name'      => __('Custom WP Admin Login Settings', CWPAL_TEXTDOMAIN),    // Name that appears at the top of your panel
                    'display_version'   => CWPAL_VERSION,  // Version that appears at the top of your panel
                    'menu_type'         => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                    'allow_sub_menu'    => false,   // Show the sections below the admin menu item or not
                    'menu_title'        => __('Custom WP Admin Login Settings', CWPAL_TEXTDOMAIN),// Admin Menu title
                    'page_title'        => __('Custom WP Admin Login Settings', CWPAL_TEXTDOMAIN),// Page title
                    'page_slug'         => 'custom-wp-admin-login-setting', // Page slug used to denote the panel
                   
                    'google_api_key'        => '', // Must be defined to add google fonts to the typography module
                    'google_update_weekly'  => false, // Must be defined to add google fonts to the typography module
                    'async_typography'  => true,  // Use a asynchronous font on the front end or font string

                    'admin_bar'         => false, // Show the panel pages on the admin bar
                    'global_variable'   => 'abcd',  // Set a different name for your global variable other than the opt_name
                    'dev_mode'          => false, // Show the time the page took to load, etc
                    'customizer'        => false, // Enable basic customizer support
                    'page_priority'     => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                    'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                    'menu_icon'         => 'dashicons-hammer', // Specify a custom URL to an icon
                    'hide_expand'       => true, // hide expand options.
                    //'last_tab'          => '', // Force your panel to always open to a specific tab (by id)
                    'page_icon'         => 'dashicons-hammer', // Icon displayed in the admin panel next to your menu_title
                    'save_defaults'     => true, // On load save the defaults to DB before user clicks save or not
                    'default_show'      => false, // If true, shows the default value next to each field that is not the default value.
                    'default_mark'      => '', // What to print by the field's title if the value shown is default. Suggested: *
                    'show_import_export' => true, // Shows the Import/Export panel when not used as a field.
                    'transient_time'    => 60 * MINUTE_IN_SECONDS,
                    'output'            => true,// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                    'output_tag'        => true,// Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                    'footer_credit'     => 'Custom WP Admin Login Settings Panel.',// Disable the footer credit of Redux. Please leave if you can help it.    
                    'footer_text'       => '<p>This plugin is setup WordPress Admin Login Design Settings.</p>',
                );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/anshullabs',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://profiles.wordpress.org/anshuln90',
        'title' => 'Visit us on WordPress',
        'icon'  => 'el el-wordpress'
    );
     
    // Set Array Parameter to create option setting.
    Redux::setArgs( $mpopt_name, $args );

    /* *-*-*-*-*-*-*-*-*-* END ARGUMENTS **-*-*-*-*-*-*-*-*-* */



    /* *-*-*-*-*-*-*-*-*-* START SECTIONS **-*-*-*-*-*-*-*-*-* */
    // As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for

    // -> Logo Setting Fields
    Redux::setSection( $mpopt_name, array(
        'title'  => __( 'Logo', CWPAL_TEXTDOMAIN ),
        'id'     => 'logo-setting',
        'desc'   => __( 'Upload your own logo for WordPress admin login page.', CWPAL_TEXTDOMAIN ),
        'icon'   => 'el el-screen',
        'fields' => array(
            array(
                'id'       => 'logo-img',
                'type'     => 'media',
                'title'    => __( 'Logo Image', CWPAL_TEXTDOMAIN ),
                'desc'     => __( 'Make sure your Logo image max width is 320px.', CWPAL_TEXTDOMAIN ),
                'subtitle' => __( 'Upload your own logo.', CWPAL_TEXTDOMAIN ),
            ),
            array(
                'id'       => 'logo-alt',
                'type'     => 'text',
                'title'    => __( 'Logo Alt Text', CWPAL_TEXTDOMAIN ),
                'desc'     => __( 'Default is "Powered by WordPress". Update it with your site name.', CWPAL_TEXTDOMAIN ),
                'subtitle' => __( 'Add Logo alt text', CWPAL_TEXTDOMAIN ),
                'placeholder' => 'Powered by WordPress',
            ),
            array(
                'id'          => 'logo-bm',
                'type'        => 'text',
                'title'       => __( 'Logo Bottom Margin', CWPAL_TEXTDOMAIN ),
                'desc'        => __( "Default is 25px and it's a good value, but if you want to increase this margin.", CWPAL_TEXTDOMAIN ),
                'validate'    => 'numeric',
                'default'     => '25',
            ),
        )
    ) );


    // -> Background Setting Fields
    Redux::setSection( $mpopt_name, array(
        'title'  => __( 'Background', CWPAL_TEXTDOMAIN ),
        'id'     => 'background-setting',
        'desc'   => __( 'Manage background color or image and custom css for WordPress admin login page.', CWPAL_TEXTDOMAIN),
        'icon'   => 'el el-brush',
        'fields' => array(
            array(
                'id'       => 'bg-opt',
                'type'     => 'background',
                'output'   => array( 'body' ),
                'title'    => __( 'Background Design', CWPAL_TEXTDOMAIN ),
                'subtitle' => __( 'Body background with image, color, etc.', CWPAL_TEXTDOMAIN ),
                'default'  => array(
                                    'background-color' => '#dd9933',
                                ),
            ),
            array(
                'id'       => 'custom-css',
                'type'     => 'ace_editor',
                'title'    => __( 'Custom CSS Code', CWPAL_TEXTDOMAIN ),
                'subtitle' => __( 'Paste your custom CSS code here.', CWPAL_TEXTDOMAIN ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => "If you want to add some extra CSS to your login page, you can do it here. <br> e.g: If you want to move the login box 50px to the right, then you can type: #login {padding: 8% 0 0 50px;}",
                'default'  => ""
            ),
        )
    ) );
    
    /* *-*-*-*-*-*-*-*-*-* End SECTIONS TABS **-*-*-*-*-*-*-*-*-* */