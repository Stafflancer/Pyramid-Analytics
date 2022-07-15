<?php
$s_heading = get_sub_field('s_heading');
$s_awards  = get_sub_field('s_awards');

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

<?php if ($s_heading || !empty($s_awards)) {
	if (!empty($s_awards)) {
		wp_enqueue_style('slick-style');
	}

	wp_enqueue_style('awards_block_styles', get_template_directory_uri() . '/static/css/modules/awards_block/awards_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}

	if (!empty($s_awards)) {
		wp_enqueue_script('slick-script');
		wp_enqueue_script('awards_block_js', get_template_directory_uri() . '/static/js/modules/awards_block/awards_block.js', array('slick-script'), null, true);
	} ?>

	<section class="awards_block
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
				<?php if ($s_heading) { ?>
					<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
				<?php }
				if (!empty($s_awards)) { ?>
					<div class="awards wow fadeIn">
						<?php foreach ($s_awards as $item) : ?>
							<div class="item">
								<?php
								$thumb = get_the_post_thumbnail($item, 's_341');
								if ($thumb) { ?>
									<div class="thumb">
										<?php echo $thumb; ?>
									</div>
								<?php } ?>

								<div class="title">
									<?php echo get_the_title($item); ?>
								</div>

								<?php if (has_excerpt($item)) { ?>
									<div class="excerpt">
										<?php echo get_the_excerpt($item); ?>
									</div>
								<?php } ?>
								<?php if (get_sub_field('disable_read_more') == 'no'){ ?>
								<a href="<?php the_permalink($item); ?>"><?php _e('Read more', 'pyramid'); ?>
									<svg width="21" height="9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 21 9">
										<path d="M0.41314,5.42307v0h18.60072v0v-2.00731v0h-18.60072v0z" fill="#0eafdb" fill-opacity="1"></path>
										<path d="M20.17647,3.41576c-2.15745,0 -3.64655,-1.48143 -3.64655,-3.01096h-2.00731c0,2.9049 2.67484,5.01827 5.65385,5.01827z" fill="#0eafdb" fill-opacity="1"></path>
										<path d="M16.52995,8.43403c0,-1.52953 1.48909,-3.01096 3.64655,-3.01096v-2.00731c-2.97902,0 -5.65385,2.11337 -5.65385,5.01827z" fill="#0eafdb" fill-opacity="1"></path>
									</svg>
									<?php } ?>
								</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
