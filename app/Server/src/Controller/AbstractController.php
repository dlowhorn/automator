<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:51 PM
 */

namespace Server\Controller;

use Server\Framework\PhpTemplateEngine;
use Server\Framework\TemplateEngineInterface;

abstract class AbstractController {

    protected $params;

    /** @var TemplateEngineInterface */
    protected $templateEngine;

    /**
     * AbstractController constructor.
     *
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->params         = $params;
        $this->templateEngine = new PhpTemplateEngine();
    }

    /**
     * @param string $file
     * @param array  $parameters
     */
    public function renderTemplate($file, $parameters = [])
    {
        echo $this->templateEngine->render($file, $parameters);
    }

    /**
     * @param string $content
     */
    public function raw($content)
    {
        echo $content;
    }

    /**
     * @param mixed $content
     */
    public function json($content)
    {
        echo json_encode($content);
    }

    /**
     * @param \Exception $exception
     */
    public function exception(\Exception $exception)
    {
        $this->renderTemplate('exception', ['exception' => $exception]);
    }

}