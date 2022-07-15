<?php
$s_heading = get_sub_field('s_heading');
$s_image   = get_sub_field('s_image');

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
$additional_breadcrumbs = get_sub_field('additional_breadcrumbs');

if ( have_rows( 's_cards' ) ) {
	wp_enqueue_style( 'cards_with_colored_bottom_border_block_styles', get_template_directory_uri() . '/static/css/modules/cards_with_colored_bottom_border_block/cards_with_colored_bottom_border_block.css', [], '1.0.2' );

	if ( 'image' === $media_type && ! empty( $image ) && $parallax ) {
		wp_enqueue_script('parallax-script');
	}
	?>
	<section class="cards_with_colored_bottom_border_block
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
			// Overlay
			if ( ( 'image' === $media_type || 'video' === $media_type ) && $add_overlay && ! empty( $overlay_color ) ) { ?>
				<div class="overlay <?php echo $overlay_color; ?>"></div>
			<?php }

			// Video
			if ( 'video' === $media_type && ( ! empty( $video_mp4 ) || ! empty( $video_webm ) ) ) { ?>
				<video class="bg-video" autoplay loop muted>
					<source src="<?php echo $video_mp4['url'] ?>" type="video/mp4">
					<source src="<?php echo $video_webm['url'] ?>" type="video/webm">
				</video>
			<?php } ?>

			<div class="section-holder">
				<?php if ($s_heading) { ?>
					<h2 class="wow slideInDown"><?php echo $s_heading; ?></h2>
				<?php } ?>

				<?php if ( $additional_heading && $additional_content ) { ?>
					<?php if ( $additional_breadcrumbs ) { ?>
						<div class="additional_breadcrumbs"><?php echo $additional_breadcrumbs; ?></div>
					<?php } ?>
					<h2 class="wow slideInDown additionalhed"><?php echo $additional_heading; ?></h2>
					<div class="additionalcontent">
						<?php echo $additional_content; ?>
					</div>
				<?php } ?>

				<?php if ($s_image) { ?>
					<div class="wow fadeIn image-holder"><?php echo wp_get_attachment_image( $s_image, 'full' ); ?></div>
				<?php } ?>

				<?php if ( have_rows( 's_cards' ) ) { ?>
					<div class="cards wow fadeIn">
						<?php
						while ( have_rows( 's_cards' ) ) : the_row();
							$card_heading = get_sub_field( 'card_heading' );
							$card_content = get_sub_field( 'card_content' );
							$card_link    = get_sub_field( 'card_link' );
							$logo_image   = get_sub_field( 'logo_image' );
							?>
							<div class="item">
								<?php if ( $card_link ) { ?>
									<a class="link" href="<?php echo $card_link['url']; ?>" target="<?php echo $card_link['target']; ?>">
								<?php } ?>
									<?php if ( $logo_image ) { ?>
										<img src="<?php echo $logo_image; ?>" class="card-image" alt="Image for <?php echo $card_heading; ?>"/>
									<?php } ?>
									<h3><?php echo $card_heading; ?></h3>
									<?php if ( ! empty( $card_content ) ) { ?>
										<div class="content">
											<?php echo $card_content; ?>
										</div>
									<?php } ?>
									<?php if ( ! empty( $card_link ) ) { ?>
										<span><?php echo $card_link['title']; ?></span>
									<?php } ?>
								<?php if ( $card_link ) { ?>
									</a>
								<?php } ?>
							</div>
						<?php endwhile; ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>