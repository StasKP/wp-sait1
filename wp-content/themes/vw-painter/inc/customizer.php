<?php
/**
 * VW Painter Theme Customizer
 *
 * @package VW Painter
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_painter_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_painter_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-painter' ),
	    'description' => __( 'Description of what this panel does.', 'vw-painter' ),
	) );

	$wp_customize->add_section( 'vw_painter_left_right', array(
    	'title'      => __( 'General Settings', 'vw-painter' ),
		'priority'   => 30,
		'panel' => 'vw_painter_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_painter_theme_options',array(
        'default' => __('Right Sidebar','vw-painter'),
        'sanitize_callback' => 'vw_painter_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_painter_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-painter'),
        'section' => 'vw_painter_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-painter'),
            'Right Sidebar' => __('Right Sidebar','vw-painter'),
            'One Column' => __('One Column','vw-painter'),
            'Three Columns' => __('Three Columns','vw-painter'),
            'Four Columns' => __('Four Columns','vw-painter'),
            'Grid Layout' => __('Grid Layout','vw-painter')
        ),
	) );

	$wp_customize->add_section( 'vw_painter_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-painter' ),
		'priority'   => 30,
		'panel' => 'vw_painter_panel_id'
	) );

	$wp_customize->add_setting('vw_painter_location',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_painter_location',array(
		'label'	=> __('Add Location','vw-painter'),
		'section'=> 'vw_painter_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_painter_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_painter_email_address',array(
		'label'	=> __('Add Email Address','vw-painter'),
		'section'=> 'vw_painter_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_painter_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_painter_button_text',array(
		'label'	=> __('Add Button Text','vw-painter'),
		'section'=> 'vw_painter_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_painter_button_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_painter_button_url',array(
		'label'	=> __('Add Button Link','vw-painter'),
		'section'=> 'vw_painter_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_painter_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-painter' ),
		'priority'   => null,
		'panel' => 'vw_painter_panel_id'
	) );

	$wp_customize->add_setting('vw_painter_slider_arrows',array(
       'default' => 'false',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('vw_painter_slider_arrows',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide slider','vw-painter'),
       'section' => 'vw_painter_slidersettings',
    ));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_painter_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_painter_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_painter_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-painter' ),
			'description' => __('Slider image size (1500 x 590)','vw-painter'),
			'section'  => 'vw_painter_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Services
	$wp_customize->add_section( 'vw_painter_service_section' , array(
    	'title'      => __( 'Our Services', 'vw-painter' ),
		'priority'   => null,
		'panel' => 'vw_painter_panel_id'
	) );

	$wp_customize->add_setting( 'vw_painter_service_title', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_painter_service_title', array(
		'label'    => __( 'Section Title', 'vw-painter' ),		
		'section'  => 'vw_painter_service_section',
		'type'     => 'text'
	) );

	$wp_customize->add_setting( 'vw_painter_service_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_painter_service_text', array(
		'label'    => __( 'Section Text', 'vw-painter' ),
		'section'  => 'vw_painter_service_section',
		'type'     => 'text'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_painter_services',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_painter_sanitize_choices',
	));
	$wp_customize->add_control('vw_painter_services',array(
		'type'    => 'select',
		'choices' => $cat_post,		
		'label' => __('Select Category to display services','vw-painter'),
		'description' => __('Services Icon size (75 x 65)','vw-painter'),
		'section' => 'vw_painter_service_section',
	));	

	//Footer Text
	$wp_customize->add_section('vw_painter_footer',array(
		'title'	=> __('Footer','vw-painter'),
		'description'=> __('This section will appear in the footer','vw-painter'),
		'panel' => 'vw_painter_panel_id',
	));	
	
	$wp_customize->add_setting('vw_painter_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_painter_footer_text',array(
		'label'	=> __('Copyright Text','vw-painter'),
		'section'=> 'vw_painter_footer',
		'setting'=> 'vw_painter_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_painter_customize_register' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Painter_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Painter_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Painter_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Painter Pro Theme', 'vw-painter' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-painter' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/painter-wordpress-theme/'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-painter-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-painter-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Painter_Customize::get_instance();