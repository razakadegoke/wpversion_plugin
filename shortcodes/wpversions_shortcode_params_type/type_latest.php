<?php

function type_latest(): string {

    $latest = get_transient('wp_versions')[0]['latest'];

    return '<span>' . $latest . '</span>';

}