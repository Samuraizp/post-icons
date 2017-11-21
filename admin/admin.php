<?php
/**
 * Created by PhpStorm.
 * User: Samurai
 * Date: 21.11.2017
 * Time: 16:36
 */

function my_admin_menu() {
	add_submenu_page( 'options-general.php', 'Post icons Admin', 'Post icons',
		'manage_options', 'post-icons', 'post_icons_admin_page');

	wp_enqueue_style( 'dashicons-picker',  PICONS_PLUGIN_ADMIN_URL . '/assets/css/dashicons-picker.css', array( 'dashicons' ), '1.0', false );
	wp_enqueue_script( 'dashicons-picker', PICONS_PLUGIN_ADMIN_URL . '/assets/js/dashicons-picker.js',   array( 'jquery'    ), '1.1', true  );
	add_action( 'admin_init', 'register_post_icons_settings' );
}

add_action( 'admin_menu', 'my_admin_menu' );


function register_post_icons_settings() {
	//register our settings
	register_setting( 'my-cool-plugin-settings-group', 'new_option_name' );
	register_setting( 'my-cool-plugin-settings-group', 'post_title_icon' );
	register_setting( 'my-cool-plugin-settings-group', 'post_title_icon_position' );
}

function post_icons_admin_page() {
	require_once __DIR__ . '/includes/admin-form.php';
}
