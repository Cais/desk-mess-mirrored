<?php
/**
 * Desk Mess Mirrored
 *
 * Theme Description: Marble desktop covered with a mix of old and new items,
 * such as some vintage papers, a stainless steel pen, and, a hot cup of coffee!
 * Now with more documentation and post-format support for the following types:
 * asides, quotes and status!
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @internal    REQUIRES WordPress version 3.1.0
 * @internal    Tested up to WordPress version 3.4-alpha
 *
 * @version     2.0.3
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2012, Edward Caissie
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
 * @internal Project To-do List - see readme.txt for pre-2.0 PTL
 * @todo Review / Update 404.php page
 * @todo Review adding 'category.php' template back into theme files (also consider 'tag.php', 'date.php', etc.)
 * @todo Review post meta comment text - sort out how to show amount of comments if they exist when comments are closed
 * @todo Review verbiage used for the 'Page Link' on pages (see `the_shortlink`)
 * @todo Add Post-Format: Link - use infinity symbol (2.1-early)
 * @todo Add 'search.php' template? (see http://wordpress.org/support/topic/theme-desk-mess-mirrored-searchphp-for-theme-version-191)
 * @todo Add specific CSS to the placeholders used by the new (comment) author classes
 * @todo Add more i18n support, for example: create and include a current '.pot' file
 * @todo Review menu issues with bbPress?! see BNS comment: http://buynowshop.com/themes/desk-mess-mirrored/comment-page-3/#comment-12440
 * @todo Review About box in the 'author.php' template
 * @todo Review wp-title implementation for improvements
 *
 * Last revised April 5, 2012
 * Minor updates for WordPress 3.4-beta1 deprecated functions
 */
?>

<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'desk-mess-mirrored', get_post_format() );
                endwhile;
                get_template_part( 'dmm-navigation' );
            else : ?>
                <h2><?php printf( __( 'Search Results for: %s', 'desk-mess-mirrored' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                <p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'desk-mess-mirrored' ); ?></p>
                <?php get_search_form();
            endif; ?>
        </div><!--end main blog-->
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div><!--end content-->
</div><!--end wrapper-->
<?php get_footer(); ?>