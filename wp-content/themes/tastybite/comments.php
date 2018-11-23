     <?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage tastybite
 * @since Tastybite 
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */          
             
                         
if ( post_password_required() ) {
    return;
}
?>
                        
    <div class="blog-comment pb60">
        <?php if ( have_comments() ) : ?>
           <div class="row">
          <div class="col-xs-11 col-sm-6">
            <h4 class="main-title text-left">
              <span>
                <?php
                    $comments_number = get_comments_number();
                    if ( 1 === $comments_number ) {
                    /* translators: %s: post title */
                    printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','tastybite' ), get_the_title() );
                    } else{
                        printf(
                            /* translators: 1: number of comments, 2: post title */
                            _nx('%1$s Comment found','%1$s comments', $comments_number, 'comments title', 'tastybite' ),
                            esc_html (number_format_i18n( $comments_number ) ),
                            get_the_title()
                        );
                    }
                ?>
                </span>
            </h4>
             </div>
             </div>

           <?php the_comments_navigation(); ?>
          <div class="comments">
           <ul>
                <?php
                     wp_list_comments( array(
                         'style'       => 'ul',
                         'short_ping'  => true,
                         'avatar_size' => 42,
                         'callback' => 'tastybite_comments',
                    ) );
                ?>
            </ul>
          </div>
            <!-- .comment-list -->

            <?php the_comments_navigation(); ?>

        <?php endif; // Check for have_comments(). ?>

        <?php
          // If comments are closed and there are comments, let's leave a little note, shall we?
           if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'tastybite' ) ) :
        ?>
             <p class="no-comments"><?php esc_html__( 'Comments are closed.', 'tastybite' ); ?></p> 
          <?php endif; ?>
    
        <?php 
            $req      = get_option( 'require_name_email' );
            $aria_req = ( $req ? " aria-required='true'" : '' );

            $comments_args = array
           (
            'submit_button' => '<div class="form-group">'.
              '<button  name="%1$s" type="submit" id="%2$s" class="btn-secondry" value="'. esc_attr__('Send message','tastybite') .'"> Post Comment</button>'.
            '</div>',

            'title_reply'  =>  __( '<div class="row">
                                <div class="col-xs-11 col-sm-6"><h4 class="main-title text-left">
                                        <span>
                                            Leave Comment
                                        </span>
                                    </h4> </div>
                            </div>', 'tastybite'  ), 
            'comment_notes_after' => '',  
                
            'comment_field' =>  
                '<div class="col-md-12 col-xs-12 area"><div class="input-box"><textarea class="form-control" id="comment" name="comment" placeholder="' . esc_attr__( 'Comment here', 'tastybite' ) . '" rows="12" aria-required="true" '. $aria_req . '>' .
                '</textarea></div></div>',

            'fields' => apply_filters( 'comment_form_default_fields', array (
                'author' => '<div class="col-xs-6 sm-full cmtname"><div class="input-box">'.               
                    '<input id="author" class="form-control " name="author" placeholder="' . esc_attr__( 'Your Name *', 'tastybite' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
                    '" size="30"' . $aria_req . ' />
                    <span>
                      <i class="fa fa-pencil"></i>
                    </span></div></div>',

            'email' =>'<div class="col-xs-6 sm-full cmtmail"><div class="input-box">'.
                    '<input id="email" class="form-control" name="email" placeholder="' . esc_attr__( 'Your Email *', 'tastybite' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                    '" size="30"' . $aria_req . ' />
                    <span>
                      <i class="fa fa-envelope"></i>
                    </span></div></div>',
            
               ) ),
            );
       ?>
    </div> 
            
    <div class="leave-comment">
        <div class="leave-comment-form">
          <?php
           comment_form($comments_args);
          ?>
        </div>
    </div>