<?php
/**
 * Search Form
 */
?>
<form id="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">		
	<input type="text" name="s" id="search" placeholder="<?php _e("Type and hit enter",THEME_LANGUAGE_DOMAIN); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" class="form-control">
</form>
