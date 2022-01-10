<?php

/**
 * paradiseit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package paradiseit
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function paradiseit_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on paradiseit, use a find and replace
		* to change 'paradiseit' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('paradiseit', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');
	add_image_size('blog-thumb', 356, 290, true);
	add_image_size('blog-nav', 100, 81, true);
	add_image_size('service-thumb', 155, 180, true);
	add_image_size('team-thumb', 125, 125, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'nav-pri' => esc_html__('Primary', 'paradiseit'),
			'footer-one' => esc_html__('Company', 'paradiseit'),
			'footer-two' => esc_html__('Support', 'paradiseit'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'paradiseit_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'paradiseit_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function paradiseit_content_width()
{
	$GLOBALS['content_width'] = apply_filters('paradiseit_content_width', 640);
}
add_action('after_setup_theme', 'paradiseit_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function paradiseit_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'paradiseit'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'paradiseit'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(array(
		'name' => esc_html__('Footer Info', 'paradiseit'),
		'id' => 'footer_info',
		'description' => esc_html__('Add widgets here.', 'paradiseit'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => esc_html__('Footer Address', 'paradiseit'),
		'id' => 'footer_address',
		'description' => esc_html__('Add widgets here.', 'paradiseit'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));

	register_sidebar(array(
		'name' => esc_html__('Share Links', 'paradiseit'),
		'id' => 'share_links',
		'description' => esc_html__('Add widgets here.', 'paradiseit'),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	));
}
add_action('widgets_init', 'paradiseit_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function paradiseit_scripts()
{
	wp_enqueue_style('paradise-bootstrap-style', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.min.css');
	wp_enqueue_style('paradise-animate-style', get_template_directory_uri() . '/vendor/animate/animate.min.css');
	wp_enqueue_style('paradise-meanmenu-style', get_template_directory_uri() . '/vendor/meanmenu/meanmenu.css');
	wp_enqueue_style('paradise-boxicons-style', get_template_directory_uri() . '/assets/css/boxicons.min.css');
	wp_enqueue_style('paradise-popup-style', get_template_directory_uri() . '/vendor/popup/magnific-popup.min.css');
	wp_enqueue_style('paradise-owl-style', get_template_directory_uri() . '/vendor/owl/owl.carousel.min.css');
	wp_enqueue_style('paradise-flaticons-style', get_template_directory_uri() . '/assets/css/flaticon.css');
	wp_enqueue_style('paradise-odometer-style', get_template_directory_uri() . '/vendor/odometer/odometer.min.css');
	wp_enqueue_style('paradise-slick-slider-style', get_template_directory_uri() . '/vendor/slick/slick.min.css');
	wp_enqueue_style('paradiseit-style', get_stylesheet_uri());
	wp_enqueue_style('paradise-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css');

	// wp_enqueue_style('paradise-color-brinkpink-style', get_template_directory_uri() . '/vendor/color/brink-pink-style.css');
	// wp_enqueue_style('paradise-color-pink-style', get_template_directory_uri() . '/vendor/color/pink-style.css');
	// wp_enqueue_style('paradise-color-purple-style', get_template_directory_uri() . '/vendor/color/purple-style.css');

	add_action('wp_head', function () {
		echo '<script>var ss;</script>';
	}); // don't remove

	wp_enqueue_script('paradise-bootstrap-script', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.bundle.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-meanmenu-script', get_template_directory_uri() . '/vendor/meanmenu/meanmenu.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-wow-script', get_template_directory_uri() . '/vendor/wow/wow.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-popup-script', get_template_directory_uri() . '/vendor/popup/magnific-popup.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-appear-script', get_template_directory_uri() . '/assets/js/appear.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-odometer-script', get_template_directory_uri() . '/vendor/odometer/odometer.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-slick-slider-script', get_template_directory_uri() . '/vendor/slick/slick.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-imageloaded-script', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-isotope-script', get_template_directory_uri() . '/vendor/isotope/isotope.pkgd.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-owl-script', get_template_directory_uri() . '/vendor/owl/owl.carousel.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-feather-script', get_template_directory_uri() . '/assets/js/feather.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-validator-script', get_template_directory_uri() . '/vendor/form/form-validator.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-contact-form-script', get_template_directory_uri() . '/vendor/form/contact-form-script.js', array('jquery'), null, true);
	// wp_enqueue_script('paradise-jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), null, true);
	wp_enqueue_script('paradise-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);


	wp_enqueue_script('paradiseit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), null, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'paradiseit_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}


/**
 * Load Custom Nav Walker.
 */
if (!file_exists(get_template_directory() . '/inc/pit-bootstrap-navwalker.php')) {
	wp_die('<div style="text-align:center"><h1 style="font-weight:normal">Custom Walker Nav Not Found</h1><p>Opps we have got error!<br>It appears the bootstrap-navwalker.php file may be missing.</p></div>', 'Custom Walker Nav Not Found');
} else {
	require_once get_template_directory() . '/inc/pit-bootstrap-navwalker.php';
}


/**
 * Custom PostType & Widgets
 */
require get_template_directory() . '/inc/Paradise/Paradise.php';


function get_the_brand_logo()
{
	if (get_custom_logo()) :
		the_custom_logo();
	else :
		$img = array('logo.svg', 'logo.png', 'logo.jpg');
		$brand = '<span>' . get_bloginfo('name') . '</span>';
		foreach ($img as $logo) {
			if (file_exists(get_template_directory() . '/img/' . $logo)) {
				$brand = '<img src="' . get_template_directory_uri() . '/img/' . $logo . '" alt="' . get_bloginfo('name') . '">';
			} elseif (file_exists(get_template_directory() . '/images/' . $logo)) {
				$brand = '<img src="' . get_template_directory_uri() . '/images/' . $logo . '" alt="' . get_bloginfo('name') . '">';
			}
		}
		return '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . $brand . '</a>';
	endif;
	return false;
}
function the_brand_logo()
{
	echo get_the_brand_logo();
}
