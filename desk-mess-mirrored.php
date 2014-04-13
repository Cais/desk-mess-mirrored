<?php
/**
 * Desk Mess Mirrored loops
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
 * @copyright   Copyright (c) 2009-2014, Edward Caissie
 *
 * @uses        get_template_part( 'desk-mess-mirrored', get_post_format() )
 *
 * @internal    for 404, archive, author, index (home, front-page), page, single templates
 *
 * @version     2.0.3
 * @date        May 24, 2012
 * Added conditional check for custom post types
 *
 * @version     2.2
 * @date        February 24, 2013
 * Refactor post meta details into a better string output
 *
 * @version     2.2.3
 * @date        November 16, 2013
 * Made "Page Permalink" link conditionally display with default as false.
 *
 * @version     2.2.4
 * @date        April 13, 2014
 * Added `dmm_post_meta_link_edit()` function with filter hooks for DRY purposes
 */

/** Set count variable for author 'mullet' loop */
global $count, $post;
$count ++; ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php if ( is_page() ) { ?>
			<h1><?php the_title(); ?></h1>
			<?php edit_post_link( __( 'Edit This Page', 'desk-mess-mirrored' ), __( '&raquo;', 'desk-mess-mirrored' ), __( '&laquo;', 'desk-mess-mirrored' ) );
		}
		/** End if - is page */

		if ( ! post_password_required() && ( comments_open() || ( get_comments_number() > 0 ) ) ) {
			?>
			<div class="post-comments">
				<?php comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), __( '%', 'desk-mess-mirrored' ), '', __( '-', 'desk-mess-mirrored' ) ); ?>
			</div>
		<?php
		}
		/** End if - not post password required */

		if ( ! is_page() ) {
			?>
			<h1>
				<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h1>
			<div class="postdata">
				<?php
				printf(
					__( '%1$s by %2$s on %3$s in %4$s', 'desk-mess-mirrored' ),
					dmm_use_posted(),
					get_the_author(),
					get_the_time( get_option( 'date_format' ) ),
					get_the_category_list( ', ' )
				);
				if ( ! post_password_required() && ! comments_open() && ( is_home() || is_front_page() ) ) {
					/** Only displays when comments are closed */
					echo ' ';
					comments_popup_link( '', '', '', '', __( 'with Comments closed', 'desk-mess-mirrored' ) );
				}
				/** End if - not post password required */
				dmm_post_meta_link_edit(); ?>
			</div><!-- .postdata -->
		<?php
		}
		/** End if - is page */

		if ( has_post_thumbnail() && ( $post->post_type == 'post' ) ) {
			the_post_thumbnail( 'full', array( 'class' => 'aligncenter' ) );
		}
		/** End if - has post thumbnail */

		if ( is_home() || is_front_page() || is_single() || is_page() || ( is_author() && ( $count == 1 ) ) ) {
			the_content( __( 'Read more... ', 'desk-mess-mirrored' ) ); ?>
			<div class="clear"><!-- For inserted media at the end of the post --></div>
			<?php wp_link_pages(
				array(
					'before'         => '<p id="wp-link-pages"><strong>' . __( 'Pages:', 'desk-mess-mirrored' ) . '</strong> ',
					'after'          => '</p>',
					'next_or_number' => 'number'
				)
			);
		} else {
			the_excerpt(); ?>
			<div class="clear"><!-- For inserted media at the end of the post --></div>
		<?php
		}
		/** End if - is home */

		if ( is_single() ) {
			?>
			<div id="author_link"><?php _e( '... other posts by ', 'desk-mess-mirrored' ); ?><?php the_author_posts_link(); ?></div>
		<?php
		}
		/** End if - is single */

		/** Show a shortlink on the page - requires Jetpack be active */
		if ( DMM_SHOW_PAGE_PERMALINK ) {
			dmm_page_link( $text = __( 'Page Permalink', 'desk-mess-mirrored' ) );
		} /** End if - Show Page Permalink */
		?>

		<p class="single-meta"><?php the_tags(); ?></p>

	</div> <!-- .post #post-ID -->

<?php comments_template();