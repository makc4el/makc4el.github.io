<?php
/*
Plugin Name: Manage site 
Author: KN
Description: Manage site
Author URI: 
*/

/*  Copyright 2017 KN

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function opinions_install(){
	global $wpdb;
	$query='
		CREATE TABLE IF NOT EXISTS ipaddr
		(
		ip char(20)
		);';
	$wpdb->query($query);
}

function opinions_uninstall(){	
}

function opinions_ondelete(){	
}

register_activation_hook(__FILE__, 'opinions_install');
register_deactivation_hook(__FILE__, 'opinions_uninstall');
register_uninstall_hook(__FILE__, 'opinions_ondelete');

function opinions_admin_menu(){
	add_menu_page('Main page', 'Manage site', 8, 'main_page', 'main_page', '', 4);
	add_submenu_page( 'main_page', 'Manage user', 'Manage user', 'manage_options', 'manage_user', 'manage_user' );
	add_submenu_page( 'main_page', 'User info', 'User info', 'manage_options', 'user_info', 'user_info' );
}
add_action('admin_menu', 'opinions_admin_menu');

function manage_user(){
	require_once 'pages/manage_users.php';
}
function user_info(){
	require_once 'pages/user_info.php';
}

function main_page(){
	require_once 'pages/main_page.php';
}
