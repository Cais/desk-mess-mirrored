<?php
/**
 * DMM Navigation
 * Generic navigation for common use in list style templates
 *
 * @package     Desk_Mess_Mirrored
 * @since       2.0
 *
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        https://wordpress.org/themes/desk-mess-mirrored/
 *
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2016, Edward Caissie
 *
 * @uses        get_template_part( 'dmm-navigation' )
 * @internal    used in 404, index, archive, and author
 */
?>

<div id="nav-global" class="navigation">
	<div class="left">
		<?php next_posts_link( '&laquo; ' . __( 'Older posts', 'desk-mess-mirrored' ) ); ?>
	</div>
	<div class="right">
		<?php previous_posts_link( __( 'Newer posts', 'desk-mess-mirrored' ) . ' &raquo;' ); ?>
	</div>
</div>