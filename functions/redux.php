<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    /* Fetch all posts with format post post and published */
    function reduxGetAllPosts()
    {
        global $wpdb;
        $sql = 'select ID, post_title from wp_posts where post_type="post" AND post_status="publish"';
        $results = $wpdb->get_results($sql);
        $output = [];
        if (count($results) > 0) {
            foreach ($results as $key => $result) {
                $output[$result->ID] = $result->post_title;
            }
        }
        return $output;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux";


    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Panel opcji', 'redux-framework-demo' ),
        'page_title'           => __( 'Panel opcji', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
//        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );


    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );



    /* Home page */
    Redux::setSection( $opt_name, [
        'title'            => __( 'Strona główna', 'redux-framework-demo' ),
        'id'               => 'home',
        'desc'             => __( 'Ustawienia nagłówków i opisów na stronie głównej', 'redux-framework-demo' ),
        'icon'             => 'el el-home',
    ]);

    /* Home page products section */
    Redux::setSection($opt_name, [
        'title'      => __('Produkty', 'redux-framework-demo'),
        'id'         => 'home-products',
        'subsection' => true,
        'desc'       => __('Ustawenia nagłówków i opisów dla sekcji produktów na stronie głównej', 'redux-framework-demo'),
        'fields'     => [
            [
                'id'    => 'home-products-header',
                'type'  => 'text',
                'title' => __('Nagłówek sekcji', 'redux-framework-demo')
            ],
            [
                'id'    => 'home-products-desc',
                'type'  => 'editor',
                'title' => __('Opis sekcji', 'redux-framework-demo')
            ],
            [
                'id'    => 'home-products-number',
                'type'  => 'text',
                'title' => __('Ilość produktów na stronie głównej', 'redux-framework-demo'),
                'validate' => 'numeric'
            ]
        ]
    ]);

    /* Home page boxes section */
    Redux::setSection($opt_name, [
        'title'      => __('Boksy', 'redux-framework-demo'),
        'id'         => 'home-boxes',
        'subsection' => true,
        'desc'       => __('Zarządanie boksami pod sliderem', 'redux-framework-demo'),
        'fields'     => [
            [
                'id' => 'home-boxes-box-1',
                'title' => __('Zdjęcie box 1'),
                'type' => 'media'
            ],
            [
                'id' => 'home-boxes-box-2',
                'title' => __('Zdjęcie box 2'),
                'type' => 'media'
            ],
            [
                'id' => 'home-boxes-box-3',
                'title' => __('Zdjęcie box 3'),
                'type' => 'media'
            ]
        ]
    ]);


    /* Newsletter */
    Redux::setSection($opt_name, [
        'title'  => __('Newsletter', 'redux-framework-demo'),
        'id'     => 'newsletter',
        'icon'   => 'el el-envelope-alt',
        'desc'   => __('Edycja sekcji newsletter', 'redux-framework-demo'),
        'fields' => [
            [
                'id'    => 'newsletter-header',
                'type'  => 'text',
                'title' => __('Nagłówek sekcji', 'redux-framework-demo')
            ],
            [
                'id'    => 'newsletter-desc',
                'type'  => 'editor',
                'title' => __('Opis sekcji', 'redux-framework-demo')
            ],
            [
                'id'    => 'newsletter-form-label',
                'type'  => 'text',
                'title' => __('Nagłówek formularza', 'redux-framework-demo')
            ],
            [
                'id'    => 'newsletter-input-placeholder',
                'type'  => 'text',
                'title' => __('Tekst w polu formularza', 'redux-framework-demo')
            ],
            [
                'id'      => 'newsletter-send-btn',
                'type'    => 'text',
                'title'   => __('Tekst przycisku formularza', 'redux-framework-demo'),
                'default' => 'Notify Me'
            ],
            [
                'id'    => 'newsletter-bg',
                'type'  => 'media',
                'title' => __('Tło', 'redux-framework-demo')
            ]
        ]
    ]);

    /* Box info section */
    Redux::setSection($opt_name, [
        'title'  => __('Informacje o dostawie ', 'redux-framework-demo'),
        'id'     => 'box-info',
        'icon'   => 'el el-info-circle',
        'desc'   => __('Edycja sekcji z informacjami o dostawie nad stopką', 'redux-framework-demo'),
        'fields' => [
            [
                'id'    => 'box-info-1-header',
                'title' => __('Nagłówek sekcji 1', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'box-info-1-desc',
                'title' => __('Opis sekcji 1', 'redux-framework-demo'),
                'type'  => 'textarea'
            ],
            [
                'id'    => 'box-info-1-icon',
                'title' => __('Ikona sekcji 1', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'box-info-2-header',
                'title' => __('Nagłówek sekcji 2', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'box-info-2-desc',
                'title' => __('Opis sekcji 2', 'redux-framework-demo'),
                'type'  => 'textarea'
            ],
            [
                'id'    => 'box-info-2-icon',
                'title' => __('Ikona sekcji 2', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'box-info-3-header',
                'title' => __('Nagłówek sekcji 3', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'box-info-3-desc',
                'title' => __('Opis sekcji 3', 'redux-framework-demo'),
                'type'  => 'textarea'
            ],
            [
                'id'    => 'box-info-3-icon',
                'title' => __('Ikona sekcji 3', 'redux-framework-demo'),
                'type'  => 'text'
            ],
        ]
    ]);

    /* Footer */
    Redux::setSection($opt_name, [
        'title'  => __('Stopka ', 'redux-framework-demo'),
        'id'     => 'footer',
        'icon'   => 'el el-info-circle',
        'desc'   => __('Edycja sekcji stopki', 'redux-framework-demo'),
        'fields' => [
            [
                'id'    => 'footer-desc',
                'title' => __('Tekst w stopce', 'redux-framework-demo'),
                'type'  => 'textarea'
            ]
        ]
    ]);


    /* Login page */
    Redux::setSection($opt_name, [
        'title'  => __('Strona logowania ', 'redux-framework-demo'),
        'id'     => 'login-site',
        'icon'   => 'el el-unlock-alt',
        'desc'   => __('Edycja strony logowania i rejestracji', 'redux-framework-demo'),
        'fields' => [
            [
                'id'    => 'login-site-create-account-header',
                'title' => __('Nagłówek sekcji rejestracji', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'login-site-create-account-desc',
                'title' => __('Opis sekcji rejestracji', 'redux-framework-demo'),
                'type'  => 'editor'
            ],
            [
                'id'    => 'login-site-create-account-button',
                'title' => __('Etykieta przycisku', 'redux-framework-demo'),
                'type'  => 'text'
            ],
        ]
    ]);

    /* Reset password page */
    Redux::setSection($opt_name, [
        'title'  => __('Strona resetowania hasła ', 'redux-framework-demo'),
        'id'     => 'reset-password-site',
        'icon'   => 'el el-unlock-alt',
        'desc'   => __('Edycja strony resetowania hasła', 'redux-framework-demo'),
        'fields' => [
            [
                'id'    => 'reset-password-site-image',
                'title' => __('Zdjęcie obok formularza resetowania hasła', 'redux-framework-demo'),
                'type'  => 'media'
            ]
        ]
    ]);

    /* Blog */
    Redux::setSection( $opt_name, [
        'title'            => __( 'Blog', 'redux-framework-demo' ),
        'id'               => 'blog',
        'desc'             => __( 'Ustawienia bloga', 'redux-framework-demo' ),
        'icon'             => 'el el-blogger',
    ]);

    /* Blog banner */
    Redux::setSection( $opt_name, [
        'title'            => __( 'Blog banner', 'redux-framework-demo' ),
        'id'               => 'blog-banner',
        'desc'             => __( 'Ustawienia bloga - Banner z wpisami', 'redux-framework-demo' ),
        'subsection'       => true,
        'fields'           => [
            [
                'id'       => 'blog-banner-posts',
                'title'    => __('Wybierz wpisy pojawiające się w banerze', 'redux-framework-demo'),
                'type'     => 'select',
                'options'  => reduxGetAllPosts(),
                'multi'    => true,
                'sortable' => true
            ]
        ]
    ]);


    /* Social media */
    Redux::setSection($opt_name, [
        'title'            => __( 'Social media', 'redux-framework-demo' ),
        'id'               => 'social-media',
        'desc'             => __( 'Ustawienia mediów społecznościowych w motywie', 'redux-framework-demo' ),
        'fields'           => [
            [
                'id'    => 'social-media-facebook-url',
                'title' => __('Facebook fanpage url', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'social-media-instagram-url',
                'title' => __('Instagram url', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'social-media-google-plus-url',
                'title' => __('Facebook fanpage url', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'social-media-twitter-url',
                'title' => __('Twitter url', 'redux-framework-demo'),
                'type'  => 'text'
            ],
            [
                'id'    => 'social-media-linkedin-url',
                'title' => __('Linkedin url', 'redux-framework-demo'),
                'type'  => 'text'
            ]
        ]
    ]);



    if ( file_exists( dirname( __FILE__ ) . '/../README.md' ) ) {
        $section = array(
            'icon'   => 'el el-list-alt',
            'title'  => __( 'Documentation', 'redux-framework-demo' ),
            'fields' => array(
                array(
                    'id'       => '17',
                    'type'     => 'raw',
                    'markdown' => true,
                    'content_path' => dirname( __FILE__ ) . '/../README.md', // FULL PATH, not relative please
                    //'content' => 'Raw content here',
                ),
            ),
        );
        Redux::setSection( $opt_name, $section );
    }
    /*
     * <--- END SECTIONS
     */


    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }


    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

