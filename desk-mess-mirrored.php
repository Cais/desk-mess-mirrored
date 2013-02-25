<?php
/**
 * Desk Mess Mirrored loops
 *
 * Displays the default loop content.
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2013, Edward Caissie
 *
 * @uses        get_template_part( 'desk-mess-mirrored', get_post_format() )
 *
 * @internal    for 404, archive, author, index (home, front-page), page, single templates
 *
 * @version     2.0.3
 * @date        May 24, 2012
 * Added conditional check for custom post types
 */

/** Set count variable for author 'mullet' loop */
global $count, $post;
$count++; ?>

<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <?php if ( is_page() ) { ?>
        <h1><?php the_title(); ?></h1>
        <?php edit_post_link( __( 'Edit This Page', 'desk-mess-mirrored' ), __( '&raquo;', 'desk-mess-mirrored' ), __( '&laquo;', 'desk-mess-mirrored' ) );
    } /** End if - is page */

    if ( ! post_password_required() && ( comments_open() || ( get_comments_number() > 0 ) ) ) { ?>
        <div class="post-comments">
            <?php comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), __( '%', 'desk-mess-mirrored' ), '',__( '-', 'desk-mess-mirrored' ) ); ?>
        </div>
    <?php } /** End if - not post password required */

    if ( ! is_page() ) { ?>
        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <div class="postdata">
            <?php printf( __( '%1$s by %2$s on ', 'desk-mess-mirrored' ), dmm_use_posted(), get_the_author() ); the_time( get_option( 'date_format' ) );
            _e( ' in ', 'desk-mess-mirrored' ); the_category( ', ' );
            if ( ! post_password_required() && ! comments_open() && ( is_home() || is_front_page() ) ) {
                /** Only displays when comments are closed */
                echo ' '; comments_popup_link( '', '', '', '', __( 'with Comments closed', 'desk-mess-mirrored' ) );
            } /** End if - not post password required */
            the_shortlink( __( '&#8734;', 'desk-mess-mirrored' ), '', ' | ', '' ); edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' | ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?>
        </div><!-- .postdata -->
    <?php } /** End if - is page */

    if ( has_post_thumbnail() && ( $post->post_type == 'post' ) ) {
        the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
    } /** End if - has post thumbnail */

    if ( is_home() || is_front_page() || is_single() || is_page() || ( is_author() && ( $count == 1 ) ) ) {
        the_content( __( 'Read more... ', 'desk-mess-mirrored' ) ); ?>
        <div class="clear"><!-- For inserted media at the end of the post --></div>
        <?php wp_link_pages( array( 'before' => '<p id="wp-link-pages"><strong>' . __( 'Pages:', 'desk-mess-mirrored' ) . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) );
    } else {
        the_excerpt(); ?>
        <div class="clear"><!-- For inserted media at the end of the post --></div>
    <?php } /** End if - is home */

    if ( is_single() ) { ?>
        <div id="author_link"><?php _e( '... other posts by ', 'desk-mess-mirrored' ); ?><?php the_author_posts_link(); ?></div>
    <?php } /** End if - is single */

    if ( is_page() ) {
        the_shortlink( __( 'Page Link', 'desk-mess-mirrored' ), '', '<div class="page-shortlink">&raquo', '&laquo</div>' );
    } /** End if - is page */ ?>

    <p class="single-meta"><?php the_tags(); ?></p>

</div> <!-- .post #post-ID -->

<?php comments_template();