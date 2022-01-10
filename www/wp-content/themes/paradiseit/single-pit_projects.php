<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paradiseit
 */

get_header(); ?>

<div class="project-details-area ptb-80">
    <div class="container">
        <div class="row">
            <?php $project_imgs = array(
                array(get_field('image_one'), get_field('video_one_url')),
                array(get_field('image_two'), get_field('video_two_url')),
                array(get_field('image_three'), get_field('video_three_url')),
                array(get_field('image_four'), get_field('video_four_url')),
            );
            if ($project_imgs) {
                for ($i = 0; $i < count($project_imgs); $i++) {
                    if (!empty($project_imgs[$i][0])) { ?>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="project-details-image">
                                <?= get_acf_image($project_imgs[$i][0]); ?>
                                <?php if (!empty($project_imgs[$i][1])) { ?>
                                    <a href="<?= $project_imgs[$i][1]; ?>" class="popup-youtube"><i data-feather="play"></i></a>
                                <?php } else { ?>
                                    <a href="<?= esc_url($project_imgs[$i][0]['url']); ?>" class="popup-btn"><i data-feather="plus"></i></a>
                                <?php } ?>
                            </div>
                        </div>
            <?php }
                }
            } ?>
            <div class="col-lg-12 col-md-12">
                <div class="project-details-desc">
                    <?= get_the_content(); ?>
                    <div class="project-details-information">
                        <?php if (!empty(get_the_excerpt())) { ?>
                            <div class="single-info-box">
                                <h4>Happy Client</h4>
                                <p><?= get_the_excerpt(); ?></p>
                            </div>
                        <?php } ?>
                        <?php $get_category = get_terms('pit_project_cat');
                        if ($get_category) {
                            $num = count($get_category);
                            $count_cat = 1; ?>
                            <div class="single-info-box">
                                <h4>Category</h4>
                                <p>
                                    <?php foreach ($get_category as $category) {
                                        $comma = $count_cat != $num ? ', ' : '';
                                        echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a>' . $comma;
                                        $count_cat++;
                                    } ?>
                                </p>
                            </div>
                        <?php } ?>
                        <div class="single-info-box">
                            <h4>Date</h4>
                            <p><?= get_the_date('F d, Y') ?></p>
                        </div>
                        <?php $social_share = array(
                            array('https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '', 'facebook'),
                            array('https://twitter.com/intent/tweet?text=' . get_permalink() . '', 'twitter'),
                            array('https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '&title=' . get_the_title() . '&summary=&source=', 'linkedin'),
                        );
                        if ($social_share) { ?>
                            <div class="single-info-box">
                                <h4>Share</h4>
                                <ul>
                                    <?php for ($i = 0; $i < count($social_share); $i++) {
                                        if (!empty($social_share[$i][0])) {
                                            echo '<li><a href="' . $social_share[$i][0] . '" target="_blank"><i data-feather="' . $social_share[$i][1] . '"></i></a></li>';
                                        }
                                    } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <div class="single-info-box">
                            <a href="#" class="btn btn-primary">Live Preview</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
