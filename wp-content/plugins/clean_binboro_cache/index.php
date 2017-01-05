<?php
/*
Plugin Name: Clean binboro cache 
Author: Binboro
Description: Clean Binboro cache 
Author URI: http://binboro.com
*/

/*  Copyright 2015 Дмитрий Лаврик (email: 1@1.ru)

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
}

function opinions_uninstall(){	
}

function opinions_ondelete(){	
}

register_activation_hook(__FILE__, 'opinions_install');
register_deactivation_hook(__FILE__, 'opinions_uninstall');
register_uninstall_hook(__FILE__, 'opinions_ondelete');

function opinions_admin_menu(){
	add_menu_page('clean_binboro_cache', 'Clean binboro cache', 8, 'clean_binboro_cache', 'opinions_editor');
}

add_action('admin_menu', 'opinions_admin_menu');

function opinions_editor(){
	 global $wpdb;
    $query='TRUNCATE TABLE cache;';
    $wpdb->query($query);
	echo "<hi>Cache clean</h1>";
}
