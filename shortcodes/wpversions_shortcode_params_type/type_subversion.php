<?php

require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/helper.php' );

function type_subversion( string $atts_version ) {

    $maj_release = get_maj_release();

        if ( ! in_array( $atts_version, $maj_release ) ) {
            
            return 'Error : This is not a major release.';

        } else {

            $sub_version_list = '';

            $position = array_search( $atts_version, $maj_release );

            $version = $atts_version;
            $version_latest = get_transient( 'wp_versions' )[$position]['latest'];

            $version_latest_last_digit =  str_replace( $version . '.', '', $version_latest ) ;

            for ( $i=0; $i <= intval( $version_latest_last_digit ) ; $i++ ) { 
                
                if ( $i==0 ) {
                    $sub_version_list .= '<span>' . $version . '<span> <br>';
                } else {

                    $sub_version_list .= '<span>' . $version . '.' .  $i . '<span> <br>'; 

                }

            }

            return $sub_version_list;

        }
}