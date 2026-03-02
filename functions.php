<?php
/**
 * SSMC Custom Theme functions and definitions
 *
 * @package ssmc-custom
 */

if ( ! function_exists( 'ssmc_custom_setup' ) ) :
	function ssmc_custom_setup() {
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register nav menus
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'ssmc-custom' ),
			)
		);

		// HTML5 markup support
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'ssmc_custom_setup' );

/**
 * Enqueue scripts and styles.
 */
function ssmc_custom_scripts() {
	// Enqueue the main style.css for basic setup (optional, but good practice)
	wp_enqueue_style( 'ssmc-custom-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	// Enqueue compiled Tailwind CSS
	wp_enqueue_style( 'ssmc-custom-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css', array(), wp_get_theme()->get( 'Version' ) );
    
    // Enqueue Inter Font
    wp_enqueue_style( 'inter-font', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap', false );

	wp_enqueue_script(
		'ssmc-custom-navigation',
		get_template_directory_uri() . '/assets/js/navigation.js',
		array(),
		wp_get_theme()->get( 'Version' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'ssmc_custom_scripts' );

// Excerpt length and more text
function ssmc_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'ssmc_custom_excerpt_length', 999 );

function ssmc_custom_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'ssmc_custom_excerpt_more' );

/**
 * Fallback for primary menu if not assigned
 */
function ssmc_custom_primary_menu_fallback() {
    echo '<ul id="primary-menu" class="flex flex-wrap items-center gap-6 font-medium text-gray-700">';
    wp_list_pages( array(
        'title_li' => '',
        'depth'    => 1,
    ) );
    echo '</ul>';
}

/**
 * Add custom fields to nav menu items (Mega Menu Checkbox)
 */
function ssmc_custom_nav_mega_menu_field( $item_id, $item, $depth, $args ) {
    // Only show on top-level items
    if ( $depth === 0 ) {
        $is_mega = get_post_meta( $item_id, '_is_mega_menu', true );
        $hl_title = get_post_meta( $item_id, '_mega_menu_highlight_title', true );
        $hl_text = get_post_meta( $item_id, '_mega_menu_highlight_text', true );
        $hl_link_text = get_post_meta( $item_id, '_mega_menu_highlight_link_text', true );
        $hl_link_url = get_post_meta( $item_id, '_mega_menu_highlight_link_url', true );
        ?>
        <p class="field-mega-menu description description-wide">
            <label for="edit-menu-item-mega-menu-<?php echo esc_attr( $item_id ); ?>">
                <input type="checkbox" id="edit-menu-item-mega-menu-<?php echo esc_attr( $item_id ); ?>" class="code edit-menu-item-mega-menu" name="menu-item-mega-menu[<?php echo esc_attr( $item_id ); ?>]" value="1" <?php checked( $is_mega, 1 ); ?> />
                <strong><?php esc_html_e( 'Enable Mega Menu Layout', 'ssmc-custom' ); ?></strong>
            </label>
        </p>
        <div class="mega-menu-highlight-fields" style="background:#f9f9f9; padding: 10px; margin-top: 10px; border: 1px solid #ddd;">
            <p style="margin-top:0;"><strong>Highlight Panel Settings (Optional)</strong></p>
            <p class="description description-wide">
                <label for="edit-menu-item-mega-hl-title-<?php echo esc_attr( $item_id ); ?>">
                    Title<br>
                    <input type="text" id="edit-menu-item-mega-hl-title-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-mega-hl-title" name="menu-item-mega-hl-title[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $hl_title ); ?>" placeholder="e.g. Discover SSMC" />
                </label>
            </p>
            <p class="description description-wide">
                <label for="edit-menu-item-mega-hl-text-<?php echo esc_attr( $item_id ); ?>">
                    Description<br>
                    <textarea id="edit-menu-item-mega-hl-text-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-mega-hl-text" name="menu-item-mega-hl-text[<?php echo esc_attr( $item_id ); ?>]"><?php echo esc_textarea( $hl_text ); ?></textarea>
                </label>
            </p>
            <p class="description description-wide">
                <label for="edit-menu-item-mega-hl-link-text-<?php echo esc_attr( $item_id ); ?>">
                    Link Text<br>
                    <input type="text" id="edit-menu-item-mega-hl-link-text-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-mega-hl-link-text" name="menu-item-mega-hl-link-text[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $hl_link_text ); ?>" placeholder="e.g. Learn More" />
                </label>
            </p>
            <p class="description description-wide">
                <label for="edit-menu-item-mega-hl-link-url-<?php echo esc_attr( $item_id ); ?>">
                    Link URL<br>
                    <input type="text" id="edit-menu-item-mega-hl-link-url-<?php echo esc_attr( $item_id ); ?>" class="widefat edit-menu-item-mega-hl-link-url" name="menu-item-mega-hl-link-url[<?php echo esc_attr( $item_id ); ?>]" value="<?php echo esc_attr( $hl_link_url ); ?>" />
                </label>
            </p>
        </div>
        <?php
    }
}
add_action( 'wp_nav_menu_item_custom_fields', 'ssmc_custom_nav_mega_menu_field', 10, 4 );

/**
 * Save custom nav menu item fields
 */
function ssmc_custom_nav_update( $menu_id, $menu_item_db_id, $args ) {
	if ( ! current_user_can( 'edit_theme_options' ) ) {
		return;
	}

    if ( isset( $_POST['menu-item-mega-menu'][$menu_item_db_id] ) ) {
        update_post_meta( $menu_item_db_id, '_is_mega_menu', 1 );
    } else {
        delete_post_meta( $menu_item_db_id, '_is_mega_menu' );
    }

    $fields = array(
        'hl-title' => '_mega_menu_highlight_title',
        'hl-text' => '_mega_menu_highlight_text',
        'hl-link-text' => '_mega_menu_highlight_link_text',
        'hl-link-url' => '_mega_menu_highlight_link_url',
    );

    foreach ( $fields as $post_key => $meta_key ) {
        if ( isset( $_POST['menu-item-mega-' . $post_key][$menu_item_db_id] ) ) {
            $value = sanitize_text_field( $_POST['menu-item-mega-' . $post_key][$menu_item_db_id] );
            update_post_meta( $menu_item_db_id, $meta_key, $value );
        } else {
            delete_post_meta( $menu_item_db_id, $meta_key );
        }
    }
}
add_action( 'wp_update_nav_menu_item', 'ssmc_custom_nav_update', 10, 3 );

/**
 * Require Custom Post Types and Taxonomies
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Require Custom Tailwind Nav Walker
 */
require get_template_directory() . '/inc/class-tailwind-nav-walker.php';

/**
 * Require Mobile Tailwind Nav Walker
 */
require get_template_directory() . '/inc/class-mobile-nav-walker.php';
