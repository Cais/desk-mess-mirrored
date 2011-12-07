<?php
/**
 * Desk Mess Mirrored Quote loop
 *
 * Displays the post-format => quote loop content.
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
 *
 * @internal    called with `get_template_part( 'desk-mess-mirrored', get_post_format() )`
 * @todo clean up files
 */
?>
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <div class="transparent glyph"><?php dmm_quote_glyph(); ?></div>
    <h1>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a>
    </h1>
    <div class="postdata">
        <?php printf( __( '%1$s by %2$s on %3$s in', 'desk-mess-mirrored' ), dmm_use_posted(), get_the_author(), get_the_time( get_option( 'date_format' ) ) );
        _e( ' ', 'desk-mess-mirrored' ); the_category( ', ' );
        if ( ! post_password_required() ) {
            if ( is_home() || is_front_page() ) { ?>
                <br /><?php comments_popup_link( __( ' with No Comments', 'desk-mess-mirrored' ), __( ' with 1 Comment', 'desk-mess-mirrored' ), __( ' with % Comments', 'desk-mess-mirrored' ), '', __( ' with Comments closed', 'desk-mess-mirrored' ) );
            }
        }
        the_shortlink( __( 'Short Link', 'desk-mess-mirrored' ), '', ' | ', '' );
        edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' | ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?>
    </div>
    <?php if ( is_home() || is_front_page() && has_post_thumbnail() ) {
        the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
    }
    the_content( __( 'Read more... ', 'desk-mess-mirrored' ) ); ?>
    <div class="clear"></div> <!-- For inserted media at the end of the post -->
    <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
    if ( is_single() ) { ?>
        <div id="author_link"><?php _e( '... other posts by ', 'desk-mess-mirrored' ); ?><?php the_author_posts_link(); ?></div>
    <?php } ?>
    <p class="single-meta"><?php the_tags(); ?></p>
</div> <!-- .post #post-ID -->