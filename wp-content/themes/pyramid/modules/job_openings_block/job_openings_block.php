<?php
$s_heading    = get_sub_field('media_heading');
$s_content    = get_sub_field('media_content');
$job_openings = get_sub_field('job_openings');

/* BG Settings */
$media_type    = get_sub_field('media_type');
$add_overlay   = get_sub_field('add_overlay');
$overlay_color = get_sub_field('overlay_color');
$parallax      = get_sub_field('parallax');
$color         = get_sub_field('color');
$image         = get_sub_field('image');
$video_mp4     = get_sub_field('video_mp4');
$video_webm    = get_sub_field('video_webm');

/* Other Settings */
$custom_id        = get_sub_field('custom_id');
$custom_css_class = get_sub_field('custom_css_class');
$heading_color    = get_sub_field('heading_color');
$text_color       = get_sub_field('text_color');

/* Additional Headers */
$additional_heading     = get_sub_field('additional_heading');
$additional_content     = get_sub_field('additional_content');
$additional_breadcrumbs = get_sub_field('simple_background_options');

wp_enqueue_style('job_openings_block', get_template_directory_uri() . '/static/css/modules/job_openings_block/job_openings_block.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}
?>
<section class="job_openings_block
    <?php
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
	<div class="container">
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
		<div class="section-holder">
			<div class="inner-section-1">
				<div class="row">
					<div class="col-12">
						<?php if ($s_heading) { ?>
							<div class="row">
								<div class="col-12">
									<div class="h2-desktop heading"><?php echo $s_heading; ?></div>
								</div>
							</div><!-- row end -->
						<?php } ?>
						<?php
						foreach ($job_openings as $key => $jobs) {
							$jobid       = $jobs->ID;
							$jobtitle    = $jobs->post_title;
							$joblink     = get_the_permalink($jobs->ID);
							$joblocation = get_post_meta($jobs->ID, 'location', true);
							$jobposition = get_post_meta($jobs->ID, 'type_of_position', true);
							//$joblinkedin_url = get_post_meta($jobs->ID, 'linkedin_url', true);
							//$jobhubspot_form = get_post_meta($jobs->ID, 'hubspot_form', true);
							?>
							<div class="row job-<?php echo $jobid; ?>">
								<div class="col-12 col-lg-6">
									<?php if ($jobtitle) { ?>
										<div class="title h3-desktop"><?php echo $jobtitle; ?></div>
									<?php } ?>
								</div>
								<div class="col-12 col-lg-4">
									<?php if ($joblocation) { ?>
										<div class="address">
											<?php echo $joblocation; ?>
										</div>
									<?php } ?>
									<?php if ($jobposition) { ?>
										<div class="time"><?php echo $jobposition; ?></div>
									<?php } ?>
								</div>
								<div class="col-12 col-lg-2">
									<div class="custom-btn">
										<a href="<?php echo $joblink; ?>">LEARN MORE</a>
									</div>
								</div>
							</div><!-- row end -->
						<?php } ?>
					</div><!-- col end -->
				</div><!-- row end -->
			</div>
			<?php if ($s_content) { ?>
				<div class="inner-section-2 wow slideInDown">
					<div class="row">
						<div class="col-12 content">
							<?php echo $s_content; ?>
						</div>
					</div>
				</div><!-- inner-section-2 end -->
			<?php } ?>
		</div>
	</div>
</section>
