<?php
/**
 * CT Custom Theme Customizer
 *
 * @package CT_Custom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ct_custom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Add Contact Section
	$wp_customize->add_section('ct_contact_section', array(
		'title'    => __('Contact Section Content', 'ct-custom'),
		'priority' => 30,
	));

	// Contact Header
	$wp_customize->add_setting('ct_contact_header', array(
		'default'           => 'Contact',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	));

	$wp_customize->add_control('ct_contact_header', array(
		'label'    => __('Contact Header', 'ct-custom'),
		'section'  => 'ct_contact_section',
		'type'     => 'text',
	));

	// Contact Description
	$wp_customize->add_setting('ct_contact_description', array(
		'default'           => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam posuere ipsum nec velit mattis elementum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Maecenas eu placerat metus, eget placerat libero.',
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	));

	$wp_customize->add_control('ct_contact_description', array(
		'label'    => __('Contact Description', 'ct-custom'),
		'section'  => 'ct_contact_section',
		'type'     => 'textarea',
	));

	// Contact Us Header
	$wp_customize->add_setting('ct_contact_us_header', array(
		'default'           => 'Contact Us',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	));

	$wp_customize->add_control('ct_contact_us_header', array(
		'label'    => __('Contact Us Header', 'ct-custom'),
		'section'  => 'ct_contact_section',
		'type'     => 'text',
	));

	// Reach Us Header
	$wp_customize->add_setting('ct_reach_us_header', array(
		'default'           => 'Reach Us',
		'sanitize_callback' => 'sanitize_text_field',
		'transport'         => 'postMessage',
	));

	$wp_customize->add_control('ct_reach_us_header', array(
		'label'    => __('Reach Us Header', 'ct-custom'),
		'section'  => 'ct_contact_section',
		'type'     => 'text',
	));

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'ct_custom_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'ct_custom_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'ct_custom_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function ct_custom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function ct_custom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ct_custom_customize_preview_js() {
	wp_enqueue_script( 'ct-custom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'ct_custom_customize_preview_js' );
