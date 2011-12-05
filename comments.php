<?php
/**
 * @package     Desk_Mess_Mirrored
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2011, Edward Caissie
 *
 * Last revised December 5, 2011
 * @version 2.0
 */

// Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
    die ( __( 'Please do not load this page directly. Thanks!', 'desk-mess-mirrored' ) );
if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'desk-mess-mirrored' ); ?></p>
<?php return;
}

/**
 * Add Comment Classes
 *
 * Function creates classes to be added to the general comment_class via an
 * add_filter action.
 *
 * @package Desk_Mess_Mirrored
 * @since 1.0.2
 *
 * @param $classes
 * @return array
 *
 * @version 1.9.1
 * Last revised November 29, 2011
 * Combined user_ID class and microid class generation functions into a single function.
 * @todo Review user_ID class to be changed to user_capability class, or add user_capability class
 */
function dmm_add_comment_classes( $classes ) {
        global $comment;
        /** Add user ID based classes */
        if ( $comment->user_id == 1 ) {
            /** Administrator */
            $userid = "administrator user-id-1";
        } else {
            /** All other users - NB: user-id-0 -> non-registered user */
            $userid = "user-id-" . ( $comment->user_id );
        }
        $classes[] = $userid;

        /** Add microid */
        $c_email=get_comment_author_email();
        $c_url=get_comment_author_url();
        if ( ! empty( $c_email ) && !empty( $c_url ) ) {
            $microid = 'microid-mailto+http:sha1:' . sha1( sha1( 'mailto:'.$c_email ) . sha1( $c_url ) );
            $classes[] = $microid;
        }
        return $classes;
}
add_filter( 'comment_class', 'dmm_add_comment_classes' );
// End Add Comment Classes
?>

<div id="comments-main">
    <?php
    /** Show comments */
	if ( have_comments() ) : ?>
        <h4 id="comments"><?php comments_number( __( 'No Comments', 'desk-mess-mirrored' ), __( '1 Comment', 'desk-mess-mirrored' ), __( '% Comments', 'desk-mess-mirrored' ) );?></h4>
        <ul class="commentlist" id="singlecomments">
            <?php wp_list_comments( array( 'avatar_size' => 60, 'reply_text' => __( '&raquo; Reply to this Comment &laquo;', 'desk-mess-mirrored' ) ) ); ?>
        </ul>
        <div class="navigation">
            <div class="alignleft"><?php previous_comments_link() ?></div>
            <div class="alignright"><?php next_comments_link() ?></div>
        </div>
    <?php else : // Display if there are no comments so far
        /** @var $post string */
        if ( 'open' == $post->comment_status ) :
            // If comments are open, but there are no comments.
        else :
            // comments are closed
        endif;
    endif;
    comment_form(); ?>
</div> <!-- #comments-main -->
<?php /* Last revised November 28, 2011 v1.9.1 */ ?>