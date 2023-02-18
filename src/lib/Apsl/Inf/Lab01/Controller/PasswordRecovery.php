<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage as BasePageAlias;
use Apsl\Http\Request;
use Symfony\Component\Mailer\Bridge\Google\Transport\GmailSmtpTransport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class PasswordRecovery extends BasePageAlias
{
    protected string $email;
    protected function doHandle(): void
    {
        if ($this->request->isMethod(Request::METHOD_POST)) {
            $data = $this->request->getValue('user');
            $email = trim($data['email'] ?? '');

            $errors = [];
            if ($email === '') {
                $errors['email'] = 'Pole wymagane';
            } elseif (filter_var($email, filter: FILTER_VALIDATE_EMAIL) === false) {
                $errors['email'] = 'Podałeś nieprawidłowy adres e-mail.';
            }

            if (empty($errors)) {
                $this -> sendEmail($email);
                $this->response->redirect($this->request->getCurrentUri(withQueryString: false) . '?success=true');
                return;
            }
        }

        $this->response->setBody($this->useTemplate('templates/password-recovery.html.php', [
            'title' => 'Resetowanie hasła',
            'errors' => $errors ?? [],
            'data' => $data ?? [],
            'success' => $this->request->getValue('success', false)
        ]));
    }

    public function sendEmail(string $email): void
    {
        $hash = sha1(time());
        session_start();
        $_SESSION['hash'] = $hash;

        $email = (new Email())
            ->from('testkolophp123@gmail.com')
            ->to($email)
            ->subject('Resetowanie hasła')
            ->html("Kliknij w <a href='http://localhost/new-password?hash={$hash}'>[LINK], aby ustawić nowe hasło</a>");

        $mailer = new GmailSmtpTransport('testkolophp123@gmail.com', 'yvfqgjibabrroybn');
        $mailer->send($email);
    }
}