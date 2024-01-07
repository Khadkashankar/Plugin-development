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


function hello_world_activate(){
    echo "Activate";
}
function hello_world_deactivate(){
    echo "deacitvate";
}
register_activation_hook('__FILE__', 'hello_world_activate');
register_deactivation_hook('__FILE__', 'hello_world_deactivate');



?>