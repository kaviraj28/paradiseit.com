<?php

/**
 * The template for displaying search form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Dash_Hearing
 */
?>
<form class="search-form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
	<label for="s" class="sr-only">
		<span class="screen-reader-text">Search for:</span>
		<input type="text" class="form-control field search-field" name="s" id="s" placeholder="<?php esc_attr_e('Search...', 'dash-hearing'); ?>">
	</label>
	<button type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'dash-hearing'); ?>"><i data-feather="search"></i></button>
</form>