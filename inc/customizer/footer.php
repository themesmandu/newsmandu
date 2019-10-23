<?php
/**
 * Newsmandu Theme customizer Footer option.
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
// setting instagram feeds text.
$wp_customize->add_setting(
	'footer_instagram_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control(
	'footer_instagram_title',
	array(
		'label'       => esc_html__( 'Footer Instagram Title', 'newsmandu' ),
		'description' => esc_html__( 'Enter the title for the instagram feeds ', 'newsmandu' ),
		'section'     => 'newsmandu_footer_section',
		'type'        => 'text',
	)
);
$wp_customize->add_setting(
	'footer_instagram',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability'        => 'edit_theme_options',
	)
);
$wp_customize->add_control(
	'footer_instagram',
	array(
		'label'       => esc_html__( 'Footer Instagram Shortcode', 'newsmandu' ),
		'description' => esc_html__( 'Paste the shortcode of smash balloon plugin to display the instagram feeds ', 'newsmandu' ),
		'section'     => 'newsmandu_footer_section',
		'type'        => 'text',
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
