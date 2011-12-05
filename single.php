<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="clear">&nbsp;</div>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e( 'Permanent Link to', 'desk-mess-mirrored' ); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        <div class="postdata">
                            <?php _e( 'Posted by ', 'desk-mess-mirrored' ); the_author(); _e( ' on ', 'desk-mess-mirrored' ); the_time( get_option( 'date_format' ) ); _e( ' in ', 'desk-mess-mirrored' ); the_category( ', ' ); edit_post_link( __( 'Edit', 'desk-mess-mirrored' ), __( ' &#124; ', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) ); ?> | <div class="rss"><a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php _e( 'Subscribe to my feed', 'desk-mess-mirrored' ); ?>"><?php _e( 'Subscribe', 'desk-mess-mirrored' ); ?></a></div> <!-- RSS feed URL correction as noted by Bill Girimonti pipeline_intl@orcon.net.nz -->
                        </div>
                        <?php the_content( __( ' ... continue reading. ', 'desk-mess-mirrored' ) ); ?>
                        <div class="clear"></div> <!-- For inserted media at the end of the post -->
                        <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
                        <div id="author_link"><?php _e( '... other posts by ', 'desk-mess-mirrored' ); ?><?php the_author_posts_link(); ?></div>
                        <p class="single-meta"><?php the_tags(); ?></p>
                    </div> <!-- .post #post-ID -->
                    <?php comments_template();
                endwhile;
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
<?php get_footer();?>