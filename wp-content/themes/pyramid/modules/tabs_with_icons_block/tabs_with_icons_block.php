<?php
$s_heading        = get_sub_field('media_heading');
$tagline          = get_sub_field('tagline');
$s_content        = get_sub_field('media_content');
$tab_content_html = get_sub_field('tab_content_html');
$tabs_button = get_sub_field('tabs_button');


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

<?php
wp_enqueue_style('cta_side_form_block', get_template_directory_uri() . '/static/css/modules/tabs_with_icons_block/tabs_with_icons_block.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}

wp_enqueue_script('tab_js', get_template_directory_uri() . '/static/js/modules/tabs_with_icons_block/tabs_with_icons_block.js', [], null, true);
?>
<section class="tabs_with_icons_block
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
			<?php if ($tagline) { ?>
				<p class="wow slideInDown tagline"><?php echo $tagline; ?></p>
			<?php } ?>
			<?php if ($s_heading) { ?>
				<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
			<?php }
			if ($s_content) { ?>
				<div class="media_content wow slideInDown"><?php echo $s_content; ?></div>
			<?php }
			if (!empty($tab_content_html)) { ?>
				<div class="tabouter">
					<?php echo $tab_content_html; ?>
				</div>
			<?php } ?>
			<div class="tab-teaser">
				<?php
				if (have_rows('tabs')) {
					$menucounter = 0;
					?>
					<div class="tab-menu">
						<ul class="ul-include">
							<?php
							while (have_rows('tabs')) : the_row();
								if ($menucounter == 0) {
									$actclass = 'active';
								} else {
									$actclass = '';
								}

								$tab_button_icon = get_sub_field('tab_button_icon');
								$tab_title       = get_sub_field('tab_title');
								?>
								<li>
									<a href="#" class="tab-wrap <?php echo $actclass; ?> tab-<?php echo $menucounter; ?>" data-rel="tab-<?php echo $menucounter; ?>">
										<?php echo $tab_button_icon; ?>
										<span><?php echo $tab_title; ?></span>
									</a>
								</li>
								<?php
								$menucounter++;
							endwhile;
							?>
						</ul>
					</div>
				<?php } ?>

				<?php
				if (have_rows('tabs')) {
					$tabcounter = 0;
					?>
					<div class="tab-main-box tabs-slider"><?php
						while (have_rows('tabs')) : the_row();
							if ($tabcounter == 0) {
								$style = 'style="display:block;"';
							} else {
								$style = '';
							}

							$tab_icon = get_sub_field('tab_icon');
							$heading  = get_sub_field('heading');
							$content  = get_sub_field('content');
							$tabs_icon_content  = get_sub_field('tabs_icon_content');
							$media_positions = get_sub_field('media_positions'); ?>
							<div class="tab-box" id="tab-<?php echo $tabcounter; ?>" <?php echo $style; ?>>
								<div class="tab-box-inner <?php echo "media-position-".$media_positions; ?>">
									<div class="tab-box-image">
										<img src="<?php echo $tab_icon['url'] ?>"/><?php
										if($tabs_icon_content)
										{ ?>
											<div class="tabs-icon-content">
												<?php echo $tabs_icon_content; ?>
											</div><?php
										} ?>
									</div>
									<div class="tab-box-content">
										<h2><?php echo $heading; ?></h2>
										<?php echo $content; ?>
									</div><?php 
									if($tabs_button)
									{ ?>
										<div class="tabs-with-icon-btn">
											<a href="<?php echo $tabs_button['url']; ?>" class="button orange" target="<?php echo $tabs_button['target']; ?>"><?php echo $tabs_button['title']; ?></a>
										</div><?php
									} ?>
								</div>
							</div>
							<?php
							$tabcounter++;
						endwhile;  ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
