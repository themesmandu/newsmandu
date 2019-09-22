<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'phone_number',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
			'capability'        => 'edit_theme_options',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'phone_number',
			array(
				'label'       => __( 'Phone Number', 'newsmandu' ),
				'description' => __( 'Enter the phone number of the site.', 'newsmandu' ),
				'section'     => 'general_options',
				'type'        => 'text',
			)
		)
	);
		/* Section for entering the email of the site.*/
		$wp_customize->add_setting(
			'contact_email',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'contact_email',
				array(
					'label'       => __( 'Email', 'newsmandu' ),
					'description' => __( 'Enter the email address of the site.', 'newsmandu' ),
					'section'     => 'general_options',
					'type'        => 'text',
				)
			)
		);
