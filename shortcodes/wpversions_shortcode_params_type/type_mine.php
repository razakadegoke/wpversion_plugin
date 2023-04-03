<?php

require_once( ABSPATH . 'wp-content/plugins/v-wp/shortcodes/wpversions_shortcode_params_type/helper.php' );

function type_mine( string $atts_color, string $atts_version ): string {

    $maj_release = get_maj_release();

    $version = get_bloginfo( 'version' );
    $latest_version = get_transient( 'wp_versions' )[0]['latest'];

    $position = array_search( substr($atts_version, 0, 3), $maj_release );

    $is_eol = get_transient( 'wp_versions' )[$position]['eol'];

    if ( $atts_color == 'yes' )  {

        if ( $version == $latest_version) {

            return '<span style="color:green">' . $version . '</span>';

        } elseif ( $is_eol != false ) {

            return '<span style="color:red">' . $version . '</span>';

        } else {

            return '<span style="color:yellow">' . $version . '</span>';

        }

    } else {

        return '<span>' . $version . '</span>';

    }
    
}