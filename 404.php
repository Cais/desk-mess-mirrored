<?php
/**
 * 404 Template
 * Displays if/when 404 page is required to be displayed
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        https://wordpress.org/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
 *
 * @version     2.1
 * @date        December 3, 2012
 * Added 'DMM No Posts Found' function to replace repetitive code
 *
 * @version     2.2
 * @date        February 26, 2013
 * Added some additional text and relevant i18n support
 */
get_header(); ?>

	<div id="maintop"></div>

	<div id="wrapper">

		<div id="content">

			<div id="main-blog">

				<h1><?php _e( 'You have arrived at the 404 page!!!', 'desk-mess-mirrored' ); ?></h1>

				<?php
				$message_404 = __( 'This is not the page you are looking for ...', 'desk-mess-mirrored' ) . '<br />';
				$message_404 .= __( '... well, that is rather obvious. No one really looks for a 404 page.', 'desk-mess-mirrored' ) . '<br />';
				$message_404 .= '<br />';
				$message_404 .= __( 'We apologize for the inconvenience, would you care to look for something else?', 'desk-mess-mirrored' ) . '<br />';

				echo $message_404; ?>

				<?php if ( have_posts() ) {

					while ( have_posts() ) {
						the_post();
						get_template_part( 'desk-mess-mirrored', get_post_format() );
					}

					get_template_part( 'dmm-navigation' );

				} else {

					dmm_no_posts_found();

				} ?>

			</div>
			<!--end main blog-->

			<?php get_sidebar(); ?>

			<div class="clear"></div>

		</div>
		<!--end content-->

	</div><!--end wrapper-->

<?php get_footer();