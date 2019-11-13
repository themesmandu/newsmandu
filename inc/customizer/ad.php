<?php
/**
 * Newsmandu-Magazine Theme Customizer for advertisment.
 *
 * @package Newsmandu
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
				'label'       => __( 'Advertisement Area For Header Section', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage header section.', 'newsmandu-magazine' ),
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
				'label'       => __( 'Advertisement Area For Featured Section', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage featured section.', 'newsmandu-magazine' ),
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
				'label'       => __( 'Advertisement Area For Top Stories Section', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage top stories section.', 'newsmandu-magazine' ),
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
				'label'       => __( 'Advertisement Area Blog Page', 'newsmandu-magazine' ),
				'description' => __( 'Enter your adverstisement script hear, which will display at frontpage blog area.', 'newsmandu-magazine' ),
				'section'     => 'ad_section',
				'type'        => 'textarea',
			)
		)
	);

