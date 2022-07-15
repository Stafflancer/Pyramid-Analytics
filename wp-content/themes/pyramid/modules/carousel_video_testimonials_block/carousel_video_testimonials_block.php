<?php
$s_heading      = get_sub_field('s_heading');
$s_testimonials = get_sub_field('s_testimonials');

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
$text_color       = get_sub_field('text_color'); ?>

<?php if (!empty($s_testimonials)) {
	wp_enqueue_style('slick-style');
	wp_enqueue_style('carousel_video_testimonials_block_styles', get_template_directory_uri() . '/static/css/modules/carousel_video_testimonials_block/carousel_video_testimonials_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}

	wp_enqueue_script('slick-script');
	wp_enqueue_script('carousel_video_testimonials_block_js', get_template_directory_uri() . '/static/js/modules/carousel_video_testimonials_block/carousel_video_testimonials_block.js', array('slick-script'), null, true);
	?>

	<section class="carousel_video_testimonials_block
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
		if ($media_type == 'image' && !empty($image) && $parallax) { ?>data-parallax="scroll"
		data-image-src="<?php echo $image; ?>"<?php } ?>>

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
				<?php if ($s_heading) { ?>
					<h2 class="wow fadeIn"><?php echo $s_heading; ?></h2>
				<?php } ?>

				<div class="s_carousel wow fadeIn">
					<?php
					foreach ($s_testimonials as $item) {
						$thumb    = get_the_post_thumbnail($item, 's_330');
						$company  = get_field('company', $item);
						$position = get_field('position', $item);
						$video    = get_field('video', $item); ?>

						<div class="item <?php echo empty($video) ? 'static' : ''; ?>">
							<?php if (!empty($video)) { ?>
								<div class="video-holder">
									<video width="400" controls>
										<source src="<?php echo $video['url'] ?>" type="video/mp4">
									</video>
								</div>
							<?php } ?>

							<div class="info-box">
								<?php if ($thumb) { ?>
									<div class="thumb">
										<?php echo $thumb; ?>
									</div>
								<?php } ?>

								<div class="title">
									<?php echo get_the_title($item); ?>.
								</div>

								<?php if (!empty($company) || !empty($position)) { ?>
									<div class="info">
										<?php if (!empty($company)) {
											echo $company;
										}
										if (!empty($position)) {
											echo ', ' . $position;
										} ?>
									</div>
								<?php } ?>

								<div class="slick-slider-dots"></div>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
