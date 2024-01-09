<?php
/*
* Plugin Name: Send Mail
* Plugin URI:#
* Author: Shankar Khadka
* Author URI: #
* Description: This plugin is helpful for sending mails.
* Version: 1.0
* Text Domain: demo plugin to send mails.

*/
//hook to set menu
add_action('admin_menu','send_mail_menu');

function send_mail_menu(){
    //menu
 add_menu_page('Test Mail','Test Mail','manage_options','test-mail','test_mail_fn');
 

 //submenu
 add_submenu_page('test-mail','Send Mail','Send Mail','manage_options','send-mail','send_mail_fn');


}
function test_mail_fn(){
  echo "<h2>Email Test Menu</h2>";
}

function send_mail_fn(){
    include 'mail-form.php';
}

?>