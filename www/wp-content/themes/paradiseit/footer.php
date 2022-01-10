<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package paradiseit
 */

?>
</main>
<footer class="footer-area bg-f7fafd">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<?php get_sidebar('footer_info'); ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget pl-5">
					<h3>Company</h3>
					<?php wp_nav_menu(array(
						'theme_location' => 'footer-one',
						'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
						'container' => 'ul',
						'container_id' => 'footer-one',
						'container_class' => 'list',
						'menu_class' => 'list',
					)); ?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h3>Support</h3>
					<?php wp_nav_menu(array(
						'theme_location'  => 'footer-two',
						'depth'	          => 1, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'ul',
						'container_class' => 'list',
						'container_id'    => 'footer-two',
						'menu_class'      => 'list',
					));
					?>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h3>Address</h3>
					<?php get_sidebar('footer_address');
					get_sidebar('share_links'); ?>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="copyright-area">
					<p>Copyright &copy; <?= date('Y'); ?> <a href="/">Paradise IT Solutions</a> . All Right Reserved.</p>
				</div>
			</div>
		</div>
	</div>
	<img src="<?= get_template_directory_uri(); ?>/img/map.png" class="map" alt="map">
	<div class="shape1"><img src="<?= get_template_directory_uri(); ?>/img/shape1.png" alt="shape"></div>
	<div class="shape8 rotateme"><img src="<?= get_template_directory_uri(); ?>/img/shape2.svg" alt="shape"></div>
</footer>

<div class="go-top"><i data-feather="arrow-up"></i></div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>