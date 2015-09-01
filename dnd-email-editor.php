<?php
/**
 * Plugin Name: Drag'n'Drop Email Editor
 * Description: The visual editor for creating emails
 * Version: 0.0.5
 * Author: Alexander Vitkalov
 * Author URI: http://explit.ru
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('DNDEE_PATH', __FILE__);
define('DNDEE_DIR', dirname(DNDEE_PATH));
define('DNDEE_URL', plugin_dir_url(DNDEE_PATH));

//Load the plugin
require DNDEE_DIR . '/classes/init.php';
$dndee = new DNDEE_Init();
$dndee->init();
