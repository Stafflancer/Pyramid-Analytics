<?php
/**
 * Template Name: Press
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();
?>
	<section class="banner-section" style="background: url(<?php the_field('banner_background'); ?>);">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<div class="banner-inner">
						<div class="breadcrumb">
							<span class="first"><a class="breadcrumb-color" href="/resources/">RESOURCES / </a></span>
							<span class="second">Press Releases</span>
						</div>
						<h1 class="h1-desktop-white heading"><?php the_field('banner_heading'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="blog-section space-top">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<h2 class="h2-desktop title-heading">Press Releases</h2>
					<div class="filter section-margin filter-margin-low">
						<div class="filter-group no-flex">
							<div class="filter-box width-auto">
								<div class="search">
									<?php echo do_shortcode('[searchandfilter id="7703"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="press-releases" class="cards-section row">
				<?php
				$args = [
					'post_type'        => 'press_releases',
					'search_filter_id' => 7703,
				];

				$press_releases = new WP_Query($args);

				if ($press_releases->have_posts()):
					while ($press_releases->have_posts()) : $press_releases->the_post();
						$press_release_terms        = get_the_terms(get_the_ID(), 'category');
						$press_release_terms_string = join(', ', wp_list_pluck($press_release_terms, 'name'));
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card orange no-image">
								<div class="card-body">
<!--									<div class="label">-->
<!--										--><?php //echo $press_release_terms_string; ?>
<!--									</div>-->
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button">Read More</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<div class="pagination">
						<?php
						$big = 999999999; // need an unlikely integer
						echo paginate_links(array(
							'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
							'format'  => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total'   => $press_releases->max_num_pages,
						));
						?>
					</div>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php get_footer();
