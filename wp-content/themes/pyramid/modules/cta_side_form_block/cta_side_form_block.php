<?php
$s_content = get_sub_field( 'media_content' );

/* BG Settings */
$media_type    = get_sub_field( 'media_type' );
$add_overlay   = get_sub_field( 'add_overlay' );
$overlay_color = get_sub_field( 'overlay_color' );
$parallax      = get_sub_field( 'parallax' );
$color         = get_sub_field( 'color' );
$image         = get_sub_field( 'image' );
$video_mp4     = get_sub_field( 'video_mp4' );
$video_webm    = get_sub_field( 'video_webm' );

/* Other Settings */
$custom_id        = get_sub_field( 'custom_id' );
$custom_css_class = get_sub_field( 'custom_css_class' );
$heading_color    = get_sub_field( 'heading_color' );
$text_color       = get_sub_field( 'text_color' );

wp_enqueue_style( 'cta_side_form_block', get_template_directory_uri() . '/static/css/modules/cta_side_form_block/cta_side_form_block.css', [], '1.0.2' );

if ( $media_type == 'image' && ! empty( $image ) && $parallax ) {
	wp_enqueue_script( 'parallax-script' );
}
?>

<section class="cta-side-form-block
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
		/* Overlay */
		if ( ( $media_type == 'image' || $media_type == 'video' ) && $add_overlay && ! empty( $overlay_color ) ) { ?>
			<div class="overlay <?php echo $overlay_color; ?>"></div>
		<?php } ?>

		<?php
		/* Video */
		if ( 'video' === $media_type && ( ! empty( $video_mp4 ) || ! empty( $video_webm ) ) ) {
			?>
			<video class="bg-video" autoplay loop muted>
				<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
				<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
			</video>
		<?php } ?>

		<div class="section-holder row">
			<?php if ( $s_content ) { ?>
				<div class="left-side-content col-12 col-md-6 col-lg-8 wow slideInLeft">
					<div class="margin-right-50">
						<?php echo $s_content; ?>
					</div>
				</div>
			<?php } ?>
			<div class="right-side-content form-content col-12 col-md-6 col-lg-4 wow slideInRight">
				<?php
				if ( have_rows( 'form' ) ) {
					while ( have_rows( 'form' ) ) : the_row();
						$form_code = get_sub_field( 'form_code' );
						?>
						<?php if ( $form_code ) { ?>
							<div class="form-code-block">
								<?php echo $form_code; ?>
							</div>
						<?php }
					endwhile;
				}
				?>
			</div>
		</div>
	</div>
</section>