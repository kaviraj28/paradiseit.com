<?php

/**
 * Template Name: Homepage
 *
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cambio_Communities
 */

get_header();

while (have_posts()) {
    the_post();
    $features = array(
        get_field('feature_one'),
        get_field('feature_two'),
        get_field('feature_three'),
        get_field('feature_four')
    ); ?>
    <div class="boxes-area">
        <div class="container">
            <div class="row">
                <?php for ($i = 0; $i < count($features); $i++) {
                    $ftr_logo = $features[$i]['logo'];
                    $ftr_content = $features[$i]['content'];
                    $bg_class = $i == 1 ? ' bg-f78acb' : ($i == 2 ? ' bg-c679e3' : ($i == 3 ? ' bg-eb6b3d' : ''));
                    if (!empty($ftr_content) || !empty($ftr_logo)) { ?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="single-box <?= $bg_class; ?>">
                                <div class="icon">
                                    <i data-feather="<?= $ftr_logo; ?>"></i>
                                </div>
                                <?= apply_filters('content', $features[$i]); ?>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <?php $services = array(
        get_field('service_one'),
        get_field('service_two'),
    );
    for ($j = 0; $j < count($services); $j++) {
        $sev_class = $j % 2 != 0 ? 'bg-f7fafd' : '';
        if ($services[$j]) {
            $service_img = $services[$j]['service_image'];
            $service_content = $services[$j]['service_content'];
            if ($service_img || $service_content) { ?>
                <div class="services-area ptb-80">
                    <div class="container">
                        <div class="row h-100 justify-content-center align-items-center">
                            <?php if ($j % 2 != 0) {
                                if (!empty($service_content)) { ?>
                                    <div class="col-lg-6 col-md-12 services-content">
                                        <?= apply_filters('content', $service_content); ?>
                                    </div>
                                <?php }
                                if (!empty($service_img)) { ?>
                                    <div class="col-lg-6 col-md-12 services-right-image">
                                        <?= get_acf_image($service_img, 'wow fadeInUp', '', '0.6'); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-lg-6 col-md-12 services-right-image">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/book-self.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="book-self">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/box.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="box">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/chair.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="chair">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/cloud.png" class="wow zoomIn" data-wow-delay="0.6s" alt="cloud">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/cup.png" class="wow bounceIn" data-wow-delay="0.6s" alt="cup">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/flower-top.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="flower">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/head-phone.png" class="wow zoomIn" data-wow-delay="0.6s" alt="head-phone">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/monitor.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="monitor">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/mug.png" class="wow rotateIn" data-wow-delay="0.6s" alt="mug">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/table.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="table">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/tissue.png" class="wow zoomIn" data-wow-delay="0.6s" alt="tissue">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/water-bottle.png" class="wow zoomIn" data-wow-delay="0.6s" alt="water-bottle">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/wifi.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="wifi">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/cercle-shape.png" class="bg-image rotateme" alt="shape">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-right-image/main-pic.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="main-pic">
                                    </div>
                                <?php }
                            } else {
                                if (!empty($service_img)) { ?>
                                    <div class="col-lg-6 col-md-12 services-left-image">
                                        <?= get_acf_image($service_img, 'wow fadeInUp', '', '0.6'); ?>
                                    </div>
                                <?php } else { ?>
                                    <div class="col-lg-6 col-md-12 services-left-image">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/big-monitor.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="big-monitor">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/creative.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="creative">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/developer.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="developer">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/flower-top.png" class="wow zoomIn" data-wow-delay="0.6s" alt="flower-top">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/small-monitor.png" class="wow bounceIn" data-wow-delay="0.6s" alt="small-monitor">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/small-top.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="small-top">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/table.png" class="wow zoomIn" data-wow-delay="0.6s" alt="table">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/target.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="target">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/cercle-shape.png" class="bg-image rotateme" alt="shape">
                                        <img src="<?= get_template_directory_uri(); ?>/img/services-left-image/main-pic.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="main-pic">
                                    </div>
                                <?php }
                                if (!empty($service_content)) { ?>
                                    <div class="col-lg-6 col-md-12 services-content">
                                        <?= apply_filters('content', $service_content); ?>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
        <?php }
        }
    }
    $team_head = get_field('team_heading');
    $get_teams = get_field('teams');
    if ($team_head || $get_teams) { ?>
        <div class="team-area ptb-80 bg-f9f6f6">
            <?php if ($team_head) { ?>
                <div class="container">
                    <div class="section-title">
                        <?= apply_filters('content', $team_head); ?>
                    </div>
                </div>
            <?php }
            if ($get_teams) { ?>
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
    $fact_head = get_field('fact_heading');
    $facts = array(
        get_field('fact_one'),
        get_field('fact_two'),
        get_field('fact_three'),
        get_field('fact_four')
    ); ?>
    <div class="funfacts-area ptb-80">
        <div class="container">
            <?php if ($fact_head) { ?>
                <div class="section-title">
                    <?= apply_filters('content', $fact_head); ?>
                </div>
            <?php }
            if ($facts) { ?>
                <div class="row">
                    <?php for ($x = 0; $x < count($facts); $x++) {
                        $fct_num = $facts[$x]['fact_number'];
                        $fct_symbol = $facts[$x]['fact_symbol'];
                        $fct_info = $facts[$x]['fact_info'];
                        if ($fct_info || $fct_symbol || $fct_num) { ?>
                            <div class="col-lg-3 col-md-3 col-6 col-sm-3">
                                <div class="funfact">
                                    <h3><span class="odometer" data-count="<?= $fct_num; ?>">00</span><?= $fct_symbol; ?></h3>
                                    <p><?= $fct_info; ?></p>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            <?php } ?>
            <div class="contact-cta-box">
                <h3>Have any question about us?</h3>
                <p>Don't hesitate to contact us</p>
                <a href="/contact-us/" class="btn btn-primary">Contact Us</a>
            </div>
            <div class="map-bg">
                <img src="<?= get_template_directory_uri(); ?>/img/map.png" alt="map">
            </div>
        </div>
    </div>
    <?php $prj_head = get_field('work_heading');
    $projects = get_field('projects');
    if ($projects || $prj_head) { ?>
        <div class="works-area ptb-80 bg-f7fafd">
            <?php if ($prj_head) { ?>
                <div class="container">
                    <div class="section-title">
                        <?= apply_filters('content', $prj_head); ?>
                    </div>
                </div>
            <?php }
            if ($projects) { ?>
                <div class="container-fluid p-0">
                    <div class="works-slides owl-carousel owl-theme">
                        <?php foreach ($projects as $project) { ?>
                            <div class="single-works">
                                <?= get_thumbnail_url_and_alt_text($project->ID, '', 'project-thumb') ?>
                                <a href="<?= get_permalink($project->ID); ?>?" class="icon"><i data-feather="settings"></i></a>
                                <div class="works-content">
                                    <h3><a href="<?= get_permalink($project->ID); ?>?"><?= $project->post_title; ?></a></h3>
                                    <?= custom_length_excerpt(98, get_the_content($project->ID)); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            <div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
            <div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
            <div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
            <div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
        </div>
    <?php }
    $prc_head = get_field('price_heading');
    $prices = get_field('prices');
    if ($prices || $prc_head) { ?>
        <div class="pricing-area ptb-80 bg-f9f6f6">
            <div class="container">
                <?php if ($prc_head) { ?>
                    <div class="section-title">
                        <?= apply_filters('content', $prc_head); ?>
                    </div>
                <?php }
                if ($prices) { ?>
                    <div class="row">
                        <?php $count_num = 1;
                        foreach ($prices as $price) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6<?= $count_num % 3 == 0 ? ' offset-lg-0 offset-md-3 offset-sm-3' : ''; ?>">
                                <div class="pricing-table<?= $count_num % 2 == 0 ? ' active-plan' : ''; ?>">
                                    <div class="pricing-header">
                                        <h3><?= $price->post_title; ?></h3>
                                    </div>
                                    <?php if ($price->post_excerpt) { ?>
                                        <div class="price">
                                            <span><?= $price->post_excerpt; ?></span>
                                        </div>
                                    <?php }
                                    if ($price->post_content) { ?>
                                        <div class="pricing-features">
                                            <?= $price->post_content; ?>
                                        </div>
                                    <?php } ?>
                                    <div class="pricing-footer">
                                        <a href="/contact-us/" class="btn btn-primary">Select Plan</a>
                                    </div>
                                </div>
                            </div>
                        <?php $count_num++;
                        } ?>
                    </div>
                <?php } ?>
            </div>
            <div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
            <div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
            <div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
            <div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
        </div>
    <?php }
    $rw_head = get_field('review_heading');
    $reviews = get_field('reviews');
    if ($rw_head || $reviews) { ?>
        <div class="feedback-area ptb-80 bg-f7fafd">
            <div class="container">
                <?php if ($rw_head) { ?>
                    <div class="section-title">
                        <?= apply_filters('content', $rw_head); ?>
                    </div>
                <?php }
                if ($reviews) { ?>
                    <div class="feedback-slides">
                        <div class="client-feedback">
                            <div>
                                <?php foreach ($reviews as $review) { ?>
                                    <div class="item">
                                        <div class="single-feedback">
                                            <div class="client-img">
                                                <?= get_thumbnail_url_and_alt_text($review->ID, home_url('media/review.jpg')); ?>
                                            </div>
                                            <h3><?= $review->post_title; ?></h3>
                                            <?= check_if_exists(get_the_excerpt($review->ID), 'span'); ?>
                                            <?= check_if_exists($review->post_content, 'p'); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="client-thumbnails">
                            <div>
                                <?php foreach ($reviews as $review_img) { ?>
                                    <div class="item">
                                        <div class="img-fill">
                                            <?= get_thumbnail_url_and_alt_text($review_img->ID, home_url('medial/review.jpg')); ?>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <button class="prev-arrow slick-arrow">
                                <i data-feather="arrow-left"></i>
                            </button>
                            <button class="next-arrow slick-arrow">
                                <i data-feather="arrow-right"></i>
                            </button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="shape1"><img src="<?= get_template_directory_uri(); ?>/img/shape1.png" alt="shape"></div>
            <div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
            <div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
            <div class="shape5"><img src="<?= get_template_directory_uri(); ?>/img/shape5.png" alt="shape"></div>
            <div class="shape6 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
            <div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
            <div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
        </div>
    <?php } ?>
    <div class="ready-to-talk">
        <div class="container">
            <h3>Ready to talk?</h3>
            <p>Our team is here to answer your question about StartP</p>
            <a href="/contact-us/" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
    <?php $clients = get_field('our_client');
    if ($clients) { ?>
        <div class="partner-area partner-section">
            <div class="container">
                <h5>More that 1.5 million businesses and organizations use StartP</h5>
                <div class="partner-inner">
                    <div class="row">
                        <?php foreach ($clients as $client) { ?>
                            <div class="col-lg-2 col-md-3 col-6 col-sm-4">
                                <a href="<?= get_field('client_web_url', $client->ID) ?: '#'; ?>">
                                    <?= get_acf_image(get_field('image_one', $client->ID)); ?>
                                    <?= get_acf_image(get_field('image_two', $client->ID)); ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
    $blg_head = get_field('blog_heading');
    $blogs = get_field('blogs');
    if ($blg_head || $blogs) { ?>
        <div class="blog-area ptb-80">
            <div class="container">
                <?php if ($blg_head) { ?>
                    <div class="section-title">
                        <?= apply_filters('content', $blg_head); ?>
                    </div>
                <?php }
                if ($blog) { ?>
                    <div class="row">
                        <?php foreach ($blog as $key => $blogs) { ?>
                            <div class="col-lg-4 col-md-6<?= $key == 2 ? ' offset-lg-0 offset-md-3' : ''; ?>">
                                <div class="single-blog-post">
                                    <div class="blog-image">
                                        <a href="<?= get_permalink($blogs->ID); ?>">
                                            <?= get_thumbnail_url_and_alt_text($blogs->ID, '', 'blog-thumb'); ?>
                                        </a>
                                        <div class="date">
                                            <i data-feather="calendar"></i> <?= get_the_date('F d, Y', $blogs->ID); ?>
                                        </div>
                                    </div>
                                    <div class="blog-post-content">
                                        <h3><a href="<?= get_permalink($blogs->ID); ?>"><?= $blogs->post_title; ?></a></h3>
                                        <span>by <a href="javascript:void(0)"><?= get_the_author_meta('nicename', get_the_author_meta('ID')); ?></a></span>
                                        <?= custom_length_excerpt(164, $blogs->post_content); ?>
                                        <a href="<?= get_permalink($blogs->ID); ?>" class="read-more-btn">Read More <i data-feather="arrow-right"></i> </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
<?php }
}
get_footer();
