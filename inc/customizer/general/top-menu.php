<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

$wp_customize->add_setting(
	'hide_top_menu',
	array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'newsmandu_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	'hide_top_menu',
	array(
		'type'    => 'checkbox',
		'label'   => esc_html__( 'Hide Top Menu', 'newsmandu' ),
		'section' => 'general_options',
	)
);
