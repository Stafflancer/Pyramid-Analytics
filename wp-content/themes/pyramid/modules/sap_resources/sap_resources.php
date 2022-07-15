<?php
$s_title           = get_sub_field('heading');


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
$additional_content = get_sub_field('cta_additional_content'); 

if(have_rows('add_sap_resources'))
{ 
	wp_enqueue_style('sap_resources_styles', get_template_directory_uri() . '/static/css/modules/sap_resources/sap_resources.css', [], null);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	} ?>

	<section class="sap_resources_block
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
			<div class="section-holder row">
				<?php if (!empty($s_title)) { ?>
					<h2 class="wow slideInDown"><?php echo $s_title; ?></h2>
				<?php }
				$classes = array("bg-purple", "bg-green", "bg-blue");
				$i = 0;
				while(have_rows('add_sap_resources'))
				{
					the_row();
					if ($i % 3 == 0) { $classes = ' bg-purple'; }
				    elseif ($i % 3 == 1) { $classes = ' bg-green'; }
				    elseif ($i % 3 == 2) { $classes = ' bg-blue'; }
					$heading = get_sub_field('heading');
					$button = get_sub_field('button'); ?>
					<div class="sap-resources <?php echo $classes; ?>">
						<div class="resources-contnet-block">
							<h3><?php echo $heading; ?></h3>
						</div>
						<div class="resources-button-block">
							<a href="<?php echo $button['url']; ?>" class="button white" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
						</div>
					</div><?php
					$i++; 
				} ?>
			</div>
	</section>
<?php  } ?>
