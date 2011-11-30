<?php
/**
 * Desk Mess Mirrored
 *
 * Theme Description: Marble desktop covered with a mix of old and new items,
 * such as some vintage papers, a stainless steel pen, and, a hot cup of coffee!
 * Now with drop-down menu support! Please read the included changelog.txt,
 * readme.txt, and support.txt files for details of the latest changes and
 * important notices.
 *
 * @package     Desk_Mess_Mirrored
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 * @version     2.0
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2011, Edward Caissie
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License version 2, as published by the
 * Free Software Foundation.
 *
 * You may NOT assume that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details
 *
 * You should have received a copy of the GNU General Public License along with
 * this program; if not, write to:
 *
 *      Free Software Foundation, Inc.
 *      51 Franklin St, Fifth Floor
 *      Boston, MA  02110-1301  USA
 *
 * The license for this software can also likely be found here:
 * http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Last revised November 28, 2011
 * @todo move this doc-block to header.php?
 */
?>

<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
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
                            <?php printf( __( 'Posted by %1$s on ', 'desk-mess-mirrored' ), get_the_author() );
                            /**
                             * for posts without titles - creates a permalink using the post date referencing the post ID
                             * @todo look at using the word 'Posted' instead of the date
                             **/
                            if ( get_the_title() == "" ) { ?>
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to post ', 'desk-mess-mirrored' ); the_id(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                            <?php } else {
                                the_time( get_option( 'date_format' ) );
                            }
                            _e( ' in ', 'desk-mess-mirrored' ); the_category( ', ' ); edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' &#124; ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?>
                        </div><!-- .postdata -->
                        <?php if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
                        }
                        the_content( __( ' ... continue reading. ', 'desk-mess-mirrored' ) ); ?>
                        <div class="clear"></div> <!-- For inserted media at the end of the post -->
                        <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
                        <p class="single-meta"><?php the_tags(); ?></p>
                    </div> <!-- .post #post-ID -->
                <?php endwhile; ?>
                <div id="nav-global" class="navigation">
                    <div class="left">
                        <?php next_posts_link( __( '&laquo; Previous entries', 'desk-mess-mirrored' ) ); ?>
                    </div>
                    <div class="right">
                        <?php previous_posts_link( __( 'Next entries &raquo;', 'desk-mess-mirrored' ) ); ?>
                    </div>
                </div>
            <?php else : ?>
                <h2><?php printf( __( 'Search Results for: %s' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                <p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'desk-mess-mirrored' ); ?></p>
                <?php get_search_form();
            endif; ?>
        </div><!--end main blog-->
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div><!--end content-->
</div><!--end wrapper-->
<?php get_footer(); ?>
<?php /* Last revised November 28, 2011 v1.9.1 */ ?>