<?php
/**
 * Plugin Name: WordPress AI Assistant
 * Description: A GPT-4o integration to help improve website based on the context of the site where plugin is installed.
 * Version: 1.0
 * Author: Ali Ugurlu, @robertsreberski
 */

function wp_ai_assistant_page() {
    add_menu_page(
        __( 'WP AI Assistant', 'ai-assistant' ),
        __( 'WP AI Assistant', 'ai-assistant' ),
        'manage_options',
        'wp-ai-assistant',
        'wp_ai_assistant_page_html',
        'dashicons-admin-comments',
        6
    );
}
add_action( 'admin_menu', 'wp_ai_assistant_page' );

function wp_ai_assistant_page_html() {
    printf(
        '<div class="wrap" id="wp-ai-assistant">%s</div>',
        esc_html__( 'Loading...', 'wp-ai-assistant' )
    );
}

function wp_ai_assistant_enqueue_scripts() {

    $asset_file = plugin_dir_path( __FILE__ ) . 'build/scripts.asset.php';

    if ( ! file_exists( $asset_file ) ) {
        return;
    }

    $asset = include $asset_file;

    wp_enqueue_script(
        'wp-ai-assistant-script',
        plugins_url( 'build/scripts.js', __FILE__ ),
        $asset['dependencies'],
        $asset['version'],
        true
    );
}

add_action( 'admin_enqueue_scripts', 'wp_ai_assistant_enqueue_scripts' );