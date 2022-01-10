<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
					get_template_part('template-parts/content', get_post_type());
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
