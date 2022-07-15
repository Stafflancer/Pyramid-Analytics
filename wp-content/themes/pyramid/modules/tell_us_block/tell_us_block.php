<?php
$image_tellus        = get_sub_field('image_tellus');
$content_tellus      = get_sub_field('content_tellus');
$button_title_tellus = get_sub_field('button_title_tellus');
$video_embed_url     = get_sub_field('video_embed_code');

wp_enqueue_style('tell_us_block', get_template_directory_uri() . '/static/css/modules/tell_us_block/tell_us_block.css', [], null);
?>
<section class="tell-us__section">
	<div class="tell-us__section__container">
		<?php echo wp_get_attachment_image($image_tellus, 'full'); ?>
		<?php echo $content_tellus; ?>
		<?php if ($video_embed_url): ?>
			<button id="tell-usSectionBtn" class="tell-us__section__btn"><?php echo $button_title_tellus; ?></button>
			<!-- The Modal -->
			<div id="tell-usModal" class="tell-us__modal">
				<!-- Modal content -->
				<div class="tell-us__modal-content">
					<span class="close">&times;</span>
					<div class="tell-us__section__video">
						<?php echo $video_embed_url; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</div>
</section>

<script>
	// Get the modal
	var modal = document.getElementById( 'tell-usModal' );

	// Get the button that opens the modal
	var btn = document.getElementById( 'tell-usSectionBtn' );

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName( 'close' )[ 0 ];

	var screenWidth = screen.width;

	// When the user clicks the button, open the modal
	btn.onclick = function () {
		modal.style.display = 'flex';
	};

	// When the user clicks on <span> (x), close the modal
	span.onclick = function () {
		modal.style.display = 'none';
	};

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function ( event ) {
		if ( event.target == modal ) {
			modal.style.display = 'none';
		}
	};
</script>
