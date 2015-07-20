<?php

/*
Plugin Name: PODS Add-On for WP All Import Free Edition
Plugin URI: http://www.vipp.com.au/
Description: Import any csv or xml data into live PODS custom fields with WP All Import to create or update custom/extended posts. This plugin needs both WP All Import and Pods plugins to work.
Version: 1.0
Author: VisualData
*/

include "rapid-addon.php";

global $wpdb;

$table_prefix = $wpdb->get_blog_prefix();


$vipp_addon = new RapidAddon( 'PODS Custom Content Types and Fields', 'vipp_cashflow_addon' );


$my_pods = $wpdb->get_results( "
	SELECT post_name, ID, post_title
	FROM ". $table_prefix ."posts
	WHERE post_type = '_pods_pod'

        
	" );

$my_pod_array = array();

if ($my_pods) {

	foreach ($my_pods as $my_pod) {
		
		
		if ('post_type'==get_post_meta($my_pod->ID,'type',true)) {
			$my_pod_array[$my_pod->post_name]=$my_pod->post_title;
		}
	}
}

		
$vipp_addon->add_field( 'vipp_my_pod_name', 'Select a pod to import. If a field name is shared among pods, please import to the last occurance of the field. ', 'radio', $my_pod_array, "The data type you are importing. Please try to use unique field names. If you have to use the same field name in different pods, only the input of the last field will be saved. When you drap and map data, please map to the last occurance of the field in the form ." );



if ($my_pods) {

	foreach ($my_pods as $my_pod) {

		if ('post_type'==get_post_meta($my_pod->ID,'type',true)) {

			$fields_array=array( );

			$pods_fields = $wpdb->get_results( "
				SELECT post_name, post_title, post_content 
				FROM ". $table_prefix ."posts
				WHERE post_type = '_pods_field'
				 AND post_parent=" . $my_pod->ID
				 );




			if ($pods_fields) {

				foreach ($pods_fields as $pods_field) {

					$fields_array[]= $vipp_addon->add_field( $pods_field->post_name, $pods_field->post_title, 'text', null, $pods_field->post_content );



				}

			}





			$vipp_addon->add_options(
					null,
					$my_pod->post_title . ' Fields', 
					$fields_array


			);
		}
	}

}

	//start of pro features
	
	//end of pro features


$vipp_addon->set_import_function( 'pods_addon_import' );

$vipp_addon->admin_notice(
	'The PODS Add-On requires WP All Import <a href="http://www.wpallimport.com/" target="_blank">Pro</a> or <a href="http://wordpress.org/plugins/wp-all-import" target="_blank">Free</a>, and the <a href="https://wordpress.org/plugins/pods/">
Pods - Custom Content Types and Fields
</a> plugin.',
	array(
		"plugins" => array( "pods/init.php" )
) );

$vipp_addon->run(
	array(
		"plugins" => array( "pods/init.php" )
) );



function pods_addon_import( $post_id, $data, $import_options ) {

	global $vipp_addon, $wpdb;
	
	$my_pod_name = $data['vipp_my_pod_name'];
	
	unset($data['vipp_my_pod_name']);
	
	//start of pro features
	
	//end of pro features
	
	
	$result = pods($my_pod_name)->save($data, null, $post_id);
	
	

}
