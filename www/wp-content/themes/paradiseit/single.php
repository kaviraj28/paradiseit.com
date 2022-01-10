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
					the_post_navigation(); ?>
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
					<div class="widget widget_startp_posts_thumb">
						<h3 class="widget-title">Popular Posts</h3>
						<article class="item">
							<a href="#" class="thumb">
								<span class="fullimage cover bg1" role="img"></span>
							</a>
							<div class="info">
								<time datetime="2019-06-30">June 10, 2019</time>
								<h4 class="title usmall"><a href="#">Making Peace With The Feast Or Famine Of
										Freelancing</a></h4>
							</div>
							<div class="clear"></div>
						</article>
						<article class="item">
							<a href="#" class="thumb">
								<span class="fullimage cover bg2" role="img"></span>
							</a>
							<div class="info">
								<time datetime="2019-06-30">June 21, 2019</time>
								<h4 class="title usmall"><a href="#">I Used The Web For A Day On A 50 MB Budget</a>
								</h4>
							</div>
							<div class="clear"></div>
						</article>
						<article class="item">
							<a href="#" class="thumb">
								<span class="fullimage cover bg3" role="img"></span>
							</a>
							<div class="info">
								<time datetime="2019-06-30">June 30, 2019</time>
								<h4 class="title usmall"><a href="#">How To Create A Responsive Popup Gallery?</a>
								</h4>
							</div>
							<div class="clear"></div>
						</article>
					</div>
					<div class="widget widget_categories">
						<h3 class="widget-title">Categories</h3>
						<ul>
							<li><a href="#">Business</a></li>
							<li><a href="#">Privacy</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Tips</a></li>
							<li><a href="#">Uncategorized</a></li>
						</ul>
					</div>
					<div class="widget widget_archive">
						<h3 class="widget-title">Archives</h3>
						<ul>
							<li><a href="#">May 2019</a></li>
							<li><a href="#">April 2019</a></li>
							<li><a href="#">June 2019</a></li>
						</ul>
					</div>
					<div class="widget widget_meta">
						<h3 class="widget-title">Meta</h3>
						<ul>
							<li><a href="#">Log in</a></li>
							<li><a href="#">Entries <abbr title="Really Simple Syndication">RSS</abbr></a></li>
							<li><a href="#">Comments <abbr title="Really Simple Syndication">RSS</abbr></a></li>
							<li><a href="#">WordPress.org</a></li>
						</ul>
					</div>
					<div class="widget widget_tag_cloud">
						<h3 class="widget-title">Tags</h3>
						<div class="tagcloud">
							<a href="#">IT <span class="tag-link-count"> (3)</span></a>
							<a href="#">Spacle <span class="tag-link-count"> (3)</span></a>
							<a href="#">Games <span class="tag-link-count"> (2)</span></a>
							<a href="#">Fashion <span class="tag-link-count"> (2)</span></a>
							<a href="#">Travel <span class="tag-link-count"> (1)</span></a>
							<a href="#">Smart <span class="tag-link-count"> (1)</span></a>
							<a href="#">Marketing <span class="tag-link-count"> (1)</span></a>
							<a href="#">Tips <span class="tag-link-count"> (2)</span></a>
						</div>
					</div>
				</aside>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
