<section class="newsletter">
	<div class="custom-container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<h2 class="title h4-desktop">
					<?php
					if ( ICL_LANGUAGE_CODE == 'en' ) {
						echo 'Get the latest insights delivered to your inbox';
					} else {
						echo 'Holen Sie sich die neuesten Erkenntnisse direkt in Ihren Posteingang';
					}
					?>
				</h2>
				<div class="content">
<!--					--><?php
//					if ( ICL_LANGUAGE_CODE == 'en' ) {
//						echo 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
//					} else {
//						echo 'Deutsches Ipsum Dolor sit amet, Joachim Löw adipiscing elit, sed do eiusmod Schnaps incididunt ut labore et dolore Erbsenzähler aliqua.';
//					}
//					?>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form">
					<?php echo do_shortcode('[BLOGFORM]'); ?>
				</div>
			</div>
		</div>
	</div>
</section>