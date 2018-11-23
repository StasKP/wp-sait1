<?php
/**
 * tastybite Theme Customizer
 *
 * @package tastybite
 */


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function tastybite_customize_register( $wp_customize ) {
	
	// tastybite theme choice options
    if (!function_exists('tastybite_section_choice_option')) :
        function tastybite_section_choice_option()
        {
            $tastybite_section_choice_option = array(
                'show' => esc_html__('Show', 'tastybite'),
                'hide' => esc_html__('Hide', 'tastybite')
            );
            return apply_filters('tastybite_section_choice_option', $tastybite_section_choice_option);
        }
    endif;


    if (!function_exists('tastybite_column_layout_option')) :
        function tastybite_column_layout_option()
        {
            $tastybite_column_layout_option = array(
                '6' => esc_html__('2 Column Layout', 'tastybite'),
                '4' => esc_html__('3 Column Layout', 'tastybite'),
                '3' => esc_html__('4 Column Layout', 'tastybite'),
            );
            return apply_filters('tastybite_column_layout_option', $tastybite_column_layout_option);
        }
    endif;
   

   if (!function_exists('tastybite_overlay_option')) :
        function tastybite_overlay_option()
        {
            $tastybite_overlay_option = array(
                'yes' => esc_html__('Yes', 'tastybite'),
                'no' => esc_html__('No', 'tastybite')
            );
            return apply_filters('tastybite_overlay_option', $tastybite_overlay_option);
        }
    endif;


    /**
     * Sanitizing the select callback example
     *
    */
    if ( !function_exists('tastybite_sanitize_select') ) :
        function tastybite_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

                // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;


    if ( !function_exists('tastybite_column_layout_sanitize_select') ) :
        function tastybite_column_layout_sanitize_select( $input, $setting ) {

            // Ensure input is a slug.
            $input = sanitize_text_field( $input );

            // Get list of choices from the control associated with the setting.
            $choices = $setting->manager->get_control( $setting->id )->choices;

            // If the input is a valid key, return it; otherwise, return the default.
            return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
        }
    endif;
    
    /**
     * Drop-down Pages sanitization callback example.
     *
     * - Sanitization: dropdown-pages
     * - Control: dropdown-pages
     * 
     * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
     * as an absolute integer, and then validates that $input is the ID of a published page.
     * 
     * @see absint() https://developer.wordpress.org/reference/functions/absint/
     * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
     *
     * @param int                  $page    Page ID.
     * @param WP_Customize_Setting $setting Setting instance.
     * @return int|string Page ID if the page is published; otherwise, the setting default.
     */

    function tastybite_sanitize_dropdown_pages( $page_id, $setting ) {
        // Ensure $input is an absolute integer.
        $page_id = absint( $page_id );
    
        // If $page_id is an ID of a published page, return it; otherwise, return the default.
        return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
    }


	
    /** Front Page Section Settings starts **/	

    $wp_customize->add_panel('frontpage', 
        array(
            'title'       => esc_html__('Tastybite Theme Options', 'tastybite'),        
		    'description' => '',                                        
		     'priority'   => 3,
        )
    );
	

    /** Intro Section Settings Start **/

// Panel - Header Section 
    $wp_customize->add_section('headerinfo', 
        array(
            'title'       => esc_html__('Header Booking/Contact Button', 'tastybite'),
            'description' => '',
            'panel'       => 'frontpage',
             'priority'   => 1
        )
    );

    // hide show
    
    $wp_customize->add_setting('tastybite_header_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_header_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control('tastybite_header_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Header Booking/Contact Button', 'tastybite'),
            'description' => esc_html__('Show/hide option Header Booking/Contact Button.', 'tastybite'),
            'section'     => 'headerinfo',
            'choices'     => $tastybite_header_section_hide_show_option,
            'priority'    => 1
        )
    );


    $wp_customize->add_setting( 'tastybite_header_btntxt',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( 'tastybite_header_btntxt',
        array(
            'label'        => esc_html__( 'Button Text','tastybite' ),
            'section'      => 'headerinfo',
            'type'         => 'text',
            'priority'     => 3,
        )
    );
        
    $wp_customize->add_setting( 'tastybite_header_btnurl',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( 'tastybite_header_btnurl',
        array(
            'label'       => esc_html__( 'Button URL', 'tastybite' ),
            'section'     => 'headerinfo',
            'type'        => 'text',
            'priority'    => 4,
        )
    );


    // Panel - Intro Section 1
    $wp_customize->add_section('introinfo', 
        array(
            'title'       => esc_html__('HomePage Intro Section', 'tastybite'),
            'description' => '',
            'panel'       => 'frontpage',
             'priority'   => 130
        )
    );

   
    // overlay
    
    $wp_customize->add_setting('tastybite_intro_section_overlay',
        array(
            'default'           => 'no',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_intro_overlay_option = tastybite_overlay_option();

    $wp_customize->add_control('tastybite_intro_section_overlay',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Overlay Option', 'tastybite'),
            'description' => esc_html__('Image overlay option for Intro Section.', 'tastybite'),
            'section'     => 'introinfo',
            'choices'     => $tastybite_intro_overlay_option,
            'priority'    => 5
        )
    );




    $wp_customize->add_setting( 'tastybite_intro_page',
            array(
                'default'           => 1,
                'sanitize_callback' => 'tastybite_sanitize_dropdown_pages',
            )
        );

        $wp_customize->add_control( 'tastybite_intro_page',
            array(
                'label'             => esc_html__( 'Intro Page ', 'tastybite' ),
                'section'           => 'introinfo',
                'type'              => 'dropdown-pages',
                'priority'          => 2,
            )
        );

    $wp_customize->add_setting( 'tastybite_intro_btntxt',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( 'tastybite_intro_btntxt',
        array(
            'label'        => esc_html__( 'Button Text','tastybite' ),
            'section'      => 'introinfo',
            'type'         => 'text',
            'priority'     => 3,
        )
    );
        
    $wp_customize->add_setting( 'tastybite_intro_btnurl',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control( 'tastybite_intro_btnurl',
        array(
            'label'       => esc_html__( 'Button URL', 'tastybite' ),
            'section'     => 'introinfo',
            'type'        => 'text',
            'priority'    => 4,
        )
    );


   $wp_customize->add_setting('tastybite_hours_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_hours_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control('tastybite_hours_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Restaurant Hours Option', 'tastybite'),
            'description' => esc_html__('Show/hide option for Restaurant Hours', 'tastybite'),
            'section'     => 'introinfo',
            'choices'     => $tastybite_hours_section_hide_show_option,
            'priority'    => 5
        )
    );




 $wp_customize->add_setting('tastybite_hours_title',
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
     );

    $wp_customize->add_control('tastybite_hours_title', 
        array(
            'label'    => __('Restaurant Hours', 'tastybite'),
            'section'  => 'introinfo',
            'priority' => 5
        )
    );

    $info_no = 4;
        for( $i = 1; $i <= $info_no; $i++ ) {
            $tastybite_intro_icon = 'tastybite_intro_icon_' . $i;
            $tastybite_intro_name = 'tastybite_intro_name_' . $i;
            $tastybite_intro_time = 'tastybite_intro_time_' . $i;

    
     $wp_customize->add_setting( $tastybite_intro_icon,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $tastybite_intro_icon,
        array(
            'label'         => esc_html__( 'Food Icon ', 'tastybite' ).$i,
            'description'   =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','tastybite'),
            'section'       => 'introinfo',
            'type'          => 'text',
            'priority'      => 100,
        )
    );

    $wp_customize->add_setting($tastybite_intro_name,
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
     );

    $wp_customize->add_control($tastybite_intro_name, 
        array(
            'label'    => __('Food Title', 'tastybite'),
            'section'  => 'introinfo',
            'priority' => 100
        )
    );
         
         $wp_customize->add_setting($tastybite_intro_time, 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control($tastybite_intro_time,
        array(
            'label'    => __('Timing', 'tastybite'),
            'section'  => 'introinfo',
            'priority' => 100
        )
    );
         }
    	
    /** Intro Section Settings End **/


    /** Aboutus Section Settings Start **/

    $wp_customize->add_section('aboutus',              
        array(
            'title'       => esc_html__('HomePage About Section', 'tastybite'),          
            'description' => '',             
            'panel'       => 'frontpage',      
            'priority'    => 140,
        )
    );
    
    $wp_customize->add_setting('tastybite_aboutus_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_aboutus_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control('tastybite_aboutus_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('About Us Option', 'tastybite'),
            'description' => esc_html__('Show/hide option for About Section.', 'tastybite'),
            'section'     => 'aboutus',
            'choices'     => $tastybite_aboutus_section_hide_show_option,
            'priority'    => 1
        )
    );


    // About Us Title

    $wp_customize->add_setting('tastybite_aboutus_title',
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
     );

    $wp_customize->add_control('tastybite_aboutus_title', 
        array(
            'label'    => __('About Us Title', 'tastybite'),
            'section'  => 'aboutus',
            'priority' => 1
        )
    );
  


    // About Us
   
  
    $wp_customize->add_setting( 'tastybite_aboutus_page',
        array(
            'default'           => 1,
            'sanitize_callback' => 'tastybite_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( 'tastybite_aboutus_page',
        array(
            'label'        => esc_html__( 'About Us Page ', 'tastybite' ),
            'section'      => 'aboutus',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );

   
    /** About Us Section Settings End **/


    /** Service Section Settings Start **/

	$wp_customize->add_section('services',              
        array(
            'title'       => esc_html__('HomePage Service Section', 'tastybite'),          
            'description' => '',             
            'panel'       => 'frontpage',      
            'priority'    => 140,
        )
    );
    
    $wp_customize->add_setting('tastybite_services_section_hideshow',
        array(
            'default'           => 'hide',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_services_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control(
        'tastybite_services_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Services Option', 'tastybite'),
            'description' => esc_html__('Show/hide option for Service Section', 'tastybite'),
            'section'     => 'services',
            'choices'     => $tastybite_services_section_hide_show_option,
            'priority'    => 1
        )
    );


    // Services title
    $wp_customize->add_setting('tastybite_services_title', 
        array(
            'default'           => '',
            'type'              => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );


    $wp_customize->add_control('tastybite_services_title',
        array(
           'label'    => __('Service Title', 'tastybite'),
           'section'  => 'services',
           'priority' => 1
        )
    );

  
   // column layout
    $wp_customize->add_setting('tastybite_column_layout',
        array(
            'default'           => '4',
            'sanitize_callback' => 'tastybite_column_layout_sanitize_select',
        )
    );

    $tastybite_services_column_layout = tastybite_column_layout_option();

    $wp_customize->add_control('tastybite_column_layout',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Column Layout option ', 'tastybite'),
            'description' => '',
            'section'     => 'services',
            'choices'     => $tastybite_services_column_layout,
            'priority'    => 2
            )
    );


    // Services 
   
    $service_no = 6;
        for( $i = 1; $i <= $service_no; $i++ ) {
            $tastybite_servicepage = 'tastybite_service_page_' . $i;
            $tastybite_serviceicon = 'tastybite_page_service_icon_' . $i;
        
    // Setting - Feature Icon
    $wp_customize->add_setting( $tastybite_serviceicon,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control( $tastybite_serviceicon,
        array(
            'label'         => esc_html__( 'Service Icon ', 'tastybite' ).$i,
            'description'   =>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','tastybite'),
            'section'       => 'services',
            'type'          => 'text',
            'priority'      => 100,
        )
    );
        
    $wp_customize->add_setting( $tastybite_servicepage,
        array(
            'default'           => 1,
            'sanitize_callback' => 'tastybite_sanitize_dropdown_pages',
        )
    );

    $wp_customize->add_control( $tastybite_servicepage,
        array(
            'label'        => esc_html__( 'Service Page ', 'tastybite' ) .$i,
            'section'      => 'services',
            'type'         => 'dropdown-pages',
            'priority'     => 100,
        )
    );
    }
    /** Service Section Settings End **/


    /** Blog Section Settings Start **/

    $wp_customize->add_section('tastybite_blog_info', 
        array(
            'title'       => __('HomePage Blog Section', 'tastybite'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 160
        )
     );
    
    $wp_customize->add_setting('tastybite_blog_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_blog_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control('tastybite_blog_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Blog Option', 'tastybite'),
            'description' => esc_html__('Show/hide option for Blog Section.', 'tastybite'),
            'section'     => 'tastybite_blog_info',
            'choices'     => $tastybite_blog_section_hide_show_option,
            'priority'    => 1
        )
    );
    
    $wp_customize->add_setting('tastybite_blog_title', 
         array(
            'default'            => '',
            'type'               => 'theme_mod',
            'sanitize_callback'  => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control('tastybite_blog_title', 
        array(
            'label'    => __('Blog Title', 'tastybite'),
            'section'  => 'tastybite_blog_info',
            'priority' => 1
        )
    );
    
    
    /** Blog Section Settings End **/


    /** Callout Section Settings Start **/

    $wp_customize->add_section(
        'tastybite_footer_contact', 
        array(
            'title'   => esc_html__('Footer Callout Section', 'tastybite'),
            'description' => 'display on all Pages & Post footer section',
            'panel' => 'frontpage',
            'priority'    => 170
        )
    );
    
    $wp_customize->add_setting(
        'tastybite_contact_section_hideshow',
        array(
            'default' => 'hide',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_section_choice_option = tastybite_section_choice_option();
    $wp_customize->add_control(
        'tastybite_contact_section_hideshow',
        array(
            'type' => 'radio',
            'label' => esc_html__('Footer Callout', 'tastybite'),
            'description' => esc_html__('Show/hide option for Footer Callout Section.', 'tastybite'),
            'section' => 'tastybite_footer_contact',
            'choices' => $tastybite_section_choice_option,
            'priority' => 5
        )
    );

    $wp_customize->add_setting(
        'ctah_heading', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'ctah_heading', 
        array(
            'label'   => esc_html__('Callout Text', 'tastybite'),
            'section' => 'tastybite_footer_contact',
            'priority'  => 8
        )
    );

    $wp_customize->add_setting(
        'ctah_btn_url', 
        array(
            'default'   =>'',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw'
        )
    );

    $wp_customize->add_control(
        'ctah_btn_url', 
        array(
            'label'   => esc_html__('Button URL', 'tastybite'),
            'section' => 'tastybite_footer_contact',
            'priority'  => 10
        )
    );

    $wp_customize->add_setting(
        'ctah_btn_text', 
        array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'ctah_btn_text', 
        array(
            'label'   => esc_html__('Button Text', 'tastybite'),
            'section' => 'tastybite_footer_contact',
            'priority'  => 12
        )
    );
    
    /** Callout Section Settings End **/

    /** Footer Section Settings Start **/

	$wp_customize->add_section('tastybite_footer_info',
        array(
            'title'       => __('Footer Section', 'tastybite'),
            'description' => '',
            'panel'       => 'frontpage',
            'priority'    => 180
        )
    );

    $wp_customize->add_setting('tastybite_footer_section_hideshow',
        array(
            'default'           => 'show',
            'sanitize_callback' => 'tastybite_sanitize_select',
        )
    );

    $tastybite_footer_section_hide_show_option = tastybite_section_choice_option();

    $wp_customize->add_control('tastybite_footer_section_hideshow',
        array(
            'type'        => 'radio',
            'label'       => esc_html__('Footer Option', 'tastybite'),
            'description' => esc_html__('Show/hide option for Footer Section.', 'tastybite'),
            'section'     => 'tastybite_footer_info',
            'choices'     => $tastybite_footer_section_hide_show_option,
            'priority'    => 1
        ) 
    );



    $wp_customize->add_setting('tastybite_footer_text',
         array(
            'default'             => '',
            'type'                => 'theme_mod',
            'sanitize_callback'   => 'wp_kses_post'
        )
    );

    $wp_customize->add_control('tastybite_footer_text',
         array(
            'label'    => __('Copyright', 'tastybite'),
            'section'  => 'tastybite_footer_info',
            'type'     => 'textarea',
            'priority' => 2
    ));

    /** Footer Section Settings End **/

}
add_action( 'customize_register', 'tastybite_customize_register' );