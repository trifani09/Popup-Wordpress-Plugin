<?php
if (!defined('ABSPATH')) {
    exit;
}

class Popup_Custom_Post_Type {
    public function __construct() {
        add_action('init', [$this, 'register_popup_post_type']);
        add_action('add_meta_boxes', [$this, 'add_popup_meta_box']);
        add_action('save_post', [$this, 'save_popup_meta']);
    }

    // Register Custom Post Type
    public function register_popup_post_type() {
        $args = [
            'labels' => [
                'name' => 'Popups',
                'singular_name' => 'Popup',
                'menu_name' => 'Popups',
                'add_new' => 'Add New Popup',
                'add_new_item' => 'Add New Popup',
                'edit_item' => 'Edit Popup',
                'new_item' => 'New Popup',
                'view_item' => 'View Popup',
                'search_items' => 'Search Popups',
                'not_found' => 'No Popups Found',
                'not_found_in_trash' => 'No Popups Found in Trash'
            ],
            'public'             => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'supports'           => ['title', 'editor'],
            'menu_icon'          => 'dashicons-welcome-view-site',
            'show_in_rest'       => true,
            'publicly_queryable' => true,  
            'capability_type'    => 'post', 
        ];
        register_post_type('popup', $args);
    }

    // Tambahkan Custom Meta Box untuk Menentukan Halaman
    public function add_popup_meta_box() {
        add_meta_box(
            'popup_page_meta_box',
            'Popup Page Settings',
            [$this, 'render_popup_meta_box'],
            'popup',
            'side',
            'default'
        );
    }

    // Form Input untuk Memilih Halaman Pop-up
    public function render_popup_meta_box($post) {
        $popup_page = get_post_meta($post->ID, 'popup_page', true);
        ?>
        <label for="popup_page">Page Slug:</label>
        <input type="text" id="popup_page" name="popup_page" value="<?php echo esc_attr($popup_page); ?>" style="width:100%;">
        <p style="font-size: 12px; color: #777;">Masukkan slug halaman di mana pop-up ini akan muncul. Biarkan kosong untuk menampilkan di semua halaman.</p>
        <?php
    }

    // Simpan Data Meta
    public function save_popup_meta($post_id) {
        // 🔥 Cegah autosave dan validasi hak akses
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!isset($_POST['popup_page']) || !current_user_can('edit_post', $post_id)) {
            return;
        }

        update_post_meta($post_id, 'popup_page', sanitize_text_field($_POST['popup_page']));
    }
}

new Popup_Custom_Post_Type();
