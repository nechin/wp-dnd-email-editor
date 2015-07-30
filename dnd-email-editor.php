<?php
/**
 * Plugin Name: Drag'n'Drop Email Editor
 * Description: Плагин для создания электронных писем, корректно отображающихся в большинстве почтовых сервисах
 * Version: 0.0.2
 * Author: Alexander Vitkalov
 * Author URI: http://explit.ru
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//Load the plugin
require dirname(__FILE__) . '/classes/DNDEE_Init.php';
$dndee = new DNDEE_Init();
$dndee->init();
