<?php
/* Template Name: Services */

get_header();
while (have_posts()) {
	the_post(); ?>
	<div class="ml-services-area ptb-80">
		<div class="container">
			<div class="row">
				<?php $get_services = kk_get_custom_post_type(-1, 'pit_services', 'DESC', 'date');
				if ($get_services) {
					foreach ($get_services as $service) { ?>
						<div class="col-lg-4 col-sm-6 col-md-6">
							<div class="single-ml-services-box">
								<div class="image">
									<?= get_thumbnail_url_and_alt_text($service->ID, home_url('media/service.png'), 'service-thumb'); ?>
								</div>
								<h3><a href="<?= get_permalink($service->ID); ?>"><?= $service->post_title; ?></a></h3>
								<?= custom_length_excerpt(107, $service->post_content); ?>
							</div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
		<div class="shape1"><img src="assets/img/shape1.png" alt="shape"></div>
		<div class="shape2 rotateme"><img src="assets/img/shape2.svg" alt="shape"></div>
		<div class="shape3"><img src="assets/img/shape3.svg" alt="shape"></div>
		<div class="shape4"><img src="assets/img/shape4.svg" alt="shape"></div>
		<div class="shape6 rotateme"><img src="assets/img/shape4.svg" alt="shape"></div>
		<div class="shape7"><img src="assets/img/shape4.svg" alt="shape"></div>
		<div class="shape8 rotateme"><img src="assets/img/shape2.svg" alt="shape"></div>
	</div>
<?php }
get_footer();
