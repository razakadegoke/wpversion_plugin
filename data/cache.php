<?php

require_once( ABSPATH . 'wp-content/plugins/v-wp/data/api-call.php' );

function set_data() {

    $wp_versions = get_wp_versions();
    $update_time = time() - 14400;

    set_transient( 'wp_versions', $wp_versions, 84600 );
    set_transient( 'update_time', $update_time ); 

}

//Setting cache.
function caching_wp_verions() {
    
    if ( get_transient( 'wp_versions' ) !== false || get_transient( 'update_time' ) !== false ) {

        delete_transient( 'wp_versions' );
        delete_transient( 'update_time' );
        
        set_data();
        
    } else {

        set_data();

    }

}