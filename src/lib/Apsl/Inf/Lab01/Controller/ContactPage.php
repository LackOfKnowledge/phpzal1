<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;


class ContactPage extends BasePage
{
    protected function doHandle(): void
    {
        $this->response->setBody($this->useTemplate('templates/contact.html.php', [
            'title' => 'Contact Page',
        ]));
    }
}
