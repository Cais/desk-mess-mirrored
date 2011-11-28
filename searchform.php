<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>/">
  <label class="hidden" for="s"><?php _e( 'Search for:', 'desk-mess-mirrored' ); ?></label>
  <div id="search-container">
    <input type="text" value="<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>" onblur="if(this.value == '') {this.value = '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>';}" onfocus="if(this.value == '<?php _e( 'Enter keyword(s) and hit enter', 'desk-mess-mirrored' ); ?>') {this.value = '';}" name="s" id="s" />
    <input type="submit" class="hidden" id="search-submit" value="<?php _e( 'Search' , 'desk-mess-mirrored' ); ?>" />
  </div> <!-- #search-container -->
</form>
<?php /* Last Revision: Nov 4, 2010 v1.8 */ ?>