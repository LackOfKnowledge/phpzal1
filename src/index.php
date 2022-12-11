<?php

require_once './vendor/autoload.php';

use Apsl\Http\Request;
use Apsl\Http\Response;


$request = new Request();
$name = $request->getQueryStringValue(name: 'name', default: 'Anonymous');

$response = new Response();
$response->setBody("Hello {$name}!");
$response->setCookie('session', sha1(time()));
$response->send();
