<?php
/**
 * The template for displaying all single posts.
 *
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package    WordPress
 * @subpackage Pyramid
 * @since      Pyramid 1.0
 */

get_header();

$postid      = get_the_ID();
$categories  = get_the_category();
$category_id = $categories[0]->cat_ID;
?>
<?php if ( shortcode_exists( 'addtoany' ) ): ?>
	<section class="share-icons">
		<?php echo do_shortcode( '[addtoany]' ); ?>
	</section>
<?php endif; ?>
<section class="blog-post">
	<div class="blogpost-container">
		<div class="breadcrumb">
			<span class="first"><?php _e( 'RESOURCES', 'pyramid' ); ?></span> / <span class="second"><?php _e( 'BLOG', 'pyramid' ); ?></span>
		</div>
		<h1 class="blogpost-title h2-desktop"><?php the_title(); ?></h1>
		<div class="blogpost-meta">
			<?php
			$author_id    = get_post_field( 'post_author', $postid );
			$author_image = get_field( 'author_image', 'user_' . $author_id );

			if ( $author_image ) {
				?>
				<div class="author-image">
					<img src="<?php echo $author_image['url']; ?>" alt="<?php echo $author_image['title']; ?>">
				</div>
			<?php } ?>
			<span class="date"><?php echo get_the_date(); ?></span>
			<span class="post-author">
				<?php echo esc_html( ' | ' ); ?>
				<span class="author vcard">
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
				</span>
			</span>
		</div>
		<div class="blogpost-img">
			<?php the_post_thumbnail(); ?>
		</div>
		<div class="content custom-blogpost">
			<?php the_content(); ?>
		</div>
		<?php
		$oembed_video = get_field( 'oembed_video' );

		if ( $oembed_video ) { ?>
			<div class="bottom-sec-video">
				<?php echo $oembed_video; ?>
			</div>
			<?php
		}
		$prev_post = get_adjacent_post(false, '', true);
		$next_post = get_adjacent_post(false, '', false);
		?>
		<div class="control">
			<div class="prev_arrow">
				<?php $prev_val = '<span class="arrow">&#8592;</span>&nbsp;' . __( 'Previous', 'pyramid' ) . '</span></span>'; previous_post_link('%link', "$prev_val"); ?>
			</div>
			<div class="right_arrow">
				<?php $next_val = '<span class="next">' . __( 'Next', 'pyramid' ) . '&nbsp;<span class="arrow">&#8594;</span></span>'; next_post_link('%link', "$next_val"); ?>
			</div>
		</div>
	</div>
</section>
<?php
$post     = array(
	'post_type'      => 'post',
	'post_status'    => 'publish',
	'posts_per_page' => 9,
	'post__not_in'   => array( $postid ),
	'cat'            => $category_id,
	'orderby'        => 'date',
	'order'          => 'DESC',
);
$wp_query = new WP_Query( $post );

if ( $wp_query->have_posts() ) {
	$num = $wp_query->post_count;

	$resource_wrapper_class = '';

	if ( $num > 3 ) {
		wp_enqueue_style( 'slick-style' );
		wp_enqueue_script( 'slick-script' );
		wp_enqueue_script( 'carousel-resource-cards-script' );

		$resource_wrapper_class = 'resource-slider';
	}
	?>
	<section id="related-reads" class="related-posts space-top">
		<div class="custom-container">
			<div class="row">
				<div class="col-12">
					<h2 class="h2-desktop title-heading section-margin space-1"><?php _e( 'Related Reads', 'pyramid' ); ?></h2>
				</div>
			</div>
			<div class="cards-section">
				<div class="<?php echo $resource_wrapper_class; ?>">
				<?php
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();

					include get_template_directory() . '/template-parts/card-resource.php';
				}
				wp_reset_postdata();
				?>
				</div>
			</div>
		</div>
	</section>
<?php } ?>

<?php include get_template_directory() . '/template-parts/newsletter.php'; ?>

<?php get_footer();