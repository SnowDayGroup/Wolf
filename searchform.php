<?php
/**
 * The template for displaying search forms in wolf
 *
 * @package wolf
 */
?>
<?php do_action('wolf_before_search_form'); ?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader"><?php _ex( 'Search', 'assistive text', 'wolf' ); ?></label>
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'wolf' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wolf' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wolf' ); ?>" />
	</form>
<?php do_action('wolf_after_search_form'); ?>