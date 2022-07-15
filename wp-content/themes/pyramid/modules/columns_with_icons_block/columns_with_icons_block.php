<?php
$s_heading = get_sub_field('s_heading');
$s_content = get_sub_field('s_content');
$s_button  = get_sub_field('s_button');
$total_row = get_sub_field('show_how_much');

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
?>

<div class="<?php echo get_sub_field('text_align'); ?>"></div>

<?php if ($s_heading || $s_content || have_rows('s_columns')) {
	if (have_rows('s_columns')) {
		wp_enqueue_style('slick-style');
	}

	wp_enqueue_style('columns_with_icons_block_styles', get_template_directory_uri() . '/static/css/modules/columns_with_icons_block/columns_with_icons_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}

	if (have_rows('s_columns')) {
		wp_enqueue_script('slick-script');
		wp_enqueue_script('columns_with_icons_block_js', get_template_directory_uri() . '/static/js/modules/columns_with_icons_block/columns_with_icons_block.js', array('slick-script'), null, true);
	} ?>

	<section
		class="columns_with_icons_block
            <?php
		echo ($media_type == 'video' && !empty($video_mp4) || $media_type == 'video' && !empty($video_webm)) ? ' video ' : '';
		/* css class */
		echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
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
				<?php } ?>
				<?php if ($s_content) { ?>
					<div class="content wow slideInDown">
						<?php echo $s_content; ?>
					</div>
				<?php } ?>
				<?php if (have_rows('s_columns')) { ?>
					<div class="columns wow fadeIn <?php echo $total_row; ?>">
						<?php while (have_rows('s_columns')) : the_row(); ?>
							<?php
							$column_visibility = get_sub_field('column_visibility');

							if ($column_visibility == 'hide') {
								continue;
							}
							?>
							<div class="item">
								<?php $image = get_sub_field('icon'); ?>
								<?php if ($image) { ?>
									<div class="image">
										<?php echo wp_get_attachment_image($image, 'full'); ?>
									</div>
								<?php } ?>

								<?php
								$title   = get_sub_field('heading');
								$content = get_sub_field('content');
								if ($title || $content) {
									?>
									<div class="content">
										<h2 class="heading"><?php echo $title; ?></h2>
										<?php echo $content; ?>
									</div>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php } ?>

				<?php if ($s_button) { ?>
					<div class="btn-holder wow slideInUp">
						<a href="<?php echo $s_button['url']; ?>" class="button orange s-20 icon"
						   target="<?php echo $s_button['target']; ?>"><?php echo $s_button['title']; ?>
							<svg width="23" height="8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 23 8">
								<path d="M-0.00024,5v0h21.4188v0v-2v0h-21.4188v0z" fill="#f7f9f7" fill-opacity="1"></path>
								<path d="M22.75733,3c-1.29117,0 -2.41923,-0.38055 -3.19974,-0.94593c-0.7817,-0.56623 -1.155,-1.26229 -1.155,-1.93286h-2c0,1.47163 0.82539,2.71496 1.98174,3.55257c1.15752,0.83847 2.70683,1.32622 4.373,1.32622z" fill="#f7f9f7" fill-opacity="1"></path>
								<path d="M18.40258,7.87879c0,-0.67057 0.37331,-1.36663 1.155,-1.93286c0.78052,-0.56538 1.90857,-0.94593 3.19974,-0.94593v-2c-1.66617,0 -3.21548,0.48775 -4.373,1.32622c-1.15634,0.83761 -1.98174,2.08094 -1.98174,3.55257z" fill="#f7f9f7" fill-opacity="1"></path>
							</svg>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>