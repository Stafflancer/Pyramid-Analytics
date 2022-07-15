<?php
/**
 * Template for a Press Release single.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();
?>
	<section class="blog-post">
		<div class="blogpost-container">
			<div class="breadcrumb">
				<span class="first">Company / News Room / </span>
				<span class="second">Press Release</span>
			</div>
			<h1 class="blogpost-title h2-desktop">
				<?php the_title(); ?>
			</h1>
			<div class="blogpost-meta">
				<span class="date"><?php echo get_the_date(); ?></span>
			</div>
			<div class="blogpost-img">
				<?php the_post_thumbnail(); ?>
			</div>
			<div class="content custom-blogpost">
				<?php the_content(); ?>
			</div>

			<?php
			$prev_post = get_adjacent_post(false, '', true);
			$next_post = get_adjacent_post(false, '', false);
			?>
			<div class="control">
				<div class="prev_arrow">
					<?php $prev_val = "<span class='arrow'>&#8592;</span>&nbsp;Previous</span></span>"; ?>
					<?php previous_post_link('%link', "$prev_val"); ?>
				</div>

				<div class="right_arrow">
					<?php $next_val = "<span class='next'>Next&nbsp;<span class='arrow'>&#8594;</span></span>"; ?>
					<?php next_post_link('%link', "$next_val"); ?>
				</div>
			</div>
		</div>
	</section>

	<section id="related-reads" class="related-posts space-top">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<h2 class="h2-desktop title-heading section-margin space-1"><?php _e( 'Related Reads', 'pyramid' ); ?></h2>
				</div>
			</div>

			<div class="cards-section row">
				<?php
				$args = [
					'post_type'      => 'press_releases',
					'posts_per_page' => 3,
				];

				$related_press_releases = new WP_Query($args);

				if ( $related_press_releases->have_posts() ):
					while ( $related_press_releases->have_posts() ) :
						$related_press_releases->the_post();

						include get_template_directory() . '/template-parts/card-press-release.php';
						?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php include get_template_directory() . '/template-parts/newsletter.php'; ?>
<?php get_footer();