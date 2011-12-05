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

get_header();
/** Set the $curauth variable */
$curauth = ( get_query_var( 'author_name ') ) ? get_user_by( 'id', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) );
?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <div id="author" class="<?php
                    /** @var $author string */ if ( ( get_userdata( intval( $author ) )->ID ) == '1' ) echo 'administrator';
                    /** elseif ( ( get_userdata( intval( $author ) )->ID ) == '2' ) echo 'jellybeen'; */ /* sample */
                    /** add additional user_id following above example, echo the 'CSS element' you want to use for styling
                     * @todo re-write this ... preferably remove the whole thing, but for backward compatibility it probably needs to be re-written
                     */ ?>">
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
                endwhile; ?>
                <div id="nav-global" class="navigation">
                    <div class="left">
                        <?php next_posts_link( __( '&laquo; Previous entries', 'desk-mess-mirrored' ) ); ?>
                    </div>
                    <div class="right">
                        <?php previous_posts_link( __( 'Next entries &raquo;', 'desk-mess-mirrored' ) ); ?>
                    </div>
                </div> <!-- .navigation -->
            <?php else : ?>
                <h2><?php printf( __( 'Search Results for: %s' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
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