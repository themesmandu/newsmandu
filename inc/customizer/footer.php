<?php
/**
 * Footer theme options
 *
 * @package Newsmandu
 */

$wp_customize->add_panel(
	'footer_option',
	array(
		'title'           => __( 'Footer Settings', 'newsmandu' ),
		'priority'        => 190,
		'active_callback' => 'newsmandu_set_front_page',
	)
);
// Add footer section.
$wp_customize->add_section(
	'newsmandu_footer_section',
	array(
		'title'       => esc_html__( 'Footer Section', 'newsmandu' ),
		'description' => esc_html__( 'Footer Section options.', 'newsmandu' ),
		'panel'       => 'footer_option',
	)
);
// setting footer copyright text.
$wp_customize->add_setting(
	'footer_copyright_text',
	array(
		'default'           => '',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control(
	'footer_copyright_text',
	array(
		'label'       => esc_html__( 'Footer Copyright Text', 'newsmandu' ),
		'description' => esc_html__( 'This text will appear before &copy; on footer copyright section', 'newsmandu' ),
		'section'     => 'newsmandu_footer_section',
		'type'        => 'textarea',
	)
);
