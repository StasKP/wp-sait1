<?php
/**
 * function for Comment layout
 */
function tastybite_comments( $comment, $args, $depth ) { ?>
	<div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
		<?php if ($comment->comment_approved == '0') : ?>
			<div class="alert alert-info">
			  <p><?php esc_html_e( 'Your comment is awaiting moderation.', 'tastybite' ) ?></p>
			</div>
		<?php endif; ?>
		
		<div class="single-comment comment-border">
			<div class="comment-img">
			    <a href="#"><?php echo get_avatar( $comment,'110', null,'User', array( 'class' => array( 'media-object','' ) )); ?></a>
		    </div>

			<div class="comment-text">
			    <h3>
				   <?php 
						/* translators: '%1$s %2$s: edit term */
				    printf(esc_html__( '%1$s %2$s', 'tastybite' ), get_comment_author_link(), edit_comment_link(esc_html__( '(Edit)', 'tastybite' ),'  ','') )
				    ?>
			     </h3>
			    <span><time datetime="<?php echo comment_time('c'); ?>">
				<?php printf(  /* translators: 1: date, 2: time */
					_x( '%1$s at %2$s', '1: date, 2: time', 'tastybite' ),
						get_comment_date(),
						get_comment_time()
					); ?></time></time>
			    </span> 
			    <?php comment_text() ;?>
			    <i class="fa fa-mail-reply"> </i><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		    </div>
		</div>
	</div>
<?php
} 