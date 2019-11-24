<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 3:50 PM
 */

namespace Phramer\Interfaces;


interface TemplateEngineInterface {

    /**
     * @param string $file
     * @param array  $parameters
     *
     * @return string
     */
    public function render($file, $parameters) : string;

}