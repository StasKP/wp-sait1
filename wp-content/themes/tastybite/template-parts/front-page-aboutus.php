<?php 
// To display About Us section on front page

    $tastybite_aboutus_section = get_theme_mod('tastybite_aboutus_section_hideshow','hide');
    $tastybite_aboutus_title   =  get_theme_mod('tastybite_aboutus_title');  
    $aboutus_pages[]          =  get_theme_mod( "tastybite_aboutus_page", 1 );

    $aboutus_no    = 6;
    
    $aboutus_args  = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $aboutus_pages ),
        'posts_per_page' => absint($aboutus_no),
        'orderby' => 'post__in'
    ); 
    
    $aboutus_query = new wp_Query( $aboutus_args );
     
     if( $tastybite_aboutus_section == "show") :

?>
<!-- About Section -->

        <section class="about-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-5 col-xs-11">
                                <?php if($tastybite_aboutus_title !=""){?>
                                <h2 class="main-title text-left">
                                    <span class="bg-reverse"><?php echo esc_html(get_theme_mod('tastybite_aboutus_title')); ?></span>
                                </h2>
                                <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                    <?php
                        if($aboutus_query->have_posts()) :
                           $aboutus_query->the_post();
                    ?>
                    <?php if(has_post_thumbnail()) { ?>
						<div class="col-md-6 hidden-sm hidden-xs">
							<div class="chef-figure">
								<?php the_post_thumbnail('tastybite-about-thumbnail'); ?>	
							</div>

						</div>
						<div class="col-md-6 hidden-sm hidden-xs">
							<div class="abt-content">
								<?php the_content(); ?>
							</div>

						</div>
						
						 <?php } 
                     else{ ?>

                        <div class="col-md-12">
                        <div class="abt-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    
                    <?php
                        }
                        endif;
                        wp_reset_postdata();
                    ?> 
                </div>
            </div>
        </section>
            <!-- End about Section -->
    <?php
      endif;
    ?>    