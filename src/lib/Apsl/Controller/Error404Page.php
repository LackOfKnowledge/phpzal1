<?php

namespace Apsl\Controller;

use Apsl\Http\Response;


class Error404Page extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody('Page does not exist.');
        $this->response->setStatusCode(Response::CODE_404_NOT_FOUND);
    }
}
