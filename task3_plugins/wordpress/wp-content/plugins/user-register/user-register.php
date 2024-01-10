<?php
/*
Plugin Name: User Register
Plugin URI: #
Author Name: Shankar Khadka
Description: user register plugin
*/



    function ur_register_fn(){

        ob_start();
    include 'user-form.php';
    $htmls = ob_get_clean();
    return $htmls;

    }
    add_shortcode('ur-register','ur_register_fn');