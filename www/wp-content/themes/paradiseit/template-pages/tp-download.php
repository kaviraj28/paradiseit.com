<?php
/* Template Name: Downloads */

get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="works-area ptb-80 download-page">
        <div class="container">
            <div class="row">
                <?= get_the_content(); ?>
            </div>
        </div>
        <div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
        <div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
        <div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
        <div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
    </div>
<?php }
get_footer();
