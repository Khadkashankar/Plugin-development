<?php
/*
* Plugin Name: Hello World
* Plugin URI: #
* Author: Shankar
* Author URI: #
* Description: This is hello world plugin
* Version: 1.0.0
* Text Domain: simple hello world plugin
*/

function btn_show_img($atts){
    // $atts = array_change_key_case($atts, CASE_LOWER);
    $atts = shortcode_atts( array(
        'msg' => ' this is parameter shortcode',
    ),$atts);
// $output = "<b> this is bold text</b>";
return $atts['msg'];
}



add_shortcode('btn','btn_show_img');





?>