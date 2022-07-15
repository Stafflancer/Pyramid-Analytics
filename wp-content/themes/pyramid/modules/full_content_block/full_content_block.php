<?php
$heading_full_content = get_sub_field('heading_full_content');
$content_full_content = get_sub_field('content_full_content');

if ($heading_full_content || $content_full_content) {
	wp_enqueue_style('awards_block_styles', get_template_directory_uri() . '/static/css/modules/full_content_block/full_content_block.css', [], null);
	?>

	<section class="full_content_block">
		<div class="container">
			<div class="section-holder">
				<?php if ($heading_full_content) { ?>
					<h2 class="wow slideInDown"><?php echo $heading_full_content; ?></h2>
				<?php } ?>
				<?php if ($content_full_content) { ?>
					<div class="media_content wow slideInDown"><?php echo $content_full_content; ?></div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
