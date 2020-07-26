<?php
// register post type Service
add_action( 'init', 'register_transpix_Service' );
function register_transpix_Service() {
    
    $labels = array( 
        'name' => __( 'Service', 'transpix' ),
        'singular_name' => __( 'Service', 'transpix' ),
        'add_new' => __( 'Add New Service', 'transpix' ),
        'add_new_item' => __( 'Add New Service', 'transpix' ),
        'edit_item' => __( 'Edit Service', 'transpix' ),
        'new_item' => __( 'New Service', 'transpix' ),
        'view_item' => __( 'View Service', 'transpix' ),
        'search_items' => __( 'Search Service', 'transpix' ),
        'not_found' => __( 'No Service found', 'transpix' ),
        'not_found_in_trash' => __( 'No Service found in Trash', 'transpix' ),
        'parent_item_colon' => __( 'Parent Service:', 'transpix' ),
        'menu_name' => __( 'Service', 'transpix' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Service',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array( 'Service', 'type' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon'          => 'dashicons-admin-generic', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Service', $args );
}
add_action( 'init', 'create_type_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Type', 'transpix' ),
    'singular_name' => __( 'type', 'transpix' ),
    'search_items' =>  __( 'Search type','transpix' ),
    'all_items' => __( 'All type','transpix' ),
    'parent_item' => __( 'Parent type','transpix' ),
    'parent_item_colon' => __( 'Parent type:','transpix' ),
    'edit_item' => __( 'Edit type','transpix' ), 
    'update_item' => __( 'Update type','transpix' ),
    'add_new_item' => __( 'Add New type','transpix' ),
    'new_item_name' => __( 'New type Name','transpix' ),
    'menu_name' => __( 'Type','transpix' ),
  );     

// Now register the taxonomy

  register_taxonomy('type',array('Service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));

}


// register post type Gallery
add_action( 'init', 'register_transpix_Gallery' );
function register_transpix_Gallery() {
    
    $labels = array( 
        'name' => __( 'Gallery', 'transpix' ),
        'singular_name' => __( 'Gallery', 'transpix' ),
        'add_new' => __( 'Add New Gallery', 'transpix' ),
        'add_new_item' => __( 'Add New Gallery', 'transpix' ),
        'edit_item' => __( 'Edit Gallery', 'transpix' ),
        'new_item' => __( 'New Gallery', 'transpix' ),
        'view_item' => __( 'View Gallery', 'transpix' ),
        'search_items' => __( 'Search Gallery', 'transpix' ),
        'not_found' => __( 'No Gallery found', 'transpix' ),
        'not_found_in_trash' => __( 'No Gallery found in Trash', 'transpix' ),
        'parent_item_colon' => __( 'Parent Gallery:', 'transpix' ),
        'menu_name' => __( 'Gallery', 'transpix' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Gallery',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
        'taxonomies' => array( 'Gallery', 'type1' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon'          => 'dashicons-format-gallery', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Gallery', $args );
}
add_action( 'init', 'create_type1_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_type1_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Type', 'transpix' ),
    'singular_name' => __( 'type', 'transpix' ),
    'search_items' =>  __( 'Search type','transpix' ),
    'all_items' => __( 'All type','transpix' ),
    'parent_item' => __( 'Parent type','transpix' ),
    'parent_item_colon' => __( 'Parent type:','transpix' ),
    'edit_item' => __( 'Edit type','transpix' ), 
    'update_item' => __( 'Update type','transpix' ),
    'add_new_item' => __( 'Add New type','transpix' ),
    'new_item_name' => __( 'New type Name','transpix' ),
    'menu_name' => __( 'Type','transpix' ),
  );     

// Now register the taxonomy

  register_taxonomy('type1',array('Gallery'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type1' ),
  ));

}

?>