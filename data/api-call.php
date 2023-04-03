<?php

//Get WP versions from API.
function get_wp_versions(): string|array {

    $reponse = wp_remote_get('https://endoflife.date/api/wordpress.json');

    if ( ! is_wp_error($reponse) || wp_remote_retrieve_response_code( $reponse ) == 200) {

        $reponse_body = json_decode(wp_remote_retrieve_body($reponse), true);

        return $reponse_body;

    } else {

        return 'Error';

    }

}