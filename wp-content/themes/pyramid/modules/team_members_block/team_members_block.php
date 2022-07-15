<?php
$s_title      = get_sub_field('s_title');
$team_members = get_sub_field('members');
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

if ($team_members) {
	wp_enqueue_style('team_members_block_style', get_template_directory_uri() . '/static/css/modules/team_members_block/team_members_block.css', [], null);
	wp_enqueue_script('team_members_block-script', get_template_directory_uri() . '/static/js/modules/team_members_block/team_members_block.js', array('slick-script'), null, true);

	if ($media_type == 'image' && !empty($image) && $parallax) {
		wp_enqueue_script('parallax-script');
	}
	?>
	<section class="team_members_block
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
				<div class="team-members d-flex flex-row justify-content-between wow fadeIn">
					<?php
					global $post;
					foreach( $team_members as $post ):
						// Setup this post for WP functions (variable must be named $post).
						setup_postdata($post);
						$social_link  = get_field('social_link');
						$twitter_link = get_field('twitter_link');
						?>
						<div class="team-member d-flex flex-column align-items-center text-center">
							<div class="top-holder">
								<?php if (has_post_thumbnail()) : ?>
									<div class="thumb" id="thumb<?php echo str_replace(' ', '', get_the_title()); ?>">
										<?php the_post_thumbnail('s_180'); ?>
									</div>
								<?php endif; ?>
							</div>

							<div class="bottom-holder position-relative mt-3">
								<h3 class="name"><?php the_title(); ?></h3>

								<?php
								$position = get_field('position');

								if ($position) { ?>
									<p class="position"><?php echo $position; ?></p>
								<?php } ?>
							</div>

							<!-- popup section start -->
							<div id="<?php echo str_replace(' ', '', get_the_title()); ?>" class="popup">
								<div class="popup-width">
									<div class="cross">
										<button id="custom-cross">X</button>
									</div>
									<div class="popup-img">
										<?php the_post_thumbnail('s_180'); ?>
									</div>
									<div class="team-member-social-icon"><?php
									if($social_link)
									{ ?>
										<a href="<?php echo $social_link; ?>" target="_blank">
											<svg width="30" height="29" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 30 29">
											<path d="M29.21016,14.13495c0,7.80649 -6.32843,14.13495 -14.13487,14.13495c-7.80647,0 -14.13487,-6.32846 -14.13487,-14.13495c0,-7.80652 6.3284,-14.13495 14.13487,-14.13495c7.80644,0 14.13487,6.32844 14.13487,14.13495z" fill="#000000" fill-opacity="1"></path>
											<path d="M10.06497,10.18047c0.87567,0 1.58556,-0.71797 1.58556,-1.60363c0,-0.88566 -0.70988,-1.60363 -1.58556,-1.60363c-0.87568,0 -1.58556,0.71797 -1.58556,1.60363c0,0.88566 0.70988,1.60363 1.58556,1.60363z" fill="#ffffff" fill-opacity="1"></path>
											<path d="M8.69695,20.29494h2.7356v-8.89817h-2.7356zM13.14784,20.29494h2.73126v-4.40033c0,-1.16112 0.21595,-2.28557 1.6392,-2.28557c1.40367,0 1.42106,1.3275 1.42106,2.35887v4.32777h2.73271v-4.87974c0,-2.39699 -0.51016,-4.23908 -3.27984,-4.23908c-1.32976,0 -2.2211,0.73815 -2.5856,1.43673h-0.03696v-1.21683h-2.62183z" fill="#ffffff" fill-opacity="1"></path>
											</svg>
										</a><?php
									}
									if($twitter_link)
									{ ?>
										<a href="<?php echo $twitter_link; ?>" target="_blank">
											<svg width="29" height="29" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 29 29">
											<path d="M29.00008,14.13495c0,7.80649 -6.32843,14.13495 -14.13487,14.13495c-7.80647,0 -14.13487,-6.32846 -14.13487,-14.13495c0,-7.80652 6.3284,-14.13495 14.13487,-14.13495c7.80644,0 14.13487,6.32844 14.13487,14.13495z" fill="#000000" fill-opacity="1"></path>
											<path d="M20.10513,12.06152c0.00873,0.11884 0.00873,0.23702 0.00873,0.35519c0,3.61624 -2.72081,7.78323 -7.69317,7.78323c-1.53193,0 -2.9551,-0.44888 -4.15271,-1.2285c0.2175,0.02512 0.42695,0.03395 0.65318,0.03395c1.21708,0.00298 2.39968,-0.40873 3.3572,-1.16874c-0.56428,-0.01033 -1.11128,-0.19866 -1.56464,-0.53871c-0.45336,-0.34005 -0.79043,-0.81482 -0.96416,-1.35803c0.16715,0.02512 0.33497,0.0421 0.51086,0.0421c0.24233,0 0.48602,-0.03396 0.71225,-0.09303c-0.6124,-0.12509 -1.16305,-0.46088 -1.55836,-0.95029c-0.3953,-0.4894 -0.61084,-1.10222 -0.60996,-1.73422v-0.03396c0.36049,0.20307 0.77872,0.33005 1.22178,0.34703c-0.37118,-0.24951 -0.67552,-0.58809 -0.8859,-0.98553c-0.21038,-0.39743 -0.32023,-0.84137 -0.31977,-1.29219c0,-0.50798 0.13359,-0.97384 0.36788,-1.37995c0.67946,0.8455 1.52689,1.5372 2.48741,2.0303c0.96053,0.49309 2.01274,0.77659 3.08846,0.83213c-0.04162,-0.20373 -0.06713,-0.41493 -0.06713,-0.62681c-0.00018,-0.35927 0.06965,-0.71506 0.20547,-1.04702c0.13583,-0.33196 0.335,-0.63358 0.58612,-0.88763c0.25113,-0.25404 0.54928,-0.45553 0.87743,-0.59293c0.32815,-0.13741 0.67985,-0.20804 1.035,-0.20786c0.77872,0 1.48158,0.33005 1.97565,0.86382c0.60537,-0.11843 1.18589,-0.34198 1.71586,-0.66077c-0.20179,0.63212 -0.62447,1.16813 -1.18888,1.50762c0.53689,-0.06195 1.06162,-0.20478 1.55675,-0.42376c-0.3698,0.54538 -0.82804,1.02365 -1.35536,1.41457z" fill="#ffffff" fill-opacity="1"></path>
											</svg>
										</a><?php
									} ?>
									</div>
									<div class="popup-name">
										<?php the_title(); ?>
										<br>
										<?php
										$position = get_field('position');

										if ($position) {
											?>
											<div class="company">
												<?php echo $position; ?>
											</div>
										<?php } ?>
									</div>
									<div class="popup-content">
										<p><?php the_content(); ?></p>
									</div>
								</div>
							</div>

							<script>
								jQuery( '#thumb<?php echo str_replace(' ', '', get_the_title()); ?>' ).click( function () {
									jQuery( "#<?php echo str_replace(' ', '', get_the_title()); ?>" ).show();
									jQuery( 'header' ).hide();
									jQuery( 'body' ).css( 'overflow', 'hidden' );
									jQuery( '.team_members_block' ).css( 'z-index', '9999' );
								} );
							</script>
							<!-- popup section end -->
						</div>
					<?php endforeach; ?>
				</div>
				<?php
				// Reset the global post object so that the rest of the page works correctly.
				wp_reset_postdata();
				?>
				<?php if (!empty($s_button)) { ?>
					<div class="btn-holder d-flex wow slideInUp">
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