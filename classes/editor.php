<?php
/**
 * Created by Alexander Vitkalov
 * User: Alexander Vitkalov
 * Date: 30.07.2015
 * Time: 0:46
 */

/**
 * Editor class
 * Class DNDEE_Editor
 */
class DNDEE_Editor extends DNDEE_DB {
    /**
     * Constructor
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * Return editor template filepath
     *
     * @return string
     */
    private function get_editor_template_file_path() {
        return DNDEE_DIR . '/templates/editor.php';
    }

    /**
     * Return editor template content
     *
     * @return string
     */
    private function get_editor_template_content() {
        $template_file_path = $this->get_editor_template_file_path();
        if (file_exists($template_file_path)) {
            ob_start();
            include $template_file_path;
            $content = ob_get_contents();
            ob_end_clean();
        } else {
            $content = "<p>Template {$template_file_path} not found</p>";
        }

        return $content;
    }

    /**
     * Render editor page
     */
    public function render() {
        echo $this->get_editor_template_content();
    }

    /**
     * Вывод элементов
     */
    public function render_elements() {
        require_once(DNDEE_DIR . '/elements/base/element.php');
        $elements = require_once(DNDEE_DIR . '/elements/_config.php');

        foreach ($elements as $element) {

            if (isset($element['filename']) && isset($element['classname'])) {
                $file_name = $element['filename'];
                $class_file = DNDEE_DIR . '/elements/' . $file_name;
                $class_name = $element['classname'];

                if (is_readable($class_file)) {
                    require_once($class_file);
                    $element = new $class_name();
                    $element->enqueue_script();
                    $element->render();
                }
            }
        }
    }

    /**
     * Menu item
     */
    public function admin_menu() {
        $page = add_management_page(
            'Email Editor',
            'Email Editor',
            'manage_options',
            'dnd-email-editor',
            array (
                $this,
                'render'
            )
        );

        add_action('admin_print_scripts-' . $page, array($this, 'editor_admin_scripts'));
    }

    /**
     * Скрипты редактора
     */
    function editor_admin_scripts() {
        wp_register_style('dndee-editor', DNDEE_URL . 'assets/css/editor.css');
        wp_enqueue_style('dndee-editor');

        wp_enqueue_script('jquery-ui-draggable');

        wp_register_script('dndee-editor', DNDEE_URL . 'assets/js/editor.js');
        wp_enqueue_script('dndee-editor');
    }

}
