<?php
/*
Plugin Name: Custom List Table Example
Plugin URI: http://www.mattvanandel.com/
Description: A highly documented plugin that demonstrates how to create custom List Tables using official WordPress APIs.
Version: 1.4.1
Author: Matt van Andel
Author URI: http://www.mattvanandel.com
License: GPL2
*/


// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');

// action function for above hook
function mt_add_pages() {
    // Add a new top-level menu (ill-advised):
    add_menu_page(__('Test Toplevel','menu-test'), __('Request for Member list','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );

}

// mt_settings_page() displays the page content for the Test Settings submenu

// mt_toplevel_page() displays the page content for the custom Test Toplevel menu
function mt_toplevel_page() {
	echo "<h2>" . __( 'Request for Member list', 'menu-test' ) . "</h2>";
    echo '<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">';
    echo '<thead>';
	echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Request Sent User</th>';
    echo '<th>Request Receive User</th>';
    echo '<th>Stauts</th>';
	echo '<th>Subject</th>';
    echo '<th>Message</th>';
	echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    global $wpdb;
	$query_get_data = "SELECT * FROM wp_customuserlist order by ID asc";
	$users_list = $wpdb->get_results($query_get_data);
	foreach ($users_list as $user)
	{
		$user_info = get_userdata($user->current_user_id);
		$user_info1 = get_userdata($user->list_user_id);
		echo '<tr>';
        echo '<td>'.$user->ID.'</td>';
        echo '<td>'.$user_info->first_name.' '.$user_info->last_name.'</td>';
        echo '<td>'.$user_info1->first_name.' '.$user_info1->last_name.'</td>';
        echo '<td>'.$user->status.'</td>';
        echo '<td>'.$user->subject.'</td>';
        echo '<td>'.$user->message.'</td>';
        echo '</tr>';
	}
	echo '</tbody>';
    echo '</table>';
	
	echo '<script>jQuery(document).ready(function() { jQuery("#example").DataTable();} );</script>';
}
?>