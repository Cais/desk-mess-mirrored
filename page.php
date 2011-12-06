<?php
/**
 * Page Template
 *
 * Displays posts that are designated as "Pages"
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2011, Edward Caissie
 *
 * Last revised December 6, 2011
 * @version     2.0
 */

get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    get_template_part( 'desk-mess-mirrored', get_post_format() );
                endwhile;
            else : ?>
                <h2><?php printf( __( 'Search Results for: %s' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>
                <p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'desk-mess-mirrored' ); ?></p>
                <?php get_search_form(); ?>
            <?php endif; ?>
        </div><!-- #main blog -->
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div><!-- #content -->
</div><!-- #wrapper -->
<?php get_footer();?>