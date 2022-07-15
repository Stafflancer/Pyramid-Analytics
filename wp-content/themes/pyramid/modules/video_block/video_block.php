<?php
/* Heading Settings */
$heading_video = get_sub_field('heading_video');
$content_video = get_sub_field('content_video');

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

/* video Settings */
$image_video = get_sub_field('image_video');
$video_id    = get_sub_field('video_id');

wp_enqueue_style('video_block', get_template_directory_uri() . '/static/css/modules/video_block/video_block.css', [], null);
wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css', [], null);

if ($media_type == 'image' && !empty($image) && $parallax) {
	wp_enqueue_script('parallax-script');
}
?>
<section class="video_block
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
			<?php if (!empty($heading_video)) { ?>
				<h2 class="wow slideInDown"><?php echo $heading_video; ?></h2>
			<?php }
			if ($content_video) { ?>
				<div class="additionalcontent"><?php echo $content_video; ?></div>
			<?php } ?>
			<?php echo wp_get_attachment_image($image_video, 'full'); ?>
			<a href="#" class="video-btn" data-toggle="modal" data-src="https://www.youtube.com/embed/<?php echo $video_id; ?>" data-target="#video_pop">
				<img src="<?php echo site_url(); ?>/wp-content/uploads/2022/02/play-button.png">
			</a>
		</div>
	</div>

	<!-- POPUP -->
	<div class="modal fade" id="video_pop" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="modal-dialog video_popup modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- 16:9 aspect ratio -->
					<div class="embed-responsive embed-responsive-16by9">
						<iframe id="video"  class="embed-responsive-item" src="" allowscriptaccess="always"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
	jQuery( document ).ready( function ( $ ) {
		// Gets the video src from the data-src on each button
		var $videoSrc;

		$( '.video-btn' ).click( function () {
			$videoSrc = $( this ).data( 'src' );
		} );

		// when the modal is opened autoplay it
		$( '#video_pop' ).on( 'shown.bs.modal', function ( e ) {
			// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
			$( '#video' ).attr( 'src', $videoSrc + '?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1' );
		} );

		// stop playing the youtube video when I close the modal
		$( '#video_pop' ).on( 'hide.bs.modal', function ( e ) {
			$( '#video' ).attr( 'src', $videoSrc );
		} );
	} );
</script>
