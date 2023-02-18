<?php

use Apsl\Inf\Lab01\Controller\Error404Page;
use Apsl\Inf\Lab01\Controller\HomePage;
use Apsl\Inf\Lab01\Controller\NewPassword;
use Apsl\Inf\Lab01\Controller\PasswordRecovery;


return [
    '/' => HomePage::class,
    '_404' => Error404Page::class,
    '/password-recovery' =>PasswordRecovery::class,
    '/new-password' => NewPassword::class
];
