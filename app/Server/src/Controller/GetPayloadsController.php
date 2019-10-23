<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:13 PM
 */

namespace Server\Controller;

class GetPayloadsController extends AbstractController implements ControllerInterface {

    public const SUCCESS = 1;
    public const NOT_FOUND = 2;
    public const INVALID = 3;

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

        header('Content-Type: application/json');

        $filename = $this->token . '.json';
        $payload  = $this->payloadPath . '/' . $filename;
        $code     = self::NOT_FOUND;
        $data     = null;

        if (file_exists($payload)) {

            if (null == ($data = json_decode(file_get_contents($payload)))) {
                $code = self::INVALID;
            } else {
                $code = self::SUCCESS;
            }

        }

        echo json_encode([
            'payload' => $filename,
            'code'    => $code,
            'data'    => $data,
        ]);

    }

}