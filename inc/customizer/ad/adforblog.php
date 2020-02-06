<?php
/**
 * Newsmandu-Magazine Theme Customizer for advertisment in blog page.
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'ad_for_blog_page',
	array(
		'title'    => __( 'Advertisement Area for Blog Page', 'newsmandu-magazine' ),
		'panel'    => 'ad_section',
		'priority' => 25,
	)
);
$wp_customize->add_setting(
	'ad_setting4',
	array(
		'default'           => '',
		'sanitize_callback' => 'newsmandu_magazine_iframe_sanitize',
	)
);

$wp_customize->add_control(
	new WP_Customize_Control(
		$wp_customize,
		'ad_setting4',
		array(
			'label'       => __( 'Advertisement Area Blog Page', 'newsmandu-magazine' ),
			'description' => __( 'Enter your adverstisement script hear, which will display at blog page area.', 'newsmandu-magazine' ),
			'section'     => 'ad_for_blog_page',
			'type'        => 'textarea',
		)
	)
);
