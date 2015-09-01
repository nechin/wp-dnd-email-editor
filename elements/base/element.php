<?php
/**
 * Created by Alexander Vitkalov.
 * User: Alexander Vitkalov
 * Date: 02.09.2015
 * Time: 0:15
 */

/**
 * Base element
 * Class DNDEE_Element
 */
abstract class DNDEE_Element {

    function __construct() {

    }

    /**
     * Render element
     *
     * @return mixed
     */
    abstract protected function render();

}