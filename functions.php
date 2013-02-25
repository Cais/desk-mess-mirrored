<?php
/**
 * Functions
 *
 * The secret sauce and other funky flavors
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2013, Edward Caissie
 *
 * @version     2.0.3
 * @date        July 5, 2012
 * Address functions deprecated at WordPress 3.4-beta1
 * Miscellaneous code structure updates
 *
 * @version     2.1
 * @date        December 3, 2012
 * Add DMM_HOME_DOMAIN constant for better future proofing
 * Removed DMM_Add_Body_Classes in favor of using BNS Body Classes
 */

/** Define Desk Mess Mirrored "Home" domain */
define( 'DMM_HOME_DOMAIN', 'http://buynowshop.com/' );

/**
 * Enqueue Comment Reply Script
 *
 * If the page being viewed is a single post/page; and, comments are open; and,
 * threaded comments are turned on then enqueue the built-in comment-reply
 * script.
 *
 * @package Desk_Mess_Mirrored
 * @since   1.9.1
 *
 * @return  void
 *
 * @version 2.0.4
 * @date    August 21, 2012
 * No change to function code; changed related action hook to 'comment_form_before'
 */
if ( ! function_exists( 'dmm_enqueue_comment_reply' ) ) {
    function dmm_enqueue_comment_reply() {
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        } /** End if - is singular */
    } /** End function - enqueue comment reply */
} /** End if - not function exists */
add_action( 'comment_form_before', 'dmm_enqueue_comment_reply' );


/**
 * DMM Scripts and Styles
 * Add extra style sheet (to animate menu notes)
 *
 * @package Desk_Mess_Mirrored
 * @since   2.0.3
 *
 * @uses    get_template_directory
 * @uses    wp_get_theme
 * @uses    wp_enqueue_style
 *
 * @version 2.0.4
 * @date    August 21, 2012
 * Changed enqueued version to be dynamically taken from theme version
 */
function dmm_scripts_and_styles() {
    wp_enqueue_style( 'DMM-Extra-Style', get_template_directory_uri() . '/wip/extra.css', array(), wp_get_theme()->get( 'Version' ), 'screen' );
} /** End function - scripts and styles */
/** To enable the menu animation uncomment the `add_action` call below. */
/** add_action( 'wp_enqueue_scripts', 'dmm_scripts_and_styles' ); */


if ( ! function_exists( 'dmm_wp_title' ) ) {
    /**
     * DMM WP Title
     *
     * Utilizes the `wp_title` filter to add text to the default output
     *
     * @link    http://codex.wordpress.org/Plugin_API/Filter_Reference/wp_title
     *
     * @package Desk_Mess_Mirrored
     * @since   2.0
     *
     * @version 2.0.3
     * @date    June 1, 2012
     * Refactor to more correctly use filter while maintaining backward-compatibility
     */
    if ( ( ! function_exists( 'wp_get_theme' ) ) || wp_get_theme()->get('Version') < '2.1' ) {
        /**
         * Test version to maintain backward-compatibility with Child-Themes using `dmm_wp_title` echo
         * @todo Remove once all (client) Child-Themes have been updated / advised of change
         */
        function dmm_wp_title() {
            global $page, $paged;
            /** Default title */
            $dmm_title_text = wp_title( '|', false, 'right' ) . get_bloginfo( 'name' );

            /** Add the blog description (tagline) for the home/front page. */
            $site_tagline = get_bloginfo( 'description', 'display' );
            if ( $site_tagline && ( is_home() || is_front_page() ) ) {
                $dmm_title_text .= " | $site_tagline";
            } /** End if - site tagline */

            /** Add a page number if necessary: */
            if ( $paged >= 2 || $page >= 2 ) {
                $dmm_title_text .= ' | ' . sprintf( __( 'Page %s', 'desk-mess-mirrored' ), max( $paged, $page ) );
            } /** End if - paged */

            /** @var $dmm_wp_title string - title output */
            $dmm_wp_title = apply_filters( 'wp_title', $dmm_title_text );
            echo $dmm_wp_title;

        } /** End function - dmm wp title */
    } else {
        /**
         * Use as filter input
         *
         * @param   string $old_title - default title text
         * @param   string $sep - separator character
         * @param   string $sep_location - left|right - separator placement in relationship to title
         *
         * @return  string - new title text
         */
        function dmm_wp_title( $old_title, $sep, $sep_location ) {
            global $page, $paged;
            /** Set initial title text */
            $dmm_title_text = $old_title . get_bloginfo( 'name' );
            /** Add wrapping spaces to separator character */
            $sep = ' ' . $sep . ' ';

            /** Add the blog description (tagline) for the home/front page */
            $site_tagline = get_bloginfo( 'description', 'display' );
            if ( $site_tagline && ( is_home() || is_front_page() ) ) {
                $dmm_title_text .= "$sep$site_tagline";
            } /** End if - site tagline */

            /** Add a page number if necessary */
            if ( $paged >= 2 || $page >= 2 ) {
                $dmm_title_text .= $sep . sprintf( __( 'Page %s', 'desk-mess-mirrored' ), max( $paged, $page ) );
            } /** End if - paged */

            return $dmm_title_text;

        } /** End function - dmm wp title */

    add_filter( 'wp_title', 'dmm_wp_title', 10, 3 );

    } /** End if - function exists */

} /** End if - function exists */


