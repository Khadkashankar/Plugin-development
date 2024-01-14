<?php
/*
* Plugin Name: Custom Taxonomy(Categories)
* Plugin URI: #
* Author Name: Shankar Khadka  
* Author URI: #
* Version: 1.0.0
* Description: a plugin for custom taxonomy

*/
function custom_taxonomy_fruits() {
    $labels = array(
        'name'                       => __('Fruits'),
        'singular_name'              => __('Fruit'),
       
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
           );
    register_taxonomy( 'fruits', array( 'post' ), $args );
}
add_action( 'init', 'custom_taxonomy_fruits');