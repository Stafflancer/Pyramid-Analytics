<?php
$s_title   = get_sub_field('s_heading');
$s_content = get_sub_field('s_content');

/* Other Settings */
$custom_id        = get_sub_field('custom_id');
$custom_css_class = get_sub_field('custom_css_class');
$heading_color    = get_sub_field('heading_color');
$text_color       = get_sub_field('text_color'); ?>

<?php
if ($s_title || $s_content) {
	wp_enqueue_style('heading_with_side_styles', get_template_directory_uri() . '/static/css/modules/heading_with_side/heading_with_side.css', [], null);
	?>
	<section class="heading_with_side <?php
		/* css class */
		echo !empty($custom_css_class) ? $custom_css_class . ' ' : '';
		/* heading color */
		echo !empty($heading_color) ? $heading_color . ' ' : '';
		/* text color */
		echo !empty($text_color) ? $text_color . ' ' : ''; ?>"
		<?php
		/* custom id */
		echo !empty($custom_id) ? 'id="' . $custom_id . '"' : ''; ?>>
		<div class="container">
			<div class="section-holder">
				<?php if (!empty($s_title)) { ?>
					<h2 class="wow slideInLeft"><?php echo $s_title; ?></h2>
				<?php } ?>
				<?php if (!empty($s_content)) { ?>
					<div class="content wow slideInRight"><?php echo $s_content; ?></div>
				<?php } ?>
			</div>
		</div>
	</section>
<?php } ?>
