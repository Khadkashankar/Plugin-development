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
//mail custom menu
function email_custom_menu(){

add_menu_page('Test Email','Test Email','manage_options','test-mail','test_menu_fun');
add_submenu_page('test-mail','Send Email','Send Email','manage_options','send-mail','send_mail_fun');

}
function send_mail_fun(){
    include('mail-form.php');
}

function test_menu_fun(){
    echo "<h1> this is Email menu";
}


add_action('admin_menu','email_custom_menu');