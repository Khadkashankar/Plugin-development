<?php
/*
* Plugin Name: User Register
* Plugin URI:#
* Author: Shankar Khadka
* Author URI: #
* Description: This plugin is helpful for register users.
* Version: 1.0
* Text Domain: demo plugin .

*/

// if ( ! defined( 'ABSPATH' ) ) {
//     header("Location: Plugin development\task3_plugin\wordpress");
//     die();
// }

function ur_registration($atts){

    $attr = shortcode_atts(
        array(
            'type' => 'user-form',
        ),$atts);
        
ob_start();
include $attr['type'].'.php';
$form_html = ob_get_clean();

return $form_html;
}

function ur_redirect_after_registration($attr){
    $data = shortcode_atts(array(
        'type'=> 'user-redirect',
    ),$attr);
    ob_start();
    include $attr['type'].'.php';
    $form_html = ob_get_clean();
    
    return $form_html;
}


add_shortcode('ur_register','ur_registration');
add_shortcode('ur_redirect','ur_redirect_after_registration');