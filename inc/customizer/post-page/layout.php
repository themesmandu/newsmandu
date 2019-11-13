<?php
/**
 * Newsmandu-Magazine Theme Customizer for blog post layout.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu-Magazine
 */

	$wp_customize->add_setting(
		'blog_layout',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'Newsmandu-Magazine_sanitize_blog_layout',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_layout',
			array(
				'label'    => __( 'Layout Style', 'Newsmandu-Magazine-magazine' ),
				'section'  => 'blog_options',
				'settings' => 'blog_layout',
				'type'     => 'select',
				'choices'  => array(
					'list'     => esc_html__( 'List', 'Newsmandu-Magazine-magazine' ),
					'standard' => esc_html__( 'Standard', 'Newsmandu-Magazine-magazine' ),
				),
				'priority' => '15',
			)
		)
	);
