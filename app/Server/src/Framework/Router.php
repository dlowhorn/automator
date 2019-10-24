<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 3:14 PM
 */

namespace Server\Framework;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing;
use Server\Controller\ControllerInterface;

class Router implements RouterInterface {

    /** @var TemplateEngineInterface */
    protected $templateEngine;
    protected $routes;
    protected $explicitRouteControllers;

    public function __construct($routes, $explicitRouteControllers)
    {
        $this->routes                   = $routes;
        $this->explicitRouteControllers = $explicitRouteControllers;
        $this->templateEngine           = new PhpTemplateEngine();
    }

    /**
     * @param Request $request
     *
     * @return ControllerInterface
     */
    public function mapRequestToController(Request $request) : ControllerInterface
    {

        $context = new Routing\RequestContext();
        $context->fromRequest($request);

        $matcher    = new Routing\Matcher\CompiledUrlMatcher($this->routes, $context);
        $parameters = $matcher->match($request->getPathInfo());
        $routeName  = $parameters['_route'];

        return $this->mapRouteNameToController($routeName, $parameters);

    }

    /**
     * @param $routeName
     * @param $parameters
     *
     * @return ControllerInterface
     */
    public function mapRouteNameToController($routeName, $parameters) : ControllerInterface
    {

        $controllerClassName = $this->explicitRouteControllers[$routeName] ? : 'Server\\Controller\\' . str_replace(' ', '', ucwords(str_replace('-', ' ', $routeName))) . 'Controller';

        /** @var ControllerInterface $controller */
        $controller = new $controllerClassName($parameters);

        return $controller;

    }

}