<?php
$s_title      = get_sub_field('s_title');
$testimonials = get_sub_field('s_testimonials');
$s_button     = get_sub_field('s_button');

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

if ($testimonials) {
	wp_enqueue_style('slick-style');
	wp_enqueue_style('customer_testimonials_block_styles', get_template_directory_uri() . '/static/css/modules/customer_testimonials_block/customer_testimonials_block.css', [], null);
	wp_enqueue_script('slick-script');
	wp_enqueue_script('customer_testimonials_block_js', get_template_directory_uri() . '/static/js/modules/customer_testimonials_block/customer_testimonials_block.js', array('slick-script'), null, true);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}
	?>
	<section class="customer_testimonials_block
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
			<div class="section-holder">
				<?php if (!empty($s_title)) { ?>
					<h2 class="wow slideInDown"><?php echo $s_title; ?></h2>
				<?php } ?>
				<div class="testimonials wow fadeIn">
					<?php
					global $post;
					foreach( $testimonials as $post ):
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post);
					?>
						<div class="item">
							<div class="top-holder">
								<?php if (has_post_thumbnail()) : ?>
									<div class="thumb" id="thumb<?php echo str_replace(' ', '', get_the_title()); ?>">
										<?php the_post_thumbnail('s_180'); ?>
									</div>
								<?php endif; ?>

								<div class="content">
									<?php the_content() ?>
								</div>
							</div>

							<div class="bottom-holder">
								<div class="title">
									<?php the_title(); ?>
								</div>

								<?php
								$company  = get_field('company');
								$position = get_field('position');

								if ($company || $position) { ?>
									<div class="company">
										<?php
										if ($company) {
											echo $company;
										}

										if ($position) {
											echo '' . $position;
										}
										?>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<?php
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata();
				?>
				<?php if (!empty($s_button)) : ?>
					<div class="btn-holder wow slideInUp">
						<a href="<?php echo $s_button['url']; ?>" class="button orange s-20 icon" target="<?php echo $s_button['target']; ?>"><?php echo $s_button['title']; ?>
							<svg width="23" height="8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 23 8">
								<path d="M-0.00024,5v0h21.4188v0v-2v0h-21.4188v0z" fill="#f7f9f7" fill-opacity="1"></path>
								<path d="M22.75733,3c-1.29117,0 -2.41923,-0.38055 -3.19974,-0.94593c-0.7817,-0.56623 -1.155,-1.26229 -1.155,-1.93286h-2c0,1.47163 0.82539,2.71496 1.98174,3.55257c1.15752,0.83847 2.70683,1.32622 4.373,1.32622z" fill="#f7f9f7" fill-opacity="1"></path>
								<path d="M18.40258,7.87879c0,-0.67057 0.37331,-1.36663 1.155,-1.93286c0.78052,-0.56538 1.90857,-0.94593 3.19974,-0.94593v-2c-1.66617,0 -3.21548,0.48775 -4.373,1.32622c-1.15634,0.83761 -1.98174,2.08094 -1.98174,3.55257z" fill="#f7f9f7" fill-opacity="1"></path>
							</svg>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php } ?>
