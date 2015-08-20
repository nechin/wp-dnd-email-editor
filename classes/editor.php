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
     * Menu item
     */
    public function admin_menu() {
        add_management_page(
            'Email Editor',
            'Email Editor',
            'manage_options',
            'dnd-email-editor',
            array (
                $this,
                'render'
            )
        );
    }

}
