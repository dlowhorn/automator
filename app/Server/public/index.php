<?php

require_once __DIR__ . '/../public/../../../vendor/autoload.php';

use Server\Controller\ControllerInterface;
use Server\Framework\Router;
use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Request;
use Server\Controller;

$request = Request::createFromGlobals();
$routes  = include __DIR__ . '/../src/app.php';
$router  = new Router($routes);

ob_start();

try {

    ($router->mapRequestToController($request))->index();

} catch (Routing\Exception\ResourceNotFoundException $exception) {

    http_response_code(500);
    echo (new Controller\NotFoundController())->exception($exception);

}

echo ob_get_clean();
