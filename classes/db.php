<?php
/**
 * Created by Alexander Vitkalov.
 * User: Alexander Vitkalov
 * Date: 30.07.2015
 * Time: 17:49
 */

/**
 * Database class
 * Class DNDEE_DB
 */
class DNDEE_DB {
    /**
     * $wpdb
     * @var null
     */
    protected $db = null;

    /**
     * Constructor
     */
    function __construct() {
        global $wpdb;

        $this->db = $wpdb;
    }

    /**
     * Database prefix
     *
     * @return mixed
     */
    private function get_prefix() {
        global $wpdb;

        return $wpdb->prefix;
    }

    /**
     * Drop tables
     */
    static function drop_tables() {
        global $wpdb;

        $ssmt_tables = self::get_tables();
        foreach ($ssmt_tables as $table_name => $table_sql) {
            $sql = "DROP TABLE IF EXISTS ". $table_name . ";";
            $wpdb->query($sql);
        }
    }

    /**
     * Get table name
     *
     * @param $name
     * @return string
     */
    public function gt($name) {
        $table_names = array(
            'settings' => self::get_prefix() . 'dndee_settings',
            'templates' => self::get_prefix() . 'dndee_templates',
        );

        if (isset($table_names)) {
            return $table_names[$name];
        }

        return '';
    }

    /**
     * Get table structure
     *
     * @return array
     */
    public function get_tables() {
        $tables = array(
            self::gt('settings') => "
                CREATE TABLE IF NOT EXISTS " . self::gt('settings') . " (
                    id INT(11) NOT NULL AUTO_INCREMENT,
                    data TEXT NOT NULL,
                    PRIMARY KEY  (id)
                )
                ENGINE = INNODB
                CHARACTER SET utf8
                COLLATE utf8_general_ci;",
            self::gt('templates') => "
                CREATE TABLE IF NOT EXISTS " . self::gt('templates') . " (
                    id INT(11) NOT NULL AUTO_INCREMENT,
                    name varchar(255) DEFAULT NULL,
                    template TEXT NOT NULL,
                    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                    PRIMARY KEY  (id)
                )
                ENGINE = INNODB
                CHARACTER SET utf8
                COLLATE utf8_general_ci;"
        );

        return $tables;
    }
}