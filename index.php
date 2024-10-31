<?php
/*
  Plugin Name: Remove Checkout Fields
  Plugin URl: http://webtech.gq
  Description: Remove Checkout Fields plugin for Remove Woocommerce checkout Fields.
  Version: 1.0
  Author: Muhammad Ahmad
  Author URI: https://www.fiverr.com/aliali44
 */
// Exit if accessed directly 
  if (!defined('ABSPATH'))
    exit;
include_once 'admin/admin.php';
/**
* creating a table for Removing Shipping details //
* on activating the plugin
*/
function RemoveCheckoutFieldsTable()
{      
  global $wpdb; 
  $db_table_name = $wpdb->prefix . 'checkout_remove';  // table name //
  $charset_collate = $wpdb->get_charset_collate();
  $sql = "CREATE TABLE $db_table_name (
    id int(11) NOT NULL auto_increment,
    fName varchar(1),
    lName varchar(1),
    company varchar(1),
    addr1 varchar(1),
    addr2 varchar(1),
    city varchar(1),
    zipcode varchar(1),
    country varchar(1),
    state varchar (1),
    phone varchar (1),
    email varchar (1),
    notes varchar (1),
    UNIQUE KEY id (id)
    ) $charset_collate;";
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql );
add_option( 'test_db_version', $test_db_version );
   //Adding default values
$wpdb->insert( $db_table_name, array( 'fName' => '1', 'lName' => '1', 'company' => '1', 'addr1' => '1', 'addr2' => '1', 'city' => '1' ,'zipcode' => '1', 'country' => '1', 'state' => '1', 'phone' => '1', 'email' => '1', 'notes' => '1') );
} 
register_activation_hook( __FILE__, 'RemoveCheckoutFieldsTable' );
?>
<?php
      /*========================= UNSET CHECKOUT FIELDS WOOCOMMERCE=============*/
        global $wpdb;
        $tableName = $wpdb->prefix . 'checkout_remove';
        $result = $wpdb->get_results( "SELECT * FROM $tableName");       
        foreach ( $result as $print )   { 
              $userid      = esc_html($print->id);//sanize
          $userfName    = esc_html($print->fName);
          $userlName    = esc_html($print->lName);
          $usercompany  = esc_html($print->company);
          $useraddr1    = esc_html($print->addr1);
          $useraddr2    = esc_html($print->addr2);
          $usercity     = esc_html($print->city);
           $userzipcode = esc_html($print->zipcode);
            $usercountry = esc_html($print->country);
            $userstate = esc_html($print->state);
            $userphone = esc_html($print->phone);
            $useremail = esc_html($print->email);
            $usernotes = esc_html($print->notes);
            }
            //unset first name
            if ($userfName=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_fName' );
                function remove_checkout_fName( $fields ) {
                unset($fields['billing']['billing_first_name']);
                return $fields;
                }
             }
             //unset last name
            if ($userlName=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_lName' );
                function remove_checkout_lName( $fields ) {
                unset($fields['billing']['billing_last_name']);
                return $fields;
                }
             }
             //unset company
            if ($usercompany=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_company' );
                function remove_checkout_company( $fields ) {
                unset($fields['billing']['billing_company']);
                return $fields;
                }
             }
              //unset address_1
            if ($useraddr1=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_addr1' );
                function remove_checkout_addr1( $fields ) {
                unset($fields['billing']['billing_address_1']);
                return $fields;
                }
             }
               //unset address2
            if ($useraddr2=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_addr2' );
                function remove_checkout_addr2( $fields ) {
                unset($fields['billing']['billing_address_2']);
                return $fields;
                }
             }
             //unset city
              if ($usercity=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_city' );
                function remove_checkout_city( $fields ) {
                unset($fields['billing']['billing_city']);
                return $fields;
                }
             }
             //unset zipcode
              if ($userzipcode=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_zipcode' );
                function remove_checkout_zipcode( $fields ) {
                unset($fields['billing']['billing_postcode']);
                return $fields;
                }
             }
             //unset country
              if ($usercountry=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_country' );
                function remove_checkout_country( $fields ) {
                unset($fields['billing']['billing_country']);
                return $fields;
                }
             }
             //unset state
              if ($userstate=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_state' );
                function remove_checkout_state( $fields ) {
                unset($fields['billing']['billing_state']);
                return $fields;
                }
             }
              //unset phone
              if ($userphone=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_phone' );
                function remove_checkout_phone( $fields ) {
                unset($fields['billing']['billing_phone']);
                return $fields;
                }
             }
              //unset email
              if ($useremail=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_email' );
                function remove_checkout_email( $fields ) {
                unset($fields['billing']['billing_email']);
                return $fields;
                }
             }
             //unset notes
              if ($usernotes=="0") {
               add_filter( 'woocommerce_checkout_fields' , 'remove_checkout_notes' );
                function remove_checkout_notes( $fields ) {
                unset($fields['order']['order_comments']);
                return $fields;
                }
             }      
      ?>