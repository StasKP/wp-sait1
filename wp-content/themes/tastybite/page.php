<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Tastybite
*/
 get_header(); 
 get_template_part( 'lib/page-header' );
?>

<!-- Main Content Section -->  
       

        <section class="blog-section blog-page section-padding page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                           <?php if(have_posts()) : ?>
                            <?php while(have_posts()) : the_post(); ?>
									<div class="blog ">
										<?php if(has_post_thumbnail()){ ?>
										<div class="page-img-box">
											<div class="hover-effect">
												<?php the_post_thumbnail('tastybite-page-thumbnail', array('class' => 'img-responsive')); ?>
											</div>
										</div>
										<?php } ?>                               
											<div class="content abt-content">                                
												<?php the_content(); 
													wp_link_pages( array(
														'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'tastybite' ),
														'after'  => '</div>',
													) );
												?>
											</div>
									</div>
                                    <?php endwhile; ?>
                                    <?php else :  
                                    get_template_part( 'content-parts/content', 'none' );
                                    endif; ?>
                                   <!-- Comments -->
                                    <div class="spacer-80"></div>
                                    <?php 
                                        if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                        endif; 
                                    ?> 
                                   <!--End Comments -->
                               </div>
                               <!-- Side-bar -->
                                <div class="col-md-4">
                                    <?php get_sidebar(); ?> 
                                </div>
                    </div>
                </div>
            </div>
        </section>

<!-- Main Content Section End-->
<?php get_footer(); ?>