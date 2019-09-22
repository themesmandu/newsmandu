<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

/* Add dropdown post control */
require get_template_directory() . '/inc/class-newsmandu-dropdown-posts-control.php';
$wp_customize->add_section(
	'frontpage_slider',
	array(
		'title'    => __( 'Front Page slider', 'newsmandu' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
		// setting article section post select.
for ( $i = 0; $i < 4; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_slider_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_slider_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for slider %d', 'newsmandu' ), $j ),

				'section'     => 'frontpage_slider',

				'input_attrs' => array(
					'posts_per_page' => -1,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}
