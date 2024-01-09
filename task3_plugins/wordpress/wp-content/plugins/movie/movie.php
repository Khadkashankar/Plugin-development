<?php
/*
Plugin Name: Movie Plugin
Plugin URI: #
Description: Plugin to add a Movie menu with Dashboard and Settings submenus.
Version: 1.0
Author: Shankar Khadka
Author Name: #
*/

add_action('admin_menu', 'movie_plugin_menu');

function movie_plugin_menu() {
    //menu
    add_menu_page('Movie','Movie','manage_options','movie-dashboard','movie_dashboard_page');

    //submenu
    add_submenu_page('movie-dashboard','Dashboard','Dashboard','manage_options','movie-dashboard','movie_dashboard_page');

    
    add_submenu_page('movie-dashboard','Settings','Settings','manage_options','movie-settings','movie_settings_page');
}

function movie_dashboard_page() {
    echo "<h2>This is Dashboard Page</h2>";
}

function movie_settings_page() {
echo "<h2>This is Settings Page</h2>";
}