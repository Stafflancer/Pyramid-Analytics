<?php
$s_heading = get_sub_field('media_heading');
$s_content = get_sub_field('media_content');

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
wp_enqueue_style('cta_side_form_block', get_template_directory_uri() . '/static/css/modules/cards_integrations_block/cards_integrations_block.css', '', '', 'all');

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-js', get_template_directory_uri() . '/static/js/parallax.min.js', '', '', true);
}
wp_enqueue_script('carousel_video_testimonials_block_js', get_template_directory_uri() . '/static/js/modules/cards_integrations_block/cards_integrations_block.js', array('tab-js'), '', true);

?>

	<section
		class="cards_integrations_block
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
				<video autoplay="true" loop="true" muted="true" class="bg-video">
					<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
					<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
				</video>
			<?php } ?>

			<div class="section-holder">
				<?php if ($s_heading) { ?>
					<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
				<?php }
				if ($s_content) { ?>
					<div class="media_content wow slideInDown"><?php echo $s_content; ?></div>
				<?php } ?>

				<?php if (have_rows('integrations')) { ?>
					<div class="intigrationblocksouter wow fadeIn">
						<?php
						while (have_rows('integrations')) : the_row();
							$title    = get_sub_field('title');
							$logo     = get_sub_field('logo');
							$cpt_link = get_sub_field('cpt_link');
							$button   = get_sub_field('button');
							?>
							<div class="innerblcs">
								<?php if ($logo) { ?>
									<div class="wow fadeIn image-holder"><?php echo wp_get_attachment_image($logo['ID'], 'full'); ?></div>
								<?php }

								if (!empty($title)) { ?>
									<div class="titleinr">
										<?php echo $title; ?>
									</div>
								<?php } ?>

								<?php if (!empty($button)) { ?>
									<a class="link customlink" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?> </a>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php //} ?>
