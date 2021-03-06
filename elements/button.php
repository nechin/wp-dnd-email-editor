<?php
/**
 * Created by Alexander Vitkalov.
 * User: Alexander Vitkalov
 * Date: 02.09.2015
 * Time: 0:06
 */

/**
 * Button element
 * Class DNDEE_Button
 */
class DNDEE_Button extends DNDEE_Element {

    function __construct() {

    }

    /**
     * Render element
     *
     * @return mixed|void
     */
    public function render() {
        echo '<div class="element-wrapper-button">
<div class="dndee-button" style="
background: #3498db;
border-radius: 4px;
color: #ffffff;
font-size: 20px;
padding: 10px;
text-decoration: none;
text-align: center;
width: 90px;
">Button</div>
</div>';
    }

    /**
     * Enqueue script element
     *
     * @return mixed|void
     */
    public function enqueue_script() {
        wp_register_script('dndee-button-js', DNDEE_URL . 'elements/assets/js/button.js');
        wp_enqueue_script('dndee-button-js');
        wp_register_style('dndee-button-css', DNDEE_URL . 'elements/assets/css/button.css');
        wp_enqueue_style('dndee-button-css');
    }

}
