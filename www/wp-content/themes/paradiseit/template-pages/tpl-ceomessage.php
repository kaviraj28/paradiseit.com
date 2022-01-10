<?php
/* Template Name: CEO Message */

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
		</div>
	</div>

	<?php $get_blog = kk_get_custom_post_type(3, 'post', 'DESC', 'date');
	if ($get_blog) { ?>
		<div class="blog-area ptb-80">
			<div class="container">
				<div class="section-title">
					<h2>The News from Our Blog</h2>
					<div class="bar"></div>
					<p>Check Out Our Latest News</p>
				</div>
				<div class="row">
					<?php foreach ($get_blog as $key => $blogs) { ?>
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
			</div>
		</div>
<?php }
}
get_footer();
