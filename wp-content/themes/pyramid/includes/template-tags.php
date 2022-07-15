<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some functionality here could be replaced by core features.
 *
 * @package Pyramid
 */

if ( ! function_exists( 'pyramid_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function pyramid_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s the date the post was published. */
			esc_html_x( 'Posted on %s', 'post date', 'pyramid' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

if ( ! function_exists( 'pyramid_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function pyramid_posted_by() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'pyramid' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'svg_icon' ) ) :
	/**
	 * Return SVG icon code linked to SVG definitions file.
	 *
	 * @param $icon
	 *
	 * @return string
	 */
	function svg_icon($icon) {
		return sprintf('<svg class="svg-icon" aria-hidden="true"><use xlink:href="#icon-%s"></use></svg>', trim($icon, "'"));
	}
endif;

if ( ! function_exists( 'load_inline_svg' ) ) :
	/**
	 * Load an inline SVG.
	 *
	 * @param string $filename  Full SVG filename, including filetype, i.e. icon.svg
	 * @param string $svg_path  Optional. Add the path to your SVG directory inside your theme.
	 */
	function load_inline_svg($filename, $svg_path = '/static/images/svg-icons/')
	{
		// Check the SVG file exists
		if (file_exists(get_stylesheet_directory() . $svg_path . $filename)) {
			// Load and return the contents of the file
			return file_get_contents(get_stylesheet_directory_uri() . $svg_path . $filename);
		}

		// Return a blank string if we can't find the file.
		return '';
	}
endif;
