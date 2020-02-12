<?php
/**
 * Newsmandu Theme Customizer for skip link in header section.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */


// Setting toggle section.
$wp_customize->add_setting(
	'skip_blog_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'skip_blog_toggle',
		array(
			'label'   => esc_html__( 'Show Skip Links In Blog', 'newsmandu-magazine' ),
			'section' => 'general_options',
		)
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'skip_archive_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'skip_archive_toggle',
		array(
			'label'   => esc_html__( 'Show Skip Links In Archive', 'newsmandu-magazine' ),
			'section' => 'general_options',
		)
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'skip_frontpage_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'skip_frontpage_toggle',
		array(
			'label'   => esc_html__( 'Show Skip Links In Front Page', 'newsmandu-magazine' ),
			'section' => 'general_options',
		)
	)
);
// Setting toggle section.
$wp_customize->add_setting(
	'skip_single_toggle',
	array(
		'default'           => 0,
		'sanitize_callback' => 'newsmandu_magazine_switch_sanitize',
	)
);

$wp_customize->add_control(
	new Newsmandu_Magazine_Toggle_Switch_Custom_Control(
		$wp_customize,
		'skip_single_toggle',
		array(
			'label'   => esc_html__( 'Show Skip Links In Single', 'newsmandu-magazine' ),
			'section' => 'general_options',
		)
	)
);
