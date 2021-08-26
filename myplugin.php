<?php
/*
Plugin Name: MyPlugin
Description: Example plugin for practice.
Plugin Development", ???
Plugin URI:  https://profiles.wordpress.org/caseyshimata
Author:      Casey Shimata
Version:     1.0
Text Domain: myplugin
Domain Path: /languages
License:     GPLv2 or later
Licence URI: https://www.gnu.org/licences/gpl-2.0.txt
*/
// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function myplugin_load_textdomain() {
    load_plugin_textdomain( 'myplugin', false, plugin_dir_path( __FILE__ ) . 'languages/' );
}

function myplugin_options_default(){
    return [
        'custom_url'     => 'https://wordpress.org/',
        'custom_title'   => esc_html__('Powered by WordPress', 'myplugin'),
        'custom_style'   => 'disable',
        'custom_message' => '<p class="custom-message">' . esc_html__('My custom message', 'myplugin') . '</p>',
        'custom_footer'  => esc_html__('Special message for users', 'myplugin'),
        'custom_toolbar' => false,
        'custom_scheme'  => 'default'
    ];
}

if (is_admin()) {
    require_once plugin_dir_path(__FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-register.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-callbacks.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-validate.php';
}
require_once plugin_dir_path(__FILE__) . 'includes/core-functions.php';

add_action( 'plugins_loaded', 'myplugin_load_textdomain' );