/**
 * Register Widget Areas
 *
 * @package Desk_Mess_Mirrored
 * @since   1.0
 *
 * @version 2.0
 * Re-define each widget area separately to allow for descriptions to show end-user more details about each area
 */
register_sidebar( array(
    'description'    => __( 'Widget area 1 located in right sidebar. All default Desk Mess Mirrored theme sidebar content is placed here. If you drag and drop a new widget into this area you will replace *all* of the default sidebar content.', 'desk-mess-mirrored' ),
    'before_widget'  => '<li id="%1$s" class="widget %2$s">',
    'after_widget'   => "</li>\n",
    'before_title'   => '<h2 class="widgettitle">',
    'after_title'    => "</h2>\n",
    ) );
register_sidebar( array(
    'description'    => __( 'Widget area 2 located in the middle of the right sidebar beneath Sidebar 1. This area is empty by default', 'desk-mess-mirrored' ),
    'before_widget'  => '<li id="%1$s" class="widget %2$s">',
    'after_widget'   => "</li>\n",
    'before_title'   => '<h2 class="widgettitle">',
    'after_title'    => "</h2>\n",
    ) );
register_sidebar( array(
    'description'    => __( 'Widget area 3 located at the bottom of the right sidebar beneath Sidebar 2. This are is empty by default', 'desk-mess-mirrored' ),
    'before_widget'  => '<li id="%1$s" class="widget %2$s">',
    'after_widget'   => "</li>\n",
    'before_title'   => '<h2 class="widgettitle">',
    'after_title'    => "</h2>\n",
    ) );
/** End Register Widget Areas */


/**
 * DMM Widget Title
 *
 * Fixes display issue when widget_title is empty by adding a space if it is.
 *
 * @package Desk_Mess_Mirrored
 * @since   2.0.1
 *
 * @param $title
 *
 * @return string
 */
function dmm_widget_title( $title ) {
    if ( '' == $title ) {
        return ' ';
    } else {
        return $title;
    } /** End if - title is null */

} /** End function - widget title */
add_filter( 'widget_title', 'dmm_widget_title', 10, 1 );


/**
 * DMM Dynamic Copyright
 *
 * Displays a generic copyright statement in the theme footer area with
 * parameters usable for customization.
 *
 * @package             Desk_Mess_Mirrored
 * @since               1.4.6
 *
 * @param               string $args - start|copy_years|url|end
 * @internal    @param  start       => default: Copyright
 * @internal    @param  copy_years  => default: from the first publicly viewable post year to the most current publicly viewable post year
 * @internal    @param  url         => default: value associated with the `home_url` function
 * @internal    @param  end         => default: All rights reserved.
 *
 * Last revised December 6, 2011
 * @version             2.0
 * Updated documentation to clarify function parameters
 * Renamed `BNS Dynamic Copyright` to `DMM Dynamic Copyright`
 */
