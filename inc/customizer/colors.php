<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

$theme_colors   = array();
$theme_colors[] = array(
	'slug'      => 'menu_bar_bgcolor',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Main Menu Bar Background', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'menu_color',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Main Menu Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'menu_hover_color',
	'default'   => '#f3ca7a',
	'label'     => esc_html__( 'Main Menu Hover Color', 'themesmandu-starter' ),
	'transport' => 'refresh',
);
$theme_colors[] = array(
	'slug'      => 'site_title_color',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Site Title Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'main_color',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Main Text Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'title_color',
	'default'   => '#212529',
	'label'     => esc_html__( 'Entry/Post/Page Title Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'entry_bgcolor',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Entry Card Background', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'entry_footer_bgcolor',
	'default'   => '#ffffff',
	'label'     => esc_html__( 'Entry Card: Footer Background', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'wgt_title_color',
	'default'   => '#212529',
	'label'     => esc_html__( 'Widget Title Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'link_color',
	'default'   => '#007bff',
	'label'     => esc_html__( 'Text Link Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'link_hover_color',
	'default'   => '#0056b3',
	'label'     => esc_html__( 'Text Link Hover Color', 'themesmandu-starter' ),
	'transport' => 'refresh',
);
$theme_colors[] = array(
	'slug'      => 'meta_color',
	'default'   => '#212529',
	'label'     => esc_html__( 'Meta Text Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'themesmandu_starter_btn_color',
	'default'   => '#0062cc',
	'label'     => esc_html__( 'Newsmandu Starter Button Background Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'themesmandu_starter_btn_hover_color',
	'default'   => '#0069d9',
	'label'     => esc_html__( 'Newsmandu Starter Button Background: Hover Color', 'themesmandu-starter' ),
	'transport' => 'refresh',
);
$theme_colors[] = array(
	'slug'      => 'footer_bgcolor',
	'default'   => '#343a40',
	'label'     => esc_html__( 'Footer Background', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'footer_color',
	'default'   => '#6c757d',
	'label'     => esc_html__( 'Footer Text Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'site_info_text_color',
	'default'   => '#6c757d',
	'label'     => esc_html__( 'Site Info Text Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
$theme_colors[] = array(
	'slug'      => 'front_page_topstory_text_color',
	'default'   => '#6c757d',
	'label'     => esc_html__( 'Site Info Text Color', 'themesmandu-starter' ),
	'transport' => 'postMessage',
);
foreach ( $theme_colors as $color ) {
	$wp_customize->add_setting(
		$color['slug'],
		array(
			'default'           => $color['default'],
			'type'              => 'theme_mod', // 'option'
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => $color['transport'],
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$color['slug'],
			array(
				'label'    => $color['label'],
				'section'  => 'colors',
				'settings' => $color['slug'],
			)
		)
	);
}
