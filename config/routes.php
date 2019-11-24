<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 4:13 PM
 */

return [

    '/' => [
        'name'    => 'home',
        'methods' => ['GET'],
    ],

    '/by-controller/{token}' => [
        'name'       => 'by-controller',
        'controller' => \Phramer\Controller\ControllerNamedAnything::class,
        'methods'    => ['GET'],
    ],

];