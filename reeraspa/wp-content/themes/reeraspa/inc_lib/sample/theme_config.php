<?php
    

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "reera_theme";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'reera_theme/opt_name', $opt_name );


	 
    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'reera_text' ),
        'page_title'           => __( 'Theme Options', 'reera_text' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
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
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
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
        /* 'hints'                => array(
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
        ) */
    );

    Redux::setArgs( $opt_name, $args );


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */
	
    // -> START Basic Fields
	
	$prefix = '_reera';
	
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Logo Options', 'reera_text' ),
        'desc'             => __( 'Logo Upload Here', 'reera_text' ),
        'customizer_width' => '400px',
        'icon'             => 'el el-home',
		'fields'		   => array(
			array(
				'id'		=> $prefix.'logo',
				'title'		=> __('Logo Upload', 'reera_text'),
				'desc'		=> __('Logo for Full width view', 'reera_text'),
				'type'		=> 'media',
				'compiler'	=> true,
				'default'	=> array(
					'url'		=> get_template_directory_uri().'/images/logo.png',
				),
			),
			
			array(
				'id'		=> $prefix.'small_logo',
				'title'		=> __('Small Logo Upload', 'reera_text'),
				'desc'		=> __('Logo for responsive view and sticky header', 'reera_text'),
				'type'		=> 'media',
				'compiler'	=> true,
				'default'	=> array(
					'url'		=> get_template_directory_uri().'/images/logo-small.png',
				),
			),
			
		),
		
    ) );
	
	Redux::setSection( $opt_name, array(
		'title'			  => __('Social Options', 'reera_text'),
		'desc'			  => __('This area is social option', 'reera_text'),
		'icon'			  => 'el el-social',
		'customizer_width'=> '400px',
		'fields'		  => array(
			array(
				'id'		=> $prefix.'_social',
				'label'		=> __('Social link Add', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'options'	=> array(
					'1'			=> 'Facebook',
					'2'			=> 'Twitter',
					'3'			=> 'Google-plus',
					'4'			=> 'Youtube',
				),
			),
		),
	) ); 
	
	Redux::setSection( $opt_name, array(
		'title'			  => __('Slider Options', 'reera_text'),
		'desc'			  => __('This is slider area', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			  => 'el el-slider',
		'fields'		  => array(
			array(
				'id'		=> $prefix.'_sp_title',
				'title'		=> __('Show slider post title', 'reera_text'),
				'desc'		=> __('if you checked this, show slider post title for front slider'),
				'type'		=> 'checkbox',
				'compiler'	=> true,
				'default'	=> false,
			),
			
			array(
				'id'		=> $prefix.'_sc_title',
				'title'		=> __('Custom Title', 'reera_text'),
				'desc'		=> __('if you unchecked slider post title checkbox, this show for front slider'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'WELCOME TO OUR SPA & WELLNESS SALON',
			),
			
			array(
				'id'		=> $prefix.'_cho_title',
				'title'		=> __('Check Out Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Check out our services and book now',
			),
			
			array(
				'id'		=> $prefix.'_learnmore',
				'title'		=> __('Learn more button text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Learn more',
			),
			
			array(
				'id'		=> $prefix.'_lmlink',
				'title'		=> __('Learn more button link', 'reera_text'),
				'type'		=> 'select',
				'compiler'	=> true,
				'data'		=> 'pages',
				'default'	=> '1',
			),
			
			array(
				'id'		=> $prefix.'_booknow',
				'title'		=> __('Book Now button text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Book now',
			),
			
			array(
				'id'		=> $prefix.'_bnlink',
				'title'		=> __('Book now button link', 'reera_text'),
				'type'		=> 'select',
				'compiler'	=> true,
				'data'		=> 'pages',
				'default'	=> '1',
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'			=> __('Service Section', 'reera_text'),
		'desc'			=> __('This section is home page and service page options are add here!', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			=> 'el el-service',
		'fields'		=> array(
			array(
				'id'		=> $prefix.'_hsvc',
				'title'		=> __('Service item link', 'reera_text'),
				'desc'		=> __('Select Service page for home page service item link', 'reera_text'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> 1,
			),
			
			array(
				'id'		=> $prefix.'_svptitle',
				'title'		=> __('Service Page Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Check our services",
			),
			
			array(
				'id'		=> $prefix.'_srvetitle',
				'title'		=> __('Skill Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "OUR SKILLS & EXPERIENCES",
			),
			
			array(
				'id'		=> $prefix.'_srvesubtitle',
				'title'		=> __('Service Page Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Here are the packages that we offer and they all include refreshments.",
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'			=> __('Branch Section', 'reera_text'),
		'desc'			=> __('This Branch page options are add here!', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			=> 'el el-branch',
		'fields'		=> array(
			
			array(
				'id'		=> $prefix.'_brnplink',
				'title'		=> __('Page Select', 'reera_text'),
				'desc'		=> __('Select branch page for page content', 'reera_text'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> 1,
			),
			
			array(
				'id'		=> $prefix.'_brnptitle',
				'title'		=> __('Branch Page Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "About Our Branch",
			),
			
			array(
				'id'		=> $prefix.'_brntitle',
				'title'		=> __('Branch Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "OUR BRANCHES",
			),
			
			array(
				'id'		=> $prefix.'_brnsubtitle',
				'title'		=> __('Branch Section SubTitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Here are the packages that we offer and they all include refreshments.",
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'			=> __('About Section', 'reera_text'),
		'desc'			=> __('This section is home page and about page options are add here!', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			=> 'el el-about',
		'fields'		=> array(
			array(
				'id'		=> $prefix.'_abtitle',
				'title'		=> __('About title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Welcome to our Beauty Salon & Spa',
			),
			
			array(
				'id'		=> $prefix.'_abpsubtitle',
				'title'		=> __('About Page SubTitle', 'reera_text'),
				'desc'		=> __('', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the Services and Features that we offer and they all include refreshments.',
			),
			
			array(
				'id'		=> $prefix.'_abcontent',
				'title'		=> __('About Content', 'reera_text'),
				'desc'		=> __('Select About page for about content', 'reera_text'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> '1',
			),
			
			array(
				'id'		=> $prefix.'_abbtn',
				'title'		=> __('About Button Text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'ABOUT US',
			),
			
			array(
				'id'		=> $prefix.'_cnbtn',
				'title'		=> __('Contact  Button Text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'CONTACT US',
			),
			
			array(
				'id'		=> $prefix.'_cnbtnlink',
				'title'		=> __('Contact button link', 'reera_text'),
				'desc'		=> __('Select contact page for contact button link', 'reera_text'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> '1',
			),
			
		),
	));
	
	Redux::setSection( $opt_name, array(
		'title'			=> __('Offers Sections', 'reera_text'),
		'desc'			=> __('Add offer option here!', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			=> 'el el-offer',
		'fields'		=> array(
			array(
				'id'		=> $prefix.'_oftitle',
				'title'		=> __('Offer section title'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'CHECK OUR GIFT BOUCHERS',
			),
			
			array(
				'id'		=> $prefix.'_ofsubtitle',
				'title'		=> __('Offer section subtitle'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the people those work to satify you.',
			),
			
			array(
				'id'		=> $prefix.'_ofbnbtn',
				'title'		=> __('Offer book now button text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'BOOK NOW',
			),
			
			array(
				'id'		=> $prefix.'_ofbtnlink',
				'title'		=> __('Offer book now button link', 'reera_text'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> '1',
			),
			
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'				=> __('Team Member Sections', 'reera_text'),
		'desc'				=> __('', 'reera_text'),
		'customizer_width'	=> '400px',
		'icon'				=> 'el el-team-member',
		'fields'			=> array(
			array(
				'id'		=> $prefix.'_tmstitle',
				'title'		=> __('Team Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'MEET OUR TEAM MEMBER',
			),
			
			array(
				'id'		=> $prefix.'_tmsubtitle',
				'title'		=> __('Team Section Subtitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the people those work to satify you.',
			),
		),
	) );
	
	
	Redux::setSection( $opt_name, array(
		'title'				=> __('Gallery Sections', 'reera_text'),
		'desc'				=> __('', 'reera_text'),
		'customizer_width'	=> '400px',
		'icon'				=> 'el el-gallery',
		'fields'			=> array(
			array(
				'id'		=> $prefix.'_rgtitle',
				'title'		=> __('Gallery Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'OUR GALLERY',
			),
			
			array(
				'id'		=> $prefix.'_rgsubtitle',
				'title'		=> __('Gallery Section Subtitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the people those work to satify you.',
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'				=> __('Plans & Pricing Section', 'reera_text'),
		'desc'				=> __('', 'reera_text'),
		'customizer_width'	=> '400px',
		'icon'				=> 'el el-plan',
		'fields'			=> array(
			array(
				'id'		=> $prefix.'_prptitle',
				'title'		=> __('Plans & Pricing Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'OUR PLANS & PRICINGS',
			),
			
			array(
				'id'		=> $prefix.'_prpsubtitle',
				'title'		=> __('Plans & Pricing Section Subtitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the packages that we offer and they all include refreshments.',
			),
			
			array(
				'id'		=> $prefix.'_prpbnbtn',
				'title'		=> __('Details button text', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'DETAILS',
			),
			
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'				=> __('Blog Sections', 'reera_text'),
		'desc'				=> __('', 'reera_text'),
		'customizer_width'	=> '400px',
		'icon'				=> 'el el-blog',
		'fields'			=> array(
			array(
				'id'		=> $prefix.'_bltitle',
				'title'		=> __('Blog Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'LATEST FROM THE BLOG',
			),
			
			array(
				'id'		=> $prefix.'_blsubtitle',
				'title'		=> __('Blog Section Subtitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the packages that we offer and they all include refreshments.',
			),
			
			array(
				'id'		=> $prefix.'_blptitle',
				'title'		=> __('Blog Page Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Welcome to our Blog',
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'				=> __('Contact Sections', 'reera_text'),
		'desc'				=> __('', 'reera_text'),
		'customizer_width'	=> '400px',
		'icon'				=> 'el el-contact',
		'fields'			=> array(
			array(
				'id'		=> $prefix.'_contitle',
				'title'		=> __('Contact Section Title', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Let's get in touch",
			),
			
			array(
				'id'		=> $prefix.'_consubtitle',
				'title'		=> __('Contact Section Subtitle', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> 'Here are the packages that we offer and they all include refreshments.',
			),
		),
	) );
	
	Redux::setSection( $opt_name, array(
		'title'			=> __('Footer Section', 'reera_text'),
		'desc'			=> __('', 'reera_text'),
		'customizer_width'=> '400px',
		'icon'			=> 'el el-footer',
		'fields'		=> array(
			array(
				'id'		=> $prefix.'_fabout',
				'title'		=> __('Footer about option', 'reera_text'),
				'desc'		=> __('Select about page for about option'),
				'type'		=> 'select',
				'data'		=> 'pages',
				'compiler'	=> true,
				'default'	=> '1',
			),
			
			array(
				'id'		=> $prefix.'_cname',
				'title'		=> __('Company Name', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Reera - Beatuty & Spa Company",
			),
			
			array(
				'id'		=> $prefix.'_faddr',
				'title'		=> __('Address', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "Dhanmondi, 26th street, Dhaka-1205",
			),
			
			array(
				'id'		=> $prefix.'_phone',
				'title'		=> __('Phone', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "+880 181 111 111",
			),
			
			array(
				'id'		=> $prefix.'_email',
				'title'		=> __('Email Address', 'reera_text'),
				'type'		=> 'text',
				'compiler'	=> true,
				'default'	=> "abc@gmail.com",
			),
		),
	) );
	
	
	
    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

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
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
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

