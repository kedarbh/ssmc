<?php
/**
 * Theme-level Security Hardening for SSMC Custom
 *
 * @package ssmc-custom
 */

/**
 * 1. Disable XML-RPC
 * XML-RPC is a common target for brute force attacks and DDoS.
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * 2. Hide WordPress Version
 * Removing the version number from the head and RSS feeds makes it harder 
 * for attackers to identify vulnerabilities.
 */
function ssmc_custom_remove_version() {
    return '';
}
add_filter('the_generator', 'ssmc_custom_remove_version');

function ssmc_custom_remove_version_strings($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
add_filter('style_loader_src', 'ssmc_custom_remove_version_strings', 9999);
add_filter('script_loader_src', 'ssmc_custom_remove_version_strings', 9999);

/**
 * 3. Disable REST API for non-authenticated users
 * Helps prevent user enumeration and data leaks.
 */
add_filter('rest_authentication_errors', function($result) {
    if (!empty($result)) {
        return $result;
    }
    if (!is_user_logged_in()) {
        return new WP_Error('rest_not_logged_in', __('Only authenticated users can access the REST API.', 'ssmc-custom'), array('status' => 401));
    }
    return $result;
});

/**
 * 4. Remove Welcome Panel from Dashboard
 */
remove_action('welcome_panel', 'wp_welcome_panel');

/**
 * 5. Remove Login Error Messages
 * Replaces detailed login errors with a generic message to prevent username fishing.
 */
function ssmc_custom_login_errors() {
    return __('Invalid login credentials. Please try again.', 'ssmc-custom');
}
add_filter('login_errors', 'ssmc_custom_login_errors');

/**
 * 6. Disable Emoji support (Small Optimization)
 */
function ssmc_custom_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('tiny_mce_plugins', 'ssmc_custom_disable_emojis_tinymce');
}
add_action('init', 'ssmc_custom_disable_emojis');

function ssmc_custom_disable_emojis_tinymce($plugins) {
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}
