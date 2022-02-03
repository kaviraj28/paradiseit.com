<?php
/* Template Name: Contact Us */

get_header();
while (have_posts()) {
	the_post(); ?>
	<div class="contact-info-area ptb-80">
		<div class="container">
			<div class="row">
				<?php get_sidebar('contact_page'); ?>
			</div>
		</div>
	</div>

	<?php $map_url = get_field('map_url');
	if ($map_url) { ?>
		<div id="map">
			<iframe src="<?= $map_url ?>"></iframe>
		</div>
	<?php } ?>
<?php }
get_footer();
