<?php
$s_heading        = get_sub_field('media_heading');
$s_content        = get_sub_field('media_content');
$s_media_position = get_sub_field('media_initial_position');

$s_image = get_sub_field('s_image');

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
$additional_breadcrumbs = get_sub_field('additional_breadcrumbs');

wp_enqueue_style('media_content_rows_block', get_template_directory_uri() . '/static/css/modules/media_content_rows_block/media_content_rows_block.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}
?>
<section class="media_content_rows_block
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
				<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
			<?php }

			if ($additional_heading && $additional_content) { ?>
				<?php if ($additional_breadcrumbs) {
					?>
					<div class="additional_breadcrumbs"><?php echo $additional_breadcrumbs; ?></div>
					<?php
				} ?>

				<h2 class="wow slideInDown additionalhed"><?php echo $additional_heading; ?></h2>
				<div class="additionalcontent"><?php echo $additional_content; ?></div>
			<?php }

			if ($s_content) { ?>
				<div class="media_content wow slideInDown"><?php echo $s_content; ?></div>
			<?php }

			if ($s_image) { ?>
				<div class="wow fadeIn image-holder"><?php echo wp_get_attachment_image($s_image, 'full'); ?></div>
			<?php }
			$i = 1;
			if (have_rows('content_rows')) { ?>
				<div class="mediablocks wow fadeIn defult-<?php echo $s_media_position; ?>">
					<?php

					while (have_rows('content_rows')) : the_row();

						if (have_rows('media')) {
							while (have_rows('media')): the_row();
								$media_image = get_sub_field('media_image');
							endwhile;

						}
						if (have_rows('content')) {
							while (have_rows('content')): the_row();
								$media_heading = get_sub_field('media_heading');
								$media_content = get_sub_field('media_content');
								$media_button  = get_sub_field('media_button');
							endwhile;

						}

						?>

						<div class="innerrowitem">
							<?php if ($i % 2 == 0) { ?>
								<div class="mediaimgblock">
									<img src="<?php echo $media_image; ?>" class="mediaimg"/>
								</div>
								<div class="mediacntblock">
									<h3><?php echo $media_heading; ?></h3>
									<?php if (!empty($media_content)) { ?>
										<div class="content">
											<?php echo $media_content; ?>
										</div>
									<?php }
									if (!empty($media_button)) { ?>
										<a class="link" href="<?php echo $media_button; ?>"
										   target="<?php echo $card_link['target']; ?>"><?php echo $card_link['title']; ?></a>
									<?php } ?>
								</div>
							<?php } else {
								?>
								<div class="mediacntblock">
									<h3><?php echo $media_heading; ?></h3>
									<?php if (!empty($media_content)) { ?>
										<div class="content">
											<?php echo $media_content; ?>
										</div>
									<?php }
									if (!empty($media_button)) {
										?>
										<a class="link" href="<?php echo $media_button['url']; ?>"
										   target="<?php echo $media_button['target']; ?>"><?php echo $media_button['title']; ?></a>
									<?php } ?>
								</div>
								<div class="mediaimgblock">
									<img src="<?php echo $media_image; ?>" class="mediaimg"/>
								</div>
							<?php } ?>
						</div>
						<?php
						$i++;
					endwhile; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
