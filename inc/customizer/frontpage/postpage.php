<?php
/**
 * Newsmandu Theme Customizer for post page dropdown
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'post_page_dropdown',
	array(
		'title'    => __( 'Post Page Dropdown', 'newsmandu' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
$wp_customize->add_setting(
	'newsmandu_post_page_dropdown',
	array(
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	'newsmandu_post_page_dropdown',
	array(
		'label'       => esc_html__( 'Select page for footer section heading, description and background image', 'newsmandu' ),
		'description' => esc_html__(
			'Note: Selected page\'s title, description and featured image will be used in footer section heading, description and background image',
			'newsmandu'
		),
		'section'     => 'post_page_dropdown',
		'type'        => 'dropdown-pages',
	)
);
