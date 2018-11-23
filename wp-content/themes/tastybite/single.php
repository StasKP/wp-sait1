<?php
/**
 * The template for displaying all single posts.
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

<section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
    <div class="container">
        <h2 class="<?php echo esc_attr($title);?>"><?php wp_title(''); ?></h2>
    </div>
</section>

<section class="blog-section blog-details-bg  blog-detail-page section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                    if(have_posts()) : 
                ?>
                <?php while(have_posts()) : the_post(); ?>
                    <?php  get_template_part( 'content-parts/content', 'single' ); ?>
                <?php endwhile; ?>
                    <?php else : 
                       get_template_part( 'content-parts/content', 'none' );
                     endif; 
                    ?>
            </div>
            <div class="col-md-4">
                <aside class="sidebar">
                    <?php get_sidebar(); ?> 
                </aside>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>