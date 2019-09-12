<?php
/**
 * Swiftion Portfolio: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function swiftionportfolio_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'swiftionportfolio_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'swiftionportfolio_customize_partial_blogdescription',
			)
		);
	}

	/**
	 * Primary color.
	 */
	$wp_customize->add_setting(
		'primary_color',
		array(
			'default'           => 'default',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'swiftionportfolio_sanitize_color_option',
		)
	);

	$wp_customize->add_control(
		'primary_color',
		array(
			'type'     => 'radio',
			'label'    => __( 'Primary Color', 'swiftionportfolio' ),
			'choices'  => array(
				'default' => _x( 'Default', 'primary color', 'swiftionportfolio' ),
				'custom'  => _x( 'Custom', 'primary color', 'swiftionportfolio' ),
			),
			'section'  => 'colors',
			'priority' => 5,
		)
	);

	// Add primary color hue setting and control.
	$wp_customize->add_setting(
		'primary_color_hue',
		array(
			'default'           => 199,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_color_hue',
			array(
				'description' => __( 'Apply a custom color for buttons, links, featured images, etc.', 'swiftionportfolio' ),
				'section'     => 'colors',
				'mode'        => 'hue',
			)
		)
	);

	// Add image filter setting and control.
	$wp_customize->add_setting(
		'image_filter',
		array(
			'default'           => 1,
			'sanitize_callback' => 'absint',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'image_filter',
		array(
			'label'   => __( 'Apply a filter to featured images using the primary color', 'swiftionportfolio' ),
			'section' => 'colors',
			'type'    => 'checkbox',
		)
	);

	// Add Frontpage Header Primary Title setting and control
	$wp_customize->add_setting(
		'frontpage_header_primary_title',
		array(
			'default' => 'Vinoth Kumar',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'frontpage_header_primary_title',
		array(
			'label' => 'Primary Title',
			'type' => 'text',
			'section' => 'static_front_page',
		)
	);

	// Add Frontpage Header Secondary Title setting and control
	$wp_customize->add_setting(
		'frontpage_header_secondary_title',
		array(
			'default' => 'Professional .NET/C# Web Developer',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'frontpage_header_secondary_title',
		array(
			'label' => 'Secondary Title',
			'type' => 'text',
			'section' => 'static_front_page',
		)
	);

	// Add About description setting and control
	$wp_customize->add_setting(
		'frontpage_about_description',
		array(
			'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Integer feugiat scelerisque varius morbi enim nunc faucibus a. Pellentesque habitant morbi tristique senectus et. Proin fermentum leo vel orci porta non pulvinar neque. Tellus molestie nunc non blandit massa. Viverra mauris in aliquam sem. Ac turpis egestas integer eget aliquet nibh. Felis imperdiet proin fermentum leo vel orci porta non pulvinar. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ultrices sagittis orci a scelerisque purus semper eget duis. Sed enim ut sem viverra aliquet eget sit amet. Sed viverra tellus in hac habitasse platea dictumst. Facilisis mauris sit amet massa vitae. Nec feugiat nisl pretium fusce. Iaculis eu non diam phasellus vestibulum lorem. Tristique senectus et netus et malesuada fames.',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'frontpage_about_description',
		array(
			'label' => 'About',
			'type' => 'textarea',
			'section' => 'static_front_page',
		)
	);
}
add_action( 'customize_register', 'swiftionportfolio_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function swiftionportfolio_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function swiftionportfolio_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function swiftionportfolio_customize_preview_js() {
	wp_enqueue_script( 'swiftionportfolio-customize-preview', get_theme_file_uri( '/js/customize-preview.js' ), array( 'customize-preview' ), '20181231', true );
}
add_action( 'customize_preview_init', 'swiftionportfolio_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function swiftionportfolio_panels_js() {
	wp_enqueue_script( 'swiftionportfolio-customize-controls', get_theme_file_uri( '/js/customize-controls.js' ), array(), '20181231', true );
}
add_action( 'customize_controls_enqueue_scripts', 'swiftionportfolio_panels_js' );

/**
 * Sanitize custom color choice.
 *
 * @param string $choice Whether image filter is active.
 *
 * @return string
 */
function swiftionportfolio_sanitize_color_option( $choice ) {
	$valid = array(
		'default',
		'custom',
	);

	if ( in_array( $choice, $valid, true ) ) {
		return $choice;
	}

	return 'default';
}
