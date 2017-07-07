<?php
/**
 * LiveEdu.tv Badges Custom SVG Pill Generator
 *
 * @package LctvBadges\Images
 * @version 0.0.9
 * @since 0.0.1
 */


/** Check if script is accessed directly. */
if ( basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
  exit();
}

/**
 * Return a badge in svg format.
 *
 * @since 0.0.1
 *
 * @param string $left_text  - Text to display on the left side of the button.
 * @param string $right_text - Text to display on the right side of the button.
 * @param string $color      - Hexidecimal (or other HTML acceptable color) for
 *                                right side of the button.
 * @param string $link_url   - LCTV channel page to wrap svg image as hyperlink.
 *
 * @return string An svg image.
 */
function make_badge_svg_v1( $left_text = '', $right_text = '', $color = '#4c1', $link_url = '' ) {

	$left_text = sanitize_svg_text( $left_text );
	$right_text = sanitize_svg_text( $right_text );

	$left_text_width = get_text_width( $left_text );
	$right_text_width = get_text_width( $right_text );
	$width = $left_text_width + $right_text_width + 22;
	$right_color_start = $left_text_width + 11;
	$right_color_width = $width - $left_text_width - 11;
	$left_text_start = ( $left_text_width / 2 ) + 6;
	$right_text_start = $width - ( $right_text_width / 2 ) - 6;
  $wrap_in_a = ! empty( $link_url );

	return
		'<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="' . $width . '" height="20">' .
			( ( $wrap_in_a ) ? '<a xlink:href="' . $link_url . '">' : '' ) .
			'<linearGradient id="b" x2="0" y2="100%">' .
				'<stop offset="0" stop-color="#bbb" stop-opacity=".1"/>' .
				'<stop offset="1" stop-opacity=".1"/>' .
			'</linearGradient>' .
			'<mask id="a">' .
				'<rect width="' . $width . '" height="20" rx="3" fill="#fff"/>' .
			'</mask>' .
			'<g mask="url(#a)">' .
				'<path fill="#555" d="M0 0h' . ( $width - $right_color_width ) . 'v20H0z"/>' .
				'<path fill="' . $color . '" d="M' . ( $width - $right_color_width ) . ' 0h' . $right_color_width . 'v20H' . ( $width - $right_color_width ) . 'z"/>' .
				'<path fill="url(#b)" d="M0 0h' . $width . 'v20H0z"/>' .
			'</g>' .
			'<g fill="#fff" text-anchor="middle" font-family="Verdana,DejaVu Sans,Geneva,sans-serif" font-size="11">' .
				'<text textLength="' . $left_text_width . '" lengthAdjust="spacing" x="' . $left_text_start . '" y="15" fill="#010101" fill-opacity=".3">' . $left_text . '</text>' .
				'<text textLength="' . $left_text_width . '" lengthAdjust="spacing" x="' . $left_text_start . '" y="14">' . $left_text . '</text>' .
				'<text textLength="' . $right_text_width . '" lengthAdjust="spacing" x="' . $right_text_start . '" y="15" fill="#010101" fill-opacity=".3">' . $right_text . '</text>' .
				'<text textLength="' . $right_text_width . '" lengthAdjust="spacing" x="' . $right_text_start . '" y="14">' . $right_text . '</text>' .
			'</g>' .
			( ( $wrap_in_a ) ? '</a>' : '' ) .
		'</svg>';

}

/**
 * Return a best guess for text width in pixels.
 *
 * Be sure to pass text through the sanitize_svg_text function first.
 *
 * @since 0.0.1
 *
 * @param string $svg_text Text.
 *
 * @return integer Guesstimate of text width in pixels.
 */
function get_text_width( $svg_text ) {

	$length = strlen( $svg_text );
	if ( $length < 1 ) {
		return 0;
	}

	$char_widths = array( 'a' => 7, 'b' => 7, 'c' => 6, 'd' => 7, 'e' => 7, 'f' => 4, 'g' => 7, 'h' => 7, 'i' => 3, 'j' => 4, 'k' => 7, 'l' => 3, 'm' => 11, 'n' => 7, 'o' => 7, 'p' => 7, 'q' => 7, 'r' => 5, 's' => 6, 't' => 4, 'u' => 7, 'v' => 7, 'w' => 9, 'x' => 7, 'y' => 7, 'z' => 6, 'A' => 8, 'B' => 8, 'C' => 8, 'D' => 8, 'E' => 7, 'F' => 6, 'G' => 9, 'H' => 8, 'I' => 5, 'J' => 5, 'K' => 8, 'L' => 6, 'M' => 9, 'N' => 8, 'O' => 9, 'P' => 7, 'Q' => 9, 'R' => 8, 'S' => 8, 'T' => 7, 'U' => 8, 'V' => 8, 'W' => 11, 'X' => 8, 'Y' => 7, 'Z' => 8, '0' => 7, '1' => 7, '2' => 7, '3' => 7, '4' => 7, '5' => 7, '6' => 7, '7' => 7, '8' => 7, '9' => 7, '+' => 9, '-' => 5, '<' => 9, '>' => 9, '_' => 7, '*' => 7, '@' => 11, '$' => 7, '!' => 4, ';' => 5, ',' => 4, '.' => 4, '?' => 6, '#' => 9, ':' => 5, '=' => 9, '%' => 12, '/' => 5, ' ' => 4, '(' => 5, ')' => 5, '[' => 5, ']' => 5, );

	$width = 0;
	for ( $i = 0; $i < $length; $i++ ) {
		$width += isset( $char_widths[$svg_text[$i]] ) ? $char_widths[$svg_text[$i]] : 5;
	}

	return $width;

}

/**
 * Sanitize text to allow only certain characters.
 *
 * @since 0.0.4
 *
 * @param string $svg_text Text.
 *
 * @return string Sanitized text.
 */
function sanitize_svg_text( $svg_text ) {

	return preg_replace( "@([^a-zA-Z0-9\+\-\<\>\_\*\@\$\!\;\,\.\?\#\:\=\%\/\(\)\[\]\ ]+)@Ui", "", $svg_text );

}
