<?php
/*
Plugin Name: Popup Plugin
Plugin URI: http://localhost/popup-plugin
Description: Plugin untuk menampilkan popup menggunakan Custom Post Type dan REST API.
Version: 1.0
Author: Trifani Febrina Hasibuan
Author URI: http://localhost
License: GPL2
*/

if (!defined('ABSPATH')) {
    exit;
}

// Memasukkan file tambahan
require_once plugin_dir_path(__FILE__) . 'includes/PopupInterface.php';
require_once plugin_dir_path(__FILE__) . 'includes/traits/SingletonTrait.php';
require_once plugin_dir_path(__FILE__) . 'includes/cpt.php';
require_once plugin_dir_path(__FILE__) . 'includes/rest-api.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin.php';


// Fungsi untuk mendapatkan warna dari database
function get_popup_background_color() {
    return get_option('popup_background_color', '#2ECC71'); // Default jika belum diubah
}

// Enqueue scripts dan styles
function popup_plugin_enqueue_scripts() {
    wp_enqueue_script(
        'popup-plugin-js',
        plugin_dir_url(__FILE__) . 'popup-display.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('popup-plugin-js', 'popupPluginData', array(
        'api_url' => rest_url('artistudio/v1/popup'),
        'background_color' => get_popup_background_color(), // Kirim warna ke JavaScript
        'nonce' => wp_create_nonce('wp_rest') // Kirim nonce untuk validasi
    ));

    wp_enqueue_style('popup-plugin-css', plugin_dir_url(__FILE__) . 'popup-style.css');
}

add_action('wp_enqueue_scripts', 'popup_plugin_enqueue_scripts');

// Enqueue script untuk admin panel
function popup_plugin_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_popup-settings') {
        return;
    }

    wp_enqueue_script('popup-admin-js', plugin_dir_url(__FILE__) . 'popup-admin.js', array('wp-color-picker'), false, true);
    wp_enqueue_style('wp-color-picker');
}
add_action('admin_enqueue_scripts', 'popup_plugin_admin_scripts');

function popup_plugin_enqueue_styles() {
    wp_enqueue_style('popup-plugin-css', plugin_dir_url(__FILE__) . 'popup-style.css');
}
add_action('wp_enqueue_scripts', 'popup_plugin_enqueue_styles');


?>