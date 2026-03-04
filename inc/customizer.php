<?php
/**
 * SSMC Customizer Settings
 *
 * @package ssmc-custom
 */

function ssmc_custom_customize_register( $wp_customize ) {
	// ==========================================
	// Hero Section Panel & Settings
	// ==========================================
	$wp_customize->add_section( 'ssmc_hero_section', array(
		'title'       => __( 'Hero Section Settings', 'ssmc-custom' ),
		'description' => __( 'Customize the hero section on the homepage.', 'ssmc-custom' ),
		'priority'    => 30,
	) );

	// Hero Background Image
	$wp_customize->add_setting( 'ssmc_hero_bg_image', array(
		'default'           => 'https://images.unsplash.com/photo-1541829070764-84a5d30cb273?q=80&w=2938&auto=format&fit=crop',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ssmc_hero_bg_image', array(
		'label'    => __( 'Hero Background Image', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'settings' => 'ssmc_hero_bg_image',
	) ) );

	// Hero Top Badge Text
	$wp_customize->add_setting( 'ssmc_hero_badge_text', array(
		'default'           => 'haping the future since 1980',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_badge_text', array(
		'label'    => __( 'Top Badge Text', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'text',
	) );

	// Hero Headline Part 1 (White)
	$wp_customize->add_setting( 'ssmc_hero_headline_1', array(
		'default'           => 'Empowering',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_headline_1', array(
		'label'    => __( 'Headline (First Part - White)', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'text',
	) );

	// Hero Headline Part 2 (Gradient)
	$wp_customize->add_setting( 'ssmc_hero_headline_2', array(
		'default'           => 'Chitwan\'s Future',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_headline_2', array(
		'label'    => __( 'Headline (Second Part - Gradient)', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'text',
	) );

	// Hero Description
	$wp_customize->add_setting( 'ssmc_hero_description', array(
		'default'           => 'Established in 1980 AD, Shaheed Smriti Multiple Campus stands as a beacon of academic excellence, nurturing leaders through accessible, high-quality higher education in Nepal.',
		'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_description', array(
		'label'    => __( 'Hero Description', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'textarea',
	) );
	
	// Hero Primary Button Text
	$wp_customize->add_setting( 'ssmc_hero_btn1_text', array(
		'default'           => 'View Academic Programs',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_btn1_text', array(
		'label'    => __( 'Primary Button Text', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'text',
	) );
	
	// Hero Primary Button URL
	$wp_customize->add_setting( 'ssmc_hero_btn1_url', array(
		'default'           => '#programs',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'ssmc_hero_btn1_url', array(
		'label'    => __( 'Primary Button URL', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'url',
	) );

	// Hero Secondary Button Text
	$wp_customize->add_setting( 'ssmc_hero_btn2_text', array(
		'default'           => 'Recent Notices',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( 'ssmc_hero_btn2_text', array(
		'label'    => __( 'Secondary Button Text', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'text',
	) );
	
	// Hero Secondary Button URL
	$wp_customize->add_setting( 'ssmc_hero_btn2_url', array(
		'default'           => '#notice-board',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'ssmc_hero_btn2_url', array(
		'label'    => __( 'Secondary Button URL', 'ssmc-custom' ),
		'section'  => 'ssmc_hero_section',
		'type'     => 'url',
	) );
}
add_action( 'customize_register', 'ssmc_custom_customize_register' );
