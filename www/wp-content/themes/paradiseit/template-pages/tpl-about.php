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
    <div class="ready-to-talk">
        <div class="container">
            <h3>Let's make a plan and implement it!!</h3>
            <p>Let's organize a plan to have a cup of tea together and start business digitally.</p>
            <a href="/contact-us/" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
    <?php $get_clients = kk_get_custom_post_type(-1, 'pit_clients', 'DESC', 'date');
    if ($get_clients) { ?>
        <div class="privacy-policy-area ptb-80">
            <div class="container">
                <h5>We are proud to serve 600+ customers!!!</h5>
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
