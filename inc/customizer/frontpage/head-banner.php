<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'frontpage_banner',
	array(
		'title'    => __( 'Head Banner', 'newsmandu' ),
		'panel'    => 'frontpage_options',
		'priority' => 20,
	)
);

// Setting.
$wp_customize->add_setting(
	'banner_title',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'banner_title',
		array(
			'label'    => __( 'Heading', 'newsmandu' ),
			'section'  => 'frontpage_banner',
			'settings' => 'banner_title',
			'type'     => 'text',
		)
	)
);

// Setting.
$wp_customize->add_setting(
	'banner_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'banner_subtitle',
		array(
			'label'    => __( 'Sub-Heading', 'newsmandu' ),
			'section'  => 'frontpage_banner',
			'settings' => 'banner_subtitle',
			'type'     => 'text',
		)
	)
);

// Setting.
$wp_customize->add_setting(
	'banner_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'banner_button_label',
		array(
			'label'    => __( 'Button Label', 'newsmandu' ),
			'section'  => 'frontpage_banner',
			'settings' => 'banner_button_label',
			'type'     => 'text',
		)
	)
);

$wp_customize->add_setting(
	'banner_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'banner_button_link',
		array(
			'label'    => __( 'Button Link', 'newsmandu' ),
			'section'  => 'frontpage_banner',
			'settings' => 'banner_button_link',
			'type'     => 'text',
		)
	)
);

// Setting.
$wp_customize->add_setting(
	'banner_bg_color',
	array(
		'default'           => '#FFF',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'banner_bg_color',
		array(
			'label'   => esc_html__( 'Background Color', 'newsmandu' ),
			'section' => 'frontpage_banner',
		)
	)
);

// Setting.
$wp_customize->add_setting(
	'banner_bg_image',
	array(
		'type'              => 'theme_mod',
		'sanitize_callback' => 'absint',
	)
);

$wp_customize->add_control(
	new WP_Customize_Cropped_Image_Control(
		$wp_customize,
		'banner_bg_image',
		array(
			'section' => 'frontpage_banner',
			'label'   => __( 'Background Image', 'newsmandu' ),
			'width'   => 1900,
			'height'  => 1080,
		)
	)
);
