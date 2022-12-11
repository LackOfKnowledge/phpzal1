<?php

require_once './vendor/autoload.php';


use Apsl\Inf\Lab01\Message;


$msg = new Message(name: 'Janusz');
$msg->output();
