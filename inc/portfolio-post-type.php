<?php
/**
 *
 * Description.
 *
 * @since Version 3 digits
 */
function persona_portfolios_template_include( $single_template ) {
    if ( is_singular( 'harry-portfolio' ) ) {
        $single_template = __DIR__ . '/template/portfolio-single.php';
    }
    return $single_template;
}
add_filter( 'template_include', 'persona_portfolios_template_include' );

function persona_portfolio() {

    $labels = [
        'name'                  => _x( 'Portfolios', 'Post type general name', 'persona' ),
        'singular_name'         => _x( 'Portfolio', 'Post type singular name', 'persona' ),
        'menu_name'             => _x( 'Portfolios', 'Admin Menu text', 'persona' ),
        'name_admin_bar'        => _x( 'Portfolio', 'Add New on Toolbar', 'persona' ),
        'add_new'               => __( 'Add New', 'persona' ),
        'add_new_item'          => __( 'Add New Portfolio', 'persona' ),
        'new_item'              => __( 'New Portfolio', 'persona' ),
        'edit_item'             => __( 'Edit tes', 'persona' ),
        'view_item'             => __( 'View Portfolio', 'persona' ),
        'all_items'             => __( 'All Portfolios', 'persona' ),
        'search_items'          => __( 'Search Portfolios', 'persona' ),
        'parent_item_colon'     => __( 'Parent Portfolios:', 'persona' ),
        'not_found'             => __( 'No Portfolios found.', 'persona' ),
        'not_found_in_trash'    => __( 'No Portfolios found in Trash.', 'persona' ),
        'featured_image'        => _x( 'Portfolio Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'persona' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'persona' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'persona' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'persona' ),
        'archives'              => _x( 'Portfolio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'persona' ),
        'insert_into_item'      => _x( 'Insert into Portfolio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'persona' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Portfolio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'persona' ),
        'filter_items_list'     => _x( 'Filter Portfolios list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'persona' ),
        'items_list_navigation' => _x( 'Portfolios list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'persona' ),
        'items_list'            => _x( 'Portfolios list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'persona' ),
    ];

    $args = [
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => ['slug' => 'portfolio'],
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt'],
    ];

    register_post_type( 'persona-portfolio', $args );

    $labels = [
        'name'              => _x( 'Portfolio Category', 'taxonomy general name', 'persona' ),
        'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'persona' ),
        'search_items'      => __( 'Search Portfolio Category', 'persona' ),
        'all_items'         => __( 'All Portfolio Category', 'persona' ),
        'view_item'         => __( 'View Portfolio Category', 'persona' ),
        'parent_item'       => __( 'Parent Portfolio Category', 'persona' ),
        'parent_item_colon' => __( 'Parent Portfolio Category:', 'persona' ),
        'edit_item'         => __( 'Edit Portfolio Category', 'persona' ),
        'update_item'       => __( 'Update Portfolio Category', 'persona' ),
        'add_new_item'      => __( 'Add New Portfolio Category', 'persona' ),
        'new_item_name'     => __( 'New Portfolio  Category', 'persona' ),
        'not_found'         => __( 'No Portfolio Category Found', 'persona' ),
        'back_to_items'     => __( 'Back to Portfolio Category', 'persona' ),
        'menu_name'         => __( 'Portfolio Categories', 'persona' ),
    ];

    $args = [
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => ['slug' => 'portfolio-cat'],
        'show_in_rest'      => true,
    ];

    register_taxonomy( 'portfolio-cat', 'persona-portfolio', $args );

}

add_action( 'init', 'persona_portfolio' );