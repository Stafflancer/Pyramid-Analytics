<?php
$s_heading = get_sub_field('heading');
$s_label   = get_sub_field('s_label');
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

<?php if ($s_heading || $s_content) {
	wp_enqueue_style('gated_block_styles', get_template_directory_uri() . '/static/css/modules/contact_page/contact_page.css', [], null);
}
?>

<section class="contact-page <?php
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

	<div class="container"><?php
		$show_label = get_sub_field('show_label');
		if ($show_label == 1) {
			if ($s_label) {
				?>
				<div class="contactlabel"><?php echo $s_label; ?></div>
				<?php
			}
		}
		?>
		<?php if (!empty($s_heading)) { ?>
			<h2><?php echo $s_heading; ?></h2>
		<?php } ?>
		<?php if (!empty($s_content)) { ?>
			<?php echo $s_content; ?>
		<?php } ?>
		<div class="form-block" style="display: none;">
			<div class="flex">
				<div class="col">
					<input type="text" placeholder="Name">
				</div>
				<div class="col">
					<input type="text" placeholder="Company">
				</div>
			</div>
			<div class="flex">
				<div class="col">
					<input type="text" placeholder="Email">
				</div>
				<div class="col">
					<input type="text" placeholder="Phone">
				</div>
			</div>
			<div class="flex">
				<div class="col">
					<input type="text" placeholder="Business Size">
				</div>
				<div class="col">
					<input type="text" placeholder="Job Function">
				</div>
			</div>
			<textarea placeholder="Comments"></textarea>
			<div class="check">
				<input id="check" type="checkbox">
				<label for="check">I agree to have my information stored <a href="">Privacy Policy.</a></label>
			</div>
			<div class="captcha">
				<img src="" alt="">
			</div>
			<button>Submit</button>
		</div>
	</div>
</section>
