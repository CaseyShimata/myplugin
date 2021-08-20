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

if (is_admin()) {
    require_once plugin_dir_path(__FILE__ ) . 'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) . 'admin/settings-page.php';
}