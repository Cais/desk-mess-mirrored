<?php
/**
 * Author Template
 *
 * Displays author specific posts
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2012, Edward Caissie
 *
 * Last revised December 11, 2011
 * @version     2.0
 * Rewrote the class assigned to the #author box by adding the author role as a class name.
 */

get_header();
/** Set the $curauth variable */
$curauth = ( get_query_var( 'author_name ' ) ) ? get_user_by( 'id', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <div class="clear">&nbsp;</div>
            <!-- Hack: the non-breaking space keeps the content below the menu when menus contain many top-level items -->
            <div id="author" class="<?php
                    /**
                     * Add class as related to the user role (see 'Role:' drop-down in User options)
                     * @todo add additional CSS to reflect the new classes being used for authors
                     */
                    if ( user_can( $curauth->ID, 'administrator' ) ) {
                        echo 'administrator';
                    } elseif ( user_can( $curauth->ID, 'editor' ) ) {
                        echo 'editor';
                    } elseif ( user_can( $curauth->ID, 'contributor' ) ) {
                        echo 'contributor';
                    } elseif ( user_can( $curauth->ID, 'subscriber' ) ) {
                        echo 'subscriber';
                    } else {
                        echo 'guest';
                    }
                    if ( ( $curauth->ID ) == '1' ) echo ' administrator-prime'; /* sample */
                    // elseif ( ( $curauth->ID ) == '2' ) echo ' jellybeen'; /* sample */
                    // add user classes by ID following the above samples
                    ?>">
                <h2><?php _e( 'About ', 'desk-mess-mirrored' ); echo $curauth->display_name; ?></h2>
                <ul>
                    <li><?php _e( 'Website', 'desk-mess-mirrored' ); ?>: <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a> <?php _e( 'or', 'desk-mess-mirrored' ); ?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php _e( 'email', 'desk-mess-mirrored' ); ?></a></li>
                    <li><?php _e( 'Biography', 'desk-mess-mirrored' ); ?>: <?php echo $curauth->user_description; ?></li>
                </ul>
            </div> <!-- #author -->
            <h2><?php _e( 'Posts by ', 'desk-mess-mirrored' ); echo $curauth->display_name; ?>:</h2>
            <!-- start the Loop -->
            <?php if ( have_posts() ) :
                global $count;
                $count = 0;
                while ( have_posts() ) : the_post();
                    get_template_part( 'desk-mess-mirrored', get_post_format() );
                endwhile;
                get_template_part( 'dmm-navigation' );
            else : ?>
                <h2><?php printf( __( 'Search Results for: %s', 'desk-mess-mirrored' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                <p class="center"><?php _e( 'Sorry, there are no posts by this author.', 'desk-mess-mirrored' ); ?></p>
                <?php get_search_form();
            endif; ?>
            <!-- end the Loop -->
        </div><!--end main blog-->
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div><!--end content-->
</div><!--end wrapper-->
<?php get_footer();?>