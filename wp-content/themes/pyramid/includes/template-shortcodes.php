<?php
add_shortcode('pricing_form', 'pricing_form_function');
function pricing_form_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: '4e2a6668-66bb-4bb7-abee-4068de4acac8'
		} );
	</script>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('gated_download_form', 'gated_download_form_function');
function gated_download_form_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: 'c927bd31-aa59-4f0f-86c4-10f8175e3b4f'
		} );
	</script>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('careers_form', 'careers_form_function');
function careers_form_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: 'b300272e-0f16-4bf3-9d13-a8969e7317d9'
		} );
	</script>
<!--	<script>-->
<!--		window.onload = function () {-->
<!--			let myiFrame = document.getElementById( 'hs-form-iframe-0' );-->
<!--			let doc = myiFrame.contentDocument;-->
<!--			doc.body.innerHTML = doc.body.innerHTML + '<style>@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 label{font-size:16px!important;line-height:24px;color:#3e3e3e!important; font-family: "Open Sans", sans-serif;}#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 .hs-input{background:#fff;border-color:#5b6770;font-family: "Open Sans", sans-serif;color:#3e3e3e}#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 p a{color:#489fdf!important; font-family: "Open Sans", sans-serif;}#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 p span{color:#000!important;font-size:16px; font-family: "Open Sans", sans-serif;}#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 .hs-button{background:#f2542d;border-color:#f2542d;border-radius:50px;font-size:20px;line-height:22px;padding:12px 50px;font-weight:400; font-family: "Open Sans", sans-serif; text-transform: uppercase;}#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 .hs-button:focus,#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 .hs-button:hover{background:#489fdf;border-color:#489fdf}@media(max-width: 576px){#hsForm_b300272e-0f16-4bf3-9d13-a8969e7317d9 p span{color:#000!important;font-size:14px}}</style>';-->
<!--		};-->
<!--	</script>-->
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('contactnewform', 'contact_new_form_function');
function contact_new_form_function()
{
	ob_start();
	?>
	<div class="contact-form">
		<!--[if lte IE 8]>
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
			hbspt.forms.create( {
				region: 'na1',
				portalId: '5413265',
				formId: 'e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c'
			} );
		</script>
		<!--<script>
			window.onload = function () {
				let myiFrame = document.getElementById( 'hs-form-iframe-0' );
				let doc = myiFrame.contentDocument;
				doc.body.innerHTML = doc.body.innerHTML + '<style>@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c label{font-size:16px!important;line-height:24px;color:#3e3e3e!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-input{background:#fff;border-color:#5b6770;font-family:opensans,sans-serif;color:#3e3e3e; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p a{color:#489fdf!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:16px; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button{background:#f2542d;border-color:#f2542d;border-radius:50px;font-size:20px;line-height:22px;padding:12px 50px;font-weight:400; font-family: "Open Sans", sans-serif; text-transform: uppercase;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:focus,#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:hover{background:#489fdf;border-color:#489fdf}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1:before{content:"";position:absolute;left:0;right:0;bottom:0;width:80px;background:#489fdf;height:2px;margin:0 auto}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1 span{color:#3e3e3e!important;font-size:1.17em;font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1{font-family: "Open Sans", sans-serif; font-size: 24px; line-height: 34px;color:#3e3e3e;text-align:center;margin:0 0 30px;padding-bottom:22px;position:relative}@media(max-width: 576px){#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:14px}}</style>';
			};
		</script>-->
	</div>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('oneononedemo', 'one_on_one_demo_function');
function one_on_one_demo_function()
{
	ob_start();
	?>
	<div class="contact-form">
		<!--[if lte IE 8]>
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
			hbspt.forms.create( {
				region: 'na1',
				portalId: '5413265',
				formId: 'c201b9d5-1fc7-4f3c-9d6d-b1e027edf118'
			} );
		</script>
<!--		<script>-->
<!--			window.onload = function () {-->
<!--				let myiFrame = document.getElementById( 'hs-form-iframe-0' );-->
<!--				let doc = myiFrame.contentDocument;-->
<!--				doc.body.innerHTML = doc.body.innerHTML + '<style>@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c label{font-size:16px!important;line-height:24px;color:#3e3e3e!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-input{background:#fff;border-color:#5b6770;font-family:opensans,sans-serif;color:#3e3e3e; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p a{color:#489fdf!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:16px; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button{background:#f2542d;border-color:#f2542d;border-radius:50px;font-size:20px;line-height:22px;padding:12px 50px;font-weight:400; font-family: "Open Sans", sans-serif; text-transform: uppercase;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:focus,#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:hover{background:#489fdf;border-color:#489fdf}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1:before{content:"";position:absolute;left:0;right:0;bottom:0;width:80px;background:#489fdf;height:2px;margin:0 auto}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1 span{color:#3e3e3e!important;font-size:1.17em;font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1{font-family: "Open Sans", sans-serif; font-size: 24px; line-height: 34px;color:#3e3e3e;text-align:center;margin:0 0 30px;padding-bottom:22px;position:relative}@media(max-width: 576px){#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:14px}}</style>';-->
<!--			};-->
<!--		</script>-->
	</div>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('demowithdata', 'demo_with_data_function');
function demo_with_data_function()
{
	ob_start();
	?>
	<div class="contact-form">
		<!--[if lte IE 8]>
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
		<![endif]-->
		<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
		<script>
			hbspt.forms.create( {
				region: 'na1',
				portalId: '5413265',
				formId: '4cab04f1-bec4-4229-afff-ccd07cc05980'
			} );
		</script>
<!--		<script>-->
<!--			window.onload = function () {-->
<!--				let myiFrame = document.getElementById( 'hs-form-iframe-0' );-->
<!--				let doc = myiFrame.contentDocument;-->
<!--				doc.body.innerHTML = doc.body.innerHTML + '<style>@import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap");#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c label{font-size:16px!important;line-height:24px;color:#3e3e3e!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-input{background:#fff;border-color:#5b6770;font-family:opensans,sans-serif;color:#3e3e3e; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p a{color:#489fdf!important; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:16px; font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button{background:#f2542d;border-color:#f2542d;border-radius:50px;font-size:20px;line-height:22px;padding:12px 50px;font-weight:400; font-family: "Open Sans", sans-serif; text-transform: uppercase;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:focus,#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c .hs-button:hover{background:#489fdf;border-color:#489fdf}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1:before{content:"";position:absolute;left:0;right:0;bottom:0;width:80px;background:#489fdf;height:2px;margin:0 auto}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1 span{color:#3e3e3e!important;font-size:1.17em;font-family: "Open Sans", sans-serif;}#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c h1{font-family: "Open Sans", sans-serif; font-size: 24px; line-height: 34px;color:#3e3e3e;text-align:center;margin:0 0 30px;padding-bottom:22px;position:relative}@media(max-width: 576px){#hsForm_e7ff4b0e-d5f3-475a-a1f1-d05a0db6470c p span{color:#000!important;font-size:14px}}</style>';-->
<!--			};-->
<!--		</script>-->
	</div>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

function blog_form_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: '12cca09f-a05e-4d26-8c4c-8aa173599200',
			// onFormReady: function ($form) {
			// 	window.onload = function () {
			// 		let myiFrame = document.getElementById( 'hs-form-iframe-0' ),
			// 			doc = (null !== myiFrame) ? myiFrame.contentDocument : null;
			//
			// 		if ( null !== doc ) {
			// 			doc.body.innerHTML = doc.body.innerHTML + '<style>form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200{max-width:526px; width:100%;margin:0!important;position:relative}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 input{border:0!important;background:#f7f9f7 0 0 no-repeat padding-box!important;border-radius:35px!important;height:45px!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .actions{margin-top:0!important;margin-bottom:0!important;padding:0!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs-button{background:#755CC0 0 0 no-repeat padding-box!important;border-radius:25px!important;font:normal normal 600 16px/24px Open Sans!important;letter-spacing:.32px!important;color:#f7f9f7!important;text-transform:uppercase;padding:13.5px 64px;line-height:1!important}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs-richtext p span{color:#3e3e3e!important;font-family:"Open Sans",sans-serif;font-size:14px;font-weight:700}form#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit{position:absolute;right:0;bottom:0}label#label-email-12cca09f-a05e-4d26-8c4c-8aa173599200{display:none}</style>';
			// 		}
			// 	};
			// }
		} );
	</script>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('BLOGFORM', 'blog_form_function');

function blog_resources_form_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: '12cca09f-a05e-4d26-8c4c-8aa173599200'
		} );

		// let myiFrame = document.getElementById( 'hs-form-iframe-0' );
		// let doc = myiFrame.contentDocument;
		// doc.body.innerHTML = doc.body.innerHTML + '<style>#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200{max-width:526px !important;position: relative;} #hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_email label{color: #fff;font-size: 16px !important;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs-input{color: #000;font-family: opensans, sans-serif; background: #ffffff;border: 0;border-radius: 30px;height: 45px;width: 100%; padding-right: 180px;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_email .hs-error-msgs label {color: #c90009;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit .actions {margin-top: 0;padding: 0;margin-bottom: 0;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_email {margin-bottom: 0;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit .hs-button{background:#755cc0;border:0;border-radius:26px;padding:15px 54px;line-height:15px;font-size:16px;letter-spacing:.32px;text-transform:uppercase;transition:all .3s ease-in-out;position:absolute;right:0;bottom:0 !important;} #hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit .hs-button:hover {background: #0eafdb;font-size: 16px !important;transform: none;line-height: unset;letter-spacing: 0.32px;color: #fff;line-height: 15px;}@media (max-width:400px){#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit .hs-button{position: relative !important;top: 10px !important;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs_submit .hs-button{width: 100%;}#hsForm_12cca09f-a05e-4d26-8c4c-8aa173599200 .hs-input{padding-right:10px!important}}</style>';
	</script>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('BLOGRESOURCEFORM', 'blog_resources_form_function');

