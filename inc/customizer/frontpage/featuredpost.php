<?php
/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newsmandu
 */

$wp_customize->add_section(
	'featured_post',
	array(
		'title'    => __( 'Front Page Featured Area 1', 'newsmandu' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
		// setting article section post select.
for ( $i = 0; $i < 3; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_featured_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_featured_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for featured post %d', 'newsmandu' ), $j ),

				'section'     => 'featured_post',

				'input_attrs' => array(
					'posts_per_page' => -1,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}
$wp_customize->add_section(
	'featured_post_Second',
	array(
		'title'    => __( 'Front Page Featured Area 2', 'newsmandu' ),
		'panel'    => 'frontpage_options',
		'priority' => 25,
	)
);
		// setting article section post select.
for ( $i = 0; $i <= 4; $i++ ) {
	$j = $i + 1;
	$wp_customize->add_setting(
		'newsmandu_featured_second_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		new Newsmandu_Dropdown_Posts_Control(
			$wp_customize,
			'newsmandu_featured_second_post_' . $i,
			array(
				/* translators: %d: slider number */
				'label'       => sprintf( esc_html__( 'Select post for featured post %d', 'newsmandu' ), $j ),

				'section'     => 'featured_post_Second',

				'input_attrs' => array(
					'posts_per_page' => -1,
					'orderby'        => 'name',
					'order'          => 'ASC',
				),
			)
		)
	);
}

