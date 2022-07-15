<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-PG67DJJ');</script>
	<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo('charset') ?>"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta name="facebook-domain-verification" content="c3i0uh1lkl6up1nebvvd33577m4isa" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PG67DJJ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php wp_body_open(); ?>

<header id="masthead">
	<div class="container">
		<div class="section-wrapper">
			<?php
			$h_logo = get_field( 'h_logo', 'option' );

			if ( ! empty( $h_logo ) ) :
				$site_url = get_site_url();

				if ( 'en' != ICL_LANGUAGE_CODE ) {
					$site_url .= '/' . ICL_LANGUAGE_CODE . '/';
				}
				?>
				<div class="h-logo-holder">
					<a href="<?php echo $site_url; ?>" class="h-logo"><?php echo wp_get_attachment_image( $h_logo, 's_180' ); ?></a>
				</div>
			<?php endif; ?>

			<div class="h-menu-holder">
				<?php if ( has_nav_menu( 'header_menu' ) || has_nav_menu( 'header_menu_2' ) ) { ?>
					<div class="h-menu">
						<?php
						if ( has_nav_menu( 'header_menu' ) ) {
							wp_nav_menu( [
								'theme_location' => 'header_menu',
								'container'      => '',
							] );
						}
						?>

						<div class="right-block">
							<?php
							if ( has_nav_menu( 'header_menu_2' ) ) {
								wp_nav_menu( [
									'theme_location' => 'header_menu_2',
									'container'      => '',
								] );
							}
							?>

							<?php
							$h_book_btn = get_field('h_book_btn', 'option');

							if ($h_book_btn) {
								?>
								<a href="<?php echo $h_book_btn['url']; ?>" class="h-button" target="<?php echo $h_book_btn['target']; ?>"><?php echo $h_book_btn['title']; ?></a>
							<?php } ?>

							<?php
							$languages       = apply_filters( 'wpml_active_languages', '', array( 'skip_missing' => false ) );
							$my_current_lang = apply_filters( 'wpml_current_language', null );

							if ( ! empty( $languages ) ) {
								?>
								<div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<?php
										echo '<img src="' . $languages[ $my_current_lang ]['country_flag_url'] . '" class="flag" alt="' . $my_current_lang . ' flag" width="21" height="21"/>';
										echo $my_current_lang;
										?>
										<span class="bfh-selectbox-toggle"></span>
									</button>
									<div class="dropdown-menu bfh-selectbox-options" aria-labelledby="dropdownMenuButton">
										<?php
										foreach ( $languages as $language ) {
											$item_class = '';

											if ( 1 == $language['active'] ) {
												$item_class = ' active';
											}
											?>
											<a class="dropdown-item<?php echo $item_class; ?>" href="<?php echo $language['url']; ?>">
												<?php echo '<img src="' . $language['country_flag_url'] . '" class="flag" alt="' . $language['native_name'] . ' flag" width="21" height="21"/>'; ?>
												<?php echo $language['native_name']; ?>
											</a>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</header>
<?php if (in_array(get_post_type(), [
		'post',
		'analyst_reports',
		'case_studies',
		'events',
		'press_releases',
		'white_papers',
	]) || is_page_template([
		'template/template-analyst-reports.php',
		'template/template-white-papers.php',
		'template/blog.php',
		'template/case-study.php',
		'template/events.php',
		'template/news-room.php',
		'template/resources.php',
	])):
	?>
	<div class="ls_top_head" style="height:90px;"></div>
<?php endif; ?>