<?php

function add_plugin_page() {

    add_menu_page(
        'wpversions', 
        'WordPress versions', 
        'manage_options', 
        'wpversions', 
        'render'
    );
    
}

function render() {

    $hour = date('H:i:s', get_transient( 'update_time' ));
    $date = date('Y-m-d', get_transient( 'update_time' ));

    if ( isset( $_POST['update_wp_versions'] ) && wp_verify_nonce( $_POST['wp_versions_nonce'], 'update_wp_versions' ) ) {

        caching_wp_verions();

    }

    ?>
    <div class="wrap">

        <h1>WordPress Versions</h1>

        <p>The last backup was at <?php echo $hour; ?> on <?php echo $date; ?></p>

        <form method="post">

            <?php wp_nonce_field( 'update_wp_versions', 'wp_versions_nonce' ); ?>

            <button class="button" type="submit" name="update_wp_versions">REFRESH</button>

        </form>
        
    </div>

    <style>
        .wrap {
            background-color: #f0f0f0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 16px;
        }
        </style>
    <?php

    wp_head();

}