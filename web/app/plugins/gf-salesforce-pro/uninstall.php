<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

/*
 * Delete options when plugin uninstall
 */
delete_option( 'gf_sf_client_id' );
delete_option( 'gf_sf_client_secret' );
delete_option( 'gf_sf_username' );
delete_option( 'gf_sf_password' );
delete_option( 'gf_sf_modules' );
delete_option( 'gf_sf_modules_fields' );