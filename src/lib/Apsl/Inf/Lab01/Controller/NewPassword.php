<?php

namespace Apsl\Inf\Lab01\Controller;

use Apsl\Controller\BasePage;

class NewPassword extends BasePage
{

    protected function doHandle(): void
    {
        if ($this->request->getQueryStringValue('success')===null)
        {
            $hash=$this->request->getQueryStringValue('hash');
            session_start();
            if(!isset($_SESSION['hash']) || $hash=$_SESSION['hash']) $this->response->redirect(('/error'));
            if($this->request->isMethod(Request::METHOD_POST))
            {
                $data=$this->request->getValue('newPassword');
                $password=trim($data['password']);
                $passwordAgain=trim($data['passwordAgain']??'');
                $errors=[];
                $regularExpressionForPassword="/^(?=.?[A-Z])(?=.?[a-z])(?=.?[0-9])(?=.?[#?!@$%^&*-]).{8,}$/";

                if(!preg_match($regularExpressionForPassword, $password))
                {
                    $errors['password']='Minimum 8 znaków, jedna wielka litera, jedna mała i jeden znak specjalny';
                }
                if($passwordAgain!==$password)
                {
                    $errors['passwordArentTheSame'] = 'Wprowadzone hasła się różnią';

                }
                if (empty($errors))
                {
                    $this->response-redirect($this->request->gerCurrentUri(withQueryString: false).'success=true');
                    return;
                }
            }
        }
        $this->response->setBody($this->useTemplate('templates/new-password.html.php', [
            'title' => 'Podaj nowe hasło',
            'errors' => $errors ??[],
            'data'=>$data ??[],
            'success'=>$this->request->getValue('success', false)
        ]));
    }
}