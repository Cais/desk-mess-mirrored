<?php // Do not delete these lines
if ( !empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) )
    die ( __( 'Please do not load this page directly. Thanks!', 'desk-mess-mirrored' ) );
if ( post_password_required() ) { ?>
    <p class="nocomments"><?php _e( 'This post is password protected. Enter the password to view comments.', 'desk-mess-mirrored' ); ?></p>
<?php return;
}

/**
 * Add Comment Classes
 *
 * @package Desk_Mess_Mirrored
 *
 * @param $classes
 * @return array
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
<?php // show the comments
	if ( have_comments() ) : ?>
	  <h4 id="comments"><?php comments_number( __( 'No Comments', 'desk-mess-mirrored' ), __( '1 Comment', 'desk-mess-mirrored' ), __( '% Comments', 'desk-mess-mirrored' ) );?></h4>
		<ul class="commentlist" id="singlecomments">
			<?php wp_list_comments( array( 'avatar_size' => 60, 'reply_text' => __( '&raquo; Reply to this Comment &laquo;', 'desk-mess-mirrored' ) ) ); ?>
		</ul>
		<div class="navigation">
			<div class="alignleft"><?php previous_comments_link() ?></div>
			<div class="alignright"><?php next_comments_link() ?></div>
		</div>
	<?php else : // this is displayed if there are no comments so far ?>
		<?php if ( 'open' == $post->comment_status ) :
			// If comments are open, but there are no comments.
		else : 
			// comments are closed 
		endif;
	endif;
	comment_form();
?>
</div> <!-- #comments-main -->
<?php /* Last Revision: November 27, 2010 v1.8.2 */ ?>