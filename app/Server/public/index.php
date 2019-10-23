<?php

require_once __DIR__ . '/../public/../../../vendor/autoload.php';

use Server\Framework\App;

try {

    (new App())->handleRequest();

} catch (\Exception $e) {

    http_response_code(500);
    echo '<h1>Ran into a problem here</h1><br /><h4>' . $e->getMessage() . '</h4><br /><pre>' . $e->getTraceAsString() . '</pre>';

} catch (Throwable $e) {

    http_response_code(500);
    echo '<h1>We threw a tire</h1><br /><h4>' . $e->getMessage() . '</h4><br /><pre>' . $e->getTraceAsString() . '</pre>';

}