// Add Shortcode for breadcrumbs
function breadcrumbs_function()
{
	// Hide from front page.
	if (is_front_page()) {
		return '';
	}

	$separator         = '/';
	$breadcrumbs_id    = 'tsh_breadcrumbs';
	$breadcrumbs_class = 'tsh_breadcrumbs';

	// Add here your custom post taxonomies.
	$tsh_custom_taxonomy = 'product_cat';

	global $post, $wp_query;

	ob_start();

	echo '<ul id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';

	if (is_archive() && !is_tax() && !is_category() && !is_tag()) {
		echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title('', false) . '</strong></li>';
	} else {
		if (is_archive() && is_tax() && !is_category() && !is_tag()) {
			// For Custom post type
			$post_type = get_post_type();

			// Custom post type name and link
			if ($post_type != 'post') {
				$post_type_object  = get_post_type_object($post_type);
				$post_type_archive = get_post_type_archive_link($post_type);

				echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
				echo '<li class="separator"> ' . $separator . ' </li>';
			}

			$custom_tax_name = get_queried_object()->name;
			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
		} else {
			if (is_single()) {
				$post_type = get_post_type();
				if ($post_type != 'post') {
					$post_type_object  = get_post_type_object($post_type);
					$post_type_archive = get_post_type_archive_link($post_type);

					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';
				}

				// Get post category
				$category = get_the_category();

				if (!empty($category)) {
					// Last category post is in
					$last_category = $category[ count($category) - 1 ];

					// Parent any categories and create array
					$get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','), ',');
					$cat_parents     = explode(',', $get_cat_parents);

					// Loop through parent categories and store in variable $cat_display
					$cat_display = '';
					foreach ($cat_parents as $parents) {
						$cat_display .= '<li class="item-cat">' . $parents . '</li>';
						$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
					}
				}

				$taxonomy_exists = taxonomy_exists($tsh_custom_taxonomy);
				if (empty($last_category) && !empty($tsh_custom_taxonomy) && $taxonomy_exists) {
					$taxonomy_terms = get_the_terms($post->ID, $tsh_custom_taxonomy);
					$cat_id         = $taxonomy_terms[0]->term_id;
					$cat_nicename   = $taxonomy_terms[0]->slug;
					$cat_link       = get_term_link($taxonomy_terms[0]->term_id, $tsh_custom_taxonomy);
					$cat_name       = $taxonomy_terms[0]->name;
				}

				// If the post is in a category
				if (!empty($last_category)) {
					echo $cat_display;
					echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

					// Post is in a custom taxonomy
				} else {
					if (!empty($cat_id)) {
						echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
						echo '<li class="separator"> ' . $separator . ' </li>';
						echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
					} else {
						echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
					}
				}
			} else {
				if (is_category()) {
					// Category page
					echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
				} else {
					if (is_page()) {
						// Standard page
						if ($post->post_parent) {
							// Get parents
							$anc = get_post_ancestors($post->ID);
							// Get parents order
							$anc = array_reverse($anc);

							// Parent pages
							if (!isset($parents)) {
								$parents = null;
							}

							foreach ($anc as $ancestor) {
								$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
								$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
							}

							// Render parent pages
							echo $parents;

							// Active page
							echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
						} else {
							// Just display active page if not parents pages
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
						}
					} else {
						if (is_tag()) { // Tag page
							// Tag information
							$term_id       = get_query_var('tag_id');
							$taxonomy      = 'post_tag';
							$args          = 'include=' . $term_id;
							$terms         = get_terms($taxonomy, $args);
							$get_term_id   = $terms[0]->term_id;
							$get_term_slug = $terms[0]->slug;
							$get_term_name = $terms[0]->name;

							// Return tag name
							echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
						} elseif (is_day()) { // Day archive page
							// Year link
							echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
							echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

							// Month link
							echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
							echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

							// Day display
							echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
						} else {
							if (is_month()) { // Month Archive
								// Year link
								echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link(get_the_time('Y')) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
								echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

								// Month display
								echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
							} else {
								if (is_year()) { // Display year archive
									echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
								} else {
									if (is_author()) { // Author archive
										// Get the author information
										global $author;
										$userdata = get_userdata($author);

										// Display author name
										echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
									} else {
										if (get_query_var('paged')) {
											// Paginated archives
											echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">' . __('Page') . ' ' . get_query_var('paged') . '</strong></li>';
										} else {
											if (is_search()) {
												// Search results page
												echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
											} elseif (is_404()) {
												// 404 page
												echo '<li>' . 'Error 404' . '</li>';
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}

	echo '</ul>';

	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode('breadcrumbs', 'breadcrumbs_function');

function tab_content_function()
{
	ob_start();
	?>
	<div class="tab-teaser">
		<div class="tab-menu">
			<ul>
				<li>
					<a href="#" class="active" data-rel="tab-1">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 206 180"
						     fill="none">
							<path d="M154.5 0H51.4999L32.6509 32.94C46.2573 31.1627 60.0864 32.3083 73.2149 36.3004C86.3434 40.2925 98.4693 47.0393 108.783 56.0902C119.097 65.1412 127.361 76.2881 133.025 88.787C138.688 101.286 141.62 114.849 141.625 128.571C141.675 146.792 136.487 164.644 126.677 180H154.5L206 90L154.5 0Z" fill="#8C8C8C"/>
							<path d="M45.063 45C38.0472 44.9794 31.0568 45.8432 24.257 47.571L0 90L51.5 180H110.957C120.613 167.662 126.604 152.857 128.245 137.276C129.887 121.695 127.113 105.966 120.241 91.8869C113.369 77.8074 102.675 65.9446 89.3814 57.6536C76.0877 49.3627 60.7302 44.9778 45.063 45V45Z" fill="#C8C8C8"/>
						</svg>
						<span>Connect</span>
					</a>
				</li>
				<li>
					<a href="#" data-rel="tab-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 179 180" fill="none">
							<g clip-path="url(#clip0_8_23)">
								<path d="M114.037 0C80.946 0 53.637 25.907 50.248 59.143H112C112.335 59.1432 112.666 59.2099 112.975 59.3392C113.284 59.4684 113.565 59.6577 113.8 59.896C114.279 60.38 114.547 61.0334 114.546 61.714V154.286H173.906C174.474 154.279 175.035 154.159 175.557 153.934C176.079 153.708 176.551 153.382 176.946 152.974C177.749 152.143 178.193 151.03 178.182 149.874V66.124C178.182 29.571 149.469 0 114.037 0Z" fill="#818181"/>
								<path d="M99.273 72H2.545C1.86648 72.0037 1.21721 72.2767 0.739961 72.759C0.262707 73.2414 -0.00345436 73.8935 2.7436e-06 74.572V177.429C-0.00170879 177.765 0.0627624 178.098 0.189735 178.409C0.316708 178.72 0.503696 179.003 0.740021 179.242C0.976347 179.48 1.25738 179.67 1.56708 179.8C1.87678 179.93 2.20908 179.998 2.545 180H99.273C99.6089 179.998 99.9412 179.93 100.251 179.8C100.561 179.67 100.842 179.48 101.078 179.242C101.314 179.003 101.501 178.72 101.628 178.409C101.755 178.098 101.82 177.765 101.818 177.429V74.572C101.82 74.236 101.755 73.9029 101.629 73.5918C101.502 73.2807 101.315 72.9976 101.078 72.7588C100.842 72.5199 100.561 72.33 100.251 72.1998C99.9414 72.0696 99.609 72.0017 99.273 72Z" fill="#CCCCCC"/>
								<path d="M50.909 154.286C56.006 154.338 61.0034 152.874 65.2666 150.079C69.5297 147.285 72.8664 143.287 74.8529 138.593C76.8393 133.899 77.3859 128.72 76.4232 123.715C75.4606 118.709 73.0321 114.103 69.4461 110.48C65.8602 106.857 61.2786 104.382 56.2831 103.369C51.2876 102.355 46.1036 102.849 41.3895 104.788C36.6753 106.726 32.6435 110.022 29.8062 114.257C26.9689 118.492 25.4541 123.474 25.454 128.571C25.4197 135.357 28.0822 141.878 32.8559 146.7C37.6296 151.523 44.1235 154.251 50.909 154.286V154.286Z" fill="#848484"/>
							</g>
						</svg>
						<span>MODEL</span>
					</a>
				</li>
				<li>
					<a href="#" data-rel="tab-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 189 179"
						     fill="none">
							<g clip-path="url(#clip0_8_35)">
								<path d="M80.627 82.39V40.098C80.6245 34.827 79.58 29.6086 77.5535 24.7427C75.527 19.8768 72.5586 15.4596 68.819 11.745C61.2391 4.22217 50.9928 0.000656128 40.3135 0.000656128C29.6342 0.000656128 19.3879 4.22217 11.808 11.745C8.06835 15.4596 5.09995 19.8768 3.07349 24.7427C1.04704 29.6086 0.0025156 34.827 0 40.098V175.952C0.000113035 176.303 0.069704 176.651 0.204769 176.976C0.339834 177.3 0.537706 177.594 0.787 177.842C1.29188 178.344 1.97504 178.626 2.687 178.625H40.313V87.735C40.3132 87.3836 40.3828 87.0358 40.5178 86.7114C40.6529 86.3871 40.8507 86.0926 41.1 85.845C41.6054 85.3438 42.2882 85.0624 43 85.062H77.939C78.6508 85.0616 79.3336 84.7802 79.839 84.279C80.0883 84.0316 80.2863 83.7373 80.4215 83.4131C80.5567 83.089 80.6266 82.7413 80.627 82.39Z" fill="#848484"/>
								<path d="M188.127 176.073V72.565C188.129 71.9985 187.95 71.4463 187.617 70.988L149.991 19.301C149.739 18.9695 149.414 18.7007 149.041 18.5156C148.668 18.3305 148.257 18.2343 147.841 18.2343C147.425 18.2343 147.014 18.3305 146.641 18.5156C146.268 18.7007 145.943 18.9695 145.691 19.301L108.066 70.99C107.732 71.4479 107.553 72.0004 107.555 72.567V178.626H185.614C186.286 178.616 186.926 178.342 187.398 177.863C187.869 177.386 188.131 176.743 188.127 176.073V176.073Z" fill="#7F7F7F"/>
								<path d="M56.438 98.429H137.588C138.3 98.4286 138.983 98.7101 139.488 99.212C139.737 99.4595 139.935 99.754 140.071 100.078C140.206 100.403 140.276 100.751 140.276 101.102V178.626H53.751V101.102C53.7511 100.751 53.8207 100.403 53.9558 100.078C54.0908 99.754 54.2887 99.4596 54.538 99.212C55.043 98.7102 55.7261 98.4287 56.438 98.429V98.429Z" fill="#CCCCCC"/>
							</g>
						</svg>
						<span>ANALYZE</span>
					</a>
				</li>
				<li>
					<a href="#" data-rel="tab-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 207 181" fill="none">
							<g clip-path="url(#clip0_8_7)">
								<path d="M122.691 180.463H203.406C203.867 180.466 204.32 180.348 204.72 180.119C205.12 179.891 205.453 179.561 205.685 179.163C205.916 178.764 206.039 178.312 206.039 177.851C206.04 177.391 205.919 176.938 205.688 176.539L165.652 106.666C152.616 114.082 141.775 124.816 134.229 137.778C126.684 150.74 122.703 165.468 122.691 180.466V180.463Z" fill="#848484"/>
								<path d="M159.134 95.339L155.449 88.917H50.54L0.328005 176.552C0.0984497 176.95 -0.0221786 177.402 -0.0217426 177.861C-0.0213066 178.321 0.100178 178.773 0.330488 179.17C0.560798 179.568 0.89181 179.898 1.29022 180.127C1.68862 180.357 2.14037 180.477 2.6 180.476H109.552C109.604 163.179 114.215 146.202 122.92 131.255C131.624 116.308 144.116 103.92 159.134 95.339Z" fill="#6E6E6E"/>
								<path d="M50.566 88.9H155.475L105.289 1.269C105.059 0.869158 104.727 0.537039 104.328 0.306105C103.929 0.0751713 103.475 -0.0464211 103.014 -0.0464211C102.553 -0.0464211 102.099 0.0751713 101.7 0.306105C101.301 0.537039 100.969 0.869158 100.739 1.269L50.566 88.9Z" fill="#CCCCCC"/>
							</g>
						</svg>
						<span>UNDERSTAND</span>
					</a>
				</li>
				<li>
					<a href="#" data-rel="tab-5">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 111 130" fill="none">
							<g clip-path="url(#clip0_8_2)">
								<path d="M5.6624e-06 64.506C-0.00608689 76.9398 4.90459 88.8715 13.661 97.699C17.9809 102.054 23.1193 105.512 28.7804 107.874C34.4416 110.236 40.5139 111.455 46.648 111.462V17.579C40.5162 17.5857 34.4463 18.8042 28.787 21.1644C23.1276 23.5246 17.9906 26.98 13.671 31.332C4.91556 40.1531 0.00158727 52.0774 5.6624e-06 64.506V64.506Z" fill="#CCCCCC"/>
								<path d="M46.666 1.845V17.579C52.8016 17.5827 58.8759 18.7998 64.5394 21.1601C70.2029 23.5204 75.3437 26.9773 79.666 31.332C88.4278 40.1595 93.3423 52.0944 93.337 64.532C93.3436 76.9714 88.429 88.9082 79.666 97.737C75.3437 102.092 70.2029 105.549 64.5394 107.909C58.8759 110.269 52.8016 111.486 46.666 111.49V127.225C46.667 127.712 46.8599 128.179 47.203 128.525C47.3733 128.696 47.5759 128.832 47.799 128.925C48.0221 129.018 48.2614 129.065 48.503 129.065C65.2123 128.564 81.0625 121.546 92.664 109.51C104.305 97.4323 110.807 81.3088 110.799 64.534C110.807 47.7577 104.304 31.633 92.661 19.555C81.0595 7.5194 65.2093 0.500757 48.5 2.19342e-06C48.2584 -0.000372097 48.0191 0.0471594 47.7959 0.139848C47.5728 0.232537 47.3702 0.368543 47.2 0.540002C46.8567 0.887452 46.6647 1.35657 46.666 1.845V1.845Z" fill="#818181"/>
								<path d="M46.634 92.203C52.1137 92.2367 57.4801 90.6425 62.0527 87.6226C66.6253 84.6028 70.1983 80.2931 72.3186 75.2402C74.439 70.1872 75.0113 64.6184 73.9629 59.2398C72.9145 53.8612 70.2927 48.915 66.4298 45.0283C62.567 41.1415 57.637 38.4893 52.265 37.4078C46.8929 36.3263 41.3207 36.8642 36.2548 38.9534C31.1888 41.0426 26.8573 44.5889 23.8093 49.1428C20.7613 53.6968 19.1341 59.0532 19.134 64.533C19.1122 71.8488 21.9971 78.8736 27.1542 84.0626C32.3113 89.2516 39.3182 92.1797 46.634 92.203V92.203Z" fill="#848484"/>
							</g>
						</svg>
						<span>COLLABORATE</span>
					</a>
				</li>
				<li>
					<a href="#" data-rel="tab-6">
						<svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 130 130" fill="none">
							<g clip-path="url(#clip0_8_12)">
								<path d="M129.073 106.021C129.072 101.463 127.72 97.0073 125.187 93.2177C122.654 89.4281 119.055 86.4746 114.843 84.7307C110.632 82.9867 105.998 82.5306 101.528 83.4201C97.0571 84.3095 92.9507 86.5045 89.7276 89.7276C86.5045 92.9507 84.3095 97.0571 83.4201 101.528C82.5306 105.998 82.9867 110.632 84.7307 114.843C86.4746 119.055 89.4281 122.654 93.2177 125.187C97.0073 127.72 101.463 129.072 106.021 129.073C109.048 129.074 112.046 128.478 114.843 127.319C117.64 126.161 120.182 124.463 122.322 122.322C124.463 120.182 126.161 117.64 127.319 114.843C128.478 112.046 129.074 109.048 129.073 106.021V106.021Z" fill="#CCCCCC"/>
								<path d="M44.252 0H11.063C10.5739 0 10.1049 0.194278 9.75909 0.540095C9.41327 0.885912 9.21899 1.35494 9.21899 1.844V53.472C9.21899 53.9611 9.41327 54.4301 9.75909 54.7759C10.1049 55.1217 10.5739 55.316 11.063 55.316H44.252C44.7411 55.316 45.2101 55.1217 45.5559 54.7759C45.9017 54.4301 46.096 53.9611 46.096 53.472V1.844C46.096 1.35494 45.9017 0.885912 45.5559 0.540095C45.2101 0.194278 44.7411 0 44.252 0V0Z" fill="#CCCCCC"/>
								<path d="M119.85 9.21899H84.817C84.328 9.21899 83.8589 9.41327 83.5131 9.75909C83.1673 10.1049 82.973 10.5739 82.973 11.063V18.438H108.787C109.029 18.438 109.269 18.4857 109.493 18.5784C109.716 18.671 109.92 18.8069 110.091 18.9781C110.262 19.1493 110.398 19.3526 110.491 19.5763C110.583 19.8 110.631 20.0398 110.631 20.282V46.096H119.85C120.092 46.096 120.332 46.0483 120.556 45.9556C120.779 45.863 120.983 45.7271 121.154 45.5559C121.325 45.3847 121.461 45.1814 121.554 44.9577C121.646 44.7339 121.694 44.4942 121.694 44.252V11.063C121.694 10.8208 121.646 10.5811 121.554 10.3573C121.461 10.1336 121.325 9.93032 121.154 9.75909C120.983 9.58786 120.779 9.45203 120.556 9.35936C120.332 9.26669 120.092 9.21899 119.85 9.21899V9.21899Z" fill="#7F7F7F"/>
								<path d="M18.439 82.973H1.844C1.35495 82.973 0.885917 83.1673 0.540099 83.5131C0.194282 83.8589 4.33879e-06 84.3279 4.33879e-06 84.817V127.225C-0.00052168 127.467 0.0467866 127.708 0.139221 127.932C0.231655 128.156 0.3674 128.36 0.538683 128.531C0.709967 128.703 0.913425 128.839 1.13741 128.932C1.3614 129.025 1.60151 129.073 1.844 129.073H44.252C44.4948 129.074 44.7354 129.026 44.9598 128.933C45.1843 128.841 45.3882 128.705 45.5599 128.533C45.7316 128.361 45.8677 128.157 45.9604 127.933C46.0531 127.708 46.1005 127.468 46.1 127.225V110.631H20.282C20.0398 110.631 19.8001 110.583 19.5763 110.491C19.3526 110.398 19.1493 110.262 18.9781 110.091C18.8069 109.92 18.671 109.716 18.5784 109.493C18.4857 109.269 18.438 109.029 18.438 108.787L18.439 82.973Z" fill="#878787"/>
								<path d="M27.658 29.501V99.567C27.658 100.056 27.8523 100.525 28.1981 100.871C28.5439 101.217 29.013 101.411 29.502 101.411H99.568C100.057 101.411 100.526 101.217 100.872 100.871C101.218 100.525 101.412 100.056 101.412 99.567V29.501C101.412 29.0119 101.218 28.5429 100.872 28.1971C100.526 27.8513 100.057 27.657 99.568 27.657H29.502C29.013 27.657 28.5439 27.8513 28.1981 28.1971C27.8523 28.5429 27.658 29.0119 27.658 29.501V29.501ZM77.801 78.215C58.21 92.837 36.232 70.84 50.858 51.267C50.9724 51.1066 51.1126 50.9663 51.273 50.852C70.858 36.231 92.838 58.228 78.216 77.8C78.1017 77.9605 77.9615 78.1007 77.801 78.215V78.215Z" fill="#848484"/>
							</g>
						</svg>
						<span>ACT</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="tab-main-box">
			<div class="tab-box" id="tab-1" style="display:block;">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79351.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
			<div class="tab-box" id="tab-2">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79514.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
			<div class="tab-box" id="tab-3">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79515.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
			<div class="tab-box" id="tab-4">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79516.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
			<div class="tab-box" id="tab-5">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79517.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
			<div class="tab-box" id="tab-6">
				<div class="tab-box-inner">
					<div class="tab-box-image">
						<img src="/wp-content/uploads/2022/02/Group-79335.svg"/>
					</div>
					<div class="tab-box-content">
						<h2>Access data from any source in place.</h2>
						<p>Pyramid’s leading data and querying architecture unlocks data access, performance, and speed
							without the need to migrate data sources into a separate or duplicate data stack.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode('tabcontent', 'tab_content_function');

function hubspot_form_output_function()
{
	ob_start();
	?>
	<!--[if lte IE 8]>
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
	<![endif]-->
	<script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
	<script>
		hbspt.forms.create( {
			region: 'na1',
			portalId: '5413265',
			formId: 'b933c254-2abf-42cd-ab13-af15d0dc0ee2'
		} );
	</script>

	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode('hubstafform', 'hubspot_form_output_function');

function generate_promo_bar( $atts ) {
	// Default parameters.
	$atts = shortcode_atts( array(
		'heading'      => '',
		'button-title' => '',
		'href'         => '',
	), $atts, 'promo-bar' );

	$heading    = $atts['heading'];
	$link_title = $atts['button-title'];
	$href       = $atts['href'];

	ob_start();
	?>

	<div class="cta-block my-5">
		<div class="row align-items-center">
			<?php if ( ! ( empty( $heading ) ) ): ?>
				<div class="col-12 col-md-9">
					<h3><?php esc_html_e( $heading ) ?></h3>
				</div>
			<?php endif; ?>
			<?php if ( ! ( empty( $href ) ) ): ?>
				<div class="col-12 col-md-3">
					<a href="<?php echo esc_url( $href ); ?>" class="link_more text-light">
						<?php esc_html_e( $link_title ); ?><i class="icon-arrow-link"></i>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}

add_shortcode( 'promo-bar', 'generate_promo_bar' );