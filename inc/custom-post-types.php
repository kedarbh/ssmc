<?php
/**
 * Custom Post Types and Taxonomies
 *
 * @package ssmc-custom
 */

function ssmc_custom_register_post_types() {

	// 1. Notices CPT
	$notice_labels = array(
		'name'                  => _x( 'Notices', 'Post Type General Name', 'ssmc-custom' ),
		'singular_name'         => _x( 'Notice', 'Post Type Singular Name', 'ssmc-custom' ),
		'menu_name'             => __( 'Notices', 'ssmc-custom' ),
		'all_items'             => __( 'All Notices', 'ssmc-custom' ),
		'add_new_item'          => __( 'Add New Notice', 'ssmc-custom' ),
		'add_new'               => __( 'Add New', 'ssmc-custom' ),
		'new_item'              => __( 'New Notice', 'ssmc-custom' ),
		'edit_item'             => __( 'Edit Notice', 'ssmc-custom' ),
		'view_item'             => __( 'View Notice', 'ssmc-custom' ),
		'search_items'          => __( 'Search Notices', 'ssmc-custom' ),
		'not_found'             => __( 'No notices found', 'ssmc-custom' ),
		'not_found_in_trash'    => __( 'No notices found in Trash', 'ssmc-custom' ),
	);
	$notice_args = array(
		'label'                 => __( 'Notice', 'ssmc-custom' ),
		'description'           => __( 'Campus Notices and Announcements', 'ssmc-custom' ),
		'labels'                => $notice_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-megaphone',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true, // Enable Gutenberg editor
	);
	register_post_type( 'notice', $notice_args );

	// 2. Programs (Academics) CPT
	$program_labels = array(
		'name'                  => _x( 'Programs', 'Post Type General Name', 'ssmc-custom' ),
		'singular_name'         => _x( 'Program', 'Post Type Singular Name', 'ssmc-custom' ),
		'menu_name'             => __( 'Programs', 'ssmc-custom' ),
		'all_items'             => __( 'All Programs', 'ssmc-custom' ),
		'add_new_item'          => __( 'Add New Program', 'ssmc-custom' ),
		'add_new'               => __( 'Add New', 'ssmc-custom' ),
		'new_item'              => __( 'New Program', 'ssmc-custom' ),
		'edit_item'             => __( 'Edit Program', 'ssmc-custom' ),
		'view_item'             => __( 'View Program', 'ssmc-custom' ),
		'search_items'          => __( 'Search Programs', 'ssmc-custom' ),
		'not_found'             => __( 'No programs found', 'ssmc-custom' ),
		'not_found_in_trash'    => __( 'No programs found in Trash', 'ssmc-custom' ),
	);
	$program_args = array(
		'label'                 => __( 'Program', 'ssmc-custom' ),
		'description'           => __( 'Academic Programs (BBS, BA, B.Ed, etc.)', 'ssmc-custom' ),
		'labels'                => $program_labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-welcome-learn-more',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'programs',
        'rewrite'               => array('slug' => 'programs'),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'program', $program_args );

	// 3. Faculty/Staff CPT
	$faculty_labels = array(
		'name'                  => _x( 'Faculty Directory', 'Post Type General Name', 'ssmc-custom' ),
		'singular_name'         => _x( 'Faculty Member', 'Post Type Singular Name', 'ssmc-custom' ),
		'menu_name'             => __( 'Faculty', 'ssmc-custom' ),
		'all_items'             => __( 'All Faculty', 'ssmc-custom' ),
		'add_new_item'          => __( 'Add New Faculty Member', 'ssmc-custom' ),
		'add_new'               => __( 'Add New', 'ssmc-custom' ),
		'new_item'              => __( 'New Faculty Member', 'ssmc-custom' ),
		'edit_item'             => __( 'Edit Faculty Member', 'ssmc-custom' ),
		'view_item'             => __( 'View Faculty Member', 'ssmc-custom' ),
		'search_items'          => __( 'Search Faculty', 'ssmc-custom' ),
		'not_found'             => __( 'No faculty members found', 'ssmc-custom' ),
		'not_found_in_trash'    => __( 'No faculty members found in Trash', 'ssmc-custom' ),
	);
	$faculty_args = array(
		'label'                 => __( 'Faculty Member', 'ssmc-custom' ),
		'description'           => __( 'Campus Faculty and Staff Directory', 'ssmc-custom' ),
		'labels'                => $faculty_labels,
		'supports'              => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 7,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'faculty',
        'rewrite'               => array('slug' => 'faculty'),
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
	);
	register_post_type( 'faculty', $faculty_args );

}
add_action( 'init', 'ssmc_custom_register_post_types', 0 );

/**
 * Register Custom Taxonomies
 */
function ssmc_custom_register_taxonomies() {

    // 1. Notice Categories (e.g., Exam, Admission, General)
    $notice_cat_labels = array(
        'name'              => _x( 'Notice Categories', 'taxonomy general name', 'ssmc-custom' ),
        'singular_name'     => _x( 'Notice Category', 'taxonomy singular name', 'ssmc-custom' ),
        'search_items'      => __( 'Search Notice Categories', 'ssmc-custom' ),
        'all_items'         => __( 'All Notice Categories', 'ssmc-custom' ),
        'parent_item'       => __( 'Parent Category', 'ssmc-custom' ),
        'parent_item_colon' => __( 'Parent Category:', 'ssmc-custom' ),
        'edit_item'         => __( 'Edit Category', 'ssmc-custom' ),
        'update_item'       => __( 'Update Category', 'ssmc-custom' ),
        'add_new_item'      => __( 'Add New Category', 'ssmc-custom' ),
        'new_item_name'     => __( 'New Category Name', 'ssmc-custom' ),
        'menu_name'         => __( 'Notice Categories', 'ssmc-custom' ),
    );

    $notice_cat_args = array(
        'hierarchical'      => true, // Like categories
        'labels'            => $notice_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'notice-category' ),
        'show_in_rest'      => true,
    );
    register_taxonomy( 'notice_category', array( 'notice' ), $notice_cat_args );

    // 2. Faculty Departments (e.g., Management, Education, Humanities)
    $department_labels = array(
        'name'              => _x( 'Departments', 'taxonomy general name', 'ssmc-custom' ),
        'singular_name'     => _x( 'Department', 'taxonomy singular name', 'ssmc-custom' ),
        'search_items'      => __( 'Search Departments', 'ssmc-custom' ),
        'all_items'         => __( 'All Departments', 'ssmc-custom' ),
        'parent_item'       => __( 'Parent Department', 'ssmc-custom' ),
        'parent_item_colon' => __( 'Parent Department:', 'ssmc-custom' ),
        'edit_item'         => __( 'Edit Department', 'ssmc-custom' ),
        'update_item'       => __( 'Update Department', 'ssmc-custom' ),
        'add_new_item'      => __( 'Add New Department', 'ssmc-custom' ),
        'new_item_name'     => __( 'New Department Name', 'ssmc-custom' ),
        'menu_name'         => __( 'Departments', 'ssmc-custom' ),
    );

    $department_args = array(
        'hierarchical'      => true,
        'labels'            => $department_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'department' ),
        'show_in_rest'      => true,
    );
    register_taxonomy( 'department', array( 'program', 'faculty' ), $department_args );
}
add_action( 'init', 'ssmc_custom_register_taxonomies', 0 );
