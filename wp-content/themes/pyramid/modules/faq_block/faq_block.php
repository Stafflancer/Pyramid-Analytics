<?php
$heading_faq = get_sub_field('heading_faq');
wp_enqueue_style('faq_block', get_template_directory_uri() . '/static/css/modules/faq_block/faq_block.css', [], null);
?>
<div class="frequently__asked__question">
	<div class="frequently__asked__question__container">
		<h2><?php echo $heading_faq; ?></h2>
		<?php
		if (have_rows('faq_field')) {
			while (have_rows('faq_field')) {
				the_row(); ?>
				<div class="faq-item">
					<div class="frequently__asked__question__container__divider"></div>
					<button class="accordion"><?php echo get_sub_field('question_faq'); ?></button>
					<div class="panel">
						<?php the_sub_field('answer_faq'); ?>
					</div>
				</div>
			<?php }
		} ?>
	</div>
</div>

<script>
	const accItems = document.querySelectorAll( '.faq-item' );
	// add a click event for all items
	accItems.forEach( ( acc ) => acc.addEventListener( 'click', toggleAcc ) );

	function toggleAcc() {
		// remove active class from all items exept the current item (this)
		accItems.forEach( ( item ) => item != this ? item.classList.remove( 'faq-item--active' ) : null
		);

		// toggle active class on current item
		if ( 'faq-item--active' !== this.classList  ) {
			this.classList.toggle( 'faq-item--active' );
		}
	}
</script>