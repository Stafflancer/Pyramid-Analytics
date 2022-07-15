<?php
/**
 * Template Name: Analyst Reports
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid
 */

get_header();

$s_heading                = get_field('feature_heading');
$featured_analyst_reports = get_field('featured_analyst_reports');

/* BG Settings */
$media_type    = get_field('media_type');
$add_overlay   = get_field('add_overlay');
$overlay_color = get_field('overlay_color');
$parallax      = get_field('parallax');
$color         = get_field('color');
$image         = get_field('image');
$video_mp4     = get_field('video_mp4');
$video_webm    = get_field('video_webm');

/* Other Settings */
$custom_id        = get_field('custom_id');
$custom_css_class = get_field('custom_css_class');
$heading_color    = get_field('heading_color');
$text_color       = get_field('text_color');

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}
?>
	<section class="banner-section" style="background: url(<?php the_field('banner_background'); ?>);">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<div class="banner-inner">
						<div class="breadcrumb">
							<span class="first"><a class="breadcrumb-color" href="/resources/">RESOURCES / </a></span>
							<span class="second">Analyst Reports</span>
						</div>
						<h1 class="h1-desktop-white heading"><?php the_field('banner_heading'); ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if ($featured_analyst_reports) { ?>
		<section class="feature-section resources-section space-top events <?php
			echo ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) ? ' video ' : '';
			/* css class */
			echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
			/* heading color */
			echo !empty($heading_color) ? $heading_color . ' ' : '';
			/* text color */
			echo !empty($text_color) ? $text_color . ' ' : '';
			/* bg image */
			echo ($media_type == 'image' && !empty($image)) ? 'bg-image ' : '';
			/* bg color */
			echo $media_type == 'color' && !empty($color) ? 'bg-' . $color : ''; ?>"
			<?php
			/* custom id */
			echo !empty($custom_id) ? 'id="' . $custom_id . '"' : '';
			/* bg image */
			if ($media_type == 'image' && !empty($image) && !$parallax) { ?>style="background-image: url('<?php echo $image ?>')"
			<?php }
			/* bg image with parallax */
			if ($media_type == 'image' && !empty($image) && $parallax) { ?>data-parallax="scroll" data-image-src="<?php echo $image; ?>"<?php } ?>>
			<div class="custom-container">
				<?php
				/* overlay */
				if (($media_type == 'image' || $media_type == 'video') && $add_overlay && !empty($overlay_color)) { ?>
					<div class="overlay <?php echo $overlay_color; ?>"></div>
				<?php }
				/* video */
				if ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) { ?>
					<video class="bg-video" autoplay loop muted>
						<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
						<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
					</video>
				<?php } ?>
				<?php if ($s_heading) { ?>
					<div class="row">
						<div class="col-12">
							<h2 class="h2-desktop title-heading section-margin"><?php echo $s_heading; ?></h2>
						</div>
					</div>
				<?php } ?>

				<div class="row">
				<?php
				foreach ($featured_analyst_reports as $post) {
					setup_postdata($post);
					$report_terms = get_the_terms(get_the_ID(), 'analysts');
					$terms_string = join(', ', wp_list_pluck($report_terms, 'name'));
					?>
					<div class="col-12 col-md-6 col-lg-4 responsive-flex">
						<div class="card purple no-image">
							<div class="card-body">
								<div class="label">
									<?php echo $terms_string; ?>
								</div>
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
				<?php
				}
				wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php } ?>

	<section class="blog-section space-top">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<h2 class="h2-desktop title-heading">Analyst Reports</h2>
					<div class="filter section-margin filter-margin-low">
						<div class="filter-group no-flex">
							<div class="filter-box width-auto">
								<div class="search">
									<?php echo do_shortcode('[searchandfilter id="3800"]'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args  = [
				'post_type'        => 'analyst_reports',
				'paged'            => $paged,
				'search_filter_id' => 3800,
			];

			$analyst_reports = new WP_Query($args);

			if ($analyst_reports->have_posts()):
				?>
				<div id="analyst-reports" class="cards-section row">
					<?php
					while ($analyst_reports->have_posts()) : $analyst_reports->the_post();
						$report_terms = get_the_terms(get_the_ID(), 'analysts');
						$terms_string = join(', ', wp_list_pluck($report_terms, 'name'));
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card purple no-image">
								<div class="card-body">
									<div class="label">
										<?php echo $terms_string; ?>
									</div>
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
							'total'   => $analyst_reports->max_num_pages,
						));
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</section>
<?php get_footer();
