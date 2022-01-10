<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiseit
 */

?>
<div class="col-lg-4 col-md-6" id="post-<?php the_ID(); ?>">
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