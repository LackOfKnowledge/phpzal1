<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;


class HomePage extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/index.html.php', [
            'title' => 'Welcome Page',
            'name' => $this->request->getQueryStringValue(name: 'name', default: 'Anonymous')
        ]));
    }
}
