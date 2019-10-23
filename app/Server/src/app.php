<?php
/**
 * Created by Daniel Lowhorn <daniel@ltwproductions.com>
 * User: daniel
 * Date: 10/23/19
 * Time: 2:00 PM
 */

namespace Server;

use Symfony\Component\Routing\Matcher\Dumper\CompiledUrlMatcherDumper;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

//
// GET endpoints
$getRoutes = [
    'home'         => '/',
    'get-payloads' => '/get-payloads/{token}',
];

foreach ($getRoutes as $name => $route) {
    $gRoute = new Route($route);
    $gRoute->setMethods('GET');
    $routes->add($name, $gRoute);
}

//$getPayloads = new Route('/get-payloads/{token}');
//$getPayloads->setMethods('GET');
//$routes->add('get-payloads', $getPayloads);

//
// @TODO - POST endpoints

return (new CompiledUrlMatcherDumper($routes))->getCompiledRoutes();