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
        echo '<input type="button" value="Button">';
    }

}
