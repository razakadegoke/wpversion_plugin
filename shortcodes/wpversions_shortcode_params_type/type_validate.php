<?php

function type_validate( string $atts_color, string $atts_version ): string {

    $maj_release = get_maj_release();

    $position = array_search( substr($atts_version, 0, 3), $maj_release );

    $is_eol = get_transient( 'wp_versions' )[$position]['eol'];

    $latest = get_transient( 'wp_versions' )[0]['latest'];

    if ( $atts_color == 'yes' ) {

        if ( $atts_version == $latest ) {
        
            return '<span style="color:green;">' . 'latest' . '</span>';

        } elseif ( $is_eol != false ) {
            
            return '<span style="color:red;">' . 'insecure' . '</span>';

        } else {
            
            return '<span style="color:yellow;">' . 'outdated' . '</span>';

        }

    } else {

        if ( $atts_version == $latest ) {
        
            return 'latest';

        } elseif ( $is_eol != false ) {
            
            return 'insecure';

        } else {
            
            return 'outdated';
        }
    }

}