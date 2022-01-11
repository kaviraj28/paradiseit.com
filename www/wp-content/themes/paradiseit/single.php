<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package paradiseit
 */

get_header();
?>
<div class="blog-details-area ptb-80">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="blog-details-desc">
					<?php while (have_posts()) {
						the_post();
						get_template_part('template-parts/content', get_post_type());
					}
					$posttags = get_the_tags();
					if ($posttags) { ?>
						<div class="article-footer">
							<div class="article-tags">
								<?php foreach ($posttags as $tag) {
									echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>';
								} ?>
							</div>
						</div>
					<?php }
					the_post_navigation();
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif; ?>
				</div>
			</div>
			<div class="col-lg-4 col-md-12">
				<aside class="widget-area" id="secondary">
					<div class="widget widget_search">
						<form class="search-form" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
							<label for="s" class="sr-only">
								<span class="screen-reader-text">Search for:</span>
								<input type="text" class="form-control field search-field" name="s" id="s" placeholder="<?php esc_attr_e('Search...', 'dash-hearing'); ?>">
							</label>
							<button type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'dash-hearing'); ?>"><i data-feather="search"></i></button>
						</form>
					</div>
					<?php $popularpost  = kk_get_custom_post_type(5, 'post', 'DESC', 'meta_value_num', 'wpb_post_views_count');
					if ($popularpost) { ?>
						<div class="widget widget_startp_posts_thumb">
							<h3 class="widget-title">Popular Posts</h3>
							<?php foreach ($popularpost as $single_post) { ?>
								<article class="item">
									<a href="<?= get_permalink($single_post->ID); ?>" class="thumb">
										<span class="fullimage cover bg-cover" role="img">
											<?= get_thumbnail_url_and_alt_text($single_post->ID, '', 'popular-thumb'); ?>
										</span>
									</a>
									<div class="info">
										<time datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('F d, Y'); ?></time>
										<h4 class="title usmall"><a href="<?= get_permalink($single_post->ID); ?>"><?= $single_post->post_title; ?></a></h4>
									</div>
									<div class="clear"></div>
								</article>
							<?php } ?>
						</div>
					<?php }
					$post_category = kk_get_taxonomy('category');
					if ($post_category) { ?>
						<div class="widget widget_categories">
							<h3 class="widget-title">Categories</h3>
							<ul>
								<?php foreach ($post_category as $category) {
									echo '<li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';
								} ?>
							</ul>
						</div>
					<?php }
					$post_tag = kk_get_taxonomy('post_tag');
					if ($post_tag) { ?>
						<div class="widget widget_tag_cloud">
							<h3 class="widget-title">Tags</h3>
							<div class="tagcloud">
								<?php foreach ($post_tag as $tags) {
									echo '<a href="' . get_category_link($tags->term_id) . '">' . $tags->name . ' <span class="tag-link-count"> (' . $tags->count . ')</span></a>';
								} ?>
							</div>
						</div>
					<?php } ?>
				</aside>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
