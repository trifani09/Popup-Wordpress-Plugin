<?php
if (!defined('ABSPATH')) {
    exit;
}

// Tambahkan menu di admin WordPress
function popup_plugin_add_admin_menu() {
    add_menu_page(
        'Popup Plugin Settings', 
        'Popup Settings', 
        'manage_options', 
        'popup-plugin-settings', 
        'popup_plugin_settings_page',
        'dashicons-welcome-widgets-menus',
        20
    );
}
add_action('admin_menu', 'popup_plugin_add_admin_menu');

// Halaman pengaturan plugin
function popup_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Popup Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('popup_plugin_options');
            do_settings_sections('popup-plugin-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Registrasi setting
function popup_plugin_settings_init() {
    register_setting('popup_plugin_options', 'popup_plugin_settings');

    add_settings_section(
        'popup_plugin_section',
        'Popup Configuration',
        null,
        'popup-plugin-settings'
    );

    add_settings_field(
        'popup_bg_color',
        'Popup Background Color',
        'popup_bg_color_callback',
        'popup-plugin-settings',
        'popup_plugin_section'
    );

    add_settings_field(
        'popup_text',
        'Popup Text',
        'popup_text_callback',
        'popup-plugin-settings',
        'popup_plugin_section'
    );

    add_settings_field(
        'popup_page_slug',
        'Popup Page Slug',
        'popup_page_slug_callback',
        'popup-plugin-settings',
        'popup_plugin_section'
    );
}
add_action('admin_init', 'popup_plugin_settings_init');

// Callback untuk input warna
function popup_bg_color_callback() {
    $options = get_option('popup_plugin_settings');
    ?>
    <input type="text" name="popup_plugin_settings[popup_bg_color]" value="<?php echo isset($options['popup_bg_color']) ? esc_attr($options['popup_bg_color']) : '#4CAF50'; ?>" class="my-color-field" data-default-color="#4CAF50">
    <?php
}

// Callback untuk input teks popup
function popup_text_callback() {
    $options = get_option('popup_plugin_settings');
    ?>
    <textarea name="popup_plugin_settings[popup_text]" rows="5" cols="50"><?php echo isset($options['popup_text']) ? esc_textarea($options['popup_text']) : 'Selamat datang di website kami!'; ?></textarea>
    <?php
}

// Tambahkan color picker
function popup_plugin_enqueue_admin_scripts($hook) {
    if ($hook !== 'toplevel_page_popup-plugin-settings') {
        return;
    }
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('popup-plugin-admin', plugin_dir_url(__FILE__) . 'popup-admin.js', array('wp-color-picker'), false, true);
}
add_action('admin_enqueue_scripts', 'popup_plugin_enqueue_admin_scripts');

function get_popup_background_color() {
    return get_option('popup_background_color', '#2ECC71'); // Warna default jika belum diubah
}

function popup_page_slug_callback() {
    $options = get_option('popup_plugin_settings');
    ?>
    <input type="text" name="popup_plugin_settings[popup_page_slug]" 
        value="<?php echo isset($options['popup_page_slug']) ? esc_attr($options['popup_page_slug']) : ''; ?>">
    <p>Masukkan slug halaman di mana popup ini akan muncul.</p>
    <?php
}

?>
