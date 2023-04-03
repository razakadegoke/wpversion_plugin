<?php
/*
Plugin Name: WordPress Versions
Plugin URI: Lien GIT*
Description: Allows you to display the different versions of WordPress.
Version: 1.0.0
Author: SatelliteWP
Author URI: https://www.satellitewp.com/
License: GPL2
*/

if ( !defined( 'ABSPATH' ) ) exit; 

require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/data/cache.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/data/api-call.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/data/initialization.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/assets/plugin-page.php' );

//When the plugin is download set up the data.
register_activation_hook( __FILE__, 'on_initialization' );

//Make a new api call every day
$start_time = get_transient( 'initialization_time' );  
wp_schedule_event( $start_time, 'daily', 'caching_wp_verions' );


//Add admin menu for the plugin.
add_action( 'admin_menu', 'add_plugin_page' );
//Add shortcode.
add_shortcode( 'wpversions', 'wp_versions' );
