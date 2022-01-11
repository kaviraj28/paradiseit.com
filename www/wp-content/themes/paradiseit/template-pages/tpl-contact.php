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

	<div class="contact-area ptb-80">
		<div class="container">
			<div class="section-title">
				<h2>Get In Touch With Us</h2>
				<div class="bar"></div>
				<p>Anything On your Mind. We’ll Be Glad To Assist You!</p>
			</div>
			<div class="row h-100 justify-content-center align-items-center">
				<div class="col-lg-6 col-md-12">
					<?= get_thumbnail_url_and_alt_text(get_the_ID()) ?>
				</div>
				<div class="col-lg-6 col-md-12">
					<?= do_shortcode('[wpforms id="175"]'); ?>
				</div>
			</div>
		</div>
	</div>
<?php }
get_footer();
