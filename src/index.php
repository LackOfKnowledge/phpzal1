<?php

require_once './vendor/autoload.php';

use Apsl\Http\Request;
use Apsl\Http\Response;


$request = new Request();

$currentUri = $request->getCurrentUri(withQueryString: false);
if ($currentUri === '/') {
    $name = $request->getQueryStringValue(name: 'name', default: 'Anonymous');
    $title = 'Welcome Page';

    ob_start();
    include 'templates/index.html.php';
    $html = ob_get_clean();

    $response = new Response();
    $response->setBody($html);
    $response->send();
} elseif ($currentUri === '/contact') {
    $title = 'Contact Page';

    ob_start();
    include 'templates/contact.html.php';
    $html = ob_get_clean();

    $response = new Response();
    $response->setBody($html);
    $response->send();
} else {
    $response = new Response();
    $response->setStatusCode(Response::CODE_404_NOT_FOUND);
    $response->send();
}
