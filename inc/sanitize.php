<?php
/**
 * Sanitize functions.
 *
 * @package Newsmandu
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newsmandu_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Sanitize the menu bar layout options.
 *
 * @param string $input Menu bar layout.
 */
function newsmandu_sanitize_menubar_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'newsmandu' ),
		'alt'      => __( 'Alternative', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the main menu drop-down mode option.
 *
 * @param string $input options.
 */
function newsmandu_sanitize_mainmenu_dropdown_mode( $input ) {
	$valid = array(
		'default'   => __( 'Default', 'newsmandu' ),
		'bootstrap' => __( 'Bootstrap', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the main menu style mode option.
 *
 * @param string $input options.
 */
function newsmandu_sanitize_mainmenu_style( $input ) {
	$valid = array(
		'regular' => __( 'Regular', 'newsmandu' ),
		'fixed'   => __( 'Fixed', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the sidebar position options.
 *
 * @param string $input Sidebar position options.
 */
function newsmandu_sanitize_sidebar_position( $input ) {
	$valid = array(
		'right' => __( 'Right sidebar', 'newsmandu' ),
		'left'  => __( 'Left sidebar', 'newsmandu' ),
		'none'  => __( 'No sidebar', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the navigation mode options.
 *
 * @param string $input navigation mode options.
 */
function newsmandu_sanitize_blog_pagination_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'newsmandu' ),
		'numeric'  => __( 'Numeric', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the blog layout options.
 *
 * @param string $input blog layout options.
 */
function newsmandu_sanitize_blog_layout( $input ) {
	$valid = array(
		'list'     => esc_html__( 'List', 'newsmandu' ),
		'standard' => esc_html__( 'Standard', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function newsmandu_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Switch sanitization
 *
 * @param  string       Switch value
 * @return integer  Sanitized value
 */
if ( ! function_exists( 'newsmandu_switch_sanitize' ) ) {
	function newsmandu_switch_sanitize( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Alpha Color (Hex & RGBa) sanitization
 *
 * @param  string   Input to be sanitized
 * @return string   Sanitized input
 */
if ( ! function_exists( 'newsmandu_hex_rgba_sanitization' ) ) {
	function newsmandu_hex_rgba_sanitization( $input, $setting ) {
		if ( empty( $input ) || is_array( $input ) ) {
			return $setting->default;
		}

		if ( false === strpos( $input, 'rgba' ) ) {
			// If string doesn't start with 'rgba' then santize as hex color
			$input = sanitize_hex_color( $input );
		} else {
			// Sanitize as RGBa color
			$input = str_replace( ' ', '', $input );
			sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			$input = 'rgba(' . newsmandu_in_range( $red, 0, 255 ) . ',' . newsmandu_in_range( $green, 0, 255 ) . ',' . newsmandu_in_range( $blue, 0, 255 ) . ',' . newsmandu_in_range( $alpha, 0, 1 ) . ')';
		}
		return $input;
	}
}

/**
 * Only allow values between a certain minimum & maxmium range
 *
 * @param  number   Input to be sanitized
 * @return number   Sanitized input
 */
if ( ! function_exists( 'newsmandu_in_range' ) ) {
	function newsmandu_in_range( $input, $min, $max ) {
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}
		return $input;
	}
}


/**
 * Sanitize the add to cart style mode option.
 *
 * @param string $input options.
 */
function newsmandu_sanitize_player_atc_style( $input ) {
	$valid = array(
		'dropdown' => __( 'Dropdown', 'newsmandu' ),
		'popup'    => __( 'Popup', 'newsmandu' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}
