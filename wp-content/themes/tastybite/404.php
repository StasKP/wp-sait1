<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Tastybite
 */
get_header();

if(get_header_image()){
    $title   = "title" ;
 }
 else{
    $title   = "notitle";
 }
 
 ?>

<!-- ====== page 404 ====== -->
    <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <h2 class="<?php echo esc_attr($title);?>"><?php wp_title(''); ?></h2>
            </div>
    </section>
        <!-- contact section -->
    <section class="not-found text-center section-padding">
        <h2 class="big-title"><?php echo esc_html__( 'Ooopps', 'tastybite' ); ?></h2>
        <p class="not-found-text">
            <?php echo esc_html__( '404', 'tastybite' ); ?>
        </p>
        <p class="text-uppercase text-black"><?php echo esc_html__( 'The Page you were looking for, could not be found', 'tastybite' ); ?>
        </p>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-custom">
            <?php echo esc_html__( 'Back to Home', 'tastybite' ); ?>
        </a>
    </section>
    
 <?php get_footer(); ?>