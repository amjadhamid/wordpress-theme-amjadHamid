<!--comments.php-->

<?php if(have_comments()) : ?>
    <h5 class="comment-count text-center"><?php comments_number('No Comment' , '1 Comment' ,'%Comment') ?>
    </h5>
<ul class="list-unstyled our-comment-list">
    
        <?php
        $commentargs = array(
            'walker'            => '',  //new comment_walker
            'max_depth'         => '3', // the petter way
            'style'             => 'ul', // or ol
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'reply_text'        => 'Reply',
            'page'              => '',
            'per_page'          => '',
            'avatar_size'       => 54,
            'reverse_top_level' => null, //true make the last comment in top
            'reverse_children'  => '',
            'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
            'short_ping'        => false,   // @since 3.6
                'echo'              => true     // boolean, default is true
        );


        wp_list_comments($commentargs); ?>
    </ul>


       <!--  -->
    <?php if(get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <?php previous_comments_link('&larr; Older Comments'); ?>
        <?php next_comments_link('Newer Comments &rarr;'); ?>
    <?php endif; ?>

    <?php if(!comments_open()) : ?>
        <p>Comments are closed.</p>
    <?php endif; ?>

<?php endif; ?>


    <!--  -->
<?php // Start Comment Form with all the argument which included in it
$fields =  array(

    'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) .
    ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
    '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

    'email' =>
      '<p class="comment-form-email"><label for="email">' . __( 'Email (Your email address will not be published)', 'domainreference' ) .
      ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
      '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></p>',
  
    'url' =>
      '<p class="comment-form-url"><label for="url">' . __( 'Website', 'domainreference' ) . '</label>' .
      '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>',
  );

$args = array(
    'id_form'           => 'commentform',
    'class_form'      => 'comment-form',
    'id_submit'         => 'submit',
    'class_submit'      => 'submit button expanded',
    'name_submit'       => 'submit',
    'title_reply'       => __( 'Add Your Comment' ),
    'title_reply_to'    => __( 'Leave a Reply to %s' ),
    'cancel_reply_link' => __( 'Cancel Reply' ),
    'label_submit'      => __( 'Comment' ),
    'format'            => 'xhtml',
        
     'fields'           =>$fields,


    'comment_field' =>  '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) .
    '</label><textarea id="comment" name="comment" cols="65" rows="8" aria-required="true">' .
    '</textarea></p>',

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to post a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',
//  I delete the paragraph "Your email address will not be published" from here
  'comment_notes_before' => '<p class="comment-notes">' .
    __( '' ) . ( $req ? $required_text : '' ) .
    '</p>',

//   'comment_notes_after' => '<p class="form-allowed-tags">' .
//     sprintf(
//       __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ),
//       ' <code>' . allowed_tags() . '</code>'
//     ) . '</p>',

  'fields' => apply_filters( 'comment_form_default_fields', $fields ),
);


if(comments_open())
{
    echo '<hr>';
    comment_form($args);
}
?>
