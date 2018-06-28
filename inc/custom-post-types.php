<?php 
//Faculty custom post type

// Register Custom Post Type faculty
// Post Type Key: faculty
function create_faculty_cpt() {

  $labels = array(
    'name' => __( 'Faculty', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Faculty', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Faculty', 'textdomain' ),
    'name_admin_bar' => __( 'Faculty', 'textdomain' ),
    'archives' => __( 'Faculty Archives', 'textdomain' ),
    'attributes' => __( 'Faculty Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Parent faculty:', 'textdomain' ),
    'all_items' => __( 'All faculty', 'textdomain' ),
    'add_new_item' => __( 'Add New Faculty', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Faculty', 'textdomain' ),
    'edit_item' => __( 'Edit Faculty', 'textdomain' ),
    'update_item' => __( 'Update Faculty', 'textdomain' ),
    'view_item' => __( 'View Faculty', 'textdomain' ),
    'view_items' => __( 'View Faculty', 'textdomain' ),
    'search_items' => __( 'Search Faculty', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into faculty', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this faculty', 'textdomain' ),
    'items_list' => __( 'faculty list', 'textdomain' ),
    'items_list_navigation' => __( 'faculty list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter faculty list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'faculty', 'textdomain' ),
    'description' => __( 'the great people we work with', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-universal-access-alt',
  );
  register_post_type( 'faculty', $args );
  
  // flush rewrite rules because we changed the permalink structure -----NOT FULLY TESTED !!!!!!!!!!!!!!!!!!!!!!!!!
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_faculty_cpt', 0 );

//publication custom post type

// Register Custom Post Type publication
// Post Type Key: publication
function create_publication_cpt() {

  $labels = array(
    'name' => __( 'Publication', 'Post Type General Name', 'textdomain' ),
    'singular_name' => __( 'Publication', 'Post Type Singular Name', 'textdomain' ),
    'menu_name' => __( 'Publication', 'textdomain' ),
    'name_admin_bar' => __( 'Publication', 'textdomain' ),
    'archives' => __( 'Publication Archives', 'textdomain' ),
    'attributes' => __( 'Publication Attributes', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Publication:', 'textdomain' ),
    'all_items' => __( 'All Publications', 'textdomain' ),
    'add_new_item' => __( 'Add New Publication', 'textdomain' ),
    'add_new' => __( 'Add New', 'textdomain' ),
    'new_item' => __( 'New Publication', 'textdomain' ),
    'edit_item' => __( 'Edit Publication', 'textdomain' ),
    'update_item' => __( 'Update Publication', 'textdomain' ),
    'view_item' => __( 'View Publication', 'textdomain' ),
    'view_items' => __( 'View Publications', 'textdomain' ),
    'search_items' => __( 'Search Publications', 'textdomain' ),
    'not_found' => __( 'Not found', 'textdomain' ),
    'not_found_in_trash' => __( 'Not found in Trash', 'textdomain' ),
    'featured_image' => __( 'Featured Image', 'textdomain' ),
    'set_featured_image' => __( 'Set featured image', 'textdomain' ),
    'remove_featured_image' => __( 'Remove featured image', 'textdomain' ),
    'use_featured_image' => __( 'Use as featured image', 'textdomain' ),
    'insert_into_item' => __( 'Insert into Publication', 'textdomain' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Publication', 'textdomain' ),
    'items_list' => __( 'Publication list', 'textdomain' ),
    'items_list_navigation' => __( 'Publication list navigation', 'textdomain' ),
    'filter_items_list' => __( 'Filter Publication list', 'textdomain' ),
  );
  $args = array(
    'label' => __( 'Publication', 'textdomain' ),
    'description' => __( 'the great work done by our faculty', 'textdomain' ),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'revisions', 'author', 'trackbacks', 'custom-fields', 'thumbnail',),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => false,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
    'menu_icon' => 'dashicons-format-aside',
  );
  register_post_type( 'publication', $args );
  
  // flush rewrite rules because we changed the permalink structure -----NOT FULLY TESTED !!!!!!!!!!!!!!!!!!!!!!!!!
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
}
add_action( 'init', 'create_publication_cpt', 0 );