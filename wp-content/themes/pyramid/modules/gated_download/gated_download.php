<?php
$f_heading = get_sub_field('form_heading');
$s_content = get_sub_field('content');

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

<?php if ($f_heading || $s_content) {
	wp_enqueue_style('gated_block_styles', get_template_directory_uri() . '/static/css/modules/gated_download/gated_download.css', [], null);
}
?>
<section class="resources
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

	<div class="container">
		<div class="flex">
			<div class="content">
				<ul class="breadcrumbs">
					<li><a href="/resources/">RESOURCES</a></li>
					<li>/</li>
					<li>ANALYST REPORTS</li>
				</ul>
				<?php if (!empty($s_content)) { ?>
					<?php echo $s_content; ?>
				<?php } ?>
			</div>
			<div class="form">
				<div class="form-block">
					<div class="image">
						<?php the_post_thumbnail(); ?>
					</div>
					<?php if (!empty($f_heading)) { ?>
						<h3><?php echo $f_heading; ?></h3>
					<?php } ?>
					<?php echo do_shortcode('[gated_download_form]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>