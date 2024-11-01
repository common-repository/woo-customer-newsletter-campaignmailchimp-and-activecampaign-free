<?php
/*
Plugin Name: WooCommerce Customer Newsletter Campaign(MailChimp and ActiveCampaign) Free
Plugin URI: http://www.wpsuperiors.com/product/woocommerce-customer-newsletter-campaign-mailchimp-activecampaign/
Description: Run Newsletter Campaign For Your Store's Customer with Best Email Marketing Campaign Companies.
Version: 1.0.0
Author: WPSuperiors
Author URI: http://www.wpsuperiors.com/
* WC requires at least: 3.4.0
* WC tested up to: 3.4.0
*/
if ( ! defined( 'ABSPATH' ) ) {
	wp_die('Please Go Back');
	exit;
}
add_action( 'admin_init', 'active_check_WPS_WOO_CUST_NEWS_CAMP_FR' );
function active_check_WPS_WOO_CUST_NEWS_CAMP_FR() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        add_action( 'admin_notices', 'active_failed_notice_WPS_WOO_CUST_NEWS_CAMP_FR1' );
        deactivate_plugins( plugin_basename( __FILE__ ) ); 
        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
    if ( is_admin() && current_user_can( 'activate_plugins' )){
        if ( is_plugin_active( 'woo-customer-newsletter-campaign-mc-ac-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-cc-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-cc-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-ck-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-ck-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-cm-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-cm-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-gr-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-gr-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-ic-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-ic-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-rc-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-rc-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-sib-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-sib-premium/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-zc-free/index.php' ) ||
            is_plugin_active( 'woo-customer-newsletter-campaign-mc-zc-premium/index.php' )
             ) {
            add_action( 'admin_notices', 'active_failed_notice_WPS_WOO_CUST_NEWS_CAMP_FR2' );
            deactivate_plugins( plugin_basename( __FILE__ ) ); 
            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }
    }
}
require 'includes/wps-wcnc-main.php';
function active_failed_notice_WPS_WOO_CUST_NEWS_CAMP_FR1(){
    ?><div class="error"><p>Please Activate <b>WooCommerce</b> Plugin, Before You Proceed To Activate This Plugin.</p></div><?php
}

function active_failed_notice_WPS_WOO_CUST_NEWS_CAMP_FR2(){
    ?><div class="error"><p>Please Deactivate other <b>Newsletter Campaign</b> Plugins, from <b>WPSuperiors</b>, Before You Proceed To Activate This Plugin.</p></div><?php
}

