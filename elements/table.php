<?php
/**
 * Created by Alexander Vitkalov.
 * User: Alexander Vitkalov
 * Date: 07.10.2015
 * Time: 23:07
 */
/**
 * Table element
 * Class DNDEE_Table
 */
class DNDEE_Table extends DNDEE_Element {

    function __construct() {

    }

    /**
     * Render element
     *
     * @return mixed|void
     */
    public function render() {
        echo '<div class="element-wrapper-table">
<div class="dndee-table" style="
background: #3498db;
border-radius: 4px;
color: #ffffff;
font-size: 20px;
padding: 10px;
text-decoration: none;
text-align: center;
width: 90px;
">Table</div>
</div>';
    }

    /**
     * Enqueue script element
     *
     * @return mixed|void
     */
    public function enqueue_script() {
        wp_register_script('dndee-table-js', DNDEE_URL . 'elements/assets/js/table.js');
        wp_enqueue_script('dndee-table-js');
        wp_register_style('dndee-table-css', DNDEE_URL . 'elements/assets/css/table.css');
        wp_enqueue_style('dndee-table-css');
    }

}
