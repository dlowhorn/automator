<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 3:47 PM
 */

namespace Phramer\Interfaces;

use Phramer\Interfaces\ControllerInterface;
use Symfony\Component\HttpFoundation\Request;

interface RouterInterface {

    /**
     * @param Request $request
     *
     * @return ControllerInterface
     */
    public function mapRequestToController(Request $request) : ControllerInterface;

    /**
     * @param $routeName
     * @param $parameters
     *
     * @return ControllerInterface
     */
    public function mapRouteNameToController($routeName, $parameters) : ControllerInterface;

}