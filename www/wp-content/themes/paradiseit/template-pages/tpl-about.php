<?php
/* Template Name: About */

get_header();
while (have_posts()) {
    the_post(); ?>
    <div class="about-area ptb-80">
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
<?php }
get_footer();
