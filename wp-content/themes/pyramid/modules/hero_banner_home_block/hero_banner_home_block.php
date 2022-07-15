<?php
// Create id attribute allowing for custom "anchor" value.
$id = get_sub_field('custom_id') ? : 'hero-banner-home';

// Create class attribute allowing for custom "className".
$sectionClassName = 'hero_banner_home_block hero-banner';
$sectionClassName .= !empty($custom_css_class) ? ' ' . $custom_css_class : '';
$sectionClassName .= !empty($heading_color) ? ' ' . $heading_color : '';
$sectionClassName .= !empty($text_color) ? ' ' . $text_color : '';

$s_tagline   = get_sub_field('s_tagline');
$s_heading   = get_sub_field('s_heading');
$s_button    = get_sub_field('s_button');
$s_customers = get_sub_field('s_customers');
?>
<?php if ($s_tagline || $s_heading || $s_button || !empty($s_customers)) {
	wp_enqueue_style('hero_banner_home_block_styles', get_template_directory_uri() . '/static/css/modules/hero_banner_home_block/hero_banner_home_block.css', [], null);

	if (!empty($s_customers)) {
		wp_enqueue_style('slick-style');
		wp_enqueue_script('slick-script');
		wp_enqueue_script('hero_banner_home_block_js', get_template_directory_uri() . '/static/js/modules/hero_banner_home_block/hero_banner_home_block.js', array('slick-script'), null, true);
	}
	// Start a <container> with possible block options.
	pyramid_display_block_background_options([
		'container' => 'section', // Any HTML5 container: section, div, etc...
		'class'     => $sectionClassName, // Container class.
		'id'        => $id, // Container id.
	]);
	?>
	<div class="main-section-holder">
		<div class="container">
			<div class="section-holder">
				<?php if ($s_tagline) { ?>
					<div class="tagline wow slideInLeft"><?php echo $s_tagline; ?></div>
				<?php }
				if ($s_heading) { ?>
					<h1 class="wow slideInLeft"><?php echo $s_heading; ?></h1>
				<?php }
				if ($s_button) { ?>
					<div class="btn-holder wow slideInLeft">
						<a href="<?php echo $s_button['url']; ?>" class="button orange" target="<?php echo $s_button['target']; ?>"><?php echo $s_button['title']; ?></a>
					</div>
				<?php } ?>
			</div>
		</div>

		<?php if (!empty($s_customers)) { ?>
			<div class="customers-slider wow fadeIn">
				<?php foreach ($s_customers as $item) {
					$thumb = get_the_post_thumbnail($item);
					if ($thumb) { ?>
						<div class="item">
							<?php echo $thumb; ?>
						</div>
					<?php }
				} ?>
			</div>
		<?php } ?>
	</div>
</section>
<?php } ?>
