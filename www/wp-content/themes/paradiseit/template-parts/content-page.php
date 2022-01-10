<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiseit
 */

?>
<div class="blog-details-desc">
	<div class="article-image">
		<?= get_thumbnail_url_and_alt_text(get_the_ID()); ?>
	</div>
	<div class="article-content">
		<?= apply_filters('the_content', get_the_content()); ?>
	</div>
</div>