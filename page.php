<?php get_header(); ?>
<div id="maintop"></div>
<div id="wrapper">
    <div id="content">
        <div id="main-blog">
            <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                    <div class="clear">&nbsp;</div>
                    <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                        <h1><?php the_title(); ?></h1>
                        <?php edit_post_link( __( '&raquo; Edit this page &laquo;', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ), __( '', 'desk-mess-mirrored' ) );
                        the_content( __( ' ... continue reading. ', 'desk-mess-mirrored' ) ); ?>
                        <div class="clear"></div> <!-- For inserted media at the end of the post -->
                        <?php wp_link_pages( array( 'before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number' ) ); ?>
                    </div> <!-- .post #post-ID -->
                    <?php comments_template();
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
<?php /* Last revised November 29, 2011 v1.9.1 */ ?>