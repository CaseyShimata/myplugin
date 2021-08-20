<?php //MyPlugin - Settings Callbacks

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function myplugin_callback_validate_options($input){
    return $input;
}

function myplugin_callback_section_login(){
    echo '<p>These settings enable you to customize the WP Login screen.</p>';
}
function myplugin_callback_section_admin(){
    echo '<p>These settings enable you to customize the WP Admin Area.</p>';
}

function myplugin_callback_field_text($args){
    //todo: add callback functionality
    echo 'This will be a text field.';
}
function myplugin_callback_field_checkbox($args){
    //todo: add callback functionality
    echo 'This will be a checkbox field.';
}
function myplugin_callback_field_radio($args){
    //todo: add callback functionality
    echo 'This will be a radio button field.';
}
function myplugin_callback_field_textarea($args){
    //todo: add callback functionality
    echo 'This will be a textarea field.';
}
function myplugin_callback_field_select($args){
    //todo: add callback functionality
    echo 'This will be a select field.';
}