<?php

require_once __DIR__ . '/../public/../../../vendor/autoload.php';

use Server\Controller\ControllerInterface;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Server\Controller;

$request = Request::createFromGlobals();
$routes  = include __DIR__ . '/../src/app.php';
$context = new Routing\RequestContext();
$context->fromRequest($request);
$matcher = new Routing\Matcher\CompiledUrlMatcher($routes, $context);

ob_start();
try {

    $parameters          = $matcher->match($request->getPathInfo());
    $routeName           = $parameters['_route'];
    $controllerClassName = 'Server\\Controller\\' . str_replace(' ', '', ucwords(str_replace('-', ' ', $routeName))) . 'Controller';

    /** @var ControllerInterface $controller */
    $controller = new $controllerClassName($parameters);
    $controller->index();

} catch (Routing\Exception\ResourceNotFoundException $exception) {

    http_response_code(500);
    echo (new Controller\NotFoundController())->exception($exception);

}

echo ob_get_clean();
