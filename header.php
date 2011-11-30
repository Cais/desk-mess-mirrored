<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php dmm_wp_title(); ?></title>
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
<?php /* Last revised November 30, 2011 v2.0 */ ?>