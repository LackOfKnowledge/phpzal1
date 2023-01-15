<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;


class Error404Page extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/_404.html.php'));
    }
}
