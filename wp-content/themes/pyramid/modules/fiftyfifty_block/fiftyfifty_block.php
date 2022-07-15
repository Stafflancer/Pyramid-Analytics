<?php
$s_heading     = get_sub_field('media_heading');
$s_content     = get_sub_field('media_content');
$button        = get_sub_field('button');
$second_button = get_sub_field('login_button');

$image_position = get_sub_field('image_position');

$s_image = get_sub_field('right_side_image');

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
?>

<?php //if (have_rows('s_cards')) {
wp_enqueue_style('fiftyfifty_block', get_template_directory_uri() . '/static/css/modules/fiftyfifty_block/fiftyfifty_block.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
} ?>
<section class="fiftyfifty_block
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
			<?php if ($image_position == 'left') { ?>
				<div class="rightpartsec">
					<?php if ($s_image) { ?>
						<div class="imgblock">
							<img src="<?php echo $s_image['url']; ?>" class="mediaimg"/>
						</div>
					<?php } ?>
				</div>
				<div class="leftpartsec">
					<?php if ($additional_breadcrumbs) { ?>
						<div class="additional_breadcrumbs"><?php echo $additional_breadcrumbs; ?></div>
					<?php } ?>
					<?php if ($s_heading) { ?>
						<h3 class="wow slideInDown"><?php echo $s_heading; ?></h3>
					<?php }
					if ($s_content) { ?>
						<div class="media_content wow slideInUp"><?php echo $s_content; ?></div>
					<?php } ?>

					<?php if (!empty($button) || !empty($second_button)) { ?>
						<div class="buttons-new">
							<?php if (!empty($button)): ?>
								<a class="link" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
							<?php endif; ?>
							<?php if (!empty($second_button)): ?>
								<a class="secondbtnlink" href="<?php echo $second_button['url']; ?>" target="<?php echo $second_button['target']; ?>"><?php echo $second_button['title']; ?></a>
							<?php endif; ?>
						</div>
					<?php } ?>
				</div>
				<?php
			} else { ?>
				<div class="leftpartsec">
					<?php if ($additional_breadcrumbs) { ?>
						<div class="additional_breadcrumbs"><?php echo $additional_breadcrumbs; ?></div>
					<?php } ?>

					<?php if ($s_heading) { ?>
						<h3 class="wow slideInDown"><?php echo $s_heading; ?></h3>
					<?php } ?>

					<?php if ($s_content) { ?>
						<div class="media_content wow slideInUp"><?php echo $s_content; ?></div>
					<?php } ?>

					<?php if (!empty($button) || !empty($second_button)) { ?>
					<div class="buttons-new">
						<?php if (!empty($button)): ?>
						<a class="link" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						<?php endif; ?>
						<?php if (!empty($second_button)): ?>
							<a class="secondbtnlink" href="<?php echo $second_button['url']; ?>" target="<?php echo $second_button['target']; ?>"><?php echo $second_button['title']; ?></a>
						<?php endif; ?>
					</div>
					<?php } ?>
				</div>
				<div class="rightpartsec">
					<?php if ($s_image) { ?>
						<div class="imgblock">
							<img src="<?php echo $s_image['url']; ?>" class="mediaimg"/>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>