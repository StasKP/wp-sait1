<?php 
// To display Blog Post section on front page
?>
<?php 
$tastybite_blog_section = get_theme_mod('tastybite_blog_section_hideshow','show');
$tastybite_blog_title = get_theme_mod('tastybite_blog_title'); 
if ($tastybite_blog_section =='show') { 
?>

<!-- blog section -->
    <section class="blog-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php if($tastybite_blog_title !=""){?>
                    <h2 class="main-title text-left">
                        <span class="bg-reverse">
                            <?php echo esc_html(get_theme_mod('tastybite_blog_title')); ?>
                        </span>
                    </h2>
                    <?php } ?>
                </div>
            </div>
            <div class="row center-grid">
                <?php 
                    $latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
                    if ( $latest_blog_posts->have_posts() ) : 
                        while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
                ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="blog">
                            <?php if(has_post_thumbnail()) : ?>
                                <div class="featured-pic">
                                    <a href="<?php the_permalink() ?>">
                                     	<?php the_post_thumbnail('tastybite-blog-front-thumbnail'); ?>
									</a>
                                </div>
                            <?php endif; ?>
                            <?php if(!has_post_thumbnail()) : ?>
                            <div class="content noimage">
                            <?php else : ?>
                            <div class="content">
                            <?php endif; ?>
                            <ul class="meta">
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    <?php the_time( get_option( 'date_format' ) ); ?>
                                </li>
                                <li>
									<i class="fa fa-comment-o"></i>
									<?php comments_number( __('0 Comment', 'tastybite'), __('1 Comment', 'tastybite'), __('% Comments', 'tastybite') ); ?>
								</li>
                                <li><i class="fa fa-user"></i>
                                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                     <?php the_author(); ?>
                                   </a>
                                </li>
                            </ul>
                            <h4 class="blog-title txt-hover">
                                <a href="<?php the_permalink();?>"> <?php the_title(); ?></a>
                            </h4>
                            <?php the_excerpt(); ?>
                            <a class="btn-secondry" href="<?php the_permalink(); ?>">
                                <?php echo esc_html__('Read More', 'tastybite'); ?> 
                            </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile; 
                            endif;
                    ?>
                </div>
            </div>
    </section>
<!-- blog section ends -->
<?php } ?>