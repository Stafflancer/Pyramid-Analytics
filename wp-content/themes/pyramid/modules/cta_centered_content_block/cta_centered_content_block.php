<?php
$s_title           = get_sub_field('s_heading');
$s_button          = get_sub_field('s_button');
$additional_button = get_sub_field('additional_button');

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
$additional_heading = get_sub_field('cat_additional_title');
$additional_content = get_sub_field('cta_additional_content'); ?>

<?php if ($s_title || !empty($s_button)) {
	wp_enqueue_style('cta_centered_content_block_styles', get_template_directory_uri() . '/static/css/modules/cta_centered_content_block/cta_centered_content_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	} ?>

	<section class="cta_centered_content_block
        <?php
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

		<?php
		/* overlay */
		if (($media_type == 'image' || $media_type == 'video') && $add_overlay && !empty($overlay_color)) { ?>
			<div class="overlay <?php echo $overlay_color; ?>"></div>
		<?php }

		/* video */
		if ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) { ?>
			<video class="bg-video" autoplay muted>
				<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
				<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
			</video>
		<?php } ?>

		<div class="container">
			<div class="section-holder">
				<?php if (!empty($s_title)) { ?>
					<h2 class="wow slideInDown"><?php echo $s_title; ?></h2>
				<?php }
				if ($additional_heading && $additional_content) { ?>
					<h2 class="wow slideInDown additionalhed"><?php echo $additional_heading; ?></h2>
					<div class="additionalcontent"><?php echo $additional_content; ?></div>
				<?php }
				if (!empty($s_button)) { ?>
					<a class="button white wow slideInUp" href="<?php echo $s_button['url']; ?>"
					   target="<?php echo $s_button['target']; ?>"><?php echo $s_button['title']; ?></a>
				<?php } ?>
				<?php if (!empty($additional_button)) { ?>
					<a class="button white wow slideInUp" href="<?php echo $additional_button['url']; ?>"
					   target="<?php echo $additional_button['target']; ?>"><?php echo $additional_button['title']; ?></a>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
