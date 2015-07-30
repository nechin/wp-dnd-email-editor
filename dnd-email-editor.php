<?php
/**
 * Plugin Name: Drag'n'Drop Email Editor
 * Description: The visual editor for creating emails
 * Version: 0.0.3
 * Author: Alexander Vitkalov
 * Author URI: http://explit.ru
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//Load the plugin
require dirname(__FILE__) . '/classes/init.php';
$dndee = new DNDEE_Init();
$dndee->init();
