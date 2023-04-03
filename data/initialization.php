<?php

require_once( ABSPATH . 'wp-content/plugins/v-wp/data/cache.php' );

//Init all the data.
function on_initialization() {

    if ( get_transient( 'initialization_time' ) !== false ) {
        
        delete_transient( 'initialization_time' );

        set_transient( 'initialization_time', time() );

        caching_wp_verions();

    } else {

        set_transient( 'initialization_time', time() );

        caching_wp_verions();
        
    }
}