<?php
$post_date = get_the_date( 'F j, Y' );
?>
<div class="col-md-4 responsive-flex">
	<div class="card">
		<?php if (has_post_thumbnail()): ?>
			<div class="image">
				<?php the_post_thumbnail('medium_large'); ?>
			</div>
		<?php endif; ?>
		<div class="card-body">
			<p class="text-uppercase label"><?php echo get_the_category()[0]->name; ?></p>
			<h3 class="heading h4-desktop">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<p class="paragraph"><?php echo wp_trim_words(get_the_content(), 15); ?></p>
		</div>
		<div class="card-footer justify-content-between">
			<span class="post-date"><?php echo $post_date; ?></span>
			<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
		</div>
	</div>
</div>