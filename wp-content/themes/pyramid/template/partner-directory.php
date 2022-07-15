<?php
/**
 * Template Name: Partner Directory
 */

get_header();

$select_created_resource = get_field( 'select_resource' );
$resource_wrapper_class  = '';

if ( $select_created_resource && count( $select_created_resource ) > 3) {
	wp_enqueue_style( 'slick-style' );
	wp_enqueue_script( 'slick-script' );
	wp_enqueue_script( 'carousel-resource-cards-script' );

	$resource_wrapper_class = 'resource-slider';
}

wp_enqueue_script( 'partners-directory-script' );
?>
<div id="primary" class="content-area">
	<main id="main" class="main site-main">
		<?php get_all_modules(); ?>

		<section class="partner-section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="filters d-flex justify-content-center">
							<?php echo do_shortcode('[searchandfilter slug="partners-directory"]'); ?>
						</div>
					</div>
				</div>
				<div class="row products-row"><?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$partners = array(
						'post_type'        => 'partner',
						'search_filter_id' => 7140,
						'paged'            => $paged,
					);
					$partners_query = new WP_Query( $partners );

					if ( $partners_query->have_posts() ) {
						while ( $partners_query->have_posts() ) {
							$partners_query->the_post();
							$post_id        = get_the_ID();
							$hubspot_script = get_field( 'hubspot_script' );
							?>
							<div class="partner-card col-12 col-md-6 col-lg-3" data-partner="partner-<?php echo $post_id; ?>">
								<div class="product-row-block">
									<div class="partner-logo">
										<?php
										if ( has_post_thumbnail() ) {
											the_post_thumbnail( 'medium_large' );
										}
										?>
									</div>
									<div class="learn-more"><?php _e( 'Learn more', 'pyramid' ); ?></div>
								</div>
							</div>
							<div id="partner-<?php echo $post_id; ?>" class="partner-description" style="display: none;">
								<div class="partner-description-wrapper d-flex justify-content-center align-items-center">
									<div class="partner-description-inner-block">
										<div class="button-cross">
											<img class="button-image" src="<?php echo get_theme_file_uri('/static/images/cross-sign.png'); ?>" alt="Icon close">
										</div>
										<div class="partner-logo">
											<?php the_post_thumbnail( 'medium_large', array( 'class' => 'partner-new-logo' ) ); ?>
										</div>
										<div class="partner-info">
											<div class="partner-details">
												<div class="partner-detail-title"><?php the_title(); ?></div>
												<div class="partner-content"><?php 
													the_content(); 
								                    $country = wp_get_post_terms( get_the_ID(), 'country' ); 
									                $arraycatname = array(); 
									                $workterm_id = array(); 
									                if($country)
									                { ?>
									                	<h3>LOCATIONS</h3>
									                	<ul><?php
											                foreach($country as $thisslug) 
											                { ?>
											                  <li><?php echo $thisslug->name; ?></li><?php
											                } ?>
											            </ul><?php
										            } ?>
												</div>
											</div>
											<div class="partner-script-btn" style="margin-top: 25px;">
												<?php echo $hubspot_script; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php
						}
						wp_reset_postdata(); ?>
						<div class="pagination"><?php
						$big = 999999999; // need an unlikely integer
						echo paginate_links(array(
							'base'    => str_replace($big, '%#%', get_pagenum_link($big)),
							'format'  => '?paged=%#%',
							'current' => max(1, get_query_var('paged')),
							'total'   => $partners_query->max_num_pages,
						)); ?>
					</div>
					<?php } else { ?>
						<div class="no-results not-found">
							<div class="page-header">
								<h2 class="page-title"><?php _e( 'Nothing Found', 'pyramid' ); ?></h2>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
	<?php if ( $select_created_resource ) { ?>
		<section id="related-reads" class="related-posts">
			<div class="custom-container">
				<div class="row">
					<div class="col-12">
						<h2 class="h2-desktop title-heading section-margin space-1"><?php _e( 'Resources', 'pyramid' ); ?></h2>
					</div>
				</div>
				<div class="cards-section">
					<div class="<?php echo $resource_wrapper_class; ?>">
					<?php
					foreach ( $select_created_resource as $post ) {
						setup_postdata( $post );
						$post_date = get_the_date( 'M d, Y' );

						include get_template_directory() . '/template-parts/card-resource.php';
					}

					wp_reset_postdata();
					?>
					</div>
				</div>
			</div>
		</section>
	<?php } ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->
<?php
get_footer();