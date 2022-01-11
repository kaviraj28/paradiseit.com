<?php
/* Template Name: Projects */

get_header();
while (have_posts()) {
    the_post();
    $get_projects = kk_get_custom_post_type(-1, 'pit_projects', 'DESC', 'date'); ?>
    <div class="works-area ptb-80">
        <div class="container">
            <div class="row">
                <?php if ($get_projects) {
                    foreach ($get_projects as $project) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-works">
                                <?= get_thumbnail_url_and_alt_text($project->ID); ?>
                                <a href="<?= get_permalink($project->ID); ?>" class="icon"><i data-feather="settings"></i></a>
                                <div class="works-content">
                                    <h3><a href="<?= get_permalink($project->ID); ?>"><?= get_the_title($project->ID); ?></a></h3>
                                    <?= custom_length_excerpt(98, get_the_content($project->ID)); ?>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        <div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
        <div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
        <div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
        <div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
    </div>
<?php }
get_footer();
