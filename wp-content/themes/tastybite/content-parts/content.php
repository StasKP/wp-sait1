
 <?php
/**
 * @package Tastybite
 */
?>
 <div class="blog">
    <?php if(has_post_thumbnail()) : ?>
        <div class="featured-pic">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('tastybite-page-thumbnail', array('class' => 'img-responsive')); ?>
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
        </ul>
        <h4 class="blog-title  txt-hover">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <div class="blg">
           <?php the_excerpt(); ?> 
        </div> 
        <a class="btn-secondry" href="<?php the_permalink(); ?>">
            <?php echo esc_html__('Read More', 'tastybite'); ?> 
        </a>                           
    </div>
</div>