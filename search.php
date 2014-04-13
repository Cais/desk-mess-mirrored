<?php
/**
 * Search Template
 * Displays search results
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.2
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2014, Edward Caissie
 */

get_header(); ?>

	<div id="maintop"></div>
	<div id="wrapper">
		<div id="content">

			<div id="main-blog">
				<?php
				if ( have_posts() ) {
					printf(
						sprintf(
							'<div class="search-found-text">%1$s <span class="search-query">%2$s</span></div>',
							__( 'We found something! It looks like you searched for ...', 'desk-mess-mirrored' ),
							get_search_query()
						)
					);
					while ( have_posts() ) {
						the_post();
						get_template_part( 'desk-mess-mirrored', get_post_format() );
					}
					/** End while - have posts */
					get_template_part( 'dmm-navigation' );
				} else {
					dmm_no_posts_found();
				} /** End if - have posts */
				?>
			</div>
			<!--end main blog-->

			<?php get_sidebar(); ?>

			<div class="clear"></div>

		</div>
		<!--end content-->
	</div><!--end wrapper-->
<?php get_footer();