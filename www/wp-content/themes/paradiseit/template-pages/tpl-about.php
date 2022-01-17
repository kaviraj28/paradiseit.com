<?php
/* Template Name: About */

get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="about-area pt-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <?= get_thumbnail_url_and_alt_text(get_the_ID(), home_url('media/about.png')); ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <div class="section-title">
                            <h2><?= get_the_title(); ?></h2>
                            <div class="bar"></div>
                        </div>
                        <?= get_the_content(); ?>
                    </div>
                </div>
            </div>
            <?php if (get_field('description')) {
                echo get_field('description');
            } ?>
        </div>
    </div>

    <?php $get_teams = kk_get_custom_post_type(-1, 'pit_team', 'DESC', 'date');
    if ($get_teams) { ?>
        <div class="team-area ptb-80 bg-f9f6f6">
            <div class="container">
                <div class="section-title">
                    <h2>Our Awesome Team</h2>
                    <div class="bar"></div>
                    <p>Experienced and knowledgeable staffs, is like a magician they used to change everything if they want. </p>
                </div>
            </div>
            <?php if ($get_teams) { ?>
                <div class="container-fluid p-0">
                    <div class="team-slides owl-carousel owl-theme">
                        <?php foreach ($get_teams as $single_team) {
                            $designation = get_field('designation', $single_team->ID);
                            $team_social = array(
                                array(get_field('facebook', $single_team->ID), 'facebook'),
                                array(get_field('twitter', $single_team->ID), 'twitter'),
                                array(get_field('linkedin', $single_team->ID), 'linkedin'),
                                array(get_field('gitlab', $single_team->ID), 'gitlab'),
                            ); ?>
                            <div class="single-team">
                                <div class="team-image">
                                    <?= get_thumbnail_url_and_alt_text($single_team->ID, home_url('media/team.png'), 'team-thumb'); ?>
                                </div>
                                <div class="team-content">
                                    <div class="team-info">
                                        <h3><?= $single_team->post_title; ?></h3>
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
                                    <?= check_if_exists($single_team->post_content, 'p'); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
<?php }
}
get_footer();
