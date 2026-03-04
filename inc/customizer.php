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
        'transport'         => 'refresh', // Background image still needs refresh
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
        'transport'         => 'postMessage',
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
        'transport'         => 'postMessage',
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
        'transport'         => 'postMessage',
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
        'transport'         => 'postMessage',
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
        'transport'         => 'postMessage',
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
        'transport'         => 'postMessage',
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

	// ==========================================
	// Leadership Section
	// ==========================================
	$wp_customize->add_section( 'ssmc_leadership_section', array(
		'title'    => __( 'Leadership Settings', 'ssmc-custom' ),
		'priority' => 31,
	) );

	// Chairman
	$wp_customize->add_setting( 'ssmc_chairman_img', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ssmc_chairman_img', array(
		'label'   => __( 'Chairman Photo', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
	) ) );

	$wp_customize->add_setting( 'ssmc_chairman_name', array(
		'default'           => 'Uttam Acharya',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_chairman_name', array(
		'label'   => __( 'Chairman Name', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
	) );

	$wp_customize->add_setting( 'ssmc_chairman_quote', array(
		'default'           => '"As Chairman, my commitment is to ensure SSMC remains a top-tier institution that serves the community and empowers every student to reach their peak potential."',
		'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_chairman_quote', array(
		'label'   => __( 'Chairman Quote', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
		'type'    => 'textarea',
	) );

	// Campus Chief
	$wp_customize->add_setting( 'ssmc_chief_img', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ssmc_chief_img', array(
		'label'   => __( 'Campus Chief Photo', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
	) ) );

	$wp_customize->add_setting( 'ssmc_chief_name', array(
		'default'           => 'Dr. Dharma Datta Tiwari',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_chief_name', array(
		'label'   => __( 'Campus Chief Name', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
	) );

	$wp_customize->add_setting( 'ssmc_chief_quote', array(
		'default'           => '"Fostering an intellectually stimulating environment where local community support meets global academic standards is our core mission."',
		'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_chief_quote', array(
		'label'   => __( 'Campus Chief Quote', 'ssmc-custom' ),
		'section' => 'ssmc_leadership_section',
		'type'    => 'textarea',
	) );

	// ==========================================
	// Introduction Section
	// ==========================================
	$wp_customize->add_section( 'ssmc_intro_section', array(
		'title'    => __( 'Introduction Settings', 'ssmc-custom' ),
		'priority' => 32,
	) );

	// Intro Badge
	$wp_customize->add_setting( 'ssmc_intro_badge', array(
		'default'           => 'Welcome to SSMC',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_badge', array(
		'label'   => __( 'Intro Badge Text', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

	// Intro Title
	$wp_customize->add_setting( 'ssmc_intro_title', array(
		'default'           => 'A Legacy of Excellence in Heart of Chitwan',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_title', array(
		'label'   => __( 'Intro Title', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

	// Intro Description
	$wp_customize->add_setting( 'ssmc_intro_desc', array(
		'default'           => 'Established with the vision of providing accessible higher education, Shaheed Smriti Multiple Campus has been a cornerstone of academic growth in Chitwan for over four decades. We pride ourselves on our community-driven approach and commitment to student success.',
		'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_desc', array(
		'label'   => __( 'Intro Description', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
		'type'    => 'textarea',
	) );

	// Feature 1 Title
	$wp_customize->add_setting( 'ssmc_intro_feat1_title', array(
		'default'           => 'Community-Led',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_feat1_title', array(
		'label'   => __( 'Feature 1 Title', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

	// Feature 1 Text
	$wp_customize->add_setting( 'ssmc_intro_feat1_text', array(
		'default'           => 'Owned and operated by the community for the community.',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_feat1_text', array(
		'label'   => __( 'Feature 1 Text', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

	// Feature 2 Title
	$wp_customize->add_setting( 'ssmc_intro_feat2_title', array(
		'default'           => 'Quality Education',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_feat2_title', array(
		'label'   => __( 'Feature 2 Title', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

	// Feature 2 Text
	$wp_customize->add_setting( 'ssmc_intro_feat2_text', array(
		'default'           => 'UGC accredited institution ensuring high academic standards.',
		'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'ssmc_intro_feat2_text', array(
		'label'   => __( 'Feature 2 Text', 'ssmc-custom' ),
		'section' => 'ssmc_intro_section',
	) );

    // Intro Image
    $wp_customize->add_setting( 'ssmc_intro_img', array( 'sanitize_callback' => 'esc_url_raw' ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'ssmc_intro_img', array(
        'label'   => __( 'Introduction Image', 'ssmc-custom' ),
        'section' => 'ssmc_intro_section',
    ) ) );
}
add_action( 'customize_register', 'ssmc_custom_customize_register' );

/**
 * Enqueue JS file for Customizer dynamic preview.
 */
function ssmc_custom_customize_preview_js() {
	wp_enqueue_script( 'ssmc-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20240304', true );
}
add_action( 'customize_preview_init', 'ssmc_custom_customize_preview_js' );
