<?php
/**
 * Plugin Name: Prevent htaccess rewrites
 * Description: Stops Wordpress making multiple permalink entries in .htaccess.
 * Plugin URI:  http://wordpress.stackexchange.com/questions/118731/wordpress-keeps-writing-rewrite-rules-to-htaccess
 * Author:      toscho
 * Author URI:  http://wordpress.stackexchange.com/users/73/toscho
 */

add_filter( 'flush_rewrite_rules_hard', '__return_false' );

?>