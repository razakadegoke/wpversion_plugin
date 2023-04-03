<?php

function get_maj_release(): array {

    $maj_release = [];

    $wp_versions = get_transient('wp_versions');

    for ( $i=0; $i < count( $wp_versions ) ; $i++ ) { 
        
        $maj_release[$i] = $wp_versions[$i]['cycle'];

    }

    return $maj_release;
}