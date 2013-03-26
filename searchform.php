<?php
/**
 * The template for displaying search forms in wolf_starter
 *
 * @package wolf_starter
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader"><?php _ex( 'Search', 'assistive text', 'wolf_starter' ); ?></label>
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'wolf_starter' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wolf_starter' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wolf_starter' ); ?>" />
	</form>
