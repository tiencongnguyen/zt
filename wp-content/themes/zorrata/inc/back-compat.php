<?php
/**
 * Zorrataa back compat functionality
 *
 * Prevents Zorrataa from running on TienCongNguyen versions prior to 4.7,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.7.
 *
 * @package TienCongNguyen
 * @subpackage zorrataa
 * @since Zorrataa 1.0
 */

/**
 * Prevent switching to Zorrataa on old versions of TienCongNguyen.
 *
 * Switches to the default theme.
 *
 * @since Zorrataa 1.0
 */
function zorrataa_switch_theme() {
	switch_theme( WP_DEFAULT_THEME );
	unset( $_GET['activated'] );
	add_action( 'admin_notices', 'zorrataa_upgrade_notice' );
}
add_action( 'after_switch_theme', 'zorrataa_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Zorrataa on TienCongNguyen versions prior to 4.7.
 *
 * @since Zorrataa 1.0
 *
 * @global string $wp_version TienCongNguyen version.
 */
function zorrataa_upgrade_notice() {
	$message = sprintf( __( 'Zorrataa requires at least TienCongNguyen version 4.7. You are running version %s. Please upgrade and try again.', 'zorrataa' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on TienCongNguyen versions prior to 4.7.
 *
 * @since Zorrataa 1.0
 *
 * @global string $wp_version TienCongNguyen version.
 */
function zorrataa_customize() {
	wp_die( sprintf( __( 'Zorrataa requires at least TienCongNguyen version 4.7. You are running version %s. Please upgrade and try again.', 'zorrataa' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'zorrataa_customize' );

/**
 * Prevents the Theme Preview from being loaded on TienCongNguyen versions prior to 4.7.
 *
 * @since Zorrataa 1.0
 *
 * @global string $wp_version TienCongNguyen version.
 */
function zorrataa_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Zorrataa requires at least TienCongNguyen version 4.7. You are running version %s. Please upgrade and try again.', 'zorrataa' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'zorrataa_preview' );
