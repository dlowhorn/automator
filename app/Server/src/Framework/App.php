<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 4:09 PM
 */

namespace Server\Framework;

use Server\Controller\NotFoundController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class App {

    private $config;
    private $routes;
    private $explicitRouteControllers;

    /** @var RouterInterface */
    private $router;

    public function __construct()
    {

        $this->config = include __DIR__ . '/../../config.php';
        $this->configureRouting();

    }

    /**
     * @return App
     * @throws \Exception
     */
    private function configureRouting() : App
    {

        $explicitRouteControllers = [];
        $routeCollection          = new RouteCollection();

        if (isset($this->config['routes'])) {
            foreach ($this->config['routes'] as $route => $config) {

                $routeName = $config['name'] ? : $route;
                $newRoute  = new Route($route);
                $newRoute->setMethods($config['methods'] ? : 'GET');

                if (isset($config['controller'])) {
                    $explicitRouteControllers[$routeName] = $config['controller'];
                }

                $routeCollection->add($routeName, $newRoute);
            }
        }

        $this->routes = (new CompiledUrlMatcherDumper($routeCollection))->getCompiledRoutes();
        $this->router = new Router($this->routes, $explicitRouteControllers);

        return $this;

    }

    public function handleRequest()
    {

        ob_start();

        try {

            $request = Request::createFromGlobals();
            ($this->router->mapRequestToController($request))->handleRequest($request);

        } catch (ResourceNotFoundException $exception) {

            http_response_code(500);
            (new NotFoundController())->exception($exception);

        }

        ob_end_flush();

    }

}