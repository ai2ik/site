<?php
/*
Plugin Name: Gravity Forms - Salesforce CRM
Description: This plugin can integrate Contacts, Cases and Leads between your WordPress Gravity Forms and Salesforce CRM. Easily add automatically Contacts, Cases and Leads into Salesforce CRM when people submit a Gravity Forms form on your site.
Version:     1.3.0
Author:      Obtain Code
Author URI:  http://obtaincode.com/
License:     GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

define( 'GF_SF_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/*
 * This is a class file for Salesforce CRM API
 */
include_once( 'includes/class-salesforce.php' );

/*
 * This is a core functions file
 */
include_once( 'includes/functions.php' );

/*
 * This is a integration file
 */
include_once( 'admin/integration.php' );

/*
 * This is a configuration file
 */
include_once( 'admin/configuration.php' );

/*
 * This is a function that run during active plugin
 */
if ( ! function_exists( 'gf_sf_activation' ) ) {
    register_activation_hook( __FILE__, 'gf_sf_activation' );
    function gf_sf_activation() {
        
        update_option( 'gf_sf_modules', 'a:3:{s:4:"Case";s:4:"Case";s:7:"Contact";s:7:"Contact";s:4:"Lead";s:4:"Lead";}' );
    }
}

/*
 * This is a function that integrate form
 * $gf variable return form data
 */
if ( ! function_exists( 'gf_sf_integration' ) ) {
    add_action( 'gform_after_submission', 'gf_sf_integration', 20, 2 );
    function gf_sf_integration( $entry, $gf ) {
        
        $licence = get_site_option( 'gf_sf_licence' );
        if ( $licence ) {
            $form_id = 0;
            if ( isset( $gf['id'] ) ) {
                $form_id = intval( $gf['id'] );
            }

            if ( $form_id ) {
                $gf_sf = get_option( 'gf_sf_'.$form_id );
                if ( $gf_sf ) {
                    $gf_sf_fields = get_option( 'gf_sf_fields_'.$form_id );
                    if ( $gf_sf_fields != null ) {                    
                        $gf_sf_data = array();
                        foreach ( $gf_sf_fields as $gf_field_key => $sf_field ) {
                            if ( isset( $sf_field['key'] ) && $sf_field['key'] ) {
                                if ( isset( $sf_field['field_type'] ) && $sf_field['field_type'] == 'name' ) {
                                    if ( $sf_field['key'] == 'LastName' ) {
                                        $gf_sf_data['FirstName'] = strip_tags( $entry[$gf_field_key.'.3'] );
                                        $entry[$gf_field_key] = $entry[$gf_field_key.'.6'];
                                    } else {
                                        $entry[$gf_field_key] = $entry[$gf_field_key.'.3'].' '.$entry[$gf_field_key.'.6'];
                                    }
                                } else if ( isset( $sf_field['field_type'] ) && $sf_field['field_type'] == 'checkbox' ) {
                                    for( $i = 1; $i <= 20; $i++ ) {
                                        if ( isset( $entry[$gf_field_key.'.'.$i] ) ) {
                                            if ( $entry[$gf_field_key.'.'.$i] ) {
                                                $entry[$gf_field_key][] = $entry[$gf_field_key.'.'.$i];
                                            }
                                        }
                                    }
                                } else if ( isset( $sf_field['field_type'] ) && $sf_field['field_type'] == 'address' ) {
                                    if ( $sf_field['key'] == 'Street' ) {
                                        $entry[$gf_field_key] = strip_tags( $entry[$gf_field_key.'.1'].', '.$entry[$gf_field_key.'.2'] );
                                        $gf_sf_data['City'] = strip_tags ( $entry[$gf_field_key.'.3'] );
                                        $gf_sf_data['State'] = strip_tags( $entry[$gf_field_key.'.4'] );
                                        $gf_sf_data['PostalCode'] = strip_tags( $entry[$gf_field_key.'.5'] );
                                        $gf_sf_data['Country'] = strip_tags( $entry[$gf_field_key.'.6'] );
                                    } else if ( $sf_field['key'] == 'OtherStreet' ) {
                                        $entry[$gf_field_key] = strip_tags( $entry[$gf_field_key.'.1'].', '.$entry[$gf_field_key.'.2'] );
                                        $gf_sf_data['OtherCity'] = strip_tags ( $entry[$gf_field_key.'.3'] );
                                        $gf_sf_data['OtherState'] = strip_tags( $entry[$gf_field_key.'.4'] );
                                        $gf_sf_data['OtherPostalCode'] = strip_tags( $entry[$gf_field_key.'.5'] );
                                        $gf_sf_data['OtherCountry'] = strip_tags( $entry[$gf_field_key.'.6'] );
                                    } else if ( $sf_field['key'] == 'MailingStreet' ) {
                                        $entry[$gf_field_key] = strip_tags( $entry[$gf_field_key.'.1'].', '.$entry[$gf_field_key.'.2'] );
                                        $gf_sf_data['MailingCity'] = strip_tags ( $entry[$gf_field_key.'.3'] );
                                        $gf_sf_data['MailingState'] = strip_tags( $entry[$gf_field_key.'.4'] );
                                        $gf_sf_data['MailingPostalCode'] = strip_tags( $entry[$gf_field_key.'.5'] );
                                        $gf_sf_data['MailingCountry'] = strip_tags( $entry[$gf_field_key.'.6'] );
                                    } else {
                                        $entry[$gf_field_key] = $entry[$gf_field_key.'.1'].', '.$entry[$gf_field_key.'.2'].', '.$entry[$gf_field_key.'.3'].', '.$entry[$gf_field_key.'.4'].', '.$entry[$gf_field_key.'.5'].', '.$entry[$gf_field_key.'.6'];
                                    }
                                } else if ( isset( $sf_field['field_type'] ) && $sf_field['field_type'] == 'multiselect' ) {
                                    if ( $entry[$gf_field_key] ) {
                                        $entry[$gf_field_key] = json_decode( $entry[$gf_field_key] );
                                    }
                                } else if ( isset( $sf_field['field_type'] ) && $sf_field['field_type'] == 'date' ) {
                                    $entry[$gf_field_key] = date( 'Y-m-d', strtotime( $entry[$gf_field_key] ) );
                                }

                                if ( is_array( $entry[$gf_field_key] ) ) {
                                    $entry[$gf_field_key] = implode( ';', $entry[$gf_field_key] );
                                }

                                $gf_sf_data[$sf_field['key']] = strip_tags( $entry[$gf_field_key] );
                            }
                        }

                        if ( $gf_sf_data != null ) {
                            $client_id = get_option( 'gf_sf_client_id' );
                            $client_secret = get_option( 'gf_sf_client_secret' );
                            $username = get_option( 'gf_sf_username' );
                            $password = gf_sf_crypt( get_option( 'gf_sf_password' ), 'd', $client_secret );

                            $gf_sf = new GF_SF_REST_API( $client_id, $client_secret, $username, $password );
                            $authentication = $gf_sf->authentication();
                            if ( ! isset( $authentication->error ) ) { 
                                $gf_sf_module = get_option( 'gf_sf_module_'.$form_id );
                                $gf_sf->addRecord( $authentication->instance_url, $authentication->token_type, $authentication->access_token, $gf_sf_module, $gf_sf_data, $form_id );                            
                            }
                        }
                    }
                }
            }
        }
    }
}