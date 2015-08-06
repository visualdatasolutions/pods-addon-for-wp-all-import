<?php

/*
Plugin Name: CIO Custom Fields Importer
Plugin URI: http://www.vipp.com.au/shop
Description: Efficiently import large volume of csv or xml data into custom fields created with pods. The premium version allows you to import to any custom fields created by other plugins.  This plugin needs both WP All Import and Pods plugins to import, both freely available. <a href="http://vipp.com.au/shop"> Upgrade to Professional Version </a> for auto media upload, auto matching of relationship fields, user import, WooCommerce customer import, import of pods advanced content types, and more features.
Version: 1.0.1
License: GPLv2
Author: <a href="http://vipp.com.au">VisualData</a>
*/

include "rapid-addon.php";

global $wpdb;

$my_fields=array();

$table_prefix = $wpdb->get_blog_prefix();

$vipp_addon_free = new RapidAddon( 'PODS Custom Content Types and Fields Free', 'vipp_cashflow_addon_free' );


$my_pods = $wpdb->get_results( "
	SELECT post_name, ID, post_title
	FROM ". $table_prefix ."posts
	WHERE post_type = '_pods_pod'

        
	" );

$my_pod_array = array();

if ($my_pods) {

	foreach ($my_pods as $my_pod) {
		
		
		if ('post_type'==get_post_meta($my_pod->ID,'type',true)) {
			$my_pod_array[]=$my_pod->post_name;
			
			$my_fields[$my_pod->post_name] = array();
		} 
		
	}
}

		
	//print_r($my_pod_array);



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

					$fields_array[]= $vipp_addon_free->add_field( 'vippfree' . $my_pod->post_name . $pods_field->post_name, $pods_field->post_title, 'text', null, $pods_field->post_content );
					
					$my_fields[$my_pod->post_name][$pods_field->post_name] = '';

					//original field name as array key to avoid field name conflicts.
				}

			}





			$vipp_addon_free->add_options(
					null,
					$my_pod->post_title . ' Fields', 
					$fields_array


			);
		} 
	}

}

	
$vipp_addon_free->add_field('vipp_my_pod_name', 'Drag and drop to fields of your content type to import. <a href="http://vipp.com.au"> Upgrade for relationship fields matching, media upload, WooCommerce customer import and more premium features</a>. ', 'text', null, "Drag and drop data from the right hand side to the data type you are importing. Fields of other content types under this section will be ignored. " );


	//start of pro features
	
	//end of pro features

//print_r($my_fields);

$vipp_addon_free->set_import_function( 'pods_addon_import_free' );

$vipp_addon_free->admin_notice(
	'This add-on plugin requires WP All Import <a href="http://www.wpallimport.com/" target="_blank">Pro</a> or <a href="http://wordpress.org/plugins/wp-all-import" target="_blank">Free</a>, and the <a href="https://wordpress.org/plugins/pods/">
Pods - Custom Content Types and Fields
</a> plugin. ',
	array(
		"plugins" => array( "pods/init.php" )
) );

$vipp_addon_free->run(
	array(
		"plugins" => array( "pods/init.php" ),
		"post_types"=>$my_pod_array,
) );



function pods_addon_import_free( $post_id, $data, $import_options ) {

	global $vipp_addon_free, $wpdb, $my_fields;
	
	//$my_pod_name = $data['vipp_my_pod_name'];
	
	$my_pod_name = $import_options->options['custom_type'];
	
	//echo '<br>' . $my_pod_name;
	$vipp_addon_free->log( '- Processing custom fields of pods custom type name: `' . $my_pod_name . '`');
	
	$save = array();
	//echo '<pre>';
	//print_r($data);
	//print_r($my_fields[$my_pod_name]);
	//echo '</pre>';
	
	$vipp_addon_free->log( '- Some fields may be skipped as per your import setting. Please change import setting when you need to import to the skipped fields.');
	
	
	
	
	foreach ($my_fields[$my_pod_name] as $k=>$v) {
	
		if ($vipp_addon_free->can_update_meta( $k, $import_options ) ) {
		
			$save[$k] = $data['vippfree'.$my_pod_name.$k];
		} else {
		
			
		//$vipp_addon_free->log( '- Skipped field `' . $k. '` as per import setting.  ' );
		
		}
		
	}
	
	$result = pods($my_pod_name)->save($save, null, $post_id);
	
	$vipp_addon_free->log( '- Successfully saved custom fields to pods custom type: `' . $my_pod_name . '`. ID  ' . $post_id );
	
	//print_r($save);
	

}
