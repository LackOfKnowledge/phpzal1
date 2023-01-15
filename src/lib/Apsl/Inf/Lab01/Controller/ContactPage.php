<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;
use Apsl\Http\Request;


class ContactPage extends BasePage
{
    protected function doHandle(): void
    {
        if ($this->request->isMethod(Request::METHOD_POST)) {
            $data = $this->request->getValue('contact');
            $email = trim($data['email'] ?? '');
            $message = trim($data['message'] ?? '');

            $errors = [];
            if ($email === '') {
                $errors['email'] = 'Field required';
            } elseif (filter_var($email, filter: FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Wrong email format';
            }
            if ($message === '') {
                $errors['message'] = 'Field required';
            }

            if (empty($errors)) {
                // TODO: send email

                $this->response->redirect($this->request->getCurrentUri(withQueryString: false) . '?success=true');
                return;
            }
        }

        $this->response->setBody($this->useTemplate('templates/contact.html.php', [
            'title' => 'Contact Page',
            'errors' => $errors ?? [],
            'data' => $data ?? [],
            'success' => $this->request->getValue('success', false)
        ]));
    }
}
