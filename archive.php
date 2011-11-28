<?php get_header(); ?>
<div id="maintop"></div><!--end maintop-->
<div id="wrapper">
	<div id="content">
		<div id="main-blog">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="clear">&nbsp;</div>
					<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
						<div class="post-comments">
							<?php if ( ! post_password_required() ) {
								comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), __( '%', 'desk-mess-mirrored' ), '',__( '-', 'desk-mess-mirrored' ) );
							} ?>
						</div>
						<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' );?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<div class="postdata">
							<?php printf( __( 'Posted by %1$s on ', 'desk-mess-mirrored' ), get_the_author() );
								if ( get_the_title() == "" ) { /* for posts without titles - creates a permalink using the post date referencing the post ID */ ?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to post ', 'desk-mess-mirrored' ); the_id(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
								<?php } else {
									the_time( get_option( 'date_format' ) );
								}
								_e( ' in ', 'desk-mess-mirrored' ); the_category( ', ' ); edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' &#124; ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?>
						</div>
						<?php the_excerpt(); ?>
						<p class="single-meta" style="float:right; margin-top:5px; margin-right:10px; font-size:11px; "> <?php the_tags(); ?></p>	
					</div> <!-- .post #post-id -->
				<?php endwhile; ?>
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
				<p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'desk-mess-mirrored' ); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div><!--end main blog-->
		<?php get_sidebar(); ?>
		<div class="clear"></div>
	</div><!--end content-->
</div><!--end wrapper-->
<?php get_footer();?>
<?php /* Last Revision July 3, 2011 v1.8.7 */ ?>