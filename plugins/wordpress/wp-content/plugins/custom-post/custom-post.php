<?php
/*
* Plugin Name: Custom Post
* Plugin URI:
* Author: Shankar
* Author URI:
* Description: This is sample plugin demo
* Version: 1.0.0
* Text Domain: custom post plugin
*/

//custom post type

function custom_post_type() {
	register_post_type('product',
		array(
                'labels' => array(
                    'name' => ('Products')
                ),
     			'public'      => true,
				// 'has_archive' => true,
		)
	);
}
add_action('init', 'custom_post_type');