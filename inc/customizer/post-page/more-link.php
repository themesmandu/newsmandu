<?php
/**
 * Newsmandu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'more_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'more_link',
			array(
				'label'       => __( 'Read More button', 'newsmandu' ),
				'description' => __( 'Enter the button name which is a link to the full post. You can leave this blank if you want to hide the button.', 'newsmandu' ),
				'section'     => 'blog_options',
				'type'        => 'text',
			)
		)
	);
