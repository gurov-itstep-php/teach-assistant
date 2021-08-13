<?php

namespace app\controllers;

use \sys\core\View as View;
use \app\models\User as User;
use \app\forms\Regform as Regform;
use \sys\core\Controller as Controller;
use \sys\lib\Mailer as Mailer;

class Auth extends Controller {

    public function __construct() {
        parent::__construct(new User());
    }

    public function reg() {
        $form = new Regform();
        if (empty($_POST['submit'])) {
            return new View('auth/reg.php', [
                'title' => 'Регистрация',
                'form' => $form
            ]);
        } else {
            //
            $form->fill();
            //
            $login = $form->fields[0]->fieldValue;
            $passw = md5($form->fields[1]->fieldValue);
            $email = $form->fields[3]->fieldValue;
            $regdate = date('Y-m-d H:i:s');
            $role_id = 3;
            $tatus_id = 1; // new_user
            $confirm = 'no';
            ///
            $this->model->register($login, $passw, $email, $regdate, $role_id, $status_id, $confirm);
            ///
            // mail ...
            $mailer = new Mailer($email);
            $mailer->send();
            ///
            $message = "Вы успешно зарегистрировались на сайте Teach-Assistant<br>";
            $message .= "На указанный вами e-mail: <b>$email</b> отправлено письмо,";
            $message .= "в котором содержится ссылка на подтверждение Вашей регистрации.";
            $color = 'darkcyan';
            //
            return new View('auth/reginfo.php', [
                'title' => 'Register-Info',
                'message' => $message,
                'color' => $color
            ]);
        }
    }

    public function confirm($email) {
        $this->model->reg_confirm($email);
        return new View('auth/confirm.php', [
            'title' => 'Register-Confirm',
            'message' => "Регистрация пользователя <b>$email</b> - успешно подтверждена",
            'color' => 'blue'
        ]);
    }

    public function entry() {
        return new View('auth/entry.php', ['title' => 'Авторизация']);        
    }
}