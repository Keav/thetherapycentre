<?php
load_theme_textdomain('templatic');
load_textdomain( 'templatic', TEMPLATEPATH.'/language/en_US.mo' );

/*** Theme setup ***/
define('TT_ADMIN_FOLDER_NAME','admin');
define('TT_ADMIN_FOLDER_PATH',TEMPLATEPATH.'/'.TT_ADMIN_FOLDER_NAME.'/'); //admin folder path

if(file_exists(TT_ADMIN_FOLDER_PATH . 'constants.php')){
include_once(TT_ADMIN_FOLDER_PATH.'constants.php');  //ALL CONSTANTS FILE INTEGRATOR
}

if(file_exists(TT_FUNCTIONS_FOLDER_PATH . 'custom_filters.php')){
include_once (TT_FUNCTIONS_FOLDER_PATH . 'custom_filters.php'); // manage theme filters in the file
}

if(file_exists(TT_FUNCTIONS_FOLDER_PATH . 'widgets.php')){
include_once (TT_FUNCTIONS_FOLDER_PATH . 'widgets.php'); // theme widgets in the file
}
define('DOMAIN','templatic');
// Theme admin functions
include_once (TT_FUNCTIONS_FOLDER_PATH . 'custom_functions.php');

include_once(TT_ADMIN_FOLDER_PATH.'admin_main.php');  //ALL ADMIN FILE INTEGRATOR

function temp_theme_settings_load() 
{
if($_GET['page']=='Appointment'){


// enqueue styles
wp_enqueue_style( 'option-tree-style',TT_THEME_OPTIONS_FOLDER_URL.'css/option_tree_style.css', false, 1, 'screen');	
// enqueue scripts
add_thickbox();
wp_enqueue_script( 'jquery-table-dnd', TT_THEME_OPTIONS_FOLDER_URL.'js/jquery.table.dnd.js', array('jquery'), 1 );
wp_enqueue_script( 'jquery-color-picker', TT_THEME_OPTIONS_FOLDER_URL.'js/jquery.color.picker.js', array('jquery'), 1 );
wp_enqueue_script( 'jquery-option-tree', TT_THEME_OPTIONS_FOLDER_URL.'js/jquery.option.tree.js', array('jquery','media-upload','thickbox','jquery-ui-core','jquery-ui-tabs','jquery-table-dnd','jquery-color-picker'), 1 );

// remove GD star rating conflicts
wp_deregister_style( 'gdsr-jquery-ui-core' );
wp_deregister_style( 'gdsr-jquery-ui-theme' );
}
}
add_action( 'admin_init', 'temp_theme_settings_load'); //adction to add js and css to wp-admin head section

if(file_exists(TT_WIDGET_FOLDER_PATH . 'widgets_main.php')){
include_once (TT_WIDGET_FOLDER_PATH . 'widgets_main.php'); // Theme admin WIDGET functions
}

if(file_exists(TT_MODULES_FOLDER_PATH . 'modules_main.php')){
include_once (TT_MODULES_FOLDER_PATH . 'modules_main.php'); // Theme moduels include file
}

include_once(TT_ADMIN_FOLDER_PATH.'auto_update_framework.php');  //FRAMEWORK AUTO UPDATE LINK
if(file_exists(TT_INCLUDES_FOLDER_PATH . 'auto_install/auto_install.php')){
include_once (TT_INCLUDES_FOLDER_PATH . 'auto_install/auto_install.php'); // sample data insert file
}
if(file_exists(TT_FUNCTIONS_FOLDER_PATH . 'captcha/captcha_function.php')){
include_once (TT_FUNCTIONS_FOLDER_PATH . 'captcha/captcha_function.php'); // manage theme filters in the file
}

add_theme_support( 'post-formats', array( 'aside', 'gallery','link', 'image','quote', 'status','video', 'audio','chat') );

add_action( 'after_setup_theme', 'setup' );
function setup() {
        add_theme_support( 'post-thumbnails' ); // This feature enables post-thumbnail support for a theme  
		add_image_size( 'slider-thumb', 220, 220, true ); //(cropped)
		add_image_size( 'listing-thumb', 150, 150, true ); //(cropped)
		add_image_size( 'latestpost-thumb', 50, 50, true ); //(cropped)
}

add_filter( 'image_size_names_choose', 'custom_image_sizes_crop' );
function custom_image_sizes_crop( $sizes ) {
	$custom_sizes = array(
		'slider-thumb' => 'Slider Thumb',
		'listing-thumb' => 'Listing Thumb',
		'latestpost-thumb' => 'Latestpost Thumb'
	);
	return array_merge( $sizes, $custom_sizes );
}


//Set Default permalink on theme activation: start
add_action( 'load-themes.php', 'default_permalink_set' );
if(!function_exists('default_permalink_set')){
	function default_permalink_set(){
		global $pagenow;
		if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){ // Test if theme is activate
			//Set default permalink to postname start
			global $wp_rewrite;
			$wp_rewrite->set_permalink_structure( '/%postname%/' );
			$wp_rewrite->flush_rules();
			if(function_exists('flush_rewrite_rules')){
				flush_rewrite_rules(true);  
			}
			//Set default permalink to postname end
		}
	}
}
//Set Default permalink on theme activation: end
?>