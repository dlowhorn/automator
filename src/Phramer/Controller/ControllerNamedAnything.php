<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Phramer\Controller;

use Phramer\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;

class ControllerNamedAnything extends AbstractController implements ControllerInterface {

    private $token;

    /**
     * GetPayloadsController constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->token = isset($this->params['token']) ? $this->params['token'] : null;
    }


    public function handleRequest(Request $request)
    {
        $this->renderTemplate('by-controller', [
            'time'  => time(),
            'token' => $this->token,
        ]);
    }

}