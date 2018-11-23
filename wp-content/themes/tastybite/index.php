<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page.
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

    <section class="page-title" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
            <div class="container">
                <h2 class="<?php echo esc_attr($title);?>"><?php $page_title = get_the_title( get_option('page_for_posts', true) );
				echo esc_html($page_title); ?></h2>
            </div>
    </section>
			<!-- End page-title -->

    <section class="blog-section  blog-page section-padding blog-indexing">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <?php if(have_posts()) : ?>
    				<?php while(have_posts()) : the_post(); ?>
                        <div class="">
						    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							     <?php get_template_part('content-parts/content', get_post_format()); ?>
						    </div>
                        </div>
    				<?php endwhile; ?>
    				<?php else :  
    				     get_template_part( 'content-parts/content', 'none' );
    			     endif; 
                     ?>
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