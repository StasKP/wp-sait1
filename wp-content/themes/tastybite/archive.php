<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

<!-- Main Content Section -->
   <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <h2 class="<?php echo esc_attr($title);?>"><?php wp_title(''); ?></h2>
            </div>
    </section>
            <!-- End page-title -->

    <section class="blog-section  blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="">
                        <?php if(have_posts()) : ?>
                    <?php while(have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <?php get_template_part('content-parts/content', get_post_format()); ?>
                        </div>
                    <?php endwhile; ?>
                    <?php else :  
                    get_template_part( 'content-parts/content', 'none' );
                     endif; ?>
                    </div>
                </div>
                    <!-- Side-bar -->
                <div class="col-md-4">
                    <aside class="sidebar">
                            <?php get_sidebar(); ?> 
                    </aside>
                </div>
            </div>

            <div class="pagi col-md-8">
                <?php the_posts_pagination(
                    array(
                        'prev_text' =>esc_html__('Prev','tastybite'),
                        'next_text' =>esc_html__('Next','tastybite')
                        )
                    ); 
                ?>
            </div>
        </div>
    </section>
				
<!-- Main Content Section -->

<?php get_footer(); ?>