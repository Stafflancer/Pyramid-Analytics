<?php
$s_heading = get_sub_field('s_heading');
$s_tagline = get_sub_field('s_tagline');
$s_button  = get_sub_field('s_button');
$s_button_2  = get_sub_field('s_button_2');
$s_logo    = get_sub_field('s_logo');

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
$custom_id             = get_sub_field('custom_id');
$custom_css_class      = get_sub_field('custom_css_class');
$heading_color         = get_sub_field('heading_color');
$text_color            = get_sub_field('text_color');
$breadcrumbs_shortcode = get_sub_field('additional_breadcrumbs_content_or_shortcode'); ?>

<?php if ($s_heading || !empty($s_tagline)) {
	wp_enqueue_style('hero_banner_common_block_styles', get_template_directory_uri() . '/static/css/modules/hero_banner_common_block/hero_banner_common_block.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	} ?>

	<section class="hero_banner_common_block
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
				<?php if ($breadcrumbs_shortcode) {
					?>
					<div class="breadcrumbs wow slideInRight">
						<?php echo $breadcrumbs_shortcode; ?>
					</div>
					<?php
				} else { ?>

					<div class="breadcrumbs wow slideInRight">
						<?php the_title(); ?>
					</div>
				<?php } ?>

				<?php if ($s_heading) { ?>
					<h1 class="wow slideInRight"><?php echo $s_heading; ?></h1>
				<?php }
				
				$banner_option = get_sub_field('s_banner_logo');
				$banner_logo_1 = get_sub_field('banner_logo_1'); 
				$banner_logo_2 = get_sub_field('banner_logo_2'); 
				if($banner_option == 1)
				{ ?>
					<div class="banner-logo"><?php
						if($banner_logo_1)
						{ ?>
							<span><img src="<?php echo $banner_logo_1['url']; ?>" class="banner-logo"></span><?php
						} 
						if($banner_logo_2)
						{ ?>
							<span><img src="<?php echo $banner_logo_2['url']; ?>" class="banner-logo"></span><?php
						} ?>
					</div><?php
				}
				if ($s_tagline) { ?>
					<div class="tagline wow slideInRight"><?php echo $s_tagline; ?></div>
				<?php }
				if ($s_logo) { ?>
					<div class="logo wow slideInRight"><img src="<?php echo $s_logo ?>"/></div>
				<?php }
				if ($s_button || $s_button_2) { ?>
					<div class="btn-holder wow slideInRight"><?php
						if($s_button)
						{ ?>
							<a href="<?php echo $s_button['url']; ?>" class="button orange" target="<?php echo $s_button['target']; ?>"><?php echo $s_button['title']; ?></a><?php
						}
						if($s_button_2)
						{ ?>
							<a href="<?php echo $s_button_2['url']; ?>" class="button orange" target="<?php echo $s_button_2['target']; ?>"><?php echo $s_button_2['title']; ?></a><?php
						} ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
