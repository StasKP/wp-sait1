<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Tastybite
 */
 ?> 
 
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">   
    
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- ====== scroll to top ====== -->
    <a id="toTopBtn" title="<?php esc_attr__( 'Go to top', 'tastybite' ); ?>" href="javascript:void(0)">
        <i class="fa fa-chevron-up"></i>
    </a>
	 <!-- loader  -->
    <div class="loader">
        <h1><?php esc_html__( 'Loadings..', 'tastybite' ); ?></h1>
        <div id="cooking">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div id="area">
                <div id="sides">
                    <div id="pan"></div>
                    <div id="handle"></div>
                </div>
                <div id="pancake">
                    <div id="pastry"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader ends  -->
    <?php  
    $tastybite_header_section = get_theme_mod( 'tastybite_header_section_hideshow','show');
	$tastybite_btntxt     = get_theme_mod( "tastybite_header_btntxt"  );
	$tastybite_btnurl     = get_theme_mod( "tastybite_header_btnurl" );
    ?>   
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="menubar">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navbar navbar-static-top">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" aria-expanded="false">
                                        <span class="sr-only"><?php esc_html__( 'Toggle navigation', 'tastybite' ); ?></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <div class="tastybite-logo">
                                    <?php if (has_custom_logo()) : ?> 
                                        <span><?php the_custom_logo(); ?></span>
                                    <?php endif;  
									if (display_header_text()==true){ ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand">
                                        <span class="site-title"><?php bloginfo( 'title' ); ?></span></a>
                                    <?php } ?>
                                </div>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse ">
                                    <?php if ($tastybite_header_section =='show') { ?>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="res-btn">
                                            <?php if (!empty($tastybite_btntxt)) { ?>
                                               <a href="<?php echo esc_url($tastybite_btnurl); ?>" class="book-btn"><?php echo esc_html($tastybite_btntxt); ?></a>
                                            <?php } ?>
                                        </li>
                                    </ul>
                                    <?php } ?>
                                    <?php wp_nav_menu( array
                                        (
                                          'menu'              => 'primary',
                                          'container'         => 'ul', 
                                          'theme_location'    => 'primary', 
                                          'menu_class'        => 'menu', 
                                          'items_wrap'        => '<ul class="nav navbar-nav navbar-right" id="main-menu">%3$s</ul>',
                                          'fallback_cb'       => 'tastybite_wp_bootstrap_navwalker::fallback',
                                          'walker'            => new tastybite_wp_bootstrap_navwalker()
                                        )); 
                                    ?>  

                                </div>
                                <!-- /.navbar-collapse -->
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mobile-menu">
            </div>
        </header>