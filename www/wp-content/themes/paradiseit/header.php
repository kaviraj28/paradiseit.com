<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradiseit
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="site">


		<div class="preloader">
			<div class="spinner"></div>
		</div>


		<header id="header" class="headroom">
			<div class="startp-responsive-nav">
				<div class="container">
					<div class="startp-responsive-menu">
						<div class="logo">
							<?php the_brand_logo(); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="startp-nav">
				<div class="container">
					<nav class="navbar navbar-expand-md navbar-light">
						<?php the_brand_logo(); ?>
						<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
							<?php wp_nav_menu(array(
								'theme_location'  => 'nav-pri',
								'depth'	          => 4, // 1 = no dropdowns, 2 = with dropdowns.
								'container'       => 'ul',
								'container_class' => 'navbar-nav nav ml-auto',
								'container_id'    => 'nav-pri',
								'menu_class'      => 'navbar-nav nav ml-auto',
								'walker'         => new WP_Bootstrap_NavWalker(),
								'fallback_cb'    => 'Bootstrap_NavWalker::fallback',
							));
							?>
						</div>
						<div class="others-option">
							<a href="/download/" class="btn btn-primary">Download</a>
						</div>
					</nav>
				</div>
			</div>
			<div class="others-option-for-responsive">
				<div class="container">
					<div class="dot-menu">
						<div class="inner">
							<div class="circle circle-one"></div>
							<div class="circle circle-two"></div>
							<div class="circle circle-three"></div>
						</div>
					</div>
					<div class="container">
						<div class="option-inner">
							<div class="others-option">
								<a href="/download/" class="btn btn-primary">Download</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<main class="site-content">
			<?php if (!is_404()) {
				if (is_front_page()) {
					$banner_info = get_field('banner_info');
					$banner_image = get_field('banner_image'); ?>
					<div class="main-banner">
						<div class="d-table">
							<div class="d-table-cell">
								<div class="container">
									<div class="row h-100 justify-content-center align-items-center">
										<?php if ($banner_info) { ?>
											<div class="col-lg-5">
												<div class="hero-content">
													<?= apply_filters('content', $banner_info); ?>
												</div>
											</div>
										<?php }
										if ($banner_image) { ?>
											<div class="col-lg-6 offset-lg-1">
												<div class="banner-image">
													<?= get_acf_image($banner_image, 'wow fadeInUp', '', '0.6'); ?>
												</div>
											</div>
										<?php } else { ?>
											<div class="col-lg-6 offset-lg-1">
												<div class="banner-image">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/man.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="man">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/code.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="code">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/carpet.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="carpet">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/bin.png" class="wow zoomIn" data-wow-delay="0.6s" alt="bin">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/book.png" class="wow bounceIn" data-wow-delay="0.6s" alt="book">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/dekstop.png" class="wow fadeInDown" data-wow-delay="0.6s" alt="dekstop">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/dot.png" class="wow zoomIn" data-wow-delay="0.6s" alt="dot">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/flower-top-big.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="flower-top-big">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/flower-top.png" class="wow rotateIn" data-wow-delay="0.6s" alt="flower-top">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/keyboard.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="keyboard">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/pen.png" class="wow zoomIn" data-wow-delay="0.6s" alt="pen">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/table.png" class="wow zoomIn" data-wow-delay="0.6s" alt="table">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/tea-cup.png" class="wow fadeInLeft" data-wow-delay="0.6s" alt="tea-cup">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/headphone.png" class="wow rollIn" data-wow-delay="0.6s" alt="headphone">
													<img src="<?= get_template_directory_uri(); ?>/img/banner-image/main-pic.png" class="wow fadeInUp" data-wow-delay="0.6s" alt="main-pic">
												</div>
											</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="shape1"><img src="<?= get_template_directory_uri(); ?>/img/shape1.png" alt="shape"></div>
						<div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
						<div class="shape3"><img src="<?= get_template_directory_uri(); ?>/img/shape3.svg" alt="shape"></div>
						<div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape5"><img src="<?= get_template_directory_uri(); ?>/img/shape5.png" alt="shape"></div>
						<div class="shape6 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
					</div>
				<?php } else {
					$title = is_home() ? 'Blog' : get_the_title; ?>
					<div class="page-title-area">
						<div class="d-table">
							<div class="d-table-cell">
								<div class="container">
									<h1><?= $title; ?></h1>
								</div>
							</div>
						</div>
						<div class="shape1"><img src="<?= get_template_directory_uri(); ?>/img/shape1.png" alt="shape"></div>
						<div class="shape2 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
						<div class="shape3"><img src="<?= get_template_directory_uri(); ?>/img/shape3.svg" alt="shape"></div>
						<div class="shape4"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape5"><img src="<?= get_template_directory_uri(); ?>/img/shape5.png" alt="shape"></div>
						<div class="shape6 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape7"><img src="<?= get_template_directory_uri(); ?>/img/shape4.svg" alt="shape"></div>
						<div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
					</div>
			<?php }
			} ?>