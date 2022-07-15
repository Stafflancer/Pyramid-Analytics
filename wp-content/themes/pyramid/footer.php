<?php
$footer_type       = get_field( 'footer_type', 'option' );
$footer_background = get_field( 'footer_background', 'option' );
$footer_mobile_background = get_field( 'footer_mobile_background', 'option' );
$footer_style      = '';

if (  ! empty( $footer_mobile_background ) ) {
		$footer_mobile_background = $footer_mobile_background['url'];
}

if (  ! empty( $footer_background ) ) {
		$footer_style = $footer_background['url'];
}

while ( have_rows( 'social_media', 'option' ) ) : the_row();
	$social_media = array(
		'linkedin' => get_sub_field( 'linkedin' ),
		'facebook' => get_sub_field( 'facebook' ),
		'twitter'  => get_sub_field( 'twitter' ),
		'youtube'  => get_sub_field( 'youtube' ),
	);
endwhile;


if ( 'bgimagefooter' == $footer_type ) {
	?>
	<footer class="desktop-bg-image" style="background-image: url(<?php echo $footer_style; ?>)">
	<input type="hidden" name="mobilebgimage" class="mobile-footer-image" value="<?php echo $footer_mobile_background; ?>">
	<input type="hidden" name="desktopbgimage" class="desktop-footer-image" value="<?php echo $footer_style; ?>">
		<div class="container">
			<?php if (have_rows('footer_cta', 'option')) : ?>
				<div class="footer-cta wow slideInLeft">
					<?php
					while (have_rows('footer_cta', 'option')) : the_row();
						$footer_select_page = get_sub_field('footer_select_page');
						$custom_text        = get_sub_field('custom_text');
						?>
						<h2><?php the_sub_field('heading'); ?></h2>
						<?php
						if ($footer_select_page && in_array(get_the_ID(), $footer_select_page)) {
							if ($custom_text) { ?>
								<p><?php echo $custom_text; ?></p><?php
							}
						}

						$button = get_sub_field('button');

						if ($button):
							?>
							<a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="button white"><?php echo $button['title']; ?></a>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<div class="main-holder">
				<?php if (has_nav_menu('footer_menu')) { ?>
					<div class="f-menu wow slideInUp">
						<?php wp_nav_menu(['theme_location' => 'footer_menu', 'container' => '']); ?>
					</div>
				<?php } ?>

				<?php if (have_rows('social_media', 'option')) : ?>
					<div class="f-socials wow slideInRight">
						<?php
						foreach ($social_media as $media => $media_url):
							if ($media_url):
								echo '<a href="' . esc_url($media_url) . '" title="Social Media Link - ' . $media . '">' . svg_icon( $media ) . '</a>';
							endif;
						endforeach;
						?>
					</div>
				<?php endif; ?>
			</div>

			<div class="bottom-holder wow slideInUp">
				<?php if (have_rows('copyright_group', 'option')) : ?>
					<div class="copyright-holder">
						<?php while (have_rows('copyright_group', 'option')) : the_row(); ?>
							<?php $copyright = get_sub_field('copyright');
							if (!empty($copyright)) { ?>
								<div class="copyright">
									<?php echo $copyright . ' ' . gmdate('Y') . ' '; ?> &copy;
								</div>
							<?php } ?>
							<?php if (have_rows('links')) : ?>
								<div class="links">
									<?php while (have_rows('links')) : the_row(); ?>
										<?php $link = get_sub_field('link'); ?>
										<?php if ($link) { ?>
											<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
											<span>|</span>
										<?php } ?>
									<?php endwhile; ?>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<?php if (have_rows('social_media', 'option')) : ?>
					<div class="f-socials">
						<?php while (have_rows('social_media', 'option')) : the_row();
							$social_media = array(
								'linkedin'   => get_sub_field('linkedin'),
								'facebook'   => get_sub_field('facebook'),
								'twitter'    => get_sub_field('twitter'),
								'youtube'    => get_sub_field('youtube'),
							);

							foreach ($social_media as $media => $media_url):
								if ($media_url):
									echo '<a href="' . esc_url($media_url) . '" title="Social Media Link - ' . $media . '">' . svg_icon( $media ) . '</a>';
								endif;
							endforeach;
							?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</footer><?php
}
else
{  ?>
	<footer class="p-0 footer-light">
		<div class="footer-before-bg-image desktop-bg-image" style="background-image: url(<?php echo $footer_style; ?>)">
		<input type="hidden" name="mobilebgimage" class="mobile-footer-image" value="<?php echo $footer_mobile_background; ?>">
		<input type="hidden" name="desktopbgimage" class="desktop-footer-image" value="<?php echo $footer_style; ?>">
			<div class="container">
			<?php if (have_rows('footer_cta', 'option')) : ?>
				<div class="footer-cta wow slideInLeft mb-0">
					<?php
					while (have_rows('footer_cta', 'option')) : the_row();
						$footer_select_page = get_sub_field('footer_select_page');
						$custom_text        = get_sub_field('custom_text');
						?>
						<h2><?php the_sub_field('heading'); ?></h2>
						<?php
						if ($footer_select_page && in_array(get_the_ID(), $footer_select_page)) {
							if ($custom_text) { ?>
								<p><?php echo $custom_text; ?></p><?php
							}
						}

						$button = get_sub_field('button');

						if ($button):
							?>
							<a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="button white"><?php echo $button['title']; ?></a>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			</div>
		</div>
		<div class="main-holder container">
			<div class="row">
			<?php if (has_nav_menu('footer_menu')) { ?>
				<div class="f-menu wow slideInUp">
					<?php wp_nav_menu(['theme_location' => 'footer_menu', 'container' => '']); ?>
				</div>
			<?php } ?>

			<?php if (have_rows('social_media', 'option')) : ?>
				<div class="f-socials wow slideInRight">
					<?php
					foreach ($social_media as $media => $media_url):
						if ($media_url):
							echo '<a href="' . esc_url($media_url) . '" title="Social Media Link - ' . $media . '">' . svg_icon( $media ) . '</a>';
						endif;
					endforeach;
					?>
				</div>
			<?php endif; ?>
			</div>
		</div>

		<div class="bottom-holder wow slideInUp container">
			<?php if (have_rows('copyright_group', 'option')) : ?>
				<div class="copyright-holder row">
					<?php while (have_rows('copyright_group', 'option')) : the_row(); ?>
						<?php $copyright = get_sub_field('copyright');
						if (!empty($copyright)) { ?>
							<div class="copyright">
								<?php echo $copyright . ' ' . gmdate('Y') . ' '; ?> &copy;
							</div>
						<?php } ?>
						<?php if (have_rows('links')) : ?>
							<div class="links">
								<?php while (have_rows('links')) : the_row(); ?>
									<?php $link = get_sub_field('link'); ?>
									<?php if ($link) { ?>
										<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?></a>
										<span>|</span>
									<?php } ?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if (have_rows('social_media', 'option')) : ?>
				<div class="f-socials">
					<?php while (have_rows('social_media', 'option')) : the_row();
						$social_media = array(
							'linkedin'   => get_sub_field('linkedin'),
							'facebook'   => get_sub_field('facebook'),
							'twitter'    => get_sub_field('twitter'),
							'youtube'    => get_sub_field('youtube'),
						);

						foreach ($social_media as $media => $media_url):
							if ($media_url):
								echo '<a href="' . esc_url($media_url) . '" title="Social Media Link - ' . $media . '">' . svg_icon( $media ) . '</a>';
							endif;
						endforeach;
						?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</footer><?php
} ?>

<?php wp_footer(); ?>
<?php
if ( function_exists( 'load_inline_svg' ) ) {
	echo load_inline_svg( 'svg-icons-defs.svg' );
}
?>
</body>
</html>