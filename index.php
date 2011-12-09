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
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @internal    REQUIRES WordPress version 3.1.0
 *
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
 * Last revised December 8, 2011
 * @todo review all changes for their effect on the Multi Child-Theme
 * @todo update Internet browser versions used for testing before releasing
 */
?>

<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <div class="clear">&nbsp;</div>
            <!-- Hack: the non-breaking space keeps the content below the menu when menus contain many top-level items -->
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'desk-mess-mirrored', get_post_format() );
                endwhile;
                get_template_part( 'dmm-navigation' );
            else : ?>
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