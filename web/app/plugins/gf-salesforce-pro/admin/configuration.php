<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

/*
 * This is a function that create menu
 */
if ( ! function_exists( 'gf_sf_add_configuration_sub_menu' ) ) {
    add_action( 'admin_menu', 'gf_sf_add_configuration_sub_menu' );
    function gf_sf_add_configuration_sub_menu() {
        
        add_submenu_page( 'gf_sf-integration', 'Gravity Forms Salesforce CRM Configuration', 'Configuration', 'manage_options', 'gf_sf-configuration', 'gf_sf_configuration_sub_menu_callback' );
        add_submenu_page( 'gf_sf-integration', 'Gravity Forms Salesforce CRM Verification', 'Licence Verification', 'manage_options', 'gf_sf_licence_verification', 'gf_sf_licence_verification' );
    }
}

/*
 * This is a function for configuration
 */
if ( ! function_exists( 'gf_sf_configuration_sub_menu_callback' ) ) {
    function gf_sf_configuration_sub_menu_callback() {
        
        if ( isset( $_REQUEST['submit'] ) ) {
            $request = $_REQUEST;
            unset( $request['submit'] );
            if ( $request != null ) {
                foreach ( $request as $key => $value ) {
                    if ( $key == 'gf_sf_password' ) {
                        update_option( $key, gf_sf_crypt( $value, 'e', $request['gf_sf_client_secret'] ) );
                    } else {
                        update_option( $key, $value );
                    }
                }
            }
        }
        
        $client_id = get_option( 'gf_sf_client_id' );
        $client_secret = get_option( 'gf_sf_client_secret' );
        $username = get_option( 'gf_sf_username' );
        $password = gf_sf_crypt( get_option( 'gf_sf_password' ), 'd', $client_secret );
        
        $gf_sf_licence = get_site_option( 'gf_sf_licence' );
        ?>
            <div class="wrap">                
                <h1><?php _e( 'Gravity Forms Salesforce CRM Configuration' ); ?></h1>
                <hr>
                <?php
                if ( $gf_sf_licence ) {
                    if ( isset( $_REQUEST['submit'] ) ) {
                        $gf_sf = new GF_SF_REST_API( $client_id, $client_secret, $username, $password );
                        $authentication = $gf_sf->authentication();
                        if ( isset( $authentication->error ) ) {                            
                            ?>
                                <div class="notice notice-error is-dismissible">
                                    <p><?php _e( 'Configuration failure.' ); ?></p>
                                </div>
                            <?php
                        } else {                            
                            $modules = unserialize( get_option( 'gf_sf_modules' ) );                            
                            $gf_sf_modules_fields = array();
                            if ( $modules != null ) {
                                foreach( $modules as $key => $value ) {
                                    $gf_sf_modules_fields[$key] = $gf_sf->getModuleFields( $authentication->instance_url, $authentication->token_type, $authentication->access_token, $key );
                                }
                            }      
                            update_option( 'gf_sf_modules_fields', $gf_sf_modules_fields );
                            ?>
                                <div class="notice notice-success is-dismissible">
                                    <p><?php _e( 'Configuration successful.' ); ?></p>
                                </div>
                            <?php
                        }                        
                    }
                    ?>
                    <form method="post">
                        <table class="form-table">
                            <tbody>
                                <tr>
                                    <th scope="row"><label><?php _e( 'Consumer Key' ); ?> <span class="description">(required)</span></label></th>
                                    <td>
                                        <input class="regular-text" type="text" name="gf_sf_client_id" value="<?php echo $client_id; ?>" required />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label><?php _e( 'Consumer Secret' ); ?> <span class="description">(required)</span></label></th>
                                    <td>
                                        <input class="regular-text" type="text" name="gf_sf_client_secret" value="<?php echo $client_secret; ?>" required />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label><?php _e( 'Username' ); ?> <span class="description">(required)</span></label></th>
                                    <td>
                                        <input class="regular-text" type="text" name="gf_sf_username" value="<?php echo $username; ?>" required />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><label><?php _e( 'Password' ); ?> <span class="description">(required)</span></label></th>
                                    <td>
                                        <input class="regular-text" type="password" name="gf_sf_password" value="" required />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p><input type='submit' class='button-primary' name="submit" value="<?php _e( 'Save' ); ?>" /></p>
                    </form>
                    <?php
                } else {
                    ?>
                        <div class="notice notice-error is-dismissible">
                            <p><?php _e( 'Please verify purchase code.' ); ?></p>
                        </div>
                    <?php
                }
                ?>
            </div>
        <?php
    }
}

