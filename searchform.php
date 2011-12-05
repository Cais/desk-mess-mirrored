<?php
/**
 * @package     Desk_Mess_Mirrored
 * @link        http://buynowshop.com/themes/desk-mess-mirrored/
 * @link        https://github.com/Cais/desk-mess-mirrored/
 * @link        http://wordpress.org/extend/themes/desk-mess-mirrored/
 * @author      Edward Caissie <edward.caissie@gmail.com>
 * @copyright   Copyright (c) 2009-2011, Edward Caissie
 *
 * Last revised December 5, 2011
 * @version 2.0
 */
?>
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>/">
    <label class="hidden" for="s"><?php _e( 'Search for:', 'desk-mess-mirrored' ); ?></label>
    <div id="search-container">
        <input type="text" value="<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>" onblur="if(this.value == '') {this.value = '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>';}" onfocus="if(this.value == '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>') {this.value = '';}" name="s" id="s" />
        <input type="submit" class="hidden" id="search-submit" value="<?php _e( 'Search' , 'desk-mess-mirrored' ); ?>" />
    </div> <!-- #search-container -->
</form>