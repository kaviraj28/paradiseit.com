<?php
/* Template Name: Our Team */

get_header();
while (have_posts()) {
	the_post(); ?>
	<div class="team-area ptb-80 bg-f9f6f6">
		<div class="container">
			<div class="row">
				<?php $get_teams = kk_get_custom_post_type(-1, 'pit_team', 'DESC', 'date');
				if ($get_teams) {
					foreach ($get_teams as $team) {
						$designation = get_field('designation', $team->ID);
						$team_social = array(
							array(get_field('facebook', $team->ID), 'facebook'),
							array(get_field('twitter', $team->ID), 'twitter'),
							array(get_field('linkedin', $team->ID), 'linkedin'),
							array(get_field('gitlab', $team->ID), 'gitlab'),
						); ?>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="single-team">
								<div class="team-image">
									<?= get_thumbnail_url_and_alt_text($team->ID, home_url('media/team.png'), 'team-thumb'); ?>
								</div>
								<div class="team-content">
									<div class="team-info">
										<h3><?= $team->post_title; ?></h3>
										<?= check_if_exists($designation, 'span'); ?>
									</div>
									<ul>
										<?php for ($i = 0; $i < count($team_social); $i++) { ?>
											<li>
												<a href="<?= $team_social[$i][0] ?: '#'; ?>" target="_blank"><i data-feather="<?= $team_social[$i][1]; ?>"></i>
												</a>
											</li>
										<?php } ?>
									</ul>
									<?= check_if_exists($team->post_content, 'p'); ?>
								</div>
							</div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</div>

<?php }
get_footer();
