<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'restricted access' );
}

/*
 * This is a function that create menu
 */
if ( ! function_exists( 'gf_sf_add_integration_main_menu' ) ) {
    add_action('admin_menu', 'gf_sf_add_integration_main_menu');
    function gf_sf_add_integration_main_menu() {
        
        add_menu_page( 'Gravity Forms Salesforce CRM Integration', 'GF - Salesforce', 'manage_options', 'gf_sf-integration', 'gf_sf_integration_main_menu_callback', 'dashicons-migrate' );
        add_submenu_page( 'gf_sf-integration', 'Gravity Forms Salesforce CRM Integration', 'Integration', 'manage_options', 'gf_sf-integration', 'gf_sf_integration_main_menu_callback' );
    }
}

/*
 * This is a function for integration
 */
if ( ! function_exists( 'gf_sf_integration_main_menu_callback' ) ) {
    function gf_sf_integration_main_menu_callback() {
        
        global $wpdb;
        
        $gf_sf_licence = get_site_option( 'gf_sf_licence' );
        $gf_db_version = get_option( 'gf_db_version' );
        ?>
            <div class="wrap">                
                <h1><?php _e( 'Gravity Forms Salesforce CRM Integration' ); ?></h1>
                <hr>                
                <?php
                    if ( $gf_sf_licence ) {
                        if ( isset( $_REQUEST['id'] ) ) {
                            $id = intval( $_REQUEST['id'] );
                            if ( isset( $_REQUEST['submit'] ) ) {                            
                                update_option( 'gf_sf_'.$id, $_REQUEST['gf_sf'] );
                                update_option( 'gf_sf_fields_'.$id, $_REQUEST['gf_sf_fields'] );
                                ?>
                                    <div class="notice notice-success is-dismissible">
                                        <p><?php _e( 'Integration settings saved.' ); ?></p>
                                    </div>
                                <?php
                            } else if ( isset( $_REQUEST['filter'] ) ) {
                                update_option( 'gf_sf_module_'.$id, $_REQUEST['gf_sf_module'] );
                            }

                            $gf_sf_module = get_option( 'gf_sf_module_'.$id );

                            $gf_sf = get_option( 'gf_sf_'.$id );
                            $gf_sf_fields = get_option( 'gf_sf_fields_'.$id );

                            if ( $gf_db_version && version_compare( $gf_db_version, '2.3', '>=' ) ) {
                                $form_meta = $wpdb->get_row( 'SELECT * FROM '.$wpdb->prefix.'gf_form_meta WHERE form_id='.$id.' LIMIT 1' );
                            } else {
                                $form_meta = $wpdb->get_row( 'SELECT * FROM '.$wpdb->prefix.'rg_form_meta WHERE form_id='.$id.' LIMIT 1' );
                            }
                            
                            $form = json_decode( $form_meta->display_meta );
                            ?>   
                                <h2><?php _e( 'Form' ); ?>: <?php echo $form->title; ?></h2>
                                <hr>
                                <form method="post">
                                    <table class="form-table">
                                        <tbody>
                                            <tr>
                                                <th scope="row"><label><?php _e( 'Module' ); ?></label></th>
                                                <td>
                                                    <select name="gf_sf_module">
                                                        <option value=""><?php _e( 'Select a module' ); ?></option>
                                                        <?php
                                                            $modules = unserialize( get_option( 'gf_sf_modules' ) );
                                                            foreach ( $modules as $key => $value ) {
                                                                $selected = '';
                                                                if ( $key == $gf_sf_module ) {
                                                                    $selected = ' selected="selected"';
                                                                }
                                                                ?>
                                                                    <option value="<?php echo $key; ?>"<?php echo $selected; ?>><?php echo $value; ?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><?php _e( 'Filter module fields' ); ?></th>
                                                <td><button type="submit" name="filter" class='button-secondary'><?php _e( 'Filter' ); ?></button></td>
                                            </tr>
                                            <tr>
                                                <th scope="row"><label><?php _e( 'Salesforce CRM Integration?' ); ?></label></th>
                                                <td>
                                                    <input type="hidden" name="gf_sf" value="0" />
                                                    <input type="checkbox" name="gf_sf" value="1"<?php echo ( $gf_sf ? ' checked' : '' ); ?> />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <?php                                    
                                        if ( $form->fields != null ) {                                        
                                            $gf_fields = array();
                                            foreach ( $form->fields as $field ) {
                                                $gf_fields[$field->id] = array(
                                                    'key'   => $field->id,
                                                    'type'  => $field->type,
                                                    'label' => $field->label,
                                                );
                                            }
                                        }

                                        if ( $gf_fields != null ) {
                                            ?>
                                                <table class="widefat striped">
                                                    <thead>
                                                        <tr>
                                                            <th><?php _e( 'Gravity Forms Field' ); ?></th>
                                                            <th><?php _e( 'Salesforce CRM Field' ); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th><?php _e( 'Gravity Forms Field' ); ?></th>
                                                            <th><?php _e( 'Salesforce CRM Field' ); ?></th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        <?php
                                                            $gf_sf_modules_fields = get_option( 'gf_sf_modules_fields' );
                                                            $gf_sf_module_fields = ( isset( $gf_sf_modules_fields[$gf_sf_module] ) ? $gf_sf_modules_fields[$gf_sf_module] : array() );
                                                            if ( ! is_array( $gf_sf_module_fields ) ) {
                                                                $gf_sf_module_fields = array();
                                                            }

                                                            foreach ( $gf_fields as $gf_sf_field_key => $gf_sf_field_value ) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $gf_sf_field_value['label']; ?></td>
                                                                        <td>
                                                                            <select name="gf_sf_fields[<?php echo $gf_sf_field_key; ?>][key]">
                                                                                <option value=""><?php _e( 'Select a field' ); ?></option>
                                                                                <?php    
                                                                                    $type = '';
                                                                                    foreach ( $gf_sf_module_fields as $key => $value ) {
                                                                                        $selected = '';
                                                                                        if ( isset( $gf_sf_fields[$gf_sf_field_key]['key'] ) && $gf_sf_fields[$gf_sf_field_key]['key'] == $key ) {
                                                                                            $selected = ' selected="selected"';
                                                                                            $type = $value['type'];
                                                                                        }   
                                                                                        ?>
                                                                                            <option value="<?php echo $key; ?>"<?php echo $selected; ?>>
                                                                                                <?php echo $value['label']; ?> (<?php _e( 'Data Type:' ); ?> <?php echo $value['type']; echo ( $value['required'] ? __( ' and Field: required' ) : '' ); ?>)                                                                                                      
                                                                                            </option>
                                                                                        <?php
                                                                                    }
                                                                                ?>                                                                                   
                                                                            </select>
                                                                            <input type="hidden" name="gf_sf_fields[<?php echo $gf_sf_field_key; ?>][type]" value="<?php echo $type; ?>" />
                                                                            <input type="hidden" name="gf_sf_fields[<?php echo $gf_sf_field_key; ?>][field_type]" value="<?php echo $gf_sf_field_value['type']; ?>" />
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                            }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            <?php
                                        } else {
                                            ?><p><?php _e( 'No fields found.' ); ?></p><?php
                                        }
                                    ?>
                                    <p><input type='submit' class='button-primary' name="submit" value="<?php _e( 'Save' ); ?>" /></p>
                                </form>
                            <?php
                        } else {
                            ?>
                            <table class="widefat striped">
                                <thead>
                                    <tr>
                                        <th><?php _e( 'Title' ); ?></th>
                                        <th><?php _e( 'Status' ); ?></th>       
                                        <th><?php _e( 'Action' ); ?></th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th><?php _e( 'Title' ); ?></th>
                                        <th><?php _e( 'Status' ); ?></th>       
                                        <th><?php _e( 'Action' ); ?></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php                                    
                                        if ( $gf_db_version && version_compare( $gf_db_version, '2.3', '>=' ) ) {
                                            $forms = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'gf_form WHERE is_trash=0' );
                                        } else {
                                            $forms = $wpdb->get_results( 'SELECT * FROM '.$wpdb->prefix.'rg_form WHERE is_trash=0' );
                                        }
                                        
                                        if ( $forms != null ) {                                
                                            foreach ( $forms as $form ) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $form->title; ?></td>
                                                        <td><?php echo ( get_option( 'gf_sf_'.$form->id ) ? '<span class="dashicons dashicons-yes"></span>' : '<span class="dashicons dashicons-no"></span>' ); ?></td>
                                                        <td><a href="<?php echo menu_page_url( 'gf_sf-integration', 0 ); ?>&id=<?php echo $form->id; ?>"><span class="dashicons dashicons-edit"></span></a></td>
                                                    </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                                <tr>
                                                    <td colspan="3"><?php _e( 'No forms found.' ); ?></td>
                                                </tr>
                                            <?php
                                        }                        
                                    ?>
                                </tbody>
                            </table>
                            <?php                         
                        } 
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