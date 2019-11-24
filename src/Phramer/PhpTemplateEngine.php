<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 3:50 PM
 */

namespace Phramer;


use Phramer\Interfaces\TemplateEngineInterface;

class PhpTemplateEngine implements TemplateEngineInterface {

    /**
     * @inheritDoc
     */
    public function render($file, $parameters) : string
    {
        ob_start();
        extract($parameters);
        $path = __DIR__ . '/View/' . $file . '.php';
        include $path;

        return ob_get_clean();
    }

}