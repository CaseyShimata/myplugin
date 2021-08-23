<?php //MyPlugin - Core Functionality

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function myplugin_custom_login_url($url){
    $options = get_option('myplugin_options', myplugin_options_default());

    if (isset($options['custom_url']) && !empty($options['custom_url'])) {
        $url = esc_url($options)['custom_url'];
    }
    return $url;
}
function myplugin_custom_login_title($title){
    $options = get_option('myplugin_options', myplugin_options_default());

    if (isset($options['custom_title']) && !empty($options['custom_title'])) {
        $title = esc_attr($options['custom_title']);
    }
    return $title;
}
function myplugin_custom_login_styles() {
    $styles = false;

    $options = get_option( 'myplugin_options', myplugin_options_default() );

    if (isset($options['custom_style']) && !empty($options['custom_style'])) {
        $styles = sanitize_text_field($options['custom_style']);
    }

    if ('enable' === $styles) {
        wp_enqueue_style( 'myplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/css/myplugin-login.css', array(), null, 'screen' );

        wp_enqueue_script( 'myplugin', plugin_dir_url( dirname( __FILE__ ) ) . 'public/js/myplugin-login.js', array(), null, true );
    }
}
function myplugin_custom_admin_footer( $message ) {
    $options = get_option( 'myplugin_options', myplugin_options_default() );

    if (isset($options['custom_footer']) && !empty($options['custom_footer'])){
        $message = sanitize_text_field($options['custom_footer']);
    }
    return $message;
}
function myplugin_custom_login_message($message){
    $options = get_option('myplugin_options', myplugin_options_default());
    if (isset($options['custom_message']) && !empty($options['custom_message'])){
        $message = wp_kses_post($options['custom_message']) . $message;
    }
    return $message;
}
function myplugin_custom_admin_toolbar() {
    $toolbar = false;
    $options = get_option( 'myplugin_options', myplugin_options_default() );

    if (isset($options['custom_toolbar']) && !empty($options['custom_toolbar'])){
        $toolbar = (bool) $options['custom_toolbar'];
    }

    if ( $toolbar ) {
        global $wp_admin_bar;

        $wp_admin_bar->remove_menu('comments');
        $wp_admin_bar->remove_menu('new-content');
    }
}
function myplugin_custom_admin_scheme( $user_id ) {
    $scheme = 'default';
    $options = get_option( 'myplugin_options', myplugin_options_default() );

    if (isset($options['custom_scheme']) && !empty($options['custom_scheme'])){
        $scheme = sanitize_text_field($options['custom_scheme']);
    }

    $args = ['ID' => $user_id, 'admin_color' => $scheme];

    wp_update_user($args);
}

add_action( 'user_register', 'myplugin_custom_admin_scheme' );
add_action('wp_before_admin_bar_render', 'myplugin_custom_admin_toolbar', 999);
add_filter('login_message', 'myplugin_custom_login_message');
add_filter( 'admin_footer_text', 'myplugin_custom_admin_footer');
add_action( 'login_enqueue_scripts', 'myplugin_custom_login_styles');
add_filter('login_headerurl','myplugin_custom_login_url');
add_filter('login_headertitle','myplugin_custom_login_title');