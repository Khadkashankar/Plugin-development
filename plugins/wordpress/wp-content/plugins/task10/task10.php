<?php
/*
* Plugin Name: Custom Taxonomy
* Plugin URI: #
* Author Name: Shankar Khadka  
* Author URI: #
* Version: 1.0.0
* Description: a plugin for custom taxonomies

*/




function custom_post_type_fruits() {

    $labels = array(
        'name'                  => __( 'Fruits'),
        'singular_name'         => __( 'Fruit'),
        'add_new' =>       __('Add New Fruit'),

        
    );
    $args = array(
        'labels'                => $labels,
        'taxonomies'            => array( 'types' ),
        'hierarchical'          => false,
        'public'                => true,
    );
    register_post_type( 'fruits', $args );

}
add_action( 'init', 'custom_post_type_fruits');

// Register Custom Taxonomy
function custom_taxonomy_types() {

    $labels = array(
        'name'                       => __( 'Types'),
        'singular_name'              => __( 'Type' ),
        
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
    );
    register_taxonomy( 'types', array( 'fruits' ), $args );

}
add_action( 'init', 'custom_taxonomy_types');

?>