<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 4:13 PM
 */

use Server\Controller\NewPayloadHandler;
use Server\Controller\PayloadRequestHandler;

return [

    '/' => [
        'name'    => 'home',
        'methods' => ['GET'],
    ],

    '/get-payloads/{token}' => [
        'name'       => 'get-payloads',
        'controller' => PayloadRequestHandler::class,
        'methods'    => ['GET'],
    ],

    '/new-payload/{token}' => [
        'name'       => 'new-payload',
        'controller' => NewPayloadHandler::class,
        'methods'    => ['POST'],
    ],

];