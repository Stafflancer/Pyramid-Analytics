<?php
$press_release_terms = get_the_terms( get_the_ID(), 'category' );
$terms_string        = join( ', ', wp_list_pluck( $press_release_terms, 'name' ) );
$card_class          = has_post_thumbnail() ? 'with-image' : 'no-image';
?>
<div class="col-md-4 responsive-flex">
	<div class="card <?php echo $card_class; ?>">
		<?php if ( has_post_thumbnail() ): ?>
			<div class="image">
				<?php the_post_thumbnail( 'medium_large' ); ?>
			</div>
		<?php endif; ?>
		<div class="card-body">
			<div class="label"><?php echo $terms_string; ?></div>
			<h3 class="heading h4-desktop">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
			<p class="paragraph"><?php echo wp_trim_words( get_the_content(), 20 ); ?></p>
		</div>
		<div class="card-footer justify-content-between">
			<span class="post-date"><?php echo get_the_date(); ?></span>
			<a href="<?php the_permalink(); ?>" class="button"><?php _e( 'Read More', 'pyramid' ); ?></a>
		</div>
	</div>
</div>