<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiseit
 */

get_header();
?>
<div class="blog-details-area ptb-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="blog-details-desc">
					<?php while (have_posts()) {
						the_post();
						get_template_part('template-parts/content', 'page');
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
