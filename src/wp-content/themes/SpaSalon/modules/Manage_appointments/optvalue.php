<?php 
register_activation_hook(__FILE__,'appointment');
function appointment()
{
    define("ABSPATH",basename(dirname(__FILE__)));
	define ("PLUGIN_DIR_APPOINTMENT", basename(dirname(__FILE__)));
	//define ("PLUGIN_URL_APPOINTMENT", get_settings("siteurl")."/wp-content/plugins/".PLUGIN_DIR_APPOINTMENT);
	define ("PLUGIN_PATH_APPOINTMENT",ABSPATH."wp-content/plugins/".PLUGIN_DIR_APPOINTMENT);
	global $wpdb;
	$table_name = $wpdb->prefix . "appointment_fields";
	 require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	$sql="INSERT INTO $table_name(fid,fieldname,fieldtype,description,position,isoptional) VALUES('', '1', '2','3', '4','5') ";
	echo $_SERVER['PHP_SELF'];
	$wpdb->query($sql);
}
?>