if ( ! function_exists( 'dmm_dynamic_copyright' ) ) {
    function dmm_dynamic_copyright( $args = '' ) {
        $initialize_values = array( 'start' => '', 'copy_years' => '', 'url' => '', 'end' => '' );
        $args = wp_parse_args( $args, $initialize_values );

        /* Initialize the output variable to empty */
        $output = '';

        /**
         * Start common copyright notice
         * @example Copyright
         */
        empty( $args['start'] ) ? $output .= sprintf( __( 'Copyright', 'desk-mess-mirrored' ) ) : $output .= $args['start'];

        /**
         * Calculate Copyright Years; and, prefix with Copyright Symbol
         * @example © 2009-2011
         */
        if ( empty( $args['copy_years'] ) ) {

            /** Get all posts */
            $all_posts = get_posts( 'post_status=publish&order=ASC' );
            /** Get first post */
            $first_post = $all_posts[0];
            /** Get date of first post */
            $first_date = $first_post->post_date_gmt;

            /** First post year versus current year */
            $first_year = substr( $first_date, 0, 4 );
            if ( $first_year == '' ) {
                $first_year = date( 'Y' );
            } /** End if - first year */

            /** Add to output string */
            if ( $first_year == date( 'Y' ) ) {
                /** Only use current year if no posts in previous years */
                $output .= ' &copy; ' . date( 'Y' );
            } else {
                $output .= ' &copy; ' . $first_year . "-" . date( 'Y' );
            } /** End if - first year */

        } else {

            $output .= ' &copy; ' . $args['copy_years'];

        } /** End if - empty copy years */

        /**
         * Create URL to link back to home of website using the site name for the anchor text
         * @example <a href="http://example.com" title="Your Blog Name">Your Blog Name</a>
         */
        empty( $args['url'] )
                ? $output .= ' <a href="' . home_url( '/' ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) .'</a>  '
                : $output .= ' ' . $args['url'];

        /**
         * End common copyright notice
         * @example All rights reserved.
         */
        empty( $args['end'] )
                ? $output .= ' ' . sprintf( __( 'All rights reserved.', 'desk-mess-mirrored' ) )
                : $output .= ' ' . $args['end'];

        /** Display the copyright notice */
        $output = sprintf( __( '<span id="dmm-dynamic-copyright"> %1$s </span><!-- #bns-dynamic-copyright -->', 'desk-mess-mirrored' ), $output );
        $output = apply_filters( 'dmm_dynamic_copyright', $output, $args );

        echo $output;

    } /** End function - dynamic copyright */

} /** End function - not function exists */


/**
 * DMM Theme Version
 *
 * Displays the theme version including the Child-Theme version (if properly
 * noted in the Child-Theme details) in the footer area of the theme.
 *
 * @package Desk_Mess_Mirrored
 * @since   1.4.5
 *
 * @version 2.0.3
 * @date    April 6, 2012
 * Replaced deprecated `get_theme_data` at WordPress version 3.4-beta1
 *
 * @version 2.1
 * @date    December 3, 2012
 * Make compatible with current WordPress versions (3.4+)
 */
if ( ! function_exists( 'dmm_theme_version' ) ) {
    function dmm_theme_version () {
        /** @var $active_theme_data - array object containing the current theme's data */
        $active_theme_data = wp_get_theme();
        if ( is_child_theme() ) {

            /** @var $parent_theme_data - array object containing the Parent Theme's data */
            $parent_theme_data = $active_theme_data->parent();
            /** @noinspection PhpUndefinedMethodInspection - IDE commentary */
            printf( __( '<br /><span id="dmm-theme-version">This site is using the %1$s Child-Theme, v%2$s, on top of<br />the Parent-Theme %3$s, v%4$s, from <a href="' . DMM_HOME_DOMAIN . '" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'desk-mess-mirrored' ),
                '<a href="' . $active_theme_data->get( 'ThemeURI' ) . '">' . $active_theme_data->get( 'Name' ) . '</a>',
                $active_theme_data->get( 'Version' ),
                $parent_theme_data->get( 'Name' ),
                $parent_theme_data->get( 'Version' ) );

        } else {

            printf( __( '<br /><span id="dmm-theme-version">This site is using the %1$s theme, v%2$s, from <a href="' . DMM_HOME_DOMAIN . '" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'desk-mess-mirrored' ),
                $active_theme_data->get( 'Name' ),
                $active_theme_data->get( 'Version' ) );

        } /** End if - is child theme */

    } /** End function - theme version */

} /** End if - not function exists */


/**
 * Desk Mess Mirrored Setup
 *
 * Tell WordPress to run desk_mess_mirrored_setup() when the 'after_setup_theme'
 * hook is run.
 *
 * @package Desk_Mess_Mirrored
 * @since   1.5
 *
 * @version 2.0.3
 * @date    July, 5, 2012
 * See additional documentation within function for specific changes
 *
 * @version 2.1
 * @date    December 3, 2012
 * Make 'custom-background' compatible with current WordPress versions (3.4+)
 */
if ( ! function_exists( 'desk_mess_mirrored_setup' ) ) {
    function desk_mess_mirrored_setup(){
        global $wp_version;
        /** This theme uses post thumbnails */
        add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
        /** Add default posts and comments RSS feed links to head */
        add_theme_support( 'automatic-feed-links' );
        /** Add theme support for editor-style */
        add_editor_style();

        /**
         * This theme allows users to set a custom background
         * NB: Child-Themes will need to over-load this functionality to use a
         * different default background image.
         */
        add_theme_support( 'custom-background' , array(
            'default-color' => '848484',
            'default-image' => get_template_directory_uri() . '/images/marble-bg.png'
        ) );

        /** Add post-formats support for aside, quote, and status */
        add_theme_support( 'post-formats', array( 'aside', 'quote', 'status' ) );

        /**
         * Assign unique aside glyph that can be over-written; also will be
         * used as the anchor text if no title exists for the post
         *
         * @package Desk_Mess_Mirrored
         * @since   2.0
         *
         * @param   $aside_glyph    string - constructed
         */
        if ( ! function_exists( 'dmm_aside_glyph' ) ) {
            function dmm_aside_glyph() {
                $dmm_no_title = get_the_title();
                $aside_glyph = '<span class="aside-glyph">';
                empty( $dmm_no_title )
                        ? $aside_glyph .= '<a href="' . get_permalink() . '" title="' . get_the_excerpt() . '"><span class="no-title">' . __( '*', 'desk-mess-mirrored' ) /** default: asterisk */ . '</span></a>'
                        : $aside_glyph .= __( '*', 'desk-mess-mirrored' ); /** default: asterisk */
                $aside_glyph .= '</span>';
                echo apply_filters( 'dmm_aside_glyph', $aside_glyph );
            } /** End function - aside glyph */
        } /** End if - not function exists */

        /**
         * Assign unique quote glyph that can be over-written; also will be
         * used as the anchor text if no title exists for the post
         *
         * @package Desk_Mess_Mirrored
         * @since   2.0
         *
         * @param   $quote_glyph    string - constructed
         */
        if ( ! function_exists( 'dmm_quote_glyph' ) ) {
            function dmm_quote_glyph() {
                $dmm_no_title = get_the_title();
                $quote_glyph = '<span class="quote-glyph">';
                empty( $dmm_no_title )
                        ? $quote_glyph .= '<a href="' . get_permalink() . '" title="' . get_the_excerpt() . '"><span class="no-title">' . __( '"', 'desk-mess-mirrored' ) /** default: double-quote */ . '</span></a>'
                        : $quote_glyph .= __( '"', 'desk-mess-mirrored' ); /** default: double-quote */
                $quote_glyph .= '</span>';
                echo apply_filters( 'dmm_quote_glyph', $quote_glyph );
            } /** End function - quote glyph */
        } /** End if - not function exists */

        /**
         * Assign unique status glyph that can be over-written; also will be
         * used as the anchor text if no title exists for the post
         *
         * @package Desk_Mess_Mirrored
         * @since   2.0
         *
         * @param   $status_glyph    string - constructed
         */
        if ( !function_exists( 'dmm_status_glyph' ) ) {
            function dmm_status_glyph() {
                $dmm_no_title = get_the_title();
                $status_glyph = '<span class="status-glyph">';
                empty( $dmm_no_title )
                        ? $status_glyph .= '<a href="' . get_permalink() . '" title="' . get_the_excerpt() . '"><span class="no-title">' . __( '@', 'desk-mess-mirrored' ) /** default: at symbol */ . '</span></a>'
                        : $status_glyph .= __( '@', 'desk-mess-mirrored' ); /** default: at symbol */
                $status_glyph .= '</span>';
                echo apply_filters( 'dmm_status_glyph', $status_glyph );
            } /** End function - status glyph */
        } /** End if - not function exists */


        /**
         * Add wp_nav_menu() custom menu support
         *
         * @package Desk_Mess_Mirrored
         * @since 1.5
         *
         * @version 2.0.4
         * @date    July 6, 2012
         * Removed backward compatibility check for wp_nav_menu
         */
        if ( ! function_exists( 'dmm_nav_menu' ) ) {
            function dmm_nav_menu() {
                wp_nav_menu( array(
                    'menu_class'      => 'nav-menu',
                    'theme_location'  => 'top-menu',
                    'fallback_cb'     => 'dmm_list_pages'
                ) );
            } /** End function - nav menu */
        } /** End if - not function exists */

        if ( ! function_exists( 'dmm_list_pages' ) ) {
            function dmm_list_pages() { ?>
                <ul class="nav-menu"><?php wp_list_pages( 'title_li=' ); ?></ul>
            <?php } /** End function - list pages */
        } /** End if - not function exists */
        register_nav_menu( 'top-menu', __( 'Top Menu', 'desk-mess-mirrored' ) );


        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         *
         * @package Desk_Mess_Mirrored
         * @since   1.0.7
         *
         * @version 2.0.4
         * @date    August 18, 2012
         * Corrected parameter to use `get_template_directory`
         */
        load_theme_textdomain( 'desk-mess-mirrored', get_template_directory() . '/languages' );
        $locale = get_locale();
        $locale_file = get_template_directory() . "/languages/$locale.php";
        if ( is_readable( $locale_file ) ) {
            /** @noinspection PhpIncludeInspection */
            require_once( $locale_file );
        } /** End if - is readable */

    } /** End function - theme setup */

} /** End if - not function exists */
add_action( 'after_setup_theme', 'desk_mess_mirrored_setup' );
/** End Desk Mess Mirrored Setup */


/**
 * DMM Use Posted
 *
 * This returns a URL to the post using the anchor text 'Posted' in the meta
 * details with the post excerpt as the URL title; or, returns the word 'Posted'
 * if the post title exists
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.0
 *
 * @return      string - URL|Posted
 */
if ( ! function_exists( 'dmm_use_posted' ) ) {
    function dmm_use_posted() {
        $dmm_no_title = get_the_title();
        empty( $dmm_no_title )
            ? $dmm_no_title = '<span class="no-title"><a href="' . get_permalink() . '" title="' . get_the_excerpt() . '">' . __( 'Posted', 'desk-mess-mirrored' ) . '</span></a>'
            : $dmm_no_title = __( 'Posted', 'desk-mess-mirrored' );
        $dmm_no_title = apply_filters( 'dmm_use_posted', $dmm_no_title );
        return $dmm_no_title;
    } /** End function - use posted */
} /** End if - not function exists */


/**
 * DMM Modified Post
 *
 * Checks if the last modification made to the post/page is different than
 * the date the post/page was written; if so, it displays a message showing
 * the modifying author and the date the post/page was modified
 *
 * @package Desk_Mess_Mirrored
 * @since   1.8.5
 *
 * @internal    used in 'desk-mess-mirrored-status'
 *
 * @version 2.0.3
 * @date    July 5, 2012
 * If modified author exists link to their archive.
 *
 * @todo Implement in other template files, such as, single and page?
 */
if ( ! function_exists( 'dmm_modified_post' ) ) {
    function dmm_modified_post(){
        global $post;

        /** @var $last_user - establish the last user */
        $last_user = '';
        if ( $last_id = get_post_meta( $post->ID, '_edit_last', true ) ) {
            $last_user = get_userdata( $last_id );
        } /** End if - last id */

        /** @var $line_height - set value for use with `get_avatar` */
        $line_height = 16;

        /** @var string $mod_author_phrase - create the "mod_author_phrase" */
        $mod_author_phrase = ' ';
        /** Check last_user ID exists in database. */
        if ( ! empty( $last_user ) ) {
            $mod_author_phrase .= __( 'Last modified by %1$s %2$s on %3$s at %4$s.', 'desk-mess-mirrored' );
            $mod_author_avatar = get_avatar( $last_user->user_email, $line_height );

            if ( get_the_date() <> get_the_modified_date() ) {
                printf( '<h5><span class="bns-modified-post">' . $mod_author_phrase . '</span></h5>',
                    $mod_author_avatar,
                    '<a href="' . home_url( '?author=' . $last_user->ID ) . '">' . $last_user->display_name . '</a>',
                    get_the_modified_date( get_option( 'date_format' ) ),
                    get_the_modified_time( get_option( 'time_format' ) ) );
            } /** End if - get the date */
        } /** End if - not empty last user */
    } /** End function - modified post */
} /** End if - not function exists */


/**
 * DMM No Posts Found
 * Displayed if there are no posts found in the query
 *
 * @package Desk_Mess_Mirrored
 * @since   2.1
 *
 * @internal Used simply for "DRY" efficiency
 *
 * @uses    get_search_form
 * @uses    get_search_query
 */
function dmm_no_posts_found() { ?>
    <h2>
        <?php printf( __( 'Search Results for: %s', 'desk-mess-mirrored' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?>
    </h2>
    <p class="center"><?php _e( 'Sorry, but you are looking for something that is not here.', 'desk-mess-mirrored' ); ?></p>
    <?php get_search_form();
} /** End function - no posts found */


/**
 * Set `content_width` based on the theme design and stylesheet to keep images,
 * videos, etc. within the confines of the post block.
 *
 * @internal see #main-blog element in style.css
 */
if ( ! isset( $content_width ) ) {
    $content_width = 580;
} /** End if - not isset content width */