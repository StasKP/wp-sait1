<?php

/**
 * tastybite functions and definitions
  @package Tastybite
 *
*/

/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
function tastybite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tastybite_content_width', 980 );
}
add_action( 'after_setup_theme', 'tastybite_content_width', 0 );


if( ! function_exists( 'tastybite_theme_setup' ) ) {	
	
	function tastybite_theme_setup() {
		load_theme_textdomain( 'tastybite', get_template_directory() . '/languages' );
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		
		// Add title tag 
		add_theme_support( 'title-tag' );
		
		
         // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 
		
		// custom header support
		$defaults = array(
			'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
			'width'                  => 1920,
			'height'                 => 600,
			'uploads'                => true,
			'default-text-color'     => "000000",
			'wp-head-callback'       => 'tastybite_custom_header_color',
		);
		add_theme_support( 'custom-header', $defaults );
		
		// Add default logo support		
       add_theme_support( 'custom-logo', array(
		'height'      => 76,
		'width'       => 185,
		'flex-height' => true,
        'flex-width'  => true
		) );
		
		add_filter( 'get_custom_logo', 'change_logo_class' );
		function change_logo_class( $html ) {

			$html = str_replace( 'custom-logo-link', 'navbar-brand', $html );

			return $html;
		}
		
		// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );

        add_theme_support('post-thumbnails');
        add_image_size('tastybite-page-thumbnail',738,423, true);
        add_image_size('tastybite-about-thumbnail',800,550, true);
        add_image_size('tastybite-blog-front-thumbnail',370,225, true);        
        
		

		// Menus
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'tastybite'),
		));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );
		
        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		// Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
    	
	}
	add_action( 'after_setup_theme', 'tastybite_theme_setup' );
} 
/**
 * apply haeder text color on header logo text
 *
 */
function tastybite_custom_header_color(){
	$tastybite_header_text_color = get_header_textcolor();
	?>
		<style type="text/css">
			<?php if ( get_header_image() ) : ?>
				.site-title{ color: #<?php echo esc_attr($tastybite_header_text_color); ?> !important; }
			<?php endif; ?>	
		</style>
	<?php
}

// Enqueue CSS scripts
	
if( ! function_exists( 'tastybite_enqueue_styles' ) ) {
	function tastybite_enqueue_styles() {	
		wp_enqueue_style('tastybite-font', 'https://fonts.googleapis.com/css?family=Dancing+Script:400,700|Lato:400,700');	
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css','');
		wp_enqueue_style('animate', get_template_directory_uri() .'/assets/css/animate.css','');
		wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css','');
		wp_enqueue_style('font-awesome', get_template_directory_uri() .'/assets/css/font-awesome.css','');
		wp_enqueue_style('slicknav', get_template_directory_uri() .'/assets/css/slicknav.css','');
		// main style
		wp_enqueue_style( 'tastybite-style', get_stylesheet_uri() );
	}
	add_action( 'wp_enqueue_scripts', 'tastybite_enqueue_styles' );
}

/**
 * Enqueue JS scripts
 */

if( ! function_exists( 'tastybite_enqueue_scripts' ) ) {
	function tastybite_enqueue_scripts() {   
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js',array(),'', true);
		wp_enqueue_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(),'', true);
		wp_enqueue_script('slicknav', get_template_directory_uri() . '/assets/js/slicknav.js',array(),'', true);
		wp_enqueue_script('tastybite-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);

	}
	add_action( 'wp_enqueue_scripts', 'tastybite_enqueue_scripts' );
}


function tastybite_cat_count_span($links) {
	$links = str_replace('</a> (', '<span>', $links);
	$links = str_replace(')', '</span></a>', $links);
	return $links;
}
add_filter('wp_list_categories', 'tastybite_cat_count_span');


function tastybite_style_the_archive_count($links) {
	$links = str_replace('</a>&nbsp;(', '<span class="archiveCount">', $links);
	$links = str_replace(')', '</span></a> ', $links);
	return $links;
}

add_filter('get_archives_link', 'tastybite_style_the_archive_count');


 /**
 * Register sidebars for tastybite
 */

function tastybite_sidebars() {

	// Sidebar Widget Register

	register_sidebar(array(
		'name' => esc_html__( 'Blog Sidebar', "tastybite"),
		'id' => 'blog-sidebar',
		'description' => esc_html__( 'Sidebar on the blog layout.', "tastybite"),
		'before_widget' => '<aside id="%1$s" class="sidebar widget %2$s"> <div class="widget-box">',
		'after_widget' => '</div></aside>',
		'before_title' => '<div class="widget-title"><h3 class="main-title text-left"><span>',
		'after_title' => '</span></h3></div>',
	));
  	

	// Footer Widget Register

	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area', "tastybite"),
		'id' => 'tastybite-footer-widget-area',
		'description' => esc_html__( 'The footer widget area', "tastybite"),
		'before_widget' => ' <div class="col-md-4 col-sm-6"><div class="footer-widgets %2$s">',
		'after_widget' => '</div> </div>',
		'before_title' => '<h4 class="main-title footer-title text-left"><span>',
		'after_title' => '</span></h4>',
	));	
}

add_action( 'widgets_init', 'tastybite_sidebars' );

/**
 * Functions hooked to custom search input
 */

if ( ! function_exists( 'tastybite_custom_search_form' ) ) :

	/** Customize search form.
	 **/
	function tastybite_custom_search_form() {

		$form = '<div class="widget-content"><form role="search" method="get" action="' . esc_url( home_url( '/' ) ) . '">
			<label>
			<span class="screen-reader-text">' . esc_html( 'Search anything here', 'label', 'tastybite' ) . '</span>
			<div class="search-box"><input type="search" class="search-query form-control" placeholder="' . esc_attr_x( 'Search', 'placeholder', 'tastybite' ) . '" value="' . get_search_query() . '" name="s" title="' . esc_attr_x( 'Search for:', 'label', 'tastybite' ) . '" />
			</label>
			<button type="submit" class="search-btn">
				<i class="fa fa-search"></i>
			</button> </div></form></div>';

		return $form;
    }
	
	endif;
add_filter( 'get_search_form', 'tastybite_custom_search_form');
 
/**
 * Customizer additions.
 */
require get_template_directory(). '/lib/customizer.php';
  
// Register Nav Walker class_alias
require get_template_directory(). '/lib/class-wp-bootstrap-navwalker.php';

// comments template 
require get_template_directory(). '/lib/comment-div.php';
   
?>