<?php
/**
 * Template for a White Paper single.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();
?>

	<section class="blog-post custom-blogpost background gated-single">
		<div class="custom-container">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="margin-right-50">
						<div class="breadcrumb">
							<a href="/resources/" class="first uppercase"><?php _e( 'RESOURCES', 'pyramid' ); ?></a>
							<span> / </span>
							<a href="/resources/white-papers/" class="second uppercase"><?php _e( 'White Papers', 'pyramid' ); ?></a>
						</div>
						<h2 class="blogpost-title h2-desktop"><?php the_title(); ?></h2>
						<?php the_field('content'); ?>
					</div>
				</div>
				<div class="col-12 col-md-4 custom-form">
					<?php $hubspot_code_white_bg = get_field( 'hubspot_code_white_bg' ); ?>
					<div class="form-box <?php if ( $hubspot_code_white_bg ) { echo "bg-form-white-background";} ?>">
						<?php the_field( 'hubspot_form' ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php get_footer();