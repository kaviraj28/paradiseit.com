<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package paradiseit
 */

get_header();
?>

<div class="blog-area ptb-80">
	<div class="container">
		<?php if (have_posts()) { ?>
			<div class="row">
				<?php while (have_posts()) {
					the_post();
					get_template_part('template-parts/content', 'search');
				}
				the_posts_navigation(); ?>
			</div>
		<?php } else {
			get_template_part('template-parts/content', 'none');
		} ?>
	</div>
</div>

<?php
get_footer();
