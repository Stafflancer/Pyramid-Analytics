<?php
if (!defined('PYRAMID_VERSION')) {
	define( 'PYRAMID_VERSION', '1.1.0' );
}

/**
 * Enqueue scripts and styles.
 */
function pyramid_scripts()
{
	// Register styles.
	wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', [], null );
	wp_register_style( 'slick-style', get_template_directory_uri() . '/static/css/vendors/slick.min.css', [], null );

	// Register scripts.
	wp_register_script( 'slick-script', get_template_directory_uri() . '/static/js/slick.min.js', [ 'jquery' ], null, true );
	wp_register_script( 'parallax-script', get_template_directory_uri() . '/static/js/parallax.min.js', [], '1.5.0', true );

	// Enqueue styles & scripts.
	wp_enqueue_style( 'google-fonts' );
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/static/css/vendors/animate.min.css', [], null );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/static/css/main.min.css', [], PYRAMID_VERSION );

	wp_register_script( 'partners-directory-script', get_template_directory_uri() . '/static/js/partners-directory.js', [ 'jquery' ], null, true );
	wp_register_script( 'carousel-resource-cards-script', get_template_directory_uri() . '/static/js/carousel-resource-cards.js', [ 'jquery', 'slick-script' ], null, true );

	if ( in_array( get_post_type(), [
			'post',
			'analyst_reports',
			'case_studies',
			'events',
			'press_releases',
			'white_papers',
		] ) || is_page_template( [
			'template/template-analyst-reports.php',
			'template/template-white-papers.php',
			'template/blog.php',
			'template/case-study.php',
			'template/events.php',
			'template/news-room.php',
			'template/resources.php',
		] ) ) {
		wp_enqueue_style( 'slick-style' );

		wp_enqueue_script( 'slick-script' );
	}

	if ( 'jobs_openings' == get_post_type() ) {
		wp_enqueue_style( 'single-jobs-styles', get_template_directory_uri() . '/static/css/modules/single_jobs/single_jobs.css', [], null );
	}

	wp_enqueue_script( 'wow-script', get_template_directory_uri() . '/static/js/wow.min.js', [], null, true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/static/js/main.min.js', [ 'jquery' ], PYRAMID_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action('wp_enqueue_scripts', 'pyramid_scripts');

/**
 * Preload styles and scripts.
 */
function pyramid_preload_scripts()
{
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/static/css/main.min.css?v=<?php echo PYRAMID_VERSION; ?>" as="style">
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/style.css" as="style">
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/static/js/wow.min.js" as="script">
	<link rel="preload" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/static/js/main.min.js?v=<?php echo PYRAMID_VERSION; ?>" as="script">
	<?php
}

add_action('wp_head', 'pyramid_preload_scripts', 1);