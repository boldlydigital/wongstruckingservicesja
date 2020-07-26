<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>
  <div class="comment-lists">
      <h3><?php comments_number( esc_html__('0 Comments', 'transpix'), esc_html__('1 Comment', 'transpix'), esc_html__('% Comments', 'transpix') ); ?></h3>
      <?php wp_list_comments('callback=transpix_theme_comment'); ?>     
  </div>
          <!-- START PAGINATION -->
      <?php
          if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
      ?>
      <div class="pagination_area">
           <nav>
                <ul class="pagination">
                     <li> <?php paginate_comments_links( 
                    array(
                    'prev_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-left"></i>', 'transpix' ),ENT_QUOTES),
                    'next_text' => wp_specialchars_decode(esc_html__( '<i class="fa fa-angle-right"></i>', 'transpix' ),ENT_QUOTES),
                    ));  ?>
                      </li>
                </ul>
           </nav>
      </div>
      <?php endif; ?>
          <!-- END PAGINATION --> 
<?php endif; ?>
                        
<?php
  if ( is_singular() ) wp_enqueue_script( "comment-reply" );
      $aria_req = ( $req ? " aria-required='true'" : '' );
      $comment_args = array(
              'id_form' => 'contacts-form',        
              'class_form' => '',                         
              'title_reply'=> wp_specialchars_decode( 'Leave a comment', 'transpix' ),
              'fields' => apply_filters( 'comment_form_default_fields', array(
                  'author' => '<div class="row"><div class="col-md-6">
                                  <div class="form-element"><input type="text" name="author" placeholder="'.esc_attr__('Your Name', 'transpix').'" required="required" data-error="Name is required."/></div>
                               </div>',
                  'email' => '<div class="col-md-6">
                                <div class="form-element"><input type="email" name="email" placeholder="'.esc_attr__('Your Email', 'transpix').'" required="required" data-error="Email is required." /></div>
                             </div></div>',

              ) ),   
              'comment_field' => '<div class="row"><div class="col-md-12">
                                    <div class="form-element reduced-mb"><textarea name="comment" id="comments" '.$aria_req.'cols="30" rows="10" placeholder="'.esc_attr__('Write a comment', 'transpix').'" required="required" data-error="Please,leave us a message."></textarea></div>
                                 </div></div>',                
               'label_submit' => esc_html__( 'Post A Comment', 'transpix' ),
               'comment_notes_before' => '',
               'comment_notes_after' => '',               
      )
  ?>

<?php if ( comments_open() ) : ?>
<?php comment_form($comment_args); ?>
<?php endif; ?> 
         