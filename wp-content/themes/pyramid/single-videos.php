<?php
/**
 * Template for a Video single.
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
				<span class="first"><?php _e( 'RESOURCES', 'pyramid' ); ?> / </span>
				<span class="second"><?php _e( 'VIDEOS', 'pyramid' ); ?></span>
			</div>
			<h1 class="blogpost-title h2-desktop">
				<?php the_title(); ?>
			</h1>
			<div class="blogpost-meta">
				<span class="date"><?php echo get_the_date(); ?></span>
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
					'post_type'      => 'videos',
					'posts_per_page' => 3,
					'post__not_in' => array (get_the_ID()),

				];

				$related_press_releases = new WP_Query($args);

				if ( $related_press_releases->have_posts() ):
					while ( $related_press_releases->have_posts() ) :
						$related_press_releases->the_post(); ?>
						<div class="col-md-4 responsive-flex">
							<div class="card black">
								<?php if ( has_post_thumbnail() ): ?>
									<div class="image">
										<?php the_post_thumbnail( 'medium_large' ); ?>
									</div>
								<?php endif; ?>
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php include get_template_directory() . '/template-parts/newsletter.php'; ?>
<?php get_footer();