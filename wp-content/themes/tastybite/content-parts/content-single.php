<?php 

/* For Single page Results
*/

?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       <div class="blog">
            <div class="featured-pic">
                <?php if(has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('tastybite-page-thumbnail', array('class' => 'img-responsive')); ?>
                <?php endif; ?>
            </div>

            <?php if(!has_post_thumbnail()) : ?>
            <div class="content noimage">
            <?php else : ?>
            <div class="content">
            <?php endif; ?>
                <ul class="meta">
                    <li>
                        <i class="fa fa-calendar"></i><?php the_time( get_option( 'date_format' ) ); ?>
                    </li>

                    <li>
                        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                            <i class="fa fa-user"></i><?php the_author(); ?>
                        </a>
                    </li>

                    <li>
                        <i class="fa fa-comment-o"></i><?php comments_number( __('0 Comment', 'tastybite'), __('1 Comment', 'tastybite'), __('% Comments', 'tastybite') ); ?>
                    </li>
                    <?php if(has_category()){ ?>
                    <li>
                        <i class="fa fa-folder-open"></i><?php the_category(',&nbsp;'); ?>
                    </li>
                    <?php } ?>
                </ul>
                <h2 class="blog-title">
                    <?php the_title(); ?>
                </h2>
                <div class="blg">
                    <?php the_content(); ?>
                </div>
                                
                <div class="row">
                    <div class="col-md-12">
                        <div class="blog-tags m-top20">
                            <ul>
                                <li>
                                    <?php if (has_tag()) : ?>
                                        <?php
                                           $seperator = ''; // blank instead of comma
                                        ?>
                                        <?php echo esc_html__(' ', 'tastybite' ); ?><?php the_tags( $seperator,'&nbsp;'); ?>
                                    <?php endif; ?>    

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                

                
                
            </div>
        </div>
         
        <section class="comment-section">
			<?php 
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif; 
			?> 
        </section>
        </div>