<?php
/* Template Name: Our Clients */

get_header();
while (have_posts()) {
	the_post();
	$get_clients = kk_get_custom_post_type(-1, 'pit_clients', 'DESC', 'date');
	if ($get_clients) { ?>
		<div class="privacy-policy-area ptb-80">
			<div class="container">
				<div class="partner-area partner-section">
					<div class="partner-inner">
						<div class="row">
							<?php foreach ($get_clients as $clients) { ?>
								<div class="col-lg-2 col-md-3 col-6 col-sm-4">
									<a href="<?= get_field('client_web_url', $clients->ID) ?: '#'; ?>">
										<?= get_acf_image(get_field('image_one', $clients->ID)); ?>
										<?= get_acf_image(get_field('image_two', $clients->ID)); ?>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php }
}
get_footer();
