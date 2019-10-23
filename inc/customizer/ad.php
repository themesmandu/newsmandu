<?php
/**
 * Newsmandu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'ad_setting1',
		array(
			'default'           => '',
			'sanitize_callback' => 'newsmandu_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting1',
			array(
				'label'       => __( 'Advertisement Area For Featured Section', 'newsmandu' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage featured section.', 'newsmandu' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting2',
		array(
			'default'           => '',
			'sanitize_callback' => 'newsmandu_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting2',
			array(
				'label'       => __( 'Advertisement Area For Top Stories Section', 'newsmandu' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage top stories section.', 'newsmandu' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting3',
		array(
			'default'           => '',
			'sanitize_callback' => 'newsmandu_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting3',
			array(
				'label'       => __( 'Advertisement Area Blog Page', 'newsmandu' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage blog area.', 'newsmandu' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);

