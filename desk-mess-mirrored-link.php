<?php
/**
 * Desk Mess Mirrored Link loop
 * Displays the post-format => link loop content.
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.2.3
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        https://wordpress.org/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
 *
 * @version     2.2.4
 * @date        April 13, 2014
 * Added `dmm_post_meta_link_edit()` function with filter hooks for DRY purposes
 *
 * @version     2.4
 * @date        May 16, 2015
 * Improved i18n implementation
 */
?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<div class="transparent glyph"><?php dmm_link_glyph(); ?></div>

		<?php if ( ! post_password_required() && ( comments_open() || ( get_comments_number() > 0 ) ) ) { ?>

			<div class="post-comments">
				<?php comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), '%', '', '-' ); ?>
			</div>

		<?php } ?>

		<h1>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(
				array(
					'before' => __( 'Permalink to: ', 'desk-mess-mirrored' ),
					'after'  => ''
				)
			); ?>"><?php the_title(); ?></a>
		</h1>

		<div class="postdata">

			<?php if ( is_home() || is_front_page() ) {

				printf(
					__( 'Posted by %1$s on %2$s in %3$s', 'desk-mess-mirrored' ),
					get_the_author(),
					get_the_time( get_option( 'date_format' ) ),
					get_the_category_list( ', ' )
				);

				if ( ! post_password_required() && ! comments_open() && ( is_home() || is_front_page() ) ) {

					/** Only displays when comments are closed */
					echo '<br />';
					comments_popup_link( '', '', '', '', __( 'with Comments closed', 'desk-mess-mirrored' ) );

				}

			} else {

				printf(
					__( 'Posted by %1$s on %2$s @ %3$s<br />in %4$s', 'desk-mess-mirrored' ),
					get_the_author(),
					get_the_time( get_option( 'date_format' ) ),
					get_the_time( get_option( 'time_format' ) ),
					get_the_category_list( ', ' )
				);

			}

			dmm_post_meta_link_edit(); ?>

		</div>

		<?php if ( is_home() || is_front_page() && has_post_thumbnail() ) {
			the_post_thumbnail( 'thumbnail', array( 'class' => 'alignleft' ) );
		}

		the_content( __( 'Read more...', 'desk-mess-mirrored' ) ); ?>

		<div class="clear"><!-- For inserted media at the end of the post --></div>

		<?php wp_link_pages(
			array(
				'before'         => '<p id="wp-link-pages"><strong>' . __( 'Pages:', 'desk-mess-mirrored' ) . '</strong> ',
				'after'          => '</p>',
				'next_or_number' => 'number'
			)
		);

		if ( is_single() ) { ?>

			<div id="author_link">
				<?php printf( '%1$s %2$s', __( '... other posts by', 'desk-mess-mirrored' ), the_author_posts_link() ); ?>
			</div>

			<?php dmm_modified_post();

		} ?>

		<p class="single-meta"><?php the_tags(); ?></p>

	</div> <!-- .post #post-ID -->

<?php comments_template();