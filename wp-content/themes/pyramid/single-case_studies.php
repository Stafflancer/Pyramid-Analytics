<?php
/**
 * Template for a Case Study single.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();

$post_id = get_the_ID();
?>
	<div class="case-study">
		<?php
		$banner_background = get_field('banner_background');
		if ($banner_background) {
			?>
			<div class="banner-section banner-solid" style="background-image: url('<?php echo $banner_background; ?>');"></div>
		<?php } else { ?>
			<div class="banner-section banner-solid" style="background: <?php the_field('banner_background_color'); ?>;"></div>
		<?php } ?>
		<section class="blog-post custom-blogpost">
			<div class="blogpost-container">
				<div class="shadow-block">
					<div class="row">
						<div class="col-md-8">
							<div class="image">
								<?php the_post_thumbnail(); ?>
							</div>
							<h1 class="title h2-desktop"><?php the_title(); ?></h1>
							<h2 class="sub-title h4-desktop"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></h2>
						</div>
						<?php if (get_field('customer_logo')) { ?>
							<div class="logo-class">
								<div class="small-image">
									<img src="<?php the_field('customer_logo'); ?>" alt="#">
								</div>

								<?php if (get_field('hubspot_CTA')): ?>
							        <?php echo do_shortcode(get_field('hubspot_CTA')); ?>
					       		<?php endif; ?>
							</div>
						<?php } ?>
					</div>
				</div>

				<div class="row block-sm">
				<?php
				$key_feature_title = get_field('key_feature_title');

				if ($key_feature_title) { ?>
					<div class="col-12 title-block">
						<h3 class="section-title"><?php echo $key_feature_title; ?></h3>
					</div>
				<?php } ?>

				<?php if (have_rows('key_figures_content')) { ?>
					<?php
					while (have_rows('key_figures_content')) {
						the_row();
						$key_figures_box_heading = get_sub_field('key_figures_box_heading');
						$key_figures_box_content = get_sub_field('key_figures_box_content'); ?>
						<div class="col-12 col-md-6">
							<div class="block">
								<?php if ($key_figures_box_heading) { ?>
									<h4 class="title h4-desktop"><?php echo $key_figures_box_heading; ?></h4>
								<?php } ?>
								<?php if ($key_figures_box_content) { ?>
									<div class="content">
									<?php echo $key_figures_box_content; ?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php } ?>
				<?php } ?>
				</div>

				<div class="row">
					<div class="col-12 title-block no-space">
						<h3 class="section-title"><?php the_field('challenge_label'); ?></h3>
					</div>
					<div class="content">
						<?php
						$challenge_heading = get_field('challenge_heading');
						if ($challenge_heading) { ?>
							<h4><?php echo $challenge_heading; ?></h4>
						<?php } ?>
						<?php the_field('challenge_content'); ?>
					</div>
				</div>

				<hr class="line"/>

				<div class="row space">
					<div class="col-12 title-block no-space">
						<h3 class="section-title"><?php the_field('solution_label'); ?></h3>
					</div>
					<div class="content">
						<?php
						$solution_heading = get_field('solution_heading');
						if ($solution_heading) { ?>
							<h4><?php echo $solution_heading; ?></h4>
						<?php } ?>
						<?php the_field('solution_content'); ?>
					</div>
				</div>

				<div class="case-study-results shadow-block no-margin">
					<div class="row">
						<div class="col-12 title-block no-space">
							<h3 class="section-title"><?php the_field('results_label'); ?></h3>
						</div>
						<div class="col-12">
							<div class="content"><?php
								$results_heading = get_field('results_heading');
								if ($results_heading) { ?>
									<h4><?php echo $results_heading; ?></h4>
								<?php } ?>
								<?php the_field('results_content'); ?>
							</div>
							<div class="row align-items-center"><?php
								$customer_image = get_field('customer_image');
								if ($customer_image) { ?>
									<div class="col-12 col-md-3">
										<div class="image round">
											<img src="<?php echo $customer_image['url']; ?>" alt="<?php echo $customer_image['title']; ?>">
										</div>
									</div>
								<?php } ?>
								<div class="col-12 col-md-9">
									<div class="blockquote"><?php
										$customer_quote = get_field('customer_quote');
										if ($customer_quote) {
											?>
											<blockquote><p><?php echo $customer_quote; ?></p></blockquote>
											<?php
										}
										$customer_name = get_field('customer_name');
										if ($customer_name) { ?>
											<div class="bio">– <?php echo $customer_name; ?>, <?php the_field('customer_company_name'); ?></div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
				$other_description = get_field('other_description');

				if ($other_description) { ?>
					<div class="other-block">
						<?php echo $other_description; ?>
					</div>
				<?php } ?>

				<?php
				$youtube_video = get_field('youtube_video');
				if ($youtube_video) {
					$data    = $youtube_video;
					$videoid = substr($data, strpos($data, "https://youtu.be/") + 17); ?>
					<div class="youtube-video">
						<iframe width="850" height="450" src="https://www.youtube.com/embed/<?php echo $videoid; ?>"
						        title="YouTube video player"
						        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
						        allowfullscreen></iframe>
					</div>
				<?php } ?>

				<div class="blogpost-container">
					<?php
					$prev_post = get_adjacent_post(false, '', true);
					$next_post = get_adjacent_post(false, '', false);
					?>
					<div class="control mb-custom-1">
						<div class="prev_arrow">
							<?php
							$prev_val = "<span class='arrow'>&#8592;</span>&nbsp;Previous</span></span>";
							previous_post_link('%link', "$prev_val");
							?>
						</div>

						<div class="right_arrow">
							<?php
							$next_val = "<span class='next'>Next&nbsp;<span class='arrow'>&#8594;</span></span>";
							next_post_link('%link', "$next_val");
							?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<?php include get_template_directory() . '/template-parts/newsletter.php'; ?>

		<?php
		$case_studies = array(
			'post_type'      => 'case_studies',
			'post_status'    => 'publish',
			'posts_per_page' => 3,
			'post__not_in'   => array($post_id),
			'orderby'        => 'date',
			'order'          => 'DESC',
		);
		$wp_query     = new WP_Query($case_studies);

		if ($wp_query->have_posts()) { ?>
			<section class="related-posts space-top">
				<div class="custom-container">
					<div class="row">
						<div class="col-12">
							<h2 class="h2-desktop title-heading section-margin space-1">Related Reads</h2>
						</div>
					</div>
					<div class="cards-section row">
						<?php
						while ($wp_query->have_posts()) {
							$wp_query->the_post();

							include get_template_directory() . '/template-parts/card-case-study.php';
						}

						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>
		<?php } ?>
	</div>

<?php get_footer();