<?php
$s_heading        = get_sub_field('media_heading');
$s_content        = get_sub_field('media_content');
$breadcomes_block = get_sub_field('breadcomes_block');

$s_image = get_sub_field('page_logo');

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
$additional_heading             = get_sub_field('additional_heading');
$additional_content             = get_sub_field('additional_content');
$additional_breadcrumbs         = get_sub_field('additional_breadcrumbs');
$implementations_image_position = get_sub_field('implementations_image_position');
?>

<?php
wp_enqueue_style('implementations_block', get_template_directory_uri() . '/static/css/modules/implementations_block/implementations_block.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}
?>
<section class="implementations_block
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
			<?php if ($breadcomes_block) { ?>
				<div class="additional_breadcrumbs"><?php echo $breadcomes_block; ?></div>
			<?php } ?>

			<?php if ($s_image) { ?>
				<div
					class="wow fadeIn image-holder"><?php echo wp_get_attachment_image($s_image['ID'], 'full'); ?></div>
			<?php } ?>

			<?php if ($s_heading) { ?>
				<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
			<?php }
			if ($s_content) { ?>
				<div class="media_content wow slideInUp"><?php echo $s_content; ?></div>
			<?php }

			if (have_rows('button_block')) { ?>
				<div class="mediablocks wow fadeIn">
					<?php
					while (have_rows('button_block')) : the_row();
						$button               = get_sub_field('button');
						$button_class         = get_sub_field('button_class');
						$button_after_content = get_sub_field('button_after_content');
						?>
						<div class="buttonsblc">
							<?php if (!empty($button)) { ?>
								<a class="link <?php echo $button_class; ?>" href="<?php echo $button['url']; ?>"
								   target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?> <span class="icon"><svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21.883 12l-7.527 6.235.644.765 9-7.521-9-7.479-.645.764 7.529 6.236h-21.884v1h21.883z"/></svg></span></a>
							<?php } ?>

							<?php if (!empty($button_after_content)) { ?>
								<div class="content">
									<?php echo $button_after_content; ?>
								</div>
							<?php } ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php }

			if (have_rows('implementations')) { ?>
				<div class="mediablocks wow fadeIn">
					<?php
					while (have_rows('implementations')) : the_row();
						$heading = get_sub_field('heading');
						$content = get_sub_field('content');
						$image   = get_sub_field('image');
						?>
						<div class="innerrowitem">
							<?php if ($implementations_image_position == 'bottom') { ?>
								<div class="contntblock">
									<h3><?php echo $heading; ?></h3>
									<?php if (!empty($content)) { ?>
										<div class="content">
											<?php echo $content; ?>
										</div>
									<?php } ?>
								</div>
								<?php if ($image) { ?>
									<div class="imgblock">
										<img src="<?php echo $image['url']; ?>" class="mediaimg"/>
									</div>
								<?php } ?>
							<?php } else { ?>
								<?php if ($image) { ?>
									<div class="imgblock">
										<img src="<?php echo $image['url']; ?>" class="mediaimg"/>
									</div>
								<?php } ?>
								<div class="contntblock">
									<h3><?php echo $heading; ?></h3>
									<?php if (!empty($content)) { ?>
										<div class="content">
											<?php echo $content; ?>
										</div>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					<?php endwhile; ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
