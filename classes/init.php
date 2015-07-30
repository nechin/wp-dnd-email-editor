<?php
/**
 * Created by Alexander Vitkalov
 * User: Alexander Vitkalov
 * Date: 28.07.2015
 * Time: 23:43
 */

/**
 * Initialization class
 * Class DNDEE_Init
 */
class DNDEE_Init {

    /**
     * @var null|DNDEE_Install
     */
    private $install = null;

    /**
     * @var null|DNDEE_Editor
     */
    private $editor = null;

    /**
     * Constructor
     */
    function __construct() {
        // Define constants
        $this->define_constants();

        // Autoload
        spl_autoload_register(array($this, 'autoload'));

        $this->install = new DNDEE_Install();
        $this->editor = new DNDEE_Editor();
    }

    /**
     * Autoload
     * @param $class
     */
    public function autoload($class) {
        if (strpos($class, 'DNDEE_') === false) {
            return;
        }

        $classname = strtolower($class);
        $classname = explode('\\', $classname);
        $classname = array_pop($classname);
        $classfile = DNDEE_DIR . '/classes/' . str_replace('dndee_', '', $classname) . '.php';

        if (is_readable($classfile)) {
            require_once($classfile);
        }

        return;
    }

    /**
     * Define constants
     */
    private function define_constants() {
        define('DNDEE_PATH', __FILE__);
        define('DNDEE_DIR', dirname(DNDEE_PATH));
        define('DNDEE_URL', plugin_dir_url(DNDEE_PATH));
    }

    /**
     * Initialization
     */
    public function init() {
        $this->load_plugin_textdomain();

        $this->register_hooks();
    }

    /**
     * Load localization files
     */
    private function load_plugin_textdomain() {
        load_plugin_textdomain('dnd-email-editor', false, DNDEE_DIR . '/languages');
    }

    /**
     * Register hooks
     */
    private function register_hooks() {
        register_activation_hook(DNDEE_PATH, array($this->install, 'activation'));
        register_uninstall_hook(DNDEE_PATH, array('DNDEE_Install', 'uninstall'));

        add_action('admin_menu', array($this->editor, 'admin_menu'));
    }

}
