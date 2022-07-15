<?php
/**
 * Template Name: Resources
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();

$featured_heading        = get_field('featured_heading');
$featured_blog_post      = get_field('featured_blog_post');
$featured_event          = get_field('featured_event');
$featured_case_study     = get_field('featured_case_study');
$featured_analyst_report = get_field('featured_analyst_report');
$featured_white_paper    = get_field('featured_white_paper');

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
	<!-- banner section start  -->
	<section class="banner-section" style="background-image: url('<?php the_field('banner_background'); ?>');">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<div class="banner-inner">
						<div class="breadcrumb">
							<span class="first"><?php the_title();?></span>
						</div>
						<h1 class="h1-desktop-white heading"><?php the_field('banner_heading'); ?></h1>
						<div class="form">
							<?php echo do_shortcode('[BLOGRESOURCEFORM]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="feature-section resources-section space-top <?php
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
		<div class="custom-container"><?php
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

			<div class="row">
				<div class="col-12">
					<h2 class="h2-desktop title-heading section-margin margin-low"><?php _e( 'Featured Resources', 'pyramid' ); ?></h2>
				</div>
			</div>

			<div class="row">
				<?php
				if ($featured_blog_post) {
					foreach ($featured_blog_post as $post) {
						setup_postdata($post);
						?>
						<div class="col-12 col-md-6 col-lg-8 responsive-flex">
							<div class="card horizontal p-0">
								<div class="row">
									<div class="col-12 col-lg-6 image p-0">
										<?php the_post_thumbnail('medium_large', array('class' => 'img-fluid')); ?>
									</div>
									<div class="col-12 col-lg-6 content">
										<div class="card-body">
											<div class="label"><?php _e( 'Blog', 'pyramid' ); ?></div>
											<h3 class="heading h4-desktop">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
											</h3>
											<p class="paragraph"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
										</div>
										<div class="card-footer justify-content-between">
											<span class="post-date"><?php echo get_the_date(); ?></span>
											<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					wp_reset_postdata();
				}

				if ($featured_event) {
					foreach ($featured_event as $post) {
						setup_postdata($post);
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card green no-image">
								<div class="card-body">
									<div class="label"><?php _e( 'Events & Webinars', 'pyramid' ); ?></div>
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
						<?php
					}
					wp_reset_postdata();
				}

				if ($featured_case_study) {
					foreach ($featured_case_study as $post) {
						setup_postdata($post);
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card link no-image">
								<div class="card-body">
									<div class="label"><?php _e( 'Case Study', 'pyramid' ); ?></div>
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php
					}
					wp_reset_postdata();
				}

				if ($featured_analyst_report) {
					foreach ($featured_analyst_report as $post) {
						setup_postdata($post);
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card purple no-image">
								<div class="card-body">
									<div class="label"><?php _e( 'Analyst Report', 'pyramid' ); ?></div>
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php
					}
					wp_reset_postdata();
				}

				if ($featured_white_paper) {
					foreach ($featured_white_paper as $post) {
						setup_postdata($post);
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card orange no-image">
								<div class="card-body">
									<div class="label"><?php _e( 'White Paper', 'pyramid' ); ?></div>
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php
					}
					wp_reset_postdata();
				}
				?>
			</div>
		</div>
	</section>

	<section class="blog-section gray space-top">
		<div class="custom-container">
			<div class="cards-section row">
				<div class="col-12">
					<h2 class="h2-desktop section-margin title-heading space-1"><?php _e( 'Blog Posts', 'pyramid' ); ?></h2>
				</div>

				<?php
				$args = [
					'post_type'      => 'post',
					'posts_per_page' => 3,
				];

				$blog_posts = new WP_Query($args);

				if ($blog_posts->have_posts()):
					while ($blog_posts->have_posts()) : $blog_posts->the_post();
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card">
								<div class="image">
									<?php the_post_thumbnail('medium_large'); ?>
								</div>
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-between">
									<span class="post-date"><?php echo get_the_date(); ?></span>
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="col-12 button-custom">
					<a href="/resources/blog/" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
				</div>
			</div>

			<div class="cards-section row">
				<div class="col-12">
					<h2 class="h2-desktop section-margin title-heading margin-low events-webinars-heading"><?php _e( 'Events and Webinars', 'pyramid' ); ?></h2>
				</div>

				<?php
				$args = [
					'post_type'      => 'events',
					'posts_per_page' => 3,
					'orderby'        => 'menu_order',
					'order'          => 'DESC',
				];

				$events = new WP_Query($args);

				if ($events->have_posts()):
					while ($events->have_posts()) : $events->the_post();
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card green no-image">
								<div class="image">
									<?php the_post_thumbnail('medium_large'); ?>
								</div>
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="col-12 button-custom">
					<a href="/resources/events-webinars/?_sft_category=upcoming-events" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
				</div>
			</div>

			<div class="cards-section row">
				<div class="col-12">
					<h2 class="h2-desktop section-margin title-heading space-1"><?php _e( 'Case Studies', 'pyramid' ); ?></h2>
				</div>

				<?php
				$args = [
					'post_type'      => 'case_studies',
					'posts_per_page' => 3,
					'orderby'        => 'menu_order',
					'order'          => 'DESC',
				];

				$case_studies = new WP_Query($args);

				if ($case_studies->have_posts()):
					while ($case_studies->have_posts()) : $case_studies->the_post();
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card link">
								<div class="image">
									<?php the_post_thumbnail('medium_large'); ?>
								</div>
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="col-12 button-custom">
					<a href="/resources/case-studies/" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
				</div>
			</div>

			<div class="cards-section row">
				<div class="col-12">
					<h2 class="h2-desktop section-margin title-heading margin-low space"><?php _e( 'Analyst Reports', 'pyramid' ); ?></h2>
				</div>

				<?php
				$args = [
					'post_type'      => 'analyst_reports',
					'posts_per_page' => 3,
					'orderby'        => 'menu_order',
					'order'          => 'DESC',
				];

				$analyst_reports = new WP_Query($args);

				if ($analyst_reports->have_posts()):
					while ($analyst_reports->have_posts()) : $analyst_reports->the_post();
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card purple no-image">
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="col-12 button-custom">
					<a href="/resources/analyst-reports/" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
				</div>
			</div>

			<div class="cards-section row">
				<div class="col-12">
					<h2 class="h2-desktop section-margin title-heading margin-low space"><?php _e( 'White Papers', 'pyramid' ); ?></h2>
				</div>

				<?php
				$args = [
					'post_type'      => 'white_papers',
					'posts_per_page' => 3,
					'orderby'        => 'menu_order',
					'order'          => 'DESC',
				];

				$white_papers = new WP_Query($args);

				if ($white_papers->have_posts()):
					while ($white_papers->have_posts()) : $white_papers->the_post();
						?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card orange no-image">
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>

				<div class="col-12 button-custom">
					<a href="/resources/white-papers/" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
				</div>
			</div>
			<?php
			$args = [
				'post_type'      => 'videos',
				'posts_per_page' => 3,
				'orderby'        => 'menu_order',
				'order'          => 'DESC',
			];

			$videos = new WP_Query( $args );

			if ( $videos->have_posts() ): ?>
				<div class="cards-section row videos-blog">
					<div class="col-12">
						<h2 class="h2-desktop section-margin title-heading margin-low space"><?php _e( 'Videos', 'pyramid' ); ?></h2>
					</div>
					<?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
						<div class="col-12 col-md-6 col-lg-4 responsive-flex">
							<div class="card black no-image">
								<div class="image">
									<?php the_post_thumbnail( 'medium_large' ); ?>
								</div>
								<div class="card-body">
									<h3 class="heading h4-desktop">
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="paragraph"><?php echo wp_trim_words( get_the_excerpt(), 20 ); ?></p>
								</div>
								<div class="card-footer justify-content-end">
									<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Learn More', 'pyramid' ); ?></a>
								</div>
							</div>
						</div>
					<?php
					endwhile;
					wp_reset_postdata();
					?>
					<div class="col-12 button-custom">
						<a href="/resources/video/" class="button orange"><?php _e( 'View All', 'pyramid' ); ?> &#8594;</a>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php get_footer();