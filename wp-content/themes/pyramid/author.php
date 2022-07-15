<?php
/**
 * The template for displaying author pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();

$author_id = get_the_author_meta('ID');
?>
<section class="author-blog space-top">
	<div class="custom-container">
		<div class="row">
			<div class="col-12">
				<div class="breadcrumb">
					<span class="first"><a href="<?php echo get_permalink( 56 ); ?>"><?php _e( 'RESOURCES', 'pyramid' ); ?> </a></span><span class="second">/ <a href="<?php echo get_permalink( 58 ); ?>"><?php _e( 'BLOG', 'pyramid' ); ?></a></span> /<span class="third"> <?php _e( 'AUTHOR', 'pyramid' ); ?></span>
				</div>
			</div>
			<div class="col-12">
				<h3><?php if ( ICL_LANGUAGE_CODE == 'en' ) {
						echo 'All posts by';
					} else {
						echo 'Alle Beiträge von';
					} ?> <?php echo get_the_author(); ?></h3>
				<?php
				$author_image = get_field( 'author_image', 'user_' . $author_id );

				if ( $author_image ) { ?>
					<div class="author-image">
						<img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['title']; ?>">
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<section class="feature-section author-blog-section">
	<div class="custom-container">
		<?php if (have_posts()) : ?>
			<div class="row"><?php
				while (have_posts()) : the_post(); ?>
					<div class="col-12 col-md-4 responsive-flex">
						<div class="card">
							<?php if (has_post_thumbnail()): ?>
								<div class="image">
									<?php the_post_thumbnail('medium_large'); ?>
								</div>
							<?php endif; ?>
							<div class="card-body">
								<h3 class="heading h4-desktop">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<p class="paragraph"><?php echo wp_trim_words(get_the_content(), 40); ?></p>
							</div>
							<div class="card-footer justify-content-between">
								<span class="post-date"><?php echo get_the_date(); ?></span>
								<a href="<?php the_permalink(); ?>" class="button">
									<?php
									if ( ICL_LANGUAGE_CODE == 'en' ) {
										echo 'Read More';
									} else {
										echo 'Weiterlesen';
									}
									?>
								</a>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="pagination"><?php
				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( '« Previous', 'pyramid' ),
					'next_text'          => __( 'Next »', 'pyramid' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'pyramid' ) . ' </span>',
				) ); ?>
			</div>
		<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part('template-parts/content/content', 'none');
		endif;
		?>
	</div>
</section>

<?php include get_template_directory() . '/template-parts/newsletter.php'; ?>

<?php get_footer();