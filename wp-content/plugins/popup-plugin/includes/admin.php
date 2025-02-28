<?php
if (!defined('ABSPATH')) {
    exit;
}

// Tambahkan menu di dashboard admin
function popup_plugin_add_admin_menu() {
    add_menu_page(
        'Popup Settings',
        'Popup Settings',
        'manage_options',
        'popup-settings',
        'popup_plugin_settings_page',
        'dashicons-admin-generic'
    );
}
add_action('admin_menu', 'popup_plugin_add_admin_menu');

// Halaman pengaturan popup
function popup_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Popup Settings</h1>
        <form method="post" action="options.php">
            <?php settings_fields('popup_settings_group'); ?>
            <?php do_settings_sections('popup-settings'); ?>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register setting
function popup_plugin_register_settings() {
    register_setting('popup_settings_group', 'popup_background_color');

    add_settings_section('popup_settings_section', 'General Settings', null, 'popup-settings');
    add_settings_field('popup_background_color', 'Popup Background Color', 'popup_plugin_background_color_callback', 'popup-settings', 'popup_settings_section');
}
add_action('admin_init', 'popup_plugin_register_settings');

function popup_plugin_background_color_callback() {
    $color = get_option('popup_background_color', '#2ECC71'); // Warna default hijau
    echo '<input type="text" id="popup_background_color" name="popup_background_color" value="' . esc_attr($color) . '" class="popup-color-picker">';
}

?>