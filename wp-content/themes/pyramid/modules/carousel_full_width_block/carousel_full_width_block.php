<?php
$s_heading = get_sub_field('s_heading');

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

<?php if (have_rows('s_carousel')) {
	wp_enqueue_style('slick-style');
	wp_enqueue_style('carousel_full_width_block_styles', get_template_directory_uri() . '/static/css/modules/carousel_full_width_block/carousel_full_width_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}

	if (have_rows('s_carousel')) {
		wp_enqueue_script('slick-script');
		wp_enqueue_script('carousel_full_width_block_js', get_template_directory_uri() . '/static/js/modules/carousel_full_width_block/carousel_full_width_block.js', array('slick-script'), null, true);
	} ?>

	<section class="carousel_full_width_block
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
				<div class="container wow slideInDown">
					<h2><?php echo $s_heading; ?></h2>
				</div>
			<?php } ?>
			<div class="s_carousel">
				<?php while (have_rows('s_carousel')) : the_row();
					$image = get_sub_field('image'); ?>
					<div class="item" <?php echo !empty($image) ? 'style="background-image: url(' . $image . ')"' : ''; ?>>
						<div class="mob-image">
							<img src="<?php echo get_sub_field('mobile_image'); ?>" alt="mob image">
						</div>
						<div class="container-fluid">
							<div class="holder">
								<div class="heading">
									<?php the_sub_field('heading'); ?>
								</div>
								<?php $content = get_sub_field('content');
								if ($content) { ?>
									<div class="content">
										<?php echo $content; ?>
									</div>
								<?php } ?>
								<div class="slick-slider-dots"></div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php } ?>
