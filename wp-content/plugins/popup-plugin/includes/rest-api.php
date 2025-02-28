<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Popup_REST_API')) {
    class Popup_REST_API {
        public function __construct() {
            add_action('rest_api_init', [$this, 'register_popup_endpoint']);
        }

        public function register_popup_endpoint() {
            register_rest_route('artistudio/v1', '/popup', [
                'methods'  => 'GET',
                'callback' => [$this, 'get_popup_data'],
                'permission_callback' => '__return_true'
            ]);
        }

        public function get_popup_data(WP_REST_Request $request) {
            $page_slug = $request->get_param('page_slug'); // Ambil slug dari request

            $args = [
                'post_type'      => 'popup',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'meta_query'     => [
                    [
                        'key'   => 'popup_page',
                        'value' => $page_slug,
                        'compare' => '='
                    ]
                ]
            ];

            $popups = get_posts($args);

            if (empty($popups)) {
                return new WP_Error('no_popups', 'Tidak ada popup ditemukan untuk halaman ini', ['status' => 404]);
            }

            $data = [];
            foreach ($popups as $popup) {
                $data[] = [
                    'id'      => $popup->ID,
                    'title'   => get_the_title($popup->ID),
                    'content' => apply_filters('the_content', $popup->post_content),
                    'page'    => get_post_meta($popup->ID, 'popup_page', true)
                ];
            }

            wp_reset_postdata();
            return rest_ensure_response($data);
        }

    }

    new Popup_REST_API();
}
?>
