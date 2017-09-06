<?php
/**
 * Zorrataa: Customizer
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zorrataa_customize_register( $wp_customize ) {
	$wp_customize->add_panel( 'theme_options', array(
		'title'    => __( 'Theme Options', 'zorrataa' ),
		'priority' => 130, // Before Additional CSS.
	) );

	// Home page
	$wp_customize->add_section( 'zorrataa-home', array(
		'title'    => __( 'Tùy chỉnh trang chủ', 'zorrataa' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );

	$wp_customize->add_setting( 'top-popular-products-desktop-image', array(
		'default'           => get_theme_file_uri ('assets/images/slide1.jpg'),
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_setting( 'top-popular-products-mobile-image', array(
		'default'           => get_theme_file_uri ('assets/images/slide1-mobile.jpg'),
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_setting( 'top-popular-products-link', array(
		'default'           => '#',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'top-popular-products-desktop-image', array(
		'label'       => __( 'Ảnh top slide cho desktop', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'top-popular-products-mobile-image', array(
		'label'       => __( 'Ảnh top slide cho mobile', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'top-popular-products-link', array(
		'label'       => __( 'Liên kết cho top slide', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );

	$wp_customize->add_setting( 'bottom-popular-products-desktop-image', array(
		'default'           => get_theme_file_uri ('assets/images/hpclimg.jpg'),
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_setting( 'bottom-popular-products-mobile-image', array(
		'default'           => get_theme_file_uri ('assets/images/hpclimg-mobile.jpg'),
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_setting( 'bottom-popular-products-link', array(
		'default'           => '#',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'bottom-popular-products-desktop-image', array(
		'label'       => __( 'Ảnh botom slide cho desktop', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'bottom-popular-products-mobile-image', array(
		'label'       => __( 'Ảnh bottom slide cho mobile', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'bottom-popular-products-link', array(
		'label'       => __( 'Liên kết cho bottom slide', 'zorrataa' ),
		'section'     => 'zorrataa-home',
		'type'        => 'text',
	) );

	// Popular products
	$wp_customize->add_section( 'zorrataa-popular-products', array(
		'title'    => __( 'Sản phẩm nổi bật', 'zorrataa' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );

	$wp_customize->add_setting( 'popular-products-title', array(
		'default'           => 'Feature products',
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_setting( 'popular-products-category', array(
		'default'           => 0,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_setting( 'popular-products-number', array(
		'default'           => 6,
		'transport'         => 'postMessage'
	) );

	$wp_customize->add_control( 'popular-products-title', array(
		'label'       => __( 'Tiêu đề sản phẩm nổi bật', 'zorrataa' ),
		'section'     => 'zorrataa-popular-products',
		'type'        => 'text',
	) );
	$wp_customize->add_control( new Category_Dropdown_Custom_Control( $wp_customize, 'popular-products-category', array(
		'label'       => __( 'Danh mục hiển thị sản phẩm nổi bật', 'zorrataa' ),
		'section'     => 'zorrataa-popular-products',
		'type'        => 'text',
	) ) );
	$wp_customize->add_control( 'popular-products-number', array(
		'label'       => __( 'Số sản phẩm nổi bật', 'zorrataa' ),
		'section'     => 'zorrataa-popular-products',
		'type'        => 'text',
	) );

	// Subscribe form
	$wp_customize->add_section( 'zorrataa-subscribe-form', array(
		'title'    => __( 'Form đăng ký theo dõi', 'zorrataa' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );

	$wp_customize->add_setting( 'subscribe-form-title', array(
		'default'           => 'Join our Mailing List',
		'transport'         => 'postMessage'
	) );
	$wp_customize->add_setting( 'subscribe-form-description', array(
		'default'           => 'Sign up to our newsletter and receive exclusive offers, invitations and latest product news.',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'subscribe-form-action', array(
		'default'           => '/',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'subscribe-form-title', array(
		'label'       => __( 'Tiêu đề', 'zorrataa' ),
		'section'     => 'zorrataa-subscribe-form',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'subscribe-form-description', array(
		'label'       => __( 'Giới thiệu', 'zorrataa' ),
		'section'     => 'zorrataa-subscribe-form',
		'type'        => 'text',
	) );
	$wp_customize->add_control( 'subscribe-form-action', array(
		'label'       => __( 'Form action', 'zorrataa' ),
		'section'     => 'zorrataa-subscribe-form',
		'type'        => 'text',
	) );

	// custom social
	$wp_customize->add_section( 'zorrataa-social', array(
		'title'    => __( 'Liên kết mạng xã hội', 'zorrataa' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'fanpage-url', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'instagram-url', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_setting( 'twitter-url', array(
		'default'           => '#',
		'transport'         => 'postMessage',
	) );

	$wp_customize->add_control( 'fanpage-url', array(
		'label'       => __( 'Facebook:', 'zorrataa' ),
		'section'     => 'zorrataa-social',
		'type'        => 'text',
		'description' => __( 'Tùy chỉnh các đường dẫn mạng xã hội phổ biến.', 'zorrataa' )
	) );
	$wp_customize->add_control( 'instagram-url', array(
		'label'       => __( 'Instagram:', 'zorrataa' ),
		'section'     => 'zorrataa-social',
		'type'        => 'text'
	) );
	$wp_customize->add_control( 'twitter-url', array(
		'label'       => __( 'Twitter:', 'zorrataa' ),
		'section'     => 'zorrataa-social',
		'type'        => 'text'
	) );

	// custom social
	$wp_customize->add_section( 'zorrataa-footer', array(
		'title'    => __( 'Tùy chỉnh Footer', 'zorrataa' ),
		'priority' => 1,
		'panel'	=> 'theme_options'
	) );
	$wp_customize->add_setting( 'footer-logo', array(
		'default'           => get_theme_file_uri('assets/images/logo_fotter.png'),
		'transport'         => 'postMessage',
	) );
	$wp_customize->add_control( 'footer-logo', array(
		'label'       => __( 'Footer logo', 'zorrataa' ),
		'section'     => 'zorrataa-footer',
		'type'        => 'text'
	) );
}
add_action( 'customize_register', 'zorrataa_customize_register' );


/**
 * Render the site title for the selective refresh partial.
 *
 * @since Zorrataa 1.0
 * @see zorrataa_customize_register()
 *
 * @return void
 */
function zorrataa_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Zorrataa 1.0
 * @see zorrataa_customize_register()
 *
 * @return void
 */
function zorrataa_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function zorrataa_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function zorrataa_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function zorrataa_customize_preview_js() {
	wp_enqueue_script( 'zorrataa-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'zorrataa_customize_preview_js' );

/**
 * Load dynamic logic for the customizer controls area.
 */
function zorrataa_panels_js() {
	wp_enqueue_script( 'zorrataa-customize-controls', get_theme_file_uri( '/assets/js/customize-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'zorrataa_panels_js' );