/*
 * This is a function that verify product licence.
 */
if ( ! function_exists( 'gf_sf_licence_verification' ) ) {
    function gf_sf_licence_verification() {
        
        if ( isset( $_REQUEST['verify'] ) ) {
            if ( isset( $_REQUEST['gf_sf_purchase_code'] ) ) {
                update_site_option( 'gf_sf_purchase_code', $_REQUEST['gf_sf_purchase_code'] );
                
                $data = array(
                    'sku'           => '20174431',
                    'purchase_code' => $_REQUEST['gf_sf_purchase_code'],
                    'domain'        => site_url(),
                    'status'        => 'verify',
                    
                );

                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_URL, 'https://obtaincode.net/extension/' );
                curl_setopt( $ch, CURLOPT_POST, 1 );
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
                $json_response = curl_exec( $ch );
                curl_close ($ch);
                
                $response = json_decode( $json_response );
                $response = json_decode( $json_response );
                if ( isset( $response->success ) ) {
                    if ( $response->success ) {
                        update_site_option( 'gf_sf_licence', 1 );
                    }
                }
            }
        } else if ( isset( $_REQUEST['unverify'] ) ) {
            if ( isset( $_REQUEST['gf_sf_purchase_code'] ) ) {
                $data = array(
                    'sku'           => '20174431',
                    'purchase_code' => $_REQUEST['gf_sf_purchase_code'],
                    'domain'        => site_url(),
                    'status'        => 'unverify',
                    
                );

                $ch = curl_init();
                curl_setopt( $ch, CURLOPT_URL, 'https://obtaincode.net/extension/' );
                curl_setopt( $ch, CURLOPT_POST, 1 );
                curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $data ) );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
                curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
                $json_response = curl_exec( $ch );
                curl_close ($ch);

                $response = json_decode( $json_response );
                if ( isset( $response->success ) ) {
                    if ( $response->success ) {
                        update_site_option( 'gf_sf_purchase_code', '' );
                        update_site_option( 'gf_sf_licence', 0 );
                    }
                }
            }
        }    
        
        $gf_sf_purchase_code = get_site_option( 'gf_sf_purchase_code' );
        ?>
            <div class="wrap">      
                <h2><?php _e( 'Licence Verification' ); ?></h2>
                <?php
                    if ( isset( $response->success ) ) {
                        if ( $response->success ) {                            
                             ?>
                                <div class="notice notice-success is-dismissible">
                                    <p><?php echo $response->message; ?></p>
                                </div>
                            <?php
                        } else {
                            update_site_option( 'gf_sf_licence', 0 );
                            ?>
                                <div class="notice notice-error is-dismissible">
                                    <p><?php echo $response->message; ?></p>
                                </div>
                            <?php
                        }
                    }
                ?>
                <form method="post">
                    <table class="form-table">                    
                        <tbody>
                            <tr>
                                <th scope="row"><?php _e( 'Purchase Code' ); ?></th>
                                <td>
                                    <input name="gf_sf_purchase_code" type="text" class="regular-text" value="<?php echo $gf_sf_purchase_code; ?>" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <p>
                        <input type='submit' class='button-primary' name="verify" value="<?php _e( 'Verify' ); ?>" />
                        <input type='submit' class='button-primary' name="unverify" value="<?php _e( 'Unverify' ); ?>" />
                    </p>
                </form>   
            </div>
        <?php
    }
}