=== Import and Update CSV XML Data into Pods Custom Fields ===
Contributors: VisualData, soflyy, wpallimport
Donate link: http://vipp.com.au/
Tags: wp all import, csv import, pods csv import, xml import, pods csv import, pods custom content types and fields, pods, relationship fields, custom post types, website migration,  data feed, data import, data update, automatic 
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 4.1.0
Tested up to: 4.2.2
Stable tag: 1.0.0

Simple, easy and fast, PODS Add-On for WP All Import imports data from any XML or CSV file to custom fields created with PODS.

== Description ==

The PODS Add-On for [WP All Import](http://wordpress.org/plugins/wp-all-import "WordPress XML & CSV Import") makes it easy and fast to bulk import your data from any CSV or XML files to custom fields created with [Pods - Custom Content Types and Fields ](https://wordpress.org/plugins/pods/).

This add-on automatically detects all your custom fields created with PODS and display them in step 3 of WP All Import. 

The left side shows all of the fields that you can import to and the right side displays the data from your XML/CSV file. Then you can simply drag & drop the data from your XML or CSV into the PODS custom fields to import them. 

The CSV or XML can be in any order under any column header, and big files are broken into small chunks to allow importing to shared hosting sites, thanks to the great work by the WP ALL Import team. 

This is a handy tool for people migrating big volume of data from other sources to PODS websites, or regularly importing and updating data on PODS websites, such as real estate property listing websites, or book keeping websites. Simply create custom content types and fields using PODS for fast development and performance, export data to CSV or XML from your data sources, and import into PODS custom fields with ease. 


The add-on was used on a shared hosting website created with PODS to import 25,000 records in one go successfully.  

The add-on needs both WP All Import and PODS plugins installed and activated in order to work.

= Why you should use the PODS Add-On for WP All Import =

* Simple, easy and fast tool to migrate data or regularly import/update data to PODS websites. 

* Import new posts, pages, or custom post types with pods custom fields.

* Support pods custom fields stored in separate tables and meta fields.

* Update pods custom fields for existing posts, pages, or custom post types already published on your site.

* Track imported records to avoid duplicates (feature of WP All Import).

* Import template for future use (feature of WP All Import).

* Compatible with other WP All Import add-ons.


= PODS Add-on for WP All Import Professional Edition =

The PODS Add-On for WP All Import free edition detects and handles importing to pages, posts extended by pods and new custom post types created with pods. 

The PODS Add-On for WP All Import is compatible with PODS (free) and [the free version of WP All Import](http://wordpress.org/plugins/wp-all-import "WordPress XML & CSV Import"). It can be used along other add-ons for WP All Import.

The PODS Add-on for WP All Import Professional Edition adds the following features:

* Handle importing of other pods content types including Advanced Custom Types (pod) in addition to pages, posts and custom post types.

* Automatically search and assign relationship field ids during import to a live website.

* Support bi-directional relationship import and update on live sites.

* Support multisites

* Priority support.

* Customisation of the add-on to suit your unique data importing and updating needs.


You may also consider upgrading to [the professional edition of WP All Import](http://www.wpallimport.com/order-now/) for premium support and the following extra features:

* Import files from a URL: Download and import files from external websites, even if they are password protected with HTTP authentication. 

* Cron Job/Recurring Imports: WP All Import Pro can check periodically check a file for updates, and add, edit, delete, and update the your custom fields.

* Custom PHP Functions: Pass your data through custom functions by using [my_function({data[1]})] in your import template. WP All Import will pass the value of {data[1]} through my_function and use whatever it returns.

* Access to premium technical support.






== Installation ==

First, install and activate [WP All Import](http://wordpress.org/plugins/wp-all-import "WordPress XML & CSV Import") and [Pods - Custom Content Types and Fields ](https://wordpress.org/plugins/pods/).
If there are issues installing these two plugins, please look for solutions in the support forum or contact the plugin authors.

Then install the PODS Add-On for WP All Import. This add-on needs both PODS and WP All Import installed and activated.

To install the PODS Add-On for WP All Import, either:

* Upload the plugin from the Plugins page in WordPress

* Unzip pods-addon-xml-csv-import.zip and upload the contents to /wp-content/plugins/, and then activate the plugin from the Plugins page in WordPress

The PODS Add-On will appear in the Step 3 of WP All Import.

== Frequently Asked Questions ==

= I can import some pods, but have issues importing others. the process is killed by the server =

Possible causes - please check pods fields settings. Mandatory pods fields must be assigned a value for the import to succeed.

= I can't import into some custom fields created with pods =

Possible causes 1 - custom field names shared among pods.

The PODS add-on for WP All Import detects and lists ALL your custom fields created with PODS in one form in step 3 of the import process, even though you are importing ONE pods content type at a time. The custom fields are grouped by pods labels.

If a field name is used in multiple pods, multiple input cells will be generated in the form with the same field name, and only the value of the last input cells (possibly blank by default) will be saved. 

To avoid this problem, please try to use unique field name when creating your pods. If you have to use the same field name in multiple pods, then you can drag and drop the value to the last input cell.

Possible causes 2 - custom defined list in relationship field

Please check the custom defined list in your relationship field. The value supplied in the csv or xml file has to be in the custom defined list to be imported.

= I can see a pods content type but can't import data to the pod =

PODS Add-on for WP All Import free edition detects and lists all your pods content types however it supports importing and updating of post types only, including new custom post types created with pods, and posts/pages extended with pods. 

Please consider upgrading to [PODS Add-on for WP All Import Pro](http://www.vipp.com.au) to import other content types (including Advanced Custom Types and extended Users). 


== Changelog ==

= 1.0.0 =
* Initial release on WP.org.


== Upgrade Notice == 

This add-on has been developed and tested on wordpress 4.2.2 with pods 2.5.3 and WP All Import 3.3.0 installed and activated. It may also work on old versions.


== Screenshots == 

to be provided later.



== Support ==


We do try to handle support for our free version users at the following e-mail address:

E-mail: support@vipp.com.au

Support for free version customers is not guaranteed and based on availability. For premium support, please purchase [PODS Add-on for WP All Import Pro](http://www.vipp.com.au).
