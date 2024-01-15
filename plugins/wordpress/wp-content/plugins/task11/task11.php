<?php

/* 
* Plugin Name: Register using AJAX
* Plugin URI: #
* Author Name: Shankar Khadka
* Author URI: #
* Template Name: Register user
* Description: plugin for registering user using ajax
*/
if(!defined('ABSPATH')){
    header("Location: /wordpress");
    die();
}
function ura_shortcode_fn(){
    ob_start();

    ?>
<form action="" method="post" id="form_id">
    <label for="">Name:</label>
    <input type="text" id="username" required><br><br>
    <label for="">Emali:</label>
    <input type="email" id="email" required><br><br>
    <label for="">Password:</label>
    <input type="password" id="password" required><br><br>
    <input type="submit" value="submit" id="submit">

</form>
<?php   
  return ob_get_clean();
}
add_shortcode('ura-shortcode','ura_shortcode_fn');

function custom_register_user() {
   if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])){
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $data = array(
        'user_login' => $name,
        'user_email' => $email,
        'user_pass' => $pass
    );
    $user_id = wp_insert_user($data);

    if (!is_wp_error($user_id)) {
echo $name." user registered successfully";    } 
}
}

add_action('wp_ajax_custom_register_user', 'custom_register_user');

function rua_my_custom_scripts(){
    $path = plugins_url('script.js',__FILE__);
    $depend = array('jquery');
    $version = filemtime(plugin_dir_path(__FILE__).'script.js');

    wp_enqueue_script('my-custom-js',$path,$depend,$version,true);
    wp_localize_script('my-custom-js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts','rua_my_custom_scripts');


?>