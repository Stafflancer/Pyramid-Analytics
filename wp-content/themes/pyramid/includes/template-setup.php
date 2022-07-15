<?php
/**
 * Theme setup.
 *
 * @package Pyramid
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @author Pyramid
 */
function pyramid_setup()
{
	/**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pyramid, use a find and replace
	 * to change 'pyramid' to the name of your theme in all the template files.
	 * You will also need to update the Gulpfile with the new text domain
	 * and matching destination POT file.
	 */
	load_theme_textdomain('pyramid', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/**
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support('post-thumbnails');
	add_image_size('full-width', 1920, 1080);
	add_image_size('s_180', 180, 9999);
	add_image_size('s_140', 140, 9999);
	add_image_size('s_341', 341, 9999);
	add_image_size('s_330', 330, 9999);
	add_image_size('s_243', 243, 9999);

	// Register navigation menus.
	register_nav_menus([
		'header_menu'   => esc_html__('Header Menu'),
		'header_menu_2' => esc_html__('Header Menu 2'),
		'footer_menu'   => esc_html__('Footer Menu'),
	]);

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	]);

	// Set up the WordPress core custom background feature.
	add_theme_support('custom-background', apply_filters('pyramid_custom_background_args', [
			'default-color' => 'fefefe',
			'default-image' => '',
		]));

	// Custom logo support.
	add_theme_support('custom-logo', [
		'height'      => 250,
		'width'       => 500,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => ['site-title', 'site-description'],
	]);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	// Gutenberg Block Color Palettes.
	add_theme_support('editor-color-palette', array(
		array(
			'name'  => esc_attr__('Blue', 'pyramid'),
			'slug'  => 'blue',
			'color' => '#004ea8',
		),
		array(
			'name'  => esc_attr__('Light Blue', 'pyramid'),
			'slug'  => 'light-blue',
			'color' => '#418fde',
		),
		array(
			'name'  => esc_attr__('Sky Blue', 'pyramid'),
			'slug'  => 'sky-blue',
			'color' => '#489fdf',
		),
		array(
			'name'  => esc_attr__('Yellow', 'pyramid'),
			'slug'  => 'yellow',
			'color' => '#f9e547',
		),
		array(
			'name'  => esc_attr__('Black', 'pyramid'),
			'slug'  => 'black',
			'color' => '#000',
		),
		array(
			'name'  => esc_attr__('Charcoal', 'pyramid'),
			'slug'  => 'charcoal',
			'color' => '#1d252d',
		),
		array(
			'name'  => esc_attr__('Gray', 'pyramid'),
			'slug'  => 'gray',
			'color' => '#5b6770',
		),
		array(
			'name'  => esc_attr__('Light Gray', 'pyramid'),
			'slug'  => 'light-gray',
			'color' => '#efefef',
		),
		array(
			'name'  => esc_attr__('White', 'pyramid'),
			'slug'  => 'white',
			'color' => '#fff',
		),
	));

	// Gutenberg support for full-width/wide alignment of supported blocks.
	add_theme_support('align-wide');

	// Gutenberg defaults for font sizes.
	add_theme_support('editor-font-sizes', [
		[
			'name' => __('Small', 'pyramid'),
			'size' => 12,
			'slug' => 'small',
		],
		[
			'name' => __('Normal', 'pyramid'),
			'size' => 16,
			'slug' => 'normal',
		],
		[
			'name' => __('Large', 'pyramid'),
			'size' => 36,
			'slug' => 'large',
		],
		[
			'name' => __('Huge', 'pyramid'),
			'size' => 50,
			'slug' => 'huge',
		],
	]);

	// Gutenberg editor styles support.
	add_theme_support('editor-styles');
	add_editor_style('build/index.css');

	// Gutenberg responsive embed support.
	add_theme_support('responsive-embeds');
}

add_action('after_setup_theme', 'pyramid_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @author Bop Design
 */
function pyramid_content_width()
{
	$GLOBALS['content_width'] = apply_filters('pyramid_content_width', 640);
}

add_action('after_setup_theme', 'pyramid_content_width', 0);

/**
 * Register widget area.
 *
 * @link   https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @author Bop Design
 */
function pyramid_widgets_init()
{
	// Define sidebars.
	$sidebars = [
		'sidebar-1' => esc_html__('Sidebar 1', 'pyramid'),
	];

	// Loop through each sidebar and register.
	foreach ($sidebars as $sidebar_id => $sidebar_name) {
		register_sidebar([
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => /* translators: the sidebar name */ sprintf(esc_html__('Widget area for %s', 'pyramid'), $sidebar_name),
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		]);
	}

}

add_action('widgets_init', 'pyramid_widgets_init');

/**
 * Remove tags support from posts.
 *
 * @link   https://developer.wordpress.org/reference/functions/unregister_taxonomy_for_object_type/
 *
 * @return void
 */
function pyramid_unregister_tags()
{
	unregister_taxonomy_for_object_type('post_tag', 'post');
}

add_action('init', 'pyramid_unregister_tags');
