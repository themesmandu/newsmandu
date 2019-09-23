<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

	$wp_customize->add_setting(
		'menubar_mode',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_sanitize_menubar_mode',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'menubar_mode',
			array(
				'label'    => __( 'Main Menu Bar Mode', 'newsmandu' ),
				'section'  => 'general_options',
				'settings' => 'menubar_mode',
				'type'     => 'select',
				'choices'  => array(
					'standard' => __( 'Standard', 'newsmandu' ),
					'alt'      => __( 'Alternative', 'newsmandu' ),
				),
				'priority' => '10',
			)
		)
	);

	$wp_customize->add_setting(
		'mainmenu_dropdown_mode',
		array(
			'default'           => 'default',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_sanitize_mainmenu_dropdown_mode',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'mainmenu_dropdown_mode',
			array(
				'label'       => __( 'Main Menu: drop-down mode', 'newsmandu' ),
				'description' => __( 'Default a drop-down submenu by hover, parent link is active. Bootstrap mode: a drop-down submenu by click, the parent link is not active.', 'newsmandu' ),
				'section'     => 'general_options',
				'settings'    => 'mainmenu_dropdown_mode',
				'type'        => 'select',
				'choices'     => array(
					'default'   => __( 'Default', 'newsmandu' ),
					'bootstrap' => __( 'Bootstrap', 'newsmandu' ),
				),
				'priority'    => '10',
			)
		)
	);
