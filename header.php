<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php /* ... as influenced by Twenty Ten and Twenty Eleven */
        global $page, $paged;
        wp_title( '|', true, 'right' ); bloginfo( 'name' );

        // Add the blog description (tagline) for the home/front page.
        $site_tagline = get_bloginfo( 'description', 'display' );
        if ( $site_tagline && ( is_home() || is_front_page() ) )
            echo " | $site_tagline";

        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'desk-mess-mirrored' ), max( $paged, $page ) ); ?>
    </title>
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="mainwrap">
		<div id="header-container">
			<div id="header"> <!-- header -->
				<div id="headerleft"></div>
				<div id="logo">
					<h2><a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h2>
					<p><?php bloginfo( 'description' ); ?></p>
				</div> <!-- #logo -->
				<div id="cup"></div>
				<div id="top-navigation-menu">
					<?php dmm_nav_menu(); ?>
				</div>
			</div> <!-- #header -->
		</div> <!-- #header-container -->
<?php /* Last revised November 28, 2011 v1.9.1 */ ?>