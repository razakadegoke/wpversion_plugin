<?php

require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/type_latest.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/type_mine.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/type_subversion.php' );
require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/type_validate.php' );

function wp_versions($atts){

    $parameters = shortcode_atts( [
        'type' => '', 
        'version' => '',
        'color' => 'no'
    ], $atts );

    if ( $parameters['type'] == 'latest' ) {

        return type_latest();

    } elseif ( $parameters['type'] == 'mine' ) {

        return type_mine( $parameters['color'] );

    } elseif ( $parameters['type'] == 'subversion' && ! empty( $parameters['version'] ) ) {

        return type_subversion( $parameters['version'] );

    } elseif ( $parameters['type'] == 'validate' && ! empty( $parameters['version'] ) && ( $parameters['color'] == 'yes' || $parameters['color'] == 'no' ) ) {

        return type_validate( $parameters['color'], $parameters['version'] );
        
    } else {

        return 'wpversions';
        
    }
    
}