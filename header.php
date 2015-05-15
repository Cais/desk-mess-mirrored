<?php
/**
 * Header
 * The document type, etc.; as well as the top graphics and top navigation menu
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        https://wordpress.org/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2015, Edward Caissie
 *
 * @version     2.2
 * @date        February 25, 2013
 * Cleaned up 'head' section
 *
 * @version     2.3
 * @date        October 13, 2014
 * Dropped backward compatibility for `wp_title` with Desk Mess Mirrored Child-Themes based on version 2.1 and earlier
 *
 * @version     2.4
 * @date        May 15, 2015
 * Add support for the `title` tag
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />

	<?php /** Check for WordPress 4.1.x compatibility */
	if ( ! function_exists( '_wp_render_title_tag' ) ) { ?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php } ?>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="mainwrap">
	<div id="header-container">
		<div id="header"><!-- header -->
			<div id="headerleft"></div>
			<div id="logo">
				<h2 id="site-title">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
				</h2>

				<p id="site-description"><?php bloginfo( 'description' ); ?></p>
			</div>
			<!-- #logo -->
			<div id="cup"></div>
			<div id="top-navigation-menu">
				<?php dmm_nav_menu(); ?>
			</div>
		</div>
		<!-- #header -->
	</div>
	<!-- #header-container -->