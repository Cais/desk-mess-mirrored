<?php
/**
 * Desk Mess Mirrored loops
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2011, Edward Caissie
 */
?>

<div class="clear">&nbsp;</div>
<!-- Hack: the non-breaking space keeps the content below the menu when menus contain many top-level items -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php if ( ! post_password_required() ) { ?>
        <div class="post-comments">
            <?php comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), __( '%', 'desk-mess-mirrored' ), '',__( '-', 'desk-mess-mirrored' ) ); ?>
        </div>
    <?php } ?>
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
    <div class="postdata">
        <?php printf( __( '%1$s by %2$s on ', 'desk-mess-mirrored' ), dmm_use_posted(), get_the_author() );
        the_time( get_option( 'date_format' ) );
        _e( ' in ', 'desk-mess-mirrored' ); the_category( ', ' ); edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' | ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?>
    </div><!-- .postdata -->
    <?php if ( has_post_thumbnail() ) {
        the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
    }
    the_content( __( ' ... continue reading. ', 'desk-mess-mirrored' ) ); ?>
    <div class="clear"></div> <!-- For inserted media at the end of the post -->
    <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
    <p class="single-meta"><?php the_tags(); ?></p>
</div> <!-- .post #post-ID -->