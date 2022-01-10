<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiseit
 */

if (is_single()) { ?>
	<div class="article-image">
		<?= get_thumbnail_url_and_alt_text(get_the_ID()); ?>
	</div>
	<div class="article-content">
		<div class="entry-meta">
			<ul>
				<li><i data-feather="clock"></i> <a href="javascript:void(0)"><?= get_the_date('F d, Y'); ?></a></li>
				<li><i data-feather="user"></i> <a href="javascript:void(0)"><?= get_the_author_meta('nicename', get_the_author_meta('ID')); ?></a></li>
			</ul>
		</div>
		<?= apply_filters('the_content', get_the_content()); ?>
	</div>
<?php } else { ?>
	<div class="col-lg-4 col-md-6">
		<div class="single-blog-post">
			<div class="blog-image">
				<a href="<?= get_permalink(); ?>">
					<?= get_thumbnail_url_and_alt_text(get_the_ID(), '', 'blog-thumb'); ?>
				</a>
				<div class="date">
					<i data-feather="calendar"></i> <?= get_the_date('F d, Y'); ?>
				</div>
			</div>
			<div class="blog-post-content">
				<h3><a href="<?= get_permalink(); ?>"><?= get_the_title(); ?></a></h3>
				<span>by <a href="<?= get_permalink(); ?>">admin</a></span>
				<?= custom_length_excerpt(164, get_the_content()); ?>
				<a href="<?= get_permalink(); ?>" class="read-more-btn">Read More <i data-feather="arrow-right"></i> </a>
			</div>
		</div>
	</div>
<?php }
