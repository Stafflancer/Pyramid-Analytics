<?php
/**
 * The template for displaying single Job Openings posts.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();
?>
	<main class="main">
		<section style="background-image: url(<?php echo get_theme_file_uri('/static/images/careers-bg.jpg'); ?>)" class="careers-single">
			<div class="container">
				<h4>CAREERS</h4>
				<h1><?php the_title(); ?></h1>

				<?php if (get_field('location')): ?>
					<div class="location"><?php the_field('location'); ?></div>
				<?php endif; ?>
				<ul class="btn-list">
					<?php if (get_field('linkedin_url')): ?>
						<li>
							<a class="link" href="<?php the_field('linkedin_url'); ?>">Apply now on LinkedIn <img src="<?php echo get_theme_file_uri('/static/images/svgs/btn-arrow.svg'); ?>" alt="Arrow"></a>
						</li>
					<?php endif; ?>

					<li>
						<a class="apply" href="#form">APPLY <img src="<?php echo get_theme_file_uri('/static/images/svgs/btn-arrow.svg'); ?>" alt="Arrow"></a>
					</li>
				</ul>
				<?php the_content(); ?>

				<div id="form" class="form-block">
					<?php if (get_field('hubspot_form')): ?>
						<?php echo do_shortcode(get_field('hubspot_form')); ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	</main>

<?php get_footer();
