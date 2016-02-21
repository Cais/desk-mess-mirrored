<?php
/**
 * Sidebar Template
 *
 * @package     Desk_Mess_Mirrored
 * @since       1.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        https://wordpress.org/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2016, Edward Caissie
 *
 * @version     2.2.4
 * @date        April 13, 2014
 * Removed call to `function_exists( 'dynamic_sidebar' )` as required WordPress version precludes its necessity
 *
 * @version     2.2.5
 * @date        October 13, 2014
 * Removed `wp_list_bookmarks` section
 */
?>

<div id="sidebar">

	<div id="sidebar-top"></div>

	<div id="sidebar-content">
		<div id="subcolumn">
			<ul>
				<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>

					<li class="widget" id="search">
						<form id="searchform" method="get" action="<?php echo home_url( '/' ); ?>/">
							<div>
								<label for="s"></label><input type="text" class="form-input" value="<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>" onblur="if(this.value == '') {this.value = '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>';}" onfocus="if(this.value == '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>') {this.value = '';}" name="s" id="s" /><br />
								<input type="submit" class="hidden search-submit" id="search-submit" value="<?php _e( 'Search', 'desk-mess-mirrored' ); ?>" />
							</div>
						</form>
					</li><!-- widget search -->

					<li class="widget calendar">
						<h2 class="widgettitle"><?php _e( 'Calendar', 'desk-mess-mirrored' ); ?></h2>

						<div align="center">
							<?php get_calendar( 0 ); ?>
						</div>
					</li><!-- widget calendar -->

					<li class="widget categories">
						<h2 class="widgettitle"><?php _e( 'Categories', 'desk-mess-mirrored' ); ?></h2>
						<ul>
							<?php wp_list_categories( 'title_li=&show_count=1' ); ?>
						</ul>
					</li><!-- widget categories -->

					<li class="widget archives">
						<h2 class="widgettitle"><?php _e( 'Archives', 'desk-mess-mirrored' ); ?></h2>
						<ul>
							<?php wp_get_archives( 'type=monthly&show_post_count=1' ); ?>
						</ul>
					</li><!-- widget archives -->

					<li class="widget meta">
						<h2 class="widgettitle"><?php _e( 'Meta', 'desk-mess-mirrored' ); ?></h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<li>
								<a href="http://wordpress.org/" title="Powered by WordPress.">WordPress</a>
							</li>
							<?php wp_meta(); ?>
						</ul>
					</li><!-- widget meta -->

				<?php endif; ?>

				<?php if ( dynamic_sidebar( 'sidebar-2' ) ) : else : endif; ?>
				<?php if ( dynamic_sidebar( 'sidebar-3' ) ) : else : endif; ?>
			</ul>
		</div>
		<!-- #subcolumn -->
	</div>
	<!--#sidebar-content -->

	<div id="sidebar-bottom"></div>

</div> <!-- #sidebar -->