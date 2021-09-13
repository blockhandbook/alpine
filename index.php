<?php

/**
 * Plugin Name: Alpine
 * Plugin URI: https://github.com/WordPress/alpine
 * Description: A WordPress plugin that demonstrates how to easily add frontend interactivity with Alpinejs.
 * Version: 1.1.0
 * Author: Lee Shadle
 *
 * @package alpine
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load all translations for our plugin from the MO file.
*/
add_action( 'init', 'alpine_load_textdomain' );

function alpine_load_textdomain() {
	load_plugin_textdomain( 'alpine', false, basename( __DIR__ ) . '/languages' );
}

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * Passes translations to JavaScript.
 */
function alpine_register_block() {

	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_register_script(
		'alpine',
		plugins_url( 'build/index.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version']
	);

	wp_register_style(
		'alpine-editor',
		plugins_url( '/build/index.css', __FILE__ ),
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . '/build/index.css' )
	);

	wp_register_style(
		'alpine',
		plugins_url( '/build/style-index.css', __FILE__ ),
		array(),
		filemtime( plugin_dir_path( __FILE__ ) . '/build/style-index.css' )
	);

	register_block_type(
		'alpine/alpine',
		array(
			'style'         => 'alpine',
			'editor_style'  => 'alpine-editor',
			'editor_script' => 'alpine',
		)
	);

	if ( function_exists( 'wp_set_script_translations' ) ) {
		/**
		 * May be extended to wp_set_script_translations( 'my-handle', 'my-domain',
		 * plugin_dir_path( MY_PLUGIN ) . 'languages' ) ). For details see
		 * https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
		 */
		wp_set_script_translations( 'alpine', 'alpine' );
	}
}
add_action( 'init', 'alpine_register_block' );


function alpine_enqueue_frontend_scripts() {
	// automatically load dependencies and version
	$asset_file = include( plugin_dir_path( __FILE__ ) . 'build/frontend.asset.php');

	wp_enqueue_script(
		'-frontend',
		plugins_url( 'build/frontend.js', __FILE__ ),
		$asset_file['dependencies'],
		$asset_file['version'],
		true
	);
}
add_action( 'wp_enqueue_scripts', 'alpine_enqueue_frontend_scripts' );
