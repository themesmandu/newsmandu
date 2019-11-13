<?php
/**
 * Newsmandu-Magazine Theme Customizer for advertisment.
 *
 * @package Newsmandu-Magazine
 */

	$wp_customize->add_setting(
		'ad_setting1',
		array(
			'default'           => '',
			'sanitize_callback' => 'Newsmandu-Magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting1',
			array(
				'label'       => __( 'Advertisement Area For Header Section', 'Newsmandu-Magazine-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage header section.', 'Newsmandu-Magazine-magazine' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting2',
		array(
			'default'           => '',
			'sanitize_callback' => 'Newsmandu-Magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting2',
			array(
				'label'       => __( 'Advertisement Area For Featured Section', 'Newsmandu-Magazine-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage featured section.', 'Newsmandu-Magazine-magazine' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting3',
		array(
			'default'           => '',
			'sanitize_callback' => 'Newsmandu-Magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting3',
			array(
				'label'       => __( 'Advertisement Area For Top Stories Section', 'Newsmandu-Magazine-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage top stories section.', 'Newsmandu-Magazine-magazine' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);
	$wp_customize->add_setting(
		'ad_setting4',
		array(
			'default'           => '',
			'sanitize_callback' => 'Newsmandu-Magazine_iframe_sanitize',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ad_setting4',
			array(
				'label'       => __( 'Advertisement Area Blog Page', 'Newsmandu-Magazine-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage blog area.', 'Newsmandu-Magazine-magazine' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);

