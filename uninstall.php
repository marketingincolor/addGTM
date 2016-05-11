<?php
/**
 * @link       http://www.marketingincolor.com
 * @since      0.1
 * @package    addGTM
 */
// If uninstall not called from WordPress, then exit.
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit();
}

$option_name = 'gtm_script';

delete_option( $option_name );

// For site options in Multisite
delete_site_option( $option_name );

// Delete from db
global $wpdb;
$wpdb->query( "DELETE FROM wp_options WHERE option_name= $option_name;" );
