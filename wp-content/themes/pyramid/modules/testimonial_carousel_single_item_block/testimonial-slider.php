<!-- testimonial section start  -->
<div class="custom-width">
	<div class="title-heading">
		<?php echo get_sub_field('ls_heading'); ?>
	</div>

	<div class="custom-testimonial slider">
		<?php
		$posts = get_posts(array(
			'posts_per_page' => -1,
			'post_type'      => 'testimonials',
		));

		if ($posts):
			foreach ($posts as $post):
				setup_postdata($post);
				?>
				<div>
					<div class="width">
						<div class="content">
							<p>“<?php echo wp_trim_words(get_the_content()); ?>”</p>
						</div>
						<div class="title">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
</div>
<!-- testimonial section end  -->

<?php
//wp_enqueue_script('jquery-2-2-script');
wp_enqueue_script('slick-script');
?>

<script>
	$( document ).on( 'ready', function () {
		$( '.custom-testimonial' ).slick( {
			dots: true,
			slidesToShow: 1,
			slidesToScroll: 1,
			prevArrow: '<img class="prev-arrow-img" src="/wp-content/uploads/2022/02/left.png" alt="icon"/>',
			nextArrow: '<img class="next-arrow-img" src="/wp-content/uploads/2022/02/right.png" alt="icon"/>',
		} );
	} );
</script>

<style>
	.custom-width {
		width: 1165px;
		margin: 0 auto;
		padding: 60px 0;
	}

	.custom-width .title-heading {
		font-family: "PT Sans", sans-serif;
		font-weight: 700;
		text-align: center;
		padding-top: 15px;
		padding-bottom: 25px;
		font-size: 35px;
		color: #3e3e3e;
	}

	.custom-testimonial .slick-arrow {
		position: absolute;
		top: 40px;
		transform: translateY(-50%);
		z-index: 1;
		cursor: pointer;
	}

	.custom-testimonial .slick-arrow.next-arrow-img {
		right: 250px;
	}

	.custom-testimonial .slick-arrow.prev-arrow-img {
		left: 250px;
	}

	.custom-testimonial .width {
		width: 400px;
		margin: 0 auto;
		text-align: center;
		font-family: "Open Sans", sans-serif;
	}

	.custom-testimonial .width .content p {
		margin-bottom: 22px;
		font-family: var(--unnamed-font-family-pt-sans);
		font-size: 14px;
		line-height: 1.3rem;
		color: var(--unnamed-color-3e3e3e);
	}

	.custom-testimonial .slick-dots {
		justify-content: space-between;
		margin-top: 55px;
		margin-bottom: 25px;
	}

	.custom-testimonial .slick-dots li {
		width: 135px;
		height: 45px;
		background-size: contain;
		background-repeat: no-repeat;
		background-color: transparent;
		background-position: center;
	}

	.custom-testimonial .slick-dots li:nth-child(1) {
		background-image: url(/wp-content/uploads/2021/12/siemens.svg);
	}

	.custom-testimonial .slick-dots li:nth-child(2) {
		background-image: url(/wp-content/uploads/2021/12/sandisk.svg);
	}

	.custom-testimonial .slick-dots li:nth-child(3) {
		background-image: url(/wp-content/uploads/2021/12/hp.svg);
	}

	.custom-testimonial .slick-dots li:nth-child(4) {
		background-image: url(/wp-content/uploads/2021/12/dell.svg);
	}

	.custom-testimonial .slick-dots li:nth-child(5) {
		background-image: url(/wp-content/uploads/2021/12/voith.svg);
	}

	@media (max-width: 1190px) {
		.custom-width {
			width: 100%;
			padding: 0 15px;
		}

		.custom-testimonial .slick-dots {
			margin-bottom: 50px;
		}
	}

	@media (max-width: 991px) {
		.custom-testimonial .slick-arrow.next-arrow-img {
			right: 0;
		}

		.custom-testimonial .slick-arrow.prev-arrow-img {
			left: 0;
		}
	}

	@media (max-width: 767px) {
		.custom-testimonial .width {
			width: 90%;
		}

		.custom-testimonial .slick-dots {
			flex-direction: column;
		}

		.custom-testimonial .slick-dots li {
			margin-bottom: 20px;
		}
	}
</style>
