<?php
/**
 * Newsmandu Theme Customizer for blog post layout.
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'blog_layout',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_sanitize_blog_layout',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_layout',
			array(
				'label'    => __( 'Layout Style', 'newsmandu' ),
				'section'  => 'blog_options',
				'settings' => 'blog_layout',
				'type'     => 'select',
				'choices'  => array(
					'list'     => esc_html__( 'List', 'newsmandu' ),
					'standard' => esc_html__( 'Standard', 'newsmandu' ),
				),
				'priority' => '15',
			)
		)
	);
