<?php
/**
 * Destination color selector
 *
 * @package Newsmandu
 */

	// Category color selector.
	$wp_customize->add_section(
		'newsmandu_category_color',
		array(
			'title'       => esc_html__( 'Category Color Select', 'newsmandu' ),
			'description' => esc_html__( 'Category Section Color Selector.', 'newsmandu' ),
			'panel'       => 'frontpage_options',
		)
	);
	// Destination color picker settings.
	$tax_args   = array(
		'hierarchical' => 0,
		'taxonomy'     => 'category',
	);
	$categories = get_categories( $tax_args );
	foreach ( $categories as $category ) {
		// Background Color.
		$wp_customize->add_setting(
			'newsmandu_theme_options[category_bg_color_' . $category->term_id . ']',
			array(
				'default'           => '#8ead10',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'category_bg_color_' . $category->term_id,
				array(
					'label'   => $category->name . ' Background Color',
					'section' => 'newsmandu_category_color',
				)
			)
		);
		// Text Color.
		$wp_customize->add_setting(
			'category_color_' . $category->term_id,
			array(
				'default'           => '#8ead10',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'category_color_' . $category->term_id,
				array(
					'label'   => $category->name . ' Text Color',
					'section' => 'newsmandu_category_color',
				)
			)
		);
	}
