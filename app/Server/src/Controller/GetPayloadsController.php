<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

class GetPayloadsController extends AbstractController implements ControllerInterface {

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

    public function index()
    {
        echo 'here is the payload for ' . $this->token;
    }

}