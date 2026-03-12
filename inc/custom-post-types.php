<?php

/**
 * Custom Post Types and Taxonomies
 *
 * @package ssmc-custom
 */

function ssmc_custom_register_post_types()
{

    // 1. Notices CPT
    $notice_labels = array(
        'name'                  => _x('Notices', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Notice', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Notices', 'ssmc-custom'),
        'all_items'             => __('All Notices', 'ssmc-custom'),
        'add_new_item'          => __('Add New Notice', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Notice', 'ssmc-custom'),
        'edit_item'             => __('Edit Notice', 'ssmc-custom'),
        'view_item'             => __('View Notice', 'ssmc-custom'),
        'search_items'          => __('Search Notices', 'ssmc-custom'),
        'not_found'             => __('No notices found', 'ssmc-custom'),
        'not_found_in_trash'    => __('No notices found in Trash', 'ssmc-custom'),
    );
    $notice_args = array(
        'label'                 => __('Notice', 'ssmc-custom'),
        'description'           => __('Campus Notices and Announcements', 'ssmc-custom'),
        'labels'                => $notice_labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'notices',
        'rewrite'               => array('slug' => 'notice'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true, // Enable Gutenberg editor
    );
    register_post_type('notice', $notice_args);

    // 2. Programs (Academics) CPT
    $program_labels = array(
        'name'                  => _x('Programs', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Program', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Programs', 'ssmc-custom'),
        'all_items'             => __('All Programs', 'ssmc-custom'),
        'add_new_item'          => __('Add New Program', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Program', 'ssmc-custom'),
        'edit_item'             => __('Edit Program', 'ssmc-custom'),
        'view_item'             => __('View Program', 'ssmc-custom'),
        'search_items'          => __('Search Programs', 'ssmc-custom'),
        'not_found'             => __('No programs found', 'ssmc-custom'),
        'not_found_in_trash'    => __('No programs found in Trash', 'ssmc-custom'),
    );
    $program_args = array(
        'label'                 => __('Program', 'ssmc-custom'),
        'description'           => __('Academic Programs (BBS, BA, B.Ed, etc.)', 'ssmc-custom'),
        'labels'                => $program_labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
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
    register_post_type('program', $program_args);

    // 3. Faculty/Staff CPT
    $faculty_labels = array(
        'name'                  => _x('Faculty Directory', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Faculty Member', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Faculty', 'ssmc-custom'),
        'all_items'             => __('All Faculty', 'ssmc-custom'),
        'add_new_item'          => __('Add New Faculty Member', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Faculty Member', 'ssmc-custom'),
        'edit_item'             => __('Edit Faculty Member', 'ssmc-custom'),
        'view_item'             => __('View Faculty Member', 'ssmc-custom'),
        'search_items'          => __('Search Faculty', 'ssmc-custom'),
        'not_found'             => __('No faculty members found', 'ssmc-custom'),
        'not_found_in_trash'    => __('No faculty members found in Trash', 'ssmc-custom'),
    );
    $faculty_args = array(
        'label'                 => __('Faculty Member', 'ssmc-custom'),
        'description'           => __('Campus Faculty and Staff Directory', 'ssmc-custom'),
        'labels'                => $faculty_labels,
        'supports'              => array('title', 'thumbnail', 'editor', 'excerpt'),
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
    register_post_type('faculty', $faculty_args);

    // 4. Campus Cells CPT
    $cell_labels = array(
        'name'                  => _x('Campus Cells', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Cell', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Campus Cells', 'ssmc-custom'),
        'all_items'             => __('All Cells', 'ssmc-custom'),
        'add_new_item'          => __('Add New Cell', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Cell', 'ssmc-custom'),
        'edit_item'             => __('Edit Cell', 'ssmc-custom'),
        'view_item'             => __('View Cell', 'ssmc-custom'),
        'search_items'          => __('Search Cells', 'ssmc-custom'),
        'not_found'             => __('No cells found', 'ssmc-custom'),
    );
    $cell_args = array(
        'label'                 => __('Cell', 'ssmc-custom'),
        'description'           => __('Campus Cells and Management Groups', 'ssmc-custom'),
        'labels'                => $cell_labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-networking',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'cells',
        'rewrite'               => array('slug' => 'cells'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type('cell', $cell_args);

    // 5. Downloads CPT
    $download_labels = array(
        'name'                  => _x('Downloads', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Download', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Downloads', 'ssmc-custom'),
        'all_items'             => __('All Downloads', 'ssmc-custom'),
        'add_new_item'          => __('Add New Download', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Download', 'ssmc-custom'),
        'edit_item'             => __('Edit Download', 'ssmc-custom'),
        'view_item'             => __('View Download', 'ssmc-custom'),
        'search_items'          => __('Search Downloads', 'ssmc-custom'),
        'not_found'             => __('No downloads found', 'ssmc-custom'),
        'not_found_in_trash'    => __('No downloads found in Trash', 'ssmc-custom'),
    );
    $download_args = array(
        'label'                 => __('Download', 'ssmc-custom'),
        'description'           => __('Downloadable Files & Forms', 'ssmc-custom'),
        'labels'                => $download_labels,
        'supports'              => array('title', 'excerpt'), // No editor needed, just title, description, and the file meta box
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 9,
        'menu_icon'             => 'dashicons-download',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'downloads',
        'rewrite'               => array('slug' => 'downloads'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => false, // We'll use custom meta boxes for the file upload, Gutenberg might overcomplicate this simple CPT
    );
    register_post_type('download', $download_args);

    // 6. Journals CPT
    $journal_labels = array(
        'name'                  => _x('Journals', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Journal', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Journals', 'ssmc-custom'),
        'all_items'             => __('All Journals', 'ssmc-custom'),
        'add_new_item'          => __('Add New Journal Volume', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Journal', 'ssmc-custom'),
        'edit_item'             => __('Edit Journal', 'ssmc-custom'),
        'view_item'             => __('View Journal', 'ssmc-custom'),
        'search_items'          => __('Search Journals', 'ssmc-custom'),
        'not_found'             => __('No journals found', 'ssmc-custom'),
        'not_found_in_trash'    => __('No journals found in Trash', 'ssmc-custom'),
    );
    $journal_args = array(
        'label'                 => __('Journal', 'ssmc-custom'),
        'description'           => __('Academic Journals and Research Publications', 'ssmc-custom'),
        'labels'                => $journal_labels,
        'supports'              => array('title', 'thumbnail'), // Articles managed via repeater meta box
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 10,
        'menu_icon'             => 'dashicons-book-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'journals',
        'rewrite'               => array('slug' => 'journals'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => false, // Disabled Gutenberg to use our custom repeater UI clearly
    );
    register_post_type('journal', $journal_args);

    // 7. Committee Members
    $committee_labels = array(
        'name'                  => _x('Committee', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Member', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Committee', 'ssmc-custom'),
        'all_items'             => __('All Members', 'ssmc-custom'),
        'add_new_item'          => __('Add New Member', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Member', 'ssmc-custom'),
        'edit_item'             => __('Edit Member', 'ssmc-custom'),
        'update_item'           => __('Update Member', 'ssmc-custom'),
        'view_item'             => __('View Member', 'ssmc-custom'),
        'search_items'          => __('Search Member', 'ssmc-custom'),
    );
    $committee_args = array(
        'label'                 => __('Committee Member', 'ssmc-custom'),
        'labels'                => $committee_labels,
        'supports'              => array('title', 'thumbnail'), // Removed excerpt as we use custom meta roles
        'hierarchical'          => false,
        'public'                => false, // No single view needed
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-groups',
        'publicly_queryable'    => false,
    );
    register_post_type('committee_member', $committee_args);

    // 7. Committee Group Taxonomy
    $committee_group_labels = array(
        'name'                       => _x('Committee Groups', 'Taxonomy General Name', 'ssmc-custom'),
        'singular_name'              => _x('Committee Group', 'Taxonomy Singular Name', 'ssmc-custom'),
        'menu_name'                  => __('Committee Groups', 'ssmc-custom'),
        'all_items'                  => __('All Groups', 'ssmc-custom'),
        'new_item_name'              => __('New Group Name', 'ssmc-custom'),
        'add_new_item'               => __('Add New Group', 'ssmc-custom'),
        'edit_item'                  => __('Edit Group', 'ssmc-custom'),
        'update_item'                => __('Update Group', 'ssmc-custom'),
        'view_item'                  => __('View Group', 'ssmc-custom'),
        'popular_items'              => __('Popular Groups', 'ssmc-custom'),
        'search_items'               => __('Search Groups', 'ssmc-custom'),
        'add_or_remove_items'        => __('Add or remove groups', 'ssmc-custom'),
        'choose_from_most_used'      => __('Choose from the most used groups', 'ssmc-custom'),
        'not_found'                  => __('No groups found.', 'ssmc-custom'),
        'no_terms'                   => __('No groups', 'ssmc-custom'),
        'items_list_navigation'      => __('Groups list navigation', 'ssmc-custom'),
        'items_list'                 => __('Groups list', 'ssmc-custom'),
        'back_to_items'              => __('&larr; Back to groups', 'ssmc-custom'),
    );
    $committee_group_args = array(
        'labels'                     => $committee_group_labels,
        'hierarchical'               => true,
        'public'                     => false,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => false,
        'show_tagcloud'              => false,
    );
    register_taxonomy('committee_group', array('committee_member'), $committee_group_args);
    // 8. Events
    $event_labels = array(
        'name'                  => _x('Events', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Event', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Events', 'ssmc-custom'),
        'all_items'             => __('All Events', 'ssmc-custom'),
        'add_new_item'          => __('Add New Event', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Event', 'ssmc-custom'),
        'edit_item'             => __('Edit Event', 'ssmc-custom'),
        'update_item'           => __('Update Event', 'ssmc-custom'),
        'view_item'             => __('View Event', 'ssmc-custom'),
        'search_items'          => __('Search Events', 'ssmc-custom'),
    );
    $event_args = array(
        'label'                 => __('Event', 'ssmc-custom'),
        'description'           => __('Campus Events', 'ssmc-custom'),
        'labels'                => $event_labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-calendar-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'rewrite'               => array('slug' => 'events'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    register_post_type('event', $event_args);

    // 9. Publications CPT
    $publication_labels = array(
        'name'                  => _x('Publications', 'Post Type General Name', 'ssmc-custom'),
        'singular_name'         => _x('Publication', 'Post Type Singular Name', 'ssmc-custom'),
        'menu_name'             => __('Publications', 'ssmc-custom'),
        'all_items'             => __('All Publications', 'ssmc-custom'),
        'add_new_item'          => __('Add New Publication', 'ssmc-custom'),
        'add_new'               => __('Add New', 'ssmc-custom'),
        'new_item'              => __('New Publication', 'ssmc-custom'),
        'edit_item'             => __('Edit Publication', 'ssmc-custom'),
        'view_item'             => __('View Publication', 'ssmc-custom'),
        'search_items'          => __('Search Publications', 'ssmc-custom'),
        'not_found'             => __('No publications found', 'ssmc-custom'),
    );
    $publication_args = array(
        'label'                 => __('Publication', 'ssmc-custom'),
        'description'           => __('Categorized Publications & PDFs', 'ssmc-custom'),
        'labels'                => $publication_labels,
        'supports'              => array('title', 'excerpt'), // Title and short description
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 9,
        'menu_icon'             => 'dashicons-media-document',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => 'publications',
        'rewrite'               => array('slug' => 'publications'),
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'show_in_rest'          => false,
    );
    register_post_type('publication', $publication_args);
}
add_action('init', 'ssmc_custom_register_post_types', 0);

/**
 * Register Custom Taxonomies
 */
function ssmc_custom_register_taxonomies()
{

    // 1. Notice Categories (e.g., Exam, Admission, General)
    $notice_cat_labels = array(
        'name'              => _x('Notice Categories', 'taxonomy general name', 'ssmc-custom'),
        'singular_name'     => _x('Notice Category', 'taxonomy singular name', 'ssmc-custom'),
        'search_items'      => __('Search Notice Categories', 'ssmc-custom'),
        'all_items'         => __('All Notice Categories', 'ssmc-custom'),
        'parent_item'       => __('Parent Category', 'ssmc-custom'),
        'parent_item_colon' => __('Parent Category:', 'ssmc-custom'),
        'edit_item'         => __('Edit Category', 'ssmc-custom'),
        'update_item'       => __('Update Category', 'ssmc-custom'),
        'add_new_item'      => __('Add New Category', 'ssmc-custom'),
        'new_item_name'     => __('New Category Name', 'ssmc-custom'),
        'menu_name'         => __('Notice Categories', 'ssmc-custom'),
    );

    $notice_cat_args = array(
        'hierarchical'      => true, // Like categories
        'labels'            => $notice_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'notice-category'),
        'show_in_rest'      => true,
    );
    register_taxonomy('notice_category', array('notice'), $notice_cat_args);

    // 2. Academic Departments (Shared by Program and Faculty)
    $dept_labels = array(
        'name'              => _x('Departments', 'taxonomy general name', 'ssmc-custom'),
        'singular_name'     => _x('Department', 'taxonomy singular name', 'ssmc-custom'),
        'search_items'      => __('Search Departments', 'ssmc-custom'),
        'all_items'         => __('All Departments', 'ssmc-custom'),
        'parent_item'       => __('Parent Department', 'ssmc-custom'),
        'parent_item_colon' => __('Parent Department:', 'ssmc-custom'),
        'edit_item'         => __('Edit Department', 'ssmc-custom'),
        'update_item'       => __('Update Department', 'ssmc-custom'),
        'add_new_item'      => __('Add New Department', 'ssmc-custom'),
        'new_item_name'     => __('New Department Name', 'ssmc-custom'),
        'menu_name'         => __('Departments', 'ssmc-custom'),
    );

    $dept_args = array(
        'hierarchical'      => true,
        'labels'            => $dept_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true, // Ensure visibility in Appearance > Menus
        'query_var'         => true,
        'rewrite'           => array('slug' => 'department'),
        'show_in_rest'      => true,
    );
    register_taxonomy('department', array('program', 'faculty'), $dept_args);

    // Register Faculty Category Taxonomy
    $cat_labels = array(
        'name'              => _x('Faculty Categories', 'taxonomy general name', 'ssmc-custom'),
        'singular_name'     => _x('Faculty Category', 'taxonomy singular name', 'ssmc-custom'),
        'search_items'      => __('Search Categories', 'ssmc-custom'),
        'all_items'         => __('All Categories', 'ssmc-custom'),
        'edit_item'         => __('Edit Category', 'ssmc-custom'),
        'update_item'       => __('Update Category', 'ssmc-custom'),
        'add_new_item'      => __('Add New Category', 'ssmc-custom'),
        'new_item_name'     => __('New Category Name', 'ssmc-custom'),
        'menu_name'         => __('Faculty Categories', 'ssmc-custom'),
    );

    $cat_args = array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true, // Explicitly enable for menus
        'meta_box_cb'       => false, // Hide default meta box (using custom select)
        'query_var'         => true,
        'rewrite'           => array('slug' => 'faculty-category'),
        'show_in_rest'      => true,
    );

    register_taxonomy('faculty_category', array('faculty'), $cat_args);

    // 4. Program Degree Levels (e.g., Bachelors, Masters)
    $degree_labels = array(
        'name'              => _x('Degree Levels', 'taxonomy general name', 'ssmc-custom'),
        'singular_name'     => _x('Degree Level', 'taxonomy singular name', 'ssmc-custom'),
        'search_items'      => __('Search Degree Levels', 'ssmc-custom'),
        'all_items'         => __('All Degree Levels', 'ssmc-custom'),
        'parent_item'       => __('Parent Level', 'ssmc-custom'),
        'parent_item_colon' => __('Parent Level:', 'ssmc-custom'),
        'edit_item'         => __('Edit Level', 'ssmc-custom'),
        'update_item'       => __('Update Level', 'ssmc-custom'),
        'add_new_item'      => __('Add New Level', 'ssmc-custom'),
        'new_item_name'     => __('New Level Name', 'ssmc-custom'),
        'menu_name'         => __('Degree Levels', 'ssmc-custom'),
    );

    $degree_args = array(
        'hierarchical'      => true,
        'labels'            => $degree_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'degree-level'),
        'show_in_rest'      => true,
    );
    register_taxonomy('program_degree', array('program'), $degree_args);

    // 5. Publication Categories
    $pub_cat_labels = array(
        'name'              => _x('Publication Categories', 'taxonomy general name', 'ssmc-custom'),
        'singular_name'     => _x('Publication Category', 'taxonomy singular name', 'ssmc-custom'),
        'search_items'      => __('Search Categories', 'ssmc-custom'),
        'all_items'         => __('All Categories', 'ssmc-custom'),
        'parent_item'       => __('Parent Category', 'ssmc-custom'),
        'parent_item_colon' => __('Parent Category:', 'ssmc-custom'),
        'edit_item'         => __('Edit Category', 'ssmc-custom'),
        'update_item'       => __('Update Category', 'ssmc-custom'),
        'add_new_item'      => __('Add New Category', 'ssmc-custom'),
        'new_item_name'     => __('New Category Name', 'ssmc-custom'),
        'menu_name'         => __('Publication Categories', 'ssmc-custom'),
    );

    $pub_cat_args = array(
        'hierarchical'      => true,
        'labels'            => $pub_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'publication-category'),
        'show_in_rest'      => true,
    );
    register_taxonomy('publication_category', array('publication'), $pub_cat_args);
}
add_action('init', 'ssmc_custom_register_taxonomies', 0);

/**
 * Add Meta Box for Cell Members
 */
function ssmc_add_cell_members_meta_box()
{
    add_meta_box(
        'ssmc_cell_members',
        __('Cell Committee & Resource Persons', 'ssmc-custom'),
        'ssmc_cell_members_meta_box_callback',
        'cell',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'ssmc_add_cell_members_meta_box');

function ssmc_cell_members_meta_box_callback($post)
{
    // Add a nonce field so we can check for it later.
    wp_nonce_field('ssmc_cell_members_nonce', 'ssmc_cell_members_nonce_field');

    $value = get_post_meta($post->ID, '_ssmc_cell_members', true);
    if (! is_array($value)) {
        $value = array();
    }

    $faculty_query = new WP_Query(array(
        'post_type'      => 'faculty',
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ));

    echo '<div style="max-height: 200px; overflow-y: auto; padding: 10px; border: 1px solid #ddd; background: #fff;">';
    if ($faculty_query->have_posts()) {
        while ($faculty_query->have_posts()) {
            $faculty_query->the_post();
            $id = get_the_ID();
            $title = get_the_title();
            $checked = in_array($id, $value) ? 'checked' : '';
            echo '<label style="display: block; margin-bottom: 5px;">';
            echo '<input type="checkbox" name="ssmc_cell_members[]" value="' . esc_attr($id) . '" ' . $checked . '> ';
            echo esc_html($title);
            echo '</label>';
        }
        wp_reset_postdata();
    } else {
        echo '<p>' . __('No faculty members found.', 'ssmc-custom') . '</p>';
    }
    echo '</div>';
    echo '<p class="description">' . __('Select faculty members who belong to this cell.', 'ssmc-custom') . '</p>';
}

function ssmc_save_cell_members_meta_box_data($post_id)
{
    if (! isset($_POST['ssmc_cell_members_nonce_field'])) {
        return;
    }
    if (! wp_verify_nonce($_POST['ssmc_cell_members_nonce_field'], 'ssmc_cell_members_nonce')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (! current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['ssmc_cell_members']) && is_array($_POST['ssmc_cell_members'])) {
        $members = array_map('intval', $_POST['ssmc_cell_members']);
        update_post_meta($post_id, '_ssmc_cell_members', $members);
    } else {
        delete_post_meta($post_id, '_ssmc_cell_members');
    }
}
add_action('save_post', 'ssmc_save_cell_members_meta_box_data');

/**
 * Add Meta Box for Faculty Details
 */
function ssmc_add_faculty_details_meta_box()
{
    add_meta_box(
        'ssmc_faculty_details',
        __('Academic Profile & Contact Details', 'ssmc-custom'),
        'ssmc_faculty_details_meta_box_callback',
        'faculty',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ssmc_add_faculty_details_meta_box');

function ssmc_faculty_details_meta_box_callback($post)
{
    wp_nonce_field('ssmc_faculty_details_nonce', 'ssmc_faculty_details_nonce_field');

    $designation = get_post_meta($post->ID, '_ssmc_faculty_designation', true);
    $email = get_post_meta($post->ID, '_ssmc_faculty_email', true);
    $phone = get_post_meta($post->ID, '_ssmc_faculty_phone', true);
    $qualifications = get_post_meta($post->ID, '_ssmc_faculty_qualifications', true);
    
    // Coordinator Fields
    $is_coordinator = get_post_meta($post->ID, '_ssmc_faculty_is_coordinator', true);
    $coordinator_voice = get_post_meta($post->ID, '_ssmc_faculty_coordinator_voice', true);
    $coordinator_programs = get_post_meta($post->ID, '_ssmc_faculty_coordinator_programs', true) ?: array();

?>
    <div class="ssmc-meta-box-wrapper" style="padding: 10px 0;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <p>
                <label for="ssmc_faculty_designation" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Designation', 'ssmc-custom'); ?></label>
                <input type="text" id="ssmc_faculty_designation" name="ssmc_faculty_designation" value="<?php echo esc_attr($designation); ?>" class="widefat" placeholder="e.g. Associate Professor" />
            </p>
            <p>
                <label for="ssmc_faculty_category" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Staff Category', 'ssmc-custom'); ?></label>
                <select id="ssmc_faculty_category" name="ssmc_faculty_category" class="widefat">
                    <option value=""><?php _e('Select Category', 'ssmc-custom'); ?></option>
                    <?php
                    $terms = get_terms(array('taxonomy' => 'faculty_category', 'hide_empty' => false));
                    $current_terms = wp_get_object_terms($post->ID, 'faculty_category', array('fields' => 'ids'));
                    $current_cat = ! empty($current_terms) ? $current_terms[0] : '';

                    foreach ($terms as $term) {
                        printf(
                            '<option value="%d" %s>%s</option>',
                            $term->term_id,
                            selected($current_cat, $term->term_id, false),
                            esc_html($term->name)
                        );
                    }
                    ?>
                </select>
            </p>
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <p>
                <label for="ssmc_faculty_email" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Contact Email', 'ssmc-custom'); ?></label>
                <input type="email" id="ssmc_faculty_email" name="ssmc_faculty_email" value="<?php echo esc_attr($email); ?>" class="widefat" />
            </p>
            <p>
                <label for="ssmc_faculty_phone" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Phone Number', 'ssmc-custom'); ?></label>
                <input type="text" id="ssmc_faculty_phone" name="ssmc_faculty_phone" value="<?php echo esc_attr($phone); ?>" class="widefat" />
            </p>
        </div>
        <p>
            <label for="ssmc_faculty_qualifications" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Academic Qualifications (Brief)', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_faculty_qualifications" name="ssmc_faculty_qualifications" value="<?php echo esc_attr($qualifications); ?>" class="widefat" placeholder="e.g. PhD in Management, MBA (TU)" />
        </p>
        <p>
            <label for="ssmc_faculty_short_bio" style="display:block; font-weight:bold; margin-bottom:10px;"><?php _e('Short Biography / Profile Summary', 'ssmc-custom'); ?></label>
            <?php
            $content = get_post_meta($post->ID, '_ssmc_faculty_short_bio', true);
            $settings = array(
                'textarea_name' => 'ssmc_faculty_short_bio',
                'media_buttons' => false,
                'textarea_rows' => 5,
                'teeny'         => true,
                'quicktags'     => false
            );
            wp_editor($content, 'ssmcshortbioeditor', $settings);
            ?>
        </p>
        <p style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #ddd;">
            <?php $resume_url = get_post_meta($post->ID, '_ssmc_faculty_resume_pdf_url', true); ?>
            <label for="ssmc_faculty_resume_pdf_url" style="display:block; font-weight:bold; margin-bottom:10px;"><?php _e('Resume PDF (Optional)', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_faculty_resume_pdf_url" name="ssmc_faculty_resume_pdf_url" value="<?php echo esc_attr($resume_url); ?>" class="widefat" style="margin-bottom:10px;" />
            <button type="button" id="ssmc_upload_resume_button" class="button button-secondary"><?php _e('Choose PDF from Media Library', 'ssmc-custom'); ?></button>
            <p class="description"><?php _e('Upload or select a PDF file for the faculty member\'s resume.', 'ssmc-custom'); ?></p>
        </p>

        <!-- Coordinator Section -->
        <div style="margin-top: 30px; padding: 20px; background: #f8f9fa; border-left: 4px solid #0073aa; border-radius: 4px;">
            <p style="margin-top: 0;">
                <label>
                    <input type="checkbox" id="ssmc_faculty_is_coordinator" name="ssmc_faculty_is_coordinator" value="1" <?php checked($is_coordinator, '1'); ?> />
                    <strong style="font-size: 1.1em;"><?php _e('Is this faculty member a Program Coordinator?', 'ssmc-custom'); ?></strong>
                </label>
            </p>

            <div id="ssmc_coordinator_fields" style="display: <?php echo ($is_coordinator == '1') ? 'block' : 'none'; ?>; margin-top: 20px;">
                <p>
                    <label for="ssmc_faculty_coordinator_programs" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Assigned Programs', 'ssmc-custom'); ?></label>
                    <select id="ssmc_faculty_coordinator_programs" name="ssmc_faculty_coordinator_programs[]" class="widefat" multiple="multiple" style="height: 120px;">
                        <?php
                        $programs_query = new WP_Query(array(
                            'post_type'      => 'program',
                            'posts_per_page' => -1,
                            'post_status'    => 'publish',
                            'orderby'        => 'title',
                            'order'          => 'ASC'
                        ));
                        if ($programs_query->have_posts()) {
                            while ($programs_query->have_posts()) {
                                $programs_query->the_post();
                                $program_id = get_the_ID();
                                $selected = in_array($program_id, $coordinator_programs) ? 'selected="selected"' : '';
                                echo '<option value="' . esc_attr($program_id) . '" ' . $selected . '>' . esc_html(get_the_title()) . '</option>';
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<option value="">' . __('No programs available', 'ssmc-custom') . '</option>';
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e('Hold ⌘ (Mac) or Ctrl (Windows) to select multiple programs.', 'ssmc-custom'); ?></p>
                </p>

                <p style="margin-top: 20px;">
                    <label for="ssmc_faculty_coordinator_voice" style="display:block; font-weight:bold; margin-bottom:5px;"><?php _e('Coordinator Voice', 'ssmc-custom'); ?></label>
                    <textarea id="ssmc_faculty_coordinator_voice" name="ssmc_faculty_coordinator_voice" class="widefat" rows="6" placeholder="<?php _e('Write a short message (approx 250 words) from the coordinator...', 'ssmc-custom'); ?>"><?php echo esc_textarea($coordinator_voice); ?></textarea>
                    <p class="description ssmc-word-count-display"><?php _e('Recommended length: maximum 250 words. Current count: ', 'ssmc-custom'); ?> <strong id="voice_word_count">0</strong></p>
                </p>
            </div>
        </div>

    </div>
    <script>
        jQuery(document).ready(function($) {
            var resume_frame;
            $('#ssmc_upload_resume_button').on('click', function(e) {
                e.preventDefault();
                if (resume_frame) {
                    resume_frame.open();
                    return;
                }
                resume_frame = wp.media.frames.file_frame = wp.media({
                    title: '<?php _e('Select Resume PDF', 'ssmc-custom'); ?>',
                    button: {
                        text: '<?php _e('Use this file', 'ssmc-custom'); ?>'
                    },
                    library: {
                        type: 'application/pdf'
                    },
                    multiple: false
                });
                resume_frame.on('select', function() {
                    var attachment = resume_frame.state().get('selection').first().toJSON();
                    $('#ssmc_faculty_resume_pdf_url').val(attachment.url);
                });
                resume_frame.open();
            });

            // Toggle Coordinator Fields
            $('#ssmc_faculty_is_coordinator').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#ssmc_coordinator_fields').slideDown();
                } else {
                    $('#ssmc_coordinator_fields').slideUp();
                }
            });

            // Word Count for Coordinator Voice
            function updateWordCount() {
                var text = $('#ssmc_faculty_coordinator_voice').val().trim();
                var count = text ? text.split(/\s+/).length : 0;
                var $counter = $('#voice_word_count');
                $counter.text(count);
                if (count > 250) {
                    $counter.css('color', 'red');
                } else {
                    $counter.css('color', 'inherit');
                }
            }
            $('#ssmc_faculty_coordinator_voice').on('keyup change', updateWordCount);
            updateWordCount(); // Init on load

        });
    </script>
<?php
}

function ssmc_save_faculty_details_meta_box_data($post_id)
{
    if (! isset($_POST['ssmc_faculty_details_nonce_field'])) return;
    if (! wp_verify_nonce($_POST['ssmc_faculty_details_nonce_field'], 'ssmc_faculty_details_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('edit_post', $post_id)) return;

    $fields = array(
        'ssmc_faculty_designation' => '_ssmc_faculty_designation',
        'ssmc_faculty_email'       => '_ssmc_faculty_email',
        'ssmc_faculty_phone'       => '_ssmc_faculty_phone',
        'ssmc_faculty_qualifications' => '_ssmc_faculty_qualifications',
        'ssmc_faculty_short_bio'   => '_ssmc_faculty_short_bio',
    );

    foreach ($fields as $key => $meta_key) {
        if (isset($_POST[$key])) {
            $value = $_POST[$key];
            if ($key === 'ssmc_faculty_short_bio') {
                update_post_meta($post_id, $meta_key, wp_kses_post($value));
            } else {
                update_post_meta($post_id, $meta_key, sanitize_text_field($value));
            }
        }
    }

    if (isset($_POST['ssmc_faculty_resume_pdf_url'])) {
        update_post_meta($post_id, '_ssmc_faculty_resume_pdf_url', esc_url_raw($_POST['ssmc_faculty_resume_pdf_url']));
    }

    // Save Coordinator Fields
    if (isset($_POST['ssmc_faculty_is_coordinator'])) {
        update_post_meta($post_id, '_ssmc_faculty_is_coordinator', '1');
    } else {
        update_post_meta($post_id, '_ssmc_faculty_is_coordinator', '0');
    }

    if (isset($_POST['ssmc_faculty_coordinator_voice'])) {
        update_post_meta($post_id, '_ssmc_faculty_coordinator_voice', wp_kses_post($_POST['ssmc_faculty_coordinator_voice']));
    }

    if (isset($_POST['ssmc_faculty_coordinator_programs']) && is_array($_POST['ssmc_faculty_coordinator_programs'])) {
        $programs = array_map('intval', $_POST['ssmc_faculty_coordinator_programs']);
        update_post_meta($post_id, '_ssmc_faculty_coordinator_programs', $programs);
    } else {
        delete_post_meta($post_id, '_ssmc_faculty_coordinator_programs');
    }

    // Save Selection to Taxonomy
    if (isset($_POST['ssmc_faculty_category'])) {
        $cat_id = intval($_POST['ssmc_faculty_category']);
        wp_set_object_terms($post_id, $cat_id, 'faculty_category');
    }
}
add_action('save_post', 'ssmc_save_faculty_details_meta_box_data');

/**
 * Enqueue Media Scripts for Download and Faculty CPTs
 */
function ssmc_enqueue_download_media_scripts($hook)
{
    global $post_type;
    $allowed_post_types = array('download', 'faculty', 'publication');
    if (in_array($post_type, $allowed_post_types) && ('post.php' === $hook || 'post-new.php' === $hook)) {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'ssmc_enqueue_download_media_scripts');

/**
 * Add Meta Box for Download File
 */
function ssmc_add_download_file_meta_box()
{
    add_meta_box(
        'ssmc_download_file',
        __('Downloadable File', 'ssmc-custom'),
        'ssmc_download_file_meta_box_callback',
        'download',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ssmc_add_download_file_meta_box');

function ssmc_download_file_meta_box_callback($post)
{
    wp_nonce_field('ssmc_download_file_nonce', 'ssmc_download_file_nonce_field');
    $file_url = get_post_meta($post->ID, '_ssmc_download_file_url', true);
?>
    <div class="ssmc-meta-box-wrapper" style="padding: 10px 0;">
        <p>
            <label for="ssmc_download_file_url" style="display:block; font-weight:bold; margin-bottom:10px;"><?php _e('Select or Upload File', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_download_file_url" name="ssmc_download_file_url" value="<?php echo esc_attr($file_url); ?>" class="widefat" style="margin-bottom:10px;" />
            <button type="button" id="ssmc_upload_file_button" class="button button-secondary"><?php _e('Choose File from Media Library', 'ssmc-custom'); ?></button>
        </p>
        <p class="description"><?php _e('Upload the file you want users to download (PDF, Doc, Image, etc.)', 'ssmc-custom'); ?></p>
    </div>
    <script>
        jQuery(document).ready(function($) {
            var file_frame;
            $('#ssmc_upload_file_button').on('click', function(e) {
                e.preventDefault();
                if (file_frame) {
                    file_frame.open();
                    return;
                }
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: '<?php _e('Select Download File', 'ssmc-custom'); ?>',
                    button: {
                        text: '<?php _e('Use this file', 'ssmc-custom'); ?>'
                    },
                    multiple: false
                });
                file_frame.on('select', function() {
                    var attachment = file_frame.state().get('selection').first().toJSON();
                    $('#ssmc_download_file_url').val(attachment.url);
                });
                file_frame.open();
            });
        });
    </script>
<?php
}

function ssmc_save_download_file_meta_box_data($post_id)
{
    if (! isset($_POST['ssmc_download_file_nonce_field'])) return;
    if (! wp_verify_nonce($_POST['ssmc_download_file_nonce_field'], 'ssmc_download_file_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['ssmc_download_file_url'])) {
        update_post_meta($post_id, '_ssmc_download_file_url', esc_url_raw($_POST['ssmc_download_file_url']));
    }
}
add_action('save_post', 'ssmc_save_download_file_meta_box_data');

/**
 * Add Meta Box for Publication File
 */
function ssmc_add_publication_file_meta_box()
{
    add_meta_box(
        'ssmc_publication_file',
        __('Publication PDF File', 'ssmc-custom'),
        'ssmc_publication_file_meta_box_callback',
        'publication',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'ssmc_add_publication_file_meta_box');

function ssmc_publication_file_meta_box_callback($post)
{
    wp_nonce_field('ssmc_publication_file_nonce', 'ssmc_publication_file_nonce_field');
    $file_url = get_post_meta($post->ID, '_ssmc_publication_file_url', true);
?>
    <div class="ssmc-meta-box-wrapper" style="padding: 10px 0;">
        <p>
            <label for="ssmc_publication_file_url" style="display:block; font-weight:bold; margin-bottom:10px;"><?php _e('Select or Upload PDF File', 'ssmc-custom'); ?></label>
            <input type="text" id="ssmc_publication_file_url" name="ssmc_publication_file_url" value="<?php echo esc_attr($file_url); ?>" class="widefat" style="margin-bottom:10px;" />
            <button type="button" id="ssmc_upload_publication_button" class="button button-secondary"><?php _e('Choose PDF from Media Library', 'ssmc-custom'); ?></button>
        </p>
        <p class="description"><?php _e('Upload the PDF file to be listed in the publications directory.', 'ssmc-custom'); ?></p>
    </div>
    <script>
        jQuery(document).ready(function($) {
            var pub_file_frame;
            $('#ssmc_upload_publication_button').on('click', function(e) {
                e.preventDefault();
                if (pub_file_frame) {
                    pub_file_frame.open();
                    return;
                }
                pub_file_frame = wp.media.frames.file_frame = wp.media({
                    title: '<?php _e('Select Publication PDF', 'ssmc-custom'); ?>',
                    button: {
                        text: '<?php _e('Use this file', 'ssmc-custom'); ?>'
                    },
                    library: {
                        type: 'application/pdf'
                    },
                    multiple: false
                });
                pub_file_frame.on('select', function() {
                    var attachment = pub_file_frame.state().get('selection').first().toJSON();
                    $('#ssmc_publication_file_url').val(attachment.url);
                });
                pub_file_frame.open();
            });
        });
    </script>
<?php
}

function ssmc_save_publication_file_meta_box_data($post_id)
{
    if (! isset($_POST['ssmc_publication_file_nonce_field'])) return;
    if (! wp_verify_nonce($_POST['ssmc_publication_file_nonce_field'], 'ssmc_publication_file_nonce')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (! current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['ssmc_publication_file_url'])) {
        update_post_meta($post_id, '_ssmc_publication_file_url', esc_url_raw($_POST['ssmc_publication_file_url']));
    }
}
add_action('save_post', 'ssmc_save_publication_file_meta_box_data');

