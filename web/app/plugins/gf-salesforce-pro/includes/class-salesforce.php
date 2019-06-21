<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

/*
 * This is a class for Salesforce CRM API
 */
if ( ! class_exists( 'GF_SF_REST_API' ) ) {
    class GF_SF_REST_API {
        
        var $client_id;
        var $client_secret;
        var $username;
        var $password;
        
        function __construct( $client_id, $client_secret, $username, $password ) {
            
            $this->client_id = $client_id;
            $this->client_secret = $client_secret;
            $this->username = $username;
            $this->password = $password;
        }
        
        function authentication() {
            
            $post_fields = "grant_type=password"
                . "&client_id=".$this->client_id
                . "&client_secret=".$this->client_secret
                . "&username=".$this->username
                . "&password=".urlencode( $this->password );
            
            $ch = curl_init( 'https://login.salesforce.com/services/oauth2/token' );
            curl_setopt( $ch, CURLOPT_HEADER, false );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );        
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_fields );
            $json_response = curl_exec( $ch ); 
            $status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
            curl_close( $ch );
            $response = json_decode( $json_response );
            
            if ( isset( $response->error ) ) {
                $log = "errorCode: ".$response->error."\n";
                $log .= "message: ".$response->error_description."\n";
                $log .= "Date: ".date( 'Y-m-d H:i:s' )."\n\n";                               

                file_put_contents( GF_SF_PLUGIN_PATH.'debug.log', $log, FILE_APPEND );
            }
            
            return $response;
        }
        
        function addRecord( $instance_url, $token_type, $access_token, $module, $data, $form_id ) {
            
            $data = json_encode( $data );
            $header = array(
                'Authorization: '."$token_type $access_token",
                'Content-Type: application/json',
            );
            $url = $instance_url.'/services/data/v39.0/sobjects/'.$module.'/';
            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );        
            curl_setopt( $ch, CURLOPT_POST, true );
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $data );
            $json_response = curl_exec( $ch ); 
            $status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
            curl_close( $ch );
            $response = json_decode( $json_response );
            
            if ( ! isset( $response->id ) && isset( $response[0] ) ) {
                $log = "Form ID: ".$form_id."\n";
                $log .= "errorCode: ".$response[0]->errorCode."\n";
                $log .= "message: ".$response[0]->message."\n";
                $log .= "fields: ".implode( ',', ( isset( $response[0]->fields ) ? $response[0]->fields : array() ) )."\n";
                $log .= "Date: ".date( 'Y-m-d H:i:s' )."\n\n";                               

                file_put_contents( GF_SF_PLUGIN_PATH.'debug.log', $log, FILE_APPEND );
            }
                            
            return $response;
        }
        
        function getModuleFields( $instance_url, $token_type, $access_token, $module ) {
            
            $header = array(
                'Authorization: '."$token_type $access_token",
                'Content-Type: application/json',
            );
            $url = $instance_url.'/services/data/v39.0/sobjects/'.$module.'/describe/';
            $ch = curl_init( $url );
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $header );
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );            
            $json_response = curl_exec( $ch ); 
            $status = curl_getinfo( $ch, CURLINFO_HTTP_CODE );
            curl_close( $ch );
            $response = json_decode( $json_response );

            if ( ! isset( $response->fields ) && isset( $response[0] ) ) {
                $log = "errorCode: ".$response[0]->errorCode."\n";
                $log .= "message: ".$response[0]->message."\n";
                $log .= "Date: ".date( 'Y-m-d H:i:s' )."\n\n";                               

                file_put_contents( GF_SF_PLUGIN_PATH.'debug.log', $log, FILE_APPEND );
            }
            
            $fields = array();
            if ( isset( $response->fields ) && $response->fields != null ) {
                $fields = $response->fields;
            }
            
            $filter_fields = array();
            if ( $fields != null ) {
                foreach( $fields as $field ) {
                    if ( $field->createable && $field->type != 'reference' ) {
                        $filter_fields[$field->name] = array(
                            'label'     => $field->label,
                            'type'      => $field->type,  
                            'required'  => 1,
                        );
                        
                        if ( $field->nillable ) {
                            $filter_fields[$field->name]['required'] = 0;
                        }
                    }
                }
            }
            
            return $filter_fields;
        }
    }
}