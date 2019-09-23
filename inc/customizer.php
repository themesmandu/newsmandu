<?php
/**
 * Newsmandu Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Newsmandu
 */

/**
 * Register different customizer features.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsmandu_customize_register( $wp_customize ) {
	/**
	 *
	 * Add postMessage support for site title and description for the Theme Customizer.
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.navbar-brand',
				'render_callback' => 'themesmandu_starter_customize_partial_blogname',
			)
		);
	}
	/**
	 *
	 * Add settings to Colors section
	 */
	require get_template_directory() . '/inc/customizer/colors.php';
	/**
	 *
	 * Add Section
	 */
	$wp_customize->add_section(
		'general_options',
		array(
			'title'      => __( 'General Settings', 'newsmandu' ),
			'capability' => 'edit_theme_options',
			'priority'   => 160,
		)
	);
	/* Hide top menu */
	require get_template_directory() . '/inc/customizer/general/top-menu.php';
	/* Menu bar mode */
	require get_template_directory() . '/inc/customizer/general/menubar.php';
	/* Sidebar section */
	require get_template_directory() . '/inc/customizer/general/sidebar.php';
	/* Section for entering the phone no.*/
	require get_template_directory() . '/inc/customizer/general/site-detail.php';
	
	/**
	 *
	 * Add Section
	 */
	$wp_customize->add_section(
		'blog_options',
		array(
			'title'      => __( 'Posts page Settings', 'newsmandu' ),
			'capability' => 'edit_theme_options',
			'priority'   => 170,
		)
	);

	// Settings.

	$wp_customize->add_setting(
		'blog_pagination_mode',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_sanitize_blog_pagination_mode',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_pagination_mode',
			array(
				'label'    => __( 'Posts page navigation', 'newsmandu' ),
				'section'  => 'blog_options',
				'settings' => 'blog_pagination_mode',
				'type'     => 'select',
				'choices'  => array(
					'standard' => __( 'Standard', 'newsmandu' ),
					'numeric'  => __( 'Numeric', 'newsmandu' ),
				),
				'priority' => '20',
			)
		)
	);

	$wp_customize->add_setting(
		'more_link',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'more_link',
			array(
				'label'       => __( 'Read More button', 'newsmandu' ),
				'description' => __( 'Enter the button name which is a link to the full post. You can leave this blank if you want to hide the button.', 'newsmandu' ),
				'section'     => 'blog_options',
				'type'        => 'text',
			)
		)
	);

	/**
	 * Post List helper function.
	 *
	 * @param array $args posts.
	 */
	function newsmandu_post_list( $args = array() ) {
		$args       = wp_parse_args( $args, array( 'numberposts' => '-1' ) );
		$posts      = get_posts( $args );
		$output     = array();
		$output[''] = esc_html__( '&mdash; Select Post &mdash;', 'newsmandu' );
		foreach ( $posts as $post ) {
			$thetitle  = $post->post_title;
			$getlength = strlen( $thetitle );
			$thelength = 32;

			$thetitle = substr( $thetitle, 0, $thelength );
			if ( $getlength > $thelength ) {
				$thetitle .= '...';
			};
			$output[ $post->ID ] = sprintf( '%s', esc_html( $thetitle ) );
		}
		return $output;
	}

	$wp_customize->add_setting(
		'post_dropdown_setting',
		array(
			'default'           => '',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'absint',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'post_dropdown_setting',
			array(
				'label'    => __( 'Featured Post', 'newsmandu' ),
				'section'  => 'blog_options',
				'settings' => 'post_dropdown_setting',
				'type'     => 'select',
				'choices'  => newsmandu_post_list(),
				'priority' => '10',
			)
		)
	);

	$wp_customize->add_setting(
		'blog_layout',
		array(
			'default'           => 'standard',
			'type'              => 'theme_mod',
			'sanitize_callback' => 'newsmandu_sanitize_blog_layout',
			'capability'        => 'edit_theme_options',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'blog_layout',
			array(
				'label'    => __( 'Layout Style', 'newsmandu' ),
				'section'  => 'blog_options',
				'settings' => 'blog_layout',
				'type'     => 'select',
				'choices'  => array(
					'list'     => esc_html__( 'List', 'newsmandu' ),
					'standard' => esc_html__( 'Standard', 'newsmandu' ),
				),
				'priority' => '15',
			)
		)
	);

	/**
	 *
	 * Add Panel Front Page Settings
	 */
	$wp_customize->add_panel(
		'frontpage_options',
		array(
			'title'           => __( 'Front Page Settings', 'newsmandu' ),
			'priority'        => 190,
			'active_callback' => 'newsmandu_set_front_page',
		)
	);

	/**
	 *
	 * Add Section General to Panel
	 */
	$wp_customize->add_section(
		'frontpage_general',
		array(
			'title'    => __( 'General', 'newsmandu' ),
			'panel'    => 'frontpage_options',
			'priority' => 10,
		)
	);

	$wp_customize->add_setting(
		'hide_page_title',
		array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'newsmandu_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'hide_page_title',
		array(
			'type'    => 'checkbox',
			'label'   => esc_html__( 'Hide Page Title', 'newsmandu' ),
			'section' => 'frontpage_general',
		)
	);

	/**
	 *
	 * Add Section Head Banner to Panel
	 */
	require get_template_directory() . '/inc/customizer/frontpage/head-banner.php';
	/* Add Section Slider to Panel */
	require get_template_directory() . '/inc/customizer/frontpage/slider.php';
}
	// END Options.
	add_action( 'customize_register', 'newsmandu_customize_register' );

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 */
	function newsmandu_customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Sanitize the menu bar layout options.
	 *
	 * @param string $input Menu bar layout.
	 */
	function newsmandu_sanitize_menubar_mode( $input ) {
		$valid = array(
			'standard' => __( 'Standard', 'newsmandu' ),
			'alt'      => __( 'Alternative', 'newsmandu' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

	/**
	 * Sanitize the main menu drop-down mode option.
	 *
	 * @param string $input options.
	 */
	function newsmandu_sanitize_mainmenu_dropdown_mode( $input ) {
		$valid = array(
			'default'   => __( 'Default', 'newsmandu' ),
			'bootstrap' => __( 'Bootstrap', 'newsmandu' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

	/**
	 * Sanitize the sidebar position options.
	 *
	 * @param string $input Sidebar position options.
	 */
	function newsmandu_sanitize_sidebar_position( $input ) {
		$valid = array(
			'right' => __( 'Right sidebar', 'newsmandu' ),
			'left'  => __( 'Left sidebar', 'newsmandu' ),
			'none'  => __( 'No sidebar', 'newsmandu' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

	/**
	 * Sanitize the navigation mode options.
	 *
	 * @param string $input navigation mode options.
	 */
	function newsmandu_sanitize_blog_pagination_mode( $input ) {
		$valid = array(
			'standard' => __( 'Standard', 'newsmandu' ),
			'numeric'  => __( 'Numeric', 'newsmandu' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

	/**
	 * Sanitize the blog layout options.
	 *
	 * @param string $input blog layout options.
	 */
	function newsmandu_sanitize_blog_layout( $input ) {
		$valid = array(
			'list'     => esc_html__( 'List', 'newsmandu' ),
			'standard' => esc_html__( 'Standard', 'newsmandu' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		}

		return '';
	}

	/**
	 * Checkbox sanitization callback example.
	 *
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function newsmandu_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

	/**
	 *
	 * Helper function for Contextual Control
	 * Whether the static page is set to a front displays
	 * https://developer.wordpress.org/reference/classes/wp_customize_control/active_callback/
	 */
	function newsmandu_set_front_page() {
		if ( 'page' === get_option( 'show_on_front' ) ) {
			return true;
		}
	}

	/**
	 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
	 */
	function newsmandu_customize_preview_js() {
		wp_enqueue_script( 'newsmandu-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '25032018', true );
	}
	add_action( 'customize_preview_init', 'newsmandu_customize_preview_js' );

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
	 *
	 * @uses get_theme_mod()
	 * @param string $selector CSS selector.
	 * @param string $style The name of the CSS *property* to modify.
	 * @param string $mod_name The name of the 'theme_mod' option to fetch.
	 * @param string $prefix Optional. Anything that needs to be output before the CSS property.
	 * @param string $postfix Optional. Anything that needs to be output after the CSS property.
	 * @param bool   $echo Optional. Whether to print directly to the page (default: true).
	 * @return string Returns a single line of CSS with selectors and a property.
	 */
	function newsmandu_generate_css( $selector, $style, $mod_name, $prefix = '', $postfix = '', $echo = true ) {
		$return = '';
		$mod    = esc_html( get_theme_mod( $mod_name ) );
		if ( ! empty( $mod ) ) {
			$return = sprintf(
				'%s { %s:%s; }',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);
			if ( $echo ) {
				echo $return; // WPCS: XSS OK.
			}
		}
		return $return;
	}


	/**
	 * Output generated a line of CSS from customizer values in header output.
	 *
	 * @link https://codex.wordpress.org/Theme_Customization_API#Sample_Theme_Customization_Class
	 *
	 * Used by hook: 'wp_head'
	 *
	 * @see add_action('wp_head',$func)
	 */
	function newsmandu_customizer_css() {
		?>
	<!--Customizer CSS--> 
	<style type="text/css">
		<?php
			newsmandu_generate_css( '.front-page .jumbotron', 'background-color', 'banner_bg_color' );
			newsmandu_generate_css( '.navbar', 'background-color', 'menu_bar_bgcolor' );
			newsmandu_generate_css( '.navbar .navbar-nav .nav-link', 'color', 'menu_color' );
			newsmandu_generate_css( '.menu-item-has-children:after', 'color', 'menu_color' );
			newsmandu_generate_css( '.navbar .navbar-nav .nav-link:hover', 'color', 'menu_hover_color' );
			newsmandu_generate_css( '.navbar .navbar-brand, .navbar .navbar-brand:hover', 'color', 'site_title_color' );
			newsmandu_generate_css( 'body', 'color', 'main_color' );
			newsmandu_generate_css( '.entry-title, .entry-title a, .page-title', 'color', 'title_color' );
			newsmandu_generate_css( 'a', 'color', 'link_color' );
			newsmandu_generate_css( 'a:hover', 'color', 'link_hover_color' );
			newsmandu_generate_css( '.entry-footer, .entry-meta', 'color', 'meta_color' );
			newsmandu_generate_css( '.post .card-body', 'background-color', 'entry_bgcolor' );
			newsmandu_generate_css( '.post .card-footer', 'background-color', 'entry_footer_bgcolor' );
			newsmandu_generate_css( '.widget-title', 'color', 'wgt_title_color' );
			newsmandu_generate_css( '.btn', 'background-color', 'newsmandu_btn_color' );
			newsmandu_generate_css( '.btn:hover', 'background-color', 'newsmandu_btn_hover_color' );
			newsmandu_generate_css( '#footer', 'background-color', 'footer_bgcolor' );
			newsmandu_generate_css( '#footer', 'color', 'footer_color' );
		?>

	</style>
		<?php
	}
	add_action( 'wp_head', 'newsmandu_customizer_css' );
