<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<title><?php
		if ( is_single() ) { single_post_title(); _e( ' | ', 'desk-mess-mirrored' ); bloginfo( 'name' ); }
		elseif ( is_home() || is_front_page() ) { bloginfo( 'name' ); _e( ' | ', 'desk-mess-mirrored' ); bloginfo( 'description' ); dmm_get_page_number(); }
		elseif ( is_page() ) { single_post_title( '' ); _e( ' | ', 'desk-mess-mirrored' ); bloginfo( 'name' ); }
		elseif ( is_search() ) { bloginfo( 'name' ); print __( ' | Search results for ', 'desk-mess-mirrored' ) . esc_html( $s ); dmm_get_page_number(); }
		elseif ( is_404() ) { bloginfo( 'name' ); _e( ' | Not Found', 'desk-mess-mirrored' ); }
		else { bloginfo( 'name' ); wp_title( __( ' | ', 'desk-mess-mirrored' )); dmm_get_page_number(); }
	?></title>

	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="screen" />
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="<?php get_template_directory_uri(); ?>/ie60-2.css" type="text/css" media="screen" />
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
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
<?php /* Last Revision: Nov 4, 2010, v1.8 */ ?>