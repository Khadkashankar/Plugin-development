<?php
/*
Plugin Name: Settings and Options 
Plugin URI: #
Description: Settings menu plugin to add user field options.
Version: 1.0.0
Author: Shankar Khadka
Author Name: #
*/

add_action('admin_menu', 'movie_plugin_menu');

function movie_dashboard_page() {
    echo "<h2>This is Dashboard Page</h2>";
}


function movie_settings_page() {
    ?>
<div class="wrap">
    <!-- <div class="icon32" id="icon-options-general"><br></div>
    <h2>My Example Options Page</h2> -->
    <form action="options.php" method="post">
        <?php settings_fields('plugin_options'); ?>
        <?php do_settings_sections('menu-settings'); ?>
        <?php submit_button('save changes'); ?>

    </form>
</div>
<?php
    }

function movie_plugin_menu() {
    add_menu_page('Movie', 'Movie', 'manage_options', 'movie-dashboard', 'movie_dashboard_page');

    add_submenu_page('movie-dashboard', 'Dashboard', 'Dashboard', 'manage_options', 'movie-dashboard', 'movie_dashboard_page');
    add_submenu_page('movie-dashboard', 'Settings', 'Settings', 'manage_options', 'menu-settings', 'movie_settings_page');
}

add_action('admin_init', 'sampleoptions_init_fn');


function sampleoptions_init_fn() {
    
    register_setting('plugin_options', 'plugin_options');
    register_setting('plugin_options', 'plugin_text_field');
    register_setting('plugin_options', 'plugin_radio_field');
    register_setting('plugin_options', 'plugin_hobbies_field');
    register_setting('plugin_options', 'plugin_textarea_field');
    register_setting('plugin_options', 'plugin_dropdown_field');
   
    add_settings_section('main_section', 'Main Settings', 'section_text_fn', 'menu-settings');

    add_settings_field('plugin_text_field', 'Name', 'setting_text_fn', 'menu-settings', 'main_section');
    add_settings_field('plugin_radio_field', 'Gender', 'setting_radio_fn', 'menu-settings', 'main_section');
    add_settings_field('plugin_hobbies_field', 'Hobbies', 'setting_checkbox_fn', 'menu-settings', 'main_section');
    add_settings_field('plugin_textarea_field', 'Your Intro', 'setting_textarea_fn', 'menu-settings', 'main_section');
    add_settings_field('plugin_dropdown_field', 'Country', 'setting_dropdown_fn', 'menu-settings', 'main_section');
    
}

function section_text_fn() {
 }
 function setting_text_fn() {
	$options = get_option('plugin_text_field');
	echo "<input type='text' name='plugin_text_field' value='".$options."' />";
}

function setting_radio_fn() {
	
    $options = get_option('plugin_radio_field');
   echo '<input type="radio" name="plugin_radio_field" value="male"  ' . ($options == "male" ? "checked" : "") . '><label for="">Male</label>
   <input type="radio" name="plugin_radio_field" value="female" ' . ($options == "female" ? "checked" : "") . '><label for="">Female</label>
   <input type="radio" name="plugin_radio_field" value="other" ' . ($options == "other" ? "checked" : "") . '><label for="">Other</label>';

}


function setting_checkbox_fn(){

    $options = get_option('plugin_hobbies_field',[]);
    
    echo '<input type="checkbox" name="plugin_hobbies_field[]" value="singing" ' . (in_array("singing", $options) ? 'checked="checked"' : '') . '>
    <label for="singing">Singing</label>
    
    <input type="checkbox" name="plugin_hobbies_field[]" value="dancing" ' . (in_array("dancing", $options) ? 'checked="checked"' : '') . '>
    <label for="dancing">Dancing</label>
    
    <input type="checkbox" name="plugin_hobbies_field[]" value="coding" ' . (in_array("coding", $options) ? 'checked="checked"' : '') . '>
    <label for="coding">Coding</label>';
}


 function setting_textarea_fn(){
    $options = get_option('plugin_textarea_field');
    echo "<textarea name='plugin_textarea_field' rows='10' cols='20'>$options</textarea>";

 }
    function setting_dropdown_fn(){
        $options = get_option('plugin_dropdown_field');
        echo '<select name="plugin_dropdown_field" id="">
        <option disabled selected>Choose country</option>
        <option value="nepal" ' . ($options == "nepal" ? "selected" : "") . '>Nepal</option>
        <option value="india" ' . ($options == "india" ? "selected" : "") . '>India</option>
        <option value="china" ' . ($options == "china" ? "selected" : "") . '>China</option>
        </select>';
 }

 