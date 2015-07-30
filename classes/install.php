<?php
/**
 * Created by Alexander Vitkalov
 * User: Alexander Vitkalov
 * Date: 30.07.2015
 * Time: 0:34
 */

/**
 * Install class
 * Class DNDEE_Install
 */
class DNDEE_Install extends DNDEE_DB {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Plugin activation
     */
    public function activation() {
        // Create tables
        global $wpdb;

        $ssmt_tables = $this->get_tables();
        foreach ($ssmt_tables as $table_name => $table_sql) {
            if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($table_sql);
            }
        }
    }

    /**
     * Delete plugin
     */
    public function uninstall() {
        DNDEE_Install::drop_tables();
    }

} 