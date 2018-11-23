<?php
/**
 * The template for displaying search results pages.
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
		<div class="text-center">
			<?php if ( have_posts() ) : ?>
                <h2 class="title"> 
        	       <?php 
			        /* translators: %s: search term */
			        printf( esc_html__( 'Search Results for : %s', 'tastybite' ), '<span>' . get_search_query() . '</span>' ); ?>
		        </h2>
		    <?php else : ?>
		        <h2 class="title"><?php
			        /* translators: %s: nothing found term */
			        printf( esc_html__( 'Nothing Found for: %s', 'tastybite' ), '<span>' . get_search_query() . '</span>' ); ?>
		        </h2>
		    <?php endif; ?>
	    </div>
	</div>
</section>
<!-- End page-title -->

<section class="blog-section  blog-page section-padding">
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
				<div class="sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
        </div>

        <div class="pagi col-md-8">
            <?php the_posts_pagination(
    			array(
    				'prev_text' =>esc_html__('Prev','tastybite'),
                    'next_text' =>esc_html__('Next','tastybite')
    				)
    			); ?>
        </div>
    </div>
</section>
				
<!-- Main Content Section -->
<?php get_footer(); ?>