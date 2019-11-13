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
		'standard' => __( 'Standard', 'newsmandu-magizine' ),
		'alt'      => __( 'Alternative', 'newsmandu-magizine' ),
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
		'default'   => __( 'Default', 'newsmandu-magizine' ),
		'bootstrap' => __( 'Bootstrap', 'newsmandu-magizine' ),
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
		'regular' => __( 'Regular', 'newsmandu-magizine' ),
		'fixed'   => __( 'Fixed', 'newsmandu-magizine' ),
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
		'right' => __( 'Right sidebar', 'newsmandu-magizine' ),
		'left'  => __( 'Left sidebar', 'newsmandu-magizine' ),
		'none'  => __( 'No sidebar', 'newsmandu-magizine' ),
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
		'standard' => __( 'Standard', 'newsmandu-magizine' ),
		'numeric'  => __( 'Numeric', 'newsmandu-magizine' ),
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
		'list'     => esc_html__( 'List', 'newsmandu-magizine' ),
		'standard' => esc_html__( 'Standard', 'newsmandu-magizine' ),
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

if ( ! function_exists( 'newsmandu_switch_sanitize' ) ) {
	/**
	 * Switch sanitization
	 *
	 * @param  int $input  input to be sanitized.
	 * @return int  Sanitized value
	 */
	function newsmandu_switch_sanitize( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}
/**
 * Sanitize the add to cart style mode option.
 *
 * @param string $input options.
 */
function newsmandu_sanitize_player_atc_style( $input ) {
	$valid = array(
		'dropdown' => __( 'Dropdown', 'newsmandu-magizine' ),
		'popup'    => __( 'Popup', 'newsmandu-magizine' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}
if ( ! function_exists( 'newsmandu_iframe_sanitize' ) ) {
	/**
	 * Iframe sanitization.
	 *
	 * @param  string $input    input value.
	 * @return integer  Sanitized value
	 */
	function newsmandu_iframe_sanitize( $input ) {
		return wp_kses( $input, expanded_alowed_tags() );
	}
}

