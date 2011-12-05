<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <h1>You have arrived at the 404 page!!!</h1>
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="clear">&nbsp;</div>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <div class="post-comments">
                            <?php if ( ! post_password_required() ) {
                                comments_popup_link( __( '0', 'desk-mess-mirrored' ), __( '1', 'desk-mess-mirrored' ), __( '%', 'desk-mess-mirrored' ), '',__( '-', 'desk-mess-mirrored' ) );
                            } ?>
                        </div>
                        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <div class="postdata">
                            <?php printf( __( '%1$s by %2$s on ', 'desk-mess-mirrored' ), dmm_use_posted(), get_the_author() );
                            the_time( get_option( 'date_format' ) );
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