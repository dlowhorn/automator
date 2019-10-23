<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

class ReceivePayloadController extends AbstractController implements ControllerInterface {


    private $token;
    private $payloadPath;

    /**
     * GetPayloadsController constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        parent::__construct($params);
        $this->token       = isset($this->params['token']) ? $this->params['token'] : null;
        $this->payloadPath = __DIR__ . '/../../payloads';
    }

    public function index()
    {

        $this->json([
            'success' => TRUE,
            'token'   => $this->token,
        ]);

    }

}