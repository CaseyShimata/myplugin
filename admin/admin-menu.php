<?php // MyPlugin - Admin Menu

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function myplugin_add_sublevel_menu() {
    add_submenu_page(
        'options-general.php', #submenu
        'MyPlugin Settings',
        'MyPlugin',
        'manage_options',
        'myplugin',
        'myplugin_display_settings_page',
//        'dashicons-admin-generic', #menu
        null
    );
}
add_action( 'admin_menu', 'myplugin_add_sublevel_menu' );