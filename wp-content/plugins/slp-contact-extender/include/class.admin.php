<?php

if (! class_exists('SLPCEX_Admin')) {
    require_once(SLPLUS_PLUGINDIR.'/include/base_class.admin.php');

    /**
     * Admin interface methods.
     *
     * @package StoreLocatorPlus\Contacts\Admin
     * @author Lance Cleveland <lance@charlestonsw.com>
     * @copyright 2014 Charleston Software Associates, LLC
     *
     */
    class SLPCEX_Admin extends SLP_BaseClass_Admin {

        //-------------------------------------
        // Methods : Base Override
        //-------------------------------------

        /**
         * Execute some admin startup things for this add-on pack.
         *
         * Base plugin override.
         */
        function do_admin_startup() {
            $this->check_for_updates();
            $this->update_install_info();
        }

        /**
         * Hooks and Filters for this plugin.
         *
         * Base plugin override.
         */
        function add_hooks_and_filters() {
            $this->slplus->createobject_AddOnManager();
            if ($this->slplus->add_ons->is_active('slp-pro')) {
                add_filter('slp_csv_locationdata'       , array( $this, 'filter_CheckForPreExistingIdentifier'  ) );
            }
        }

        //-------------------------------------
        // Methods : Custom
        //-------------------------------------

        /**
         * Look to see if incoming Identifier data is already in the extended data set.
         *
         * @param mixed[] $location_data
         * @return mixed[] $location_data
         */
        public function filter_CheckForPreExistingIdentifier($location_data) {
           if ( isset( $location_data['sl_identifier'] ) && ! empty( $location_data['sl_identifier'] ) ) {

                // Fetch sl_id from provided identifier.
                //
                $location_se_data = $this->slplus->database->get_Record(
                    array(
                        'select_slid',
                        " WHERE identifier = '%s' "
                        ),
                    array(
                        $location_data['sl_identifier']
                    )
                );

                // If there the select returned a valid data record object.
                //
                if ( is_object( $location_se_data ) && isset( $location_se_data->sl_id ) && ! empty ( $location_se_data->sl_id ) ) {
                    $location_data['sl_id'] = $location_se_data->sl_id;
                }
           }
           return $location_data;
        }
    }
}
// Dad. Explorer. Rum Lover. Code Geek. Not necessarily in that order.