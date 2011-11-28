<?php
global $wp_version;

// Get the page number
if ( ! function_exists( 'dmm_get_page_number' ) ) {
  function dmm_get_page_number() {
      if ( get_query_var( 'paged' ) ) {
        print ' | ' . __( 'Page ' , 'desk-mess-mirrored' ) . get_query_var( 'paged' );
      }
    }
}
// end get_page_number

// Start Register Widgets
register_sidebars( 3, array(
                           'description' => '',
                           'before_widget' => '<li id="%1$s" class="widget %2$s">',
                           'after_widget' => "</li>\n",
                           'before_title' => '<h2 class="widgettitle">',
                           'after_title' => "</h2>\n",
                           ) );
// End Register Widgets

// Start BNS Dynamic Copyright
if ( ! function_exists( 'bns_dynamic_copyright' ) ) {
  function bns_dynamic_copyright( $args = '' ) {
      $initialize_values = array( 'start' => '', 'copy_years' => '', 'url' => '', 'end' => '' );
      $args = wp_parse_args( $args, $initialize_values );

      /* Initialize the output variable to empty */
      $output = '';

      /* Start common copyright notice */
      empty( $args['start'] ) ? $output .= sprintf( __('Copyright', 'desk-mess-mirrored') ) : $output .= $args['start'];

      /* Calculate Copyright Years; and, prefix with Copyright Symbol */
      if ( empty( $args['copy_years'] ) ) {
        /* Get all posts */
        $all_posts = get_posts( 'post_status=publish&order=ASC' );
        /* Get first post */
        $first_post = $all_posts[0];
        /* Get date of first post */
        $first_date = $first_post->post_date_gmt;

        /* First post year versus current year */
        $first_year = substr( $first_date, 0, 4 );
        if ( $first_year == '' ) {
          $first_year = date( 'Y' );
        }

      /* Add to output string */
        if ( $first_year == date( 'Y' ) ) {
        /* Only use current year if no posts in previous years */
          $output .= ' &copy; ' . date( 'Y' );
        } else {
          $output .= ' &copy; ' . $first_year . "-" . date( 'Y' );
        }
      } else {
        $output .= ' &copy; ' . $args['copy_years'];
      }

      /* Create URL to link back to home of website */
      empty( $args['url'] ) ? $output .= ' <a href="' . home_url( '/' ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" rel="home">' . get_bloginfo( 'name', 'display' ) .'</a>  ' : $output .= ' ' . $args['url'];

      /* End common copyright notice */
      empty( $args['end'] ) ? $output .= ' ' . sprintf( __( 'All rights reserved.', 'desk-mess-mirrored' ) ) : $output .= ' ' . $args['end'];

      /* Construct and sprintf the copyright notice */
      $output = sprintf( __( '<span id="bns-dynamic-copyright"> %1$s </span><!-- #bns-dynamic-copyright -->', 'desk-mess-mirrored' ), $output );
      $output = apply_filters( 'bns_dynamic_copyright', $output, $args );

      echo $output;
  }
}
// End BNS Dynamic Copyright

// Start BNS Theme Version
if ( ! function_exists( 'bns_theme_version' ) ) {
  function bns_theme_version () {
      $theme_version = ''; /* Clear variable */
      /* Get details of the theme / child theme */
      $blog_css_url = get_stylesheet_directory() . '/style.css';
      $my_theme_data = get_theme_data( $blog_css_url );
      $parent_blog_css_url = get_template_directory() . '/style.css';
      $parent_theme_data = get_theme_data( $parent_blog_css_url );

      if ( is_child_theme() ) {
        printf( __( '<br /><span id="bns-theme-version">%1$s version %2$s a child of the %3$s version %4$s theme from <a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'desk-mess-mirrored' ), $my_theme_data['Name'], $my_theme_data['Version'], $parent_theme_data['Name'], $parent_theme_data['Version'] );
      } else {
        printf( __( '<br /><span id="bns-theme-version">%1$s version %2$s theme from <a href="http://buynowshop.com/" title="BuyNowShop.com">BuyNowShop.com</a>.</span>', 'desk-mess-mirrored' ), $my_theme_data['Name'], $my_theme_data['Version'] );
      }
  }
}
// End BNS Theme Version

// Tell WordPress to run desk_mess_mirrored_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'desk_mess_mirrored_setup' );

if ( ! function_exists( 'desk_mess_mirrored_setup' ) ):
  function desk_mess_mirrored_setup(){
    
    // This theme uses post thumbnails
    add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );
    
    // Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
    
    // Add theme support for editor-style
    add_editor_style();
    
    // This theme allows users to set a custom background
    add_custom_background();
    
    // Add wp_nav_menu() custom menu support
    if ( ! function_exists( 'dmm_nav_menu' ) ) {
      function dmm_nav_menu() {
        if ( function_exists( 'wp_nav_menu' ) )
          wp_nav_menu( array(
                              'menu_class' => 'nav-menu',
                              'theme_location' => 'top-menu',
                              'fallback_cb' => 'dmm_list_pages'
                             ) );
        else
          dmm_list_pages();      
      }
    }
    
    if ( ! function_exists( 'dmm_list_pages' ) ) {
      function dmm_list_pages() {
        if ( is_home() || is_front_page() ) { ?>
          <ul class="nav-menu">
            <?php wp_list_pages( 'title_li=' ); ?>
          </ul>
        <?php } else { ?>
          <ul class="nav-menu">
            <li><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'desk-mess-mirrored' ) ?></a></li>
            <?php wp_list_pages( 'title_li=' ); ?>
          </ul>
        <?php }
      }
    }
    
    if ( ! function_exists( 'register_dmm_menu' ) ) {
      function register_dmm_menu() {
        register_nav_menu( 'top-menu', __( 'Top Menu', 'desk-mess-mirrored' ) );
      }
    }
    add_action( 'init', 'register_dmm_menu' );    
    // wp_nav_menu() end
    
    // Make theme available for translation
    // Translations can be filed in the /languages/ directory
    load_theme_textdomain( 'desk-mess-mirrored', TEMPLATEPATH . '/languages' );
    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if ( is_readable( $locale_file ) )
      require_once( $locale_file );
}
endif;

// Start BNS Modified Post - requires WordPress version 3.0 or greater
if ( ! function_exists( 'bns_modified_post' ) ) {
  function bns_modified_post(){
    /* If the post date and the last modified date are different display modified date */
    if ( get_the_date() <> get_the_modified_date() ) {
      printf( __( '<div class="bns-modified-post">Last modified by %1$s on %2$s.</div>', 'desk-mess-mirrored' ), get_the_modified_author(), get_the_modified_date() );
    }
  }
}
// End BNS Modified Post

// Set the content width based on the theme's design and stylesheet, see #main-blog element in style.css
if ( ! isset( $content_width ) ) $content_width = 580;
?>
<?php /* Last Revised June 19, 2011 v1.8.6 */ ?>