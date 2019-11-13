<?php
/**
 * Newsmandu-Magazine Theme customizer Footer option.
 *
 * @package Newsmandu-Magazine
 */

$wp_customize->add_panel(
	'footer_option',
	array(
		'title'           => __( 'Footer Settings', 'Newsmandu-Magazine-magazine' ),
		'priority'        => 190,
		'active_callback' => 'Newsmandu-Magazine_set_front_page',
	)
);
// Add footer section.
$wp_customize->add_section(
	'Newsmandu-Magazine_footer_section',
	array(
		'title'       => esc_html__( 'Footer Section', 'Newsmandu-Magazine-magazine' ),
		'description' => esc_html__( 'Footer Section options.', 'Newsmandu-Magazine-magazine' ),
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
		'label'       => esc_html__( 'Footer Instagram Title', 'Newsmandu-Magazine-magazine' ),
		'description' => esc_html__( 'Enter the title for the instagram feeds ', 'Newsmandu-Magazine-magazine' ),
		'section'     => 'Newsmandu-Magazine_footer_section',
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
		'label'       => esc_html__( 'Footer Instagram Shortcode', 'Newsmandu-Magazine-magazine' ),
		'description' => esc_html__( 'Paste the shortcode of smash balloon plugin to display the instagram feeds ', 'Newsmandu-Magazine-magazine' ),
		'section'     => 'Newsmandu-Magazine_footer_section',
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
		'label'       => esc_html__( 'Footer Copyright Text', 'Newsmandu-Magazine-magazine' ),
		'description' => esc_html__( 'This text will appear before &copy; on footer copyright section', 'Newsmandu-Magazine-magazine' ),
		'section'     => 'Newsmandu-Magazine_footer_section',
		'type'        => 'textarea',
	)
);
