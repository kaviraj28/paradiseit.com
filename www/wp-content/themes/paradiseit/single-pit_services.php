<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paradiseit
 */

get_header();
$price_title = get_field('price_title');
$price_info = get_field('price_info');
$pricing = get_field('pricing');
$btm_img = get_field('bottom_image');
$btm_faq = get_field('faq');
$btm_content = get_field('bottom_description'); ?>
<div class="services-details-area ptb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 services-details">
                <div class="services-details-desc">
                    <?= apply_filters('the_content', get_the_content()); ?>
                </div>
            </div>
            <div class="col-lg-6 services-details-image">
                <?= get_thumbnail_url_and_alt_text(get_the_ID(), home_url('media/single-service.png'), 'single-service-thumb', 'wow fadeInUp'); ?>
            </div>
        </div>
        <div class="separate"></div>
        <?php if ($price_title || $price_info || $pricing) { ?>
            <div class="pricing-area ptb-80 bg-f9f6f6">
                <div class="container">
                    <div class="section-title">
                        <h2><?= $price_title ?: 'Pricing Plans'; ?></h2>
                        <div class="bar"></div>
                        <?= check_if_exists($price_info, 'p'); ?>
                    </div>
                    <?php if ($pricing) { ?>
                        <div class="row">
                            <?php $count_num = 1;
                            foreach ($pricing as $price) { ?>
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
            <div class="separate"></div>
        <?php }
        if ($btm_content || $btm_img || $btm_faq) { ?>
            <div class="row align-items-center">
                <?php if ($btm_img) { ?>
                    <div class="col-lg-6 services-details-image">
                        <?= get_acf_image($btm_img, 'wow fadeInUp', 'single-service-thumb'); ?>
                    </div>
                <?php }
                if ($btm_content || $btm_faq) { ?>
                    <div class="col-lg-6 services-details">
                        <div class="services-details-desc">
                            <?= check_if_exists($btm_content, 'p'); ?>
                            <?php if ($btm_faq) {
                                $count_faq = 1; ?>
                                <div class="services-details-accordion">
                                    <ul class="accordion">
                                        <?php foreach ($btm_faq as $faq) { ?>
                                            <li class="accordion-item">
                                                <a class="accordion-title<?= $count_faq == 1 ? ' active' : ''; ?>" href="javascript:void(0)">
                                                    <i class="flaticon-plus"></i>
                                                    <?= $faq->post_title; ?>
                                                </a>
                                                <p class="accordion-content<?= $count_faq == 1 ? ' show' : ''; ?>"><?= $faq->post_content; ?></p>
                                            </li>
                                        <?php $count_faq++;
                                        } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php
get_footer();
