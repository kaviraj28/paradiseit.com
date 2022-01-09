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

<footer class="footer-area bg-f7fafd">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<div class="logo">
						<a href="index.html"><img src="<?= get_template_directory_uri(); ?>/img/logo.png" alt="logo"></a>
					</div>
					<p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
						facilisis.</p>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget pl-5">
					<h3>Company</h3>
					<ul class="list">
						<li><a href="about-1.html">About Us</a></li>
						<li><a href="services-1.html">Services</a></li>
						<li><a href="features.html">Features</a></li>
						<li><a href="pricing.html">Our Pricing</a></li>
						<li><a href="blog-1.html">Latest News</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h3>Support</h3>
					<ul class="list">
						<li><a href="faq.html">FAQ's</a></li>
						<li><a href="privacy-policy.html">Privacy Policy</a></li>
						<li><a href="terms-conditions.html">Terms & Condition</a></li>
						<li><a href="contact.html">Support Us</a></li>
						<li><a href="contact.html">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h3>Address</h3>
					<ul class="footer-contact-info">
						<li><i data-feather="map-pin"></i> 27 Division St, New York, NY 10002, USA</li>
						<li><i data-feather="mail"></i> Email: <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#9ef6fbf2f2f1deedeaffeceaeeb0fdf1f3"><span class="__cf_email__" data-cfemail="d7bfb2bbbbb897a4a3b6a5a3a7f9b4b8ba">[email&#160;protected]</span></a>
						</li>
						<li><i data-feather="phone-call"></i> Phone: <a href="tel:+ (321) 984 754">+ (321) 984
								754</a></li>
					</ul>
					<ul class="social-links">
						<li><a href="#" class="facebook" target="_blank"><i data-feather="facebook"></i></a></li>
						<li><a href="#" class="twitter" target="_blank"><i data-feather="twitter"></i></a></li>
						<li><a href="#" class="instagram" target="_blank"><i data-feather="instagram"></i></a></li>
						<li><a href="#" class="linkedin" target="_blank"><i data-feather="linkedin"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-12 col-md-12">
				<div class="copyright-area">
					<p>Copyright @2021 StartP. All Rights Reserved by <a href="https://envytheme.com/" target="_blank">EnvyTheme</a></p>
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