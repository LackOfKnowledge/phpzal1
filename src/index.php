<?php

require_once './vendor/autoload.php';

use Apsl\Http\Request;
use Apsl\Http\Response;
use Apsl\Session\Session;


$request = new Request();
$name = $request->getQueryStringValue(name: 'name', default: 'Anonymous');

$session = new Session();
$session->setValue('test', 'This is the test!');

$response = new Response();
$response->setBody("Hello {$name}!");
$response->setCookie('session', sha1(time()));
$response->send();
