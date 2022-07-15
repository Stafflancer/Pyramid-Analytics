<?php
/**
 * Template for an Event single.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();

$events_id      = get_the_ID();
$work_category  = wp_get_post_terms( $events_id, 'event_types' );
$array_cat_name = array();
$event_id       = array();

foreach ( $work_category as $category ) {
	$array_cat_name[] = $category->name;
	$event_id[]       = $category->term_id;
}

$category_name = implode( ' ', $array_cat_name );
$term_id       = implode( ' ', $event_id );
?>
	<section class="blog-post custom-blogpost background gated-single">
		<div class="custom-container">
			<div class="row">
				<div class="col-12 col-md-8">
					<div class="margin-right-50">
						<div class="breadcrumb">
							<a href="/resources/" class="first"><?php _e( 'RESOURCES', 'pyramid' ); ?></a>
							<?php if ( $category_name ) { ?>
								<span> / </span>
								<a href="/resources/events-webinars/" class="second uppercase"><?php _e( $category_name, 'pyramid' ); ?></a>
							<?php } ?>
						</div>

						<h1 class="blogpost-title h2-desktop"><?php the_title(); ?></h1>

						<?php the_field('content'); ?>
					</div>
				</div>
				<div class="col-12 col-md-4 custom-form">
					<?php $hubspot_code_white_bg = get_field( 'hubspot_code_white_bg' ); ?>
					<div class="form-box <?php if ( $hubspot_code_white_bg ){ echo 'bg-form-white-background'; } ?>">
						<?php the_field('hubspot_form'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php get_footer();