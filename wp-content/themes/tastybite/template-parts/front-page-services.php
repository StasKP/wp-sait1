<?php
/**
 * Template part - Service Section of FrontPage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tastybite
 */
    $tastybite_services_section = get_theme_mod( 'tastybite_services_section_hideshow','hide');
    $tastybite_services_title   =  get_theme_mod('tastybite_services_title');  
    $column_layout       = get_theme_mod( 'tastybite_column_layout', '4' );

   
    $services_no        = 6;
    $services_pages      = array();
    $services_icons     = array();
    
    for( $i = 1; $i <= $services_no; $i++ ) {
        $services_pages[]    =  get_theme_mod( "tastybite_service_page_$i", 1 );
        $services_icons[]    = get_theme_mod( "tastybite_page_service_icon_$i", '' );
    }

    $services_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $services_pages ),
        'posts_per_page' => absint($services_no),
        'orderby' => 'post__in'
    ); 
    
    $services_query = new wp_Query( $services_args );
     
     if( $tastybite_services_section == "show") :
    
?>

 <!-- service section  -->
        <section class="service-section service-bg section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-xs-11">
                        <?php if($tastybite_services_title != "")   {  ?>
                                <h2 class="main-title text-left">
                                    <span><?php echo esc_html(get_theme_mod('tastybite_services_title')); ?></span>
                                </h2>
                            <?php }?>
                    </div>
                </div>
                <div class="row">
                    <?php
                        $count = 0;
                        while($services_query->have_posts()) :
                        $services_query->the_post();
                    ?>
                    <div class="col-lg-<?php echo esc_attr($column_layout); ?> col-md-<?php echo esc_attr($column_layout); ?>">
                        <div class="row">
                            <div class="service">
                                <?php if($services_icons[$count] !="")
                                        {?>
                                            <div class="icon">
                                        <i aria-hidden="true" class="fa <?php echo esc_attr($services_icons[$count]); ?>"></i>
                                    </div>
                                        <?php } ?>
                                    
                                    <h4 class="service-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                                    <?php the_excerpt(); ?>
                                </div>
                            
                        </div>

                    </div>
                    <?php
                        $count = $count + 1;
                        endwhile;
                        wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>

<!-- End service Section -->
<?php
  endif;
?>