<?php
/**
 * Plugin Name: Store Locator Plus : Contact Extender
 * Plugin URI: http://www.charlestonsw.com/product/slp4-contact-extender/
 * Description: A premium add-on pack for Store Locator Plus that adds custom contact fields.
 * Version: 4.2.02
 * Author: Charleston Software Associates
 * Author URI: http://charlestonsw.com/
 * Requires at least: 3.3
 * Tested up to : 4.0
 * 
 * Text Domain: csa-slp-cex
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// No SLP? Get out...
//
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !function_exists('is_plugin_active') ||  !is_plugin_active( 'store-locator-le/store-locator-le.php')) {
    return;
}

if (!class_exists('SLPExtendoContacts')) {
    require_once( WP_PLUGIN_DIR . '/store-locator-le/include/base_class.addon.php');


    /**
     * The Contact add-on pack for Store Locator Plus.
     *
     * @package StoreLocatorPlus\Contacts
     * @author Lance Cleveland <lance@charlestonsw.com>
     * @copyright 2014 Charleston Software Associates, LLC
     */
    class SLPExtendoContacts extends SLP_BaseClass_Addon {

        /**
         * Invoke the plugin.
         *
         * This ensures a singleton of this plugin.
         *
         * @static
         */
        public static function init() {
            static $instance = false;
            if (!$instance) {
                load_plugin_textdomain('csa-slp-cex', false, dirname(plugin_basename(__FILE__)) . '/languages/');
                $instance = new SLPExtendoContacts(
                    array(
                        'version'               => '4.2.02'                      ,
                        'min_slp_version'       => '4.2.03'                      ,

                        'name'                  => __('Contact Extender', 'csa-slp-cex')            ,
                        'option_name'           => 'slplus-extendo-contacts-options'                ,
                        'slug'                  => plugin_basename(__FILE__)                        ,
                        'metadata'              => get_plugin_data(__FILE__, false, false)          ,

                        'url'                   => plugins_url('', __FILE__)        ,
                        'dir'                   => plugin_dir_path(__FILE__)        ,

                        'admin_class_name'          => 'SLPCEX_Admin'               ,
                        'activation_class_name'     => 'SLPCEX_Activation'          ,
                    )
                );
            }
            return $instance;
        }
    }

    add_action('init'           ,array('SLPExtendoContacts','init'               ));

}
// Dad. Explorer. Rum Lover. Code Geek. Not necessarily in that order.