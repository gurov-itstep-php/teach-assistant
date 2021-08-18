<?php

namespace app\controllers;

use \sys\core\View as View;
use \app\models\User as User;
use \app\forms\Regform as Regform;
use \app\forms\Entryform as Entryform;
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
                'form' => $form,
                'script' => View::RES.'/js/reg.js'
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
            $status_id = 1; // new_user
            $confirm = 'no';
            ///
            $this->model->register($login, $passw, $email, $regdate, $role_id, $status_id, $confirm);
            ///
            // mail ...
            $mailer = new Mailer($email);
            $mailer->send();
            ///
            $message = "Вы успешно зарегистрировались на сайте Teach-Assistant<br>";
            $message .= "На указанный вами e-mail: <b>$email</b> отправлено письмо, ";
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
            'message' => "Регистрация пользователя <b>$email</b> - успешно подтверждена!",
            'color' => 'blue'
        ]);
    }

    //*
    public function entry() {
        $form = new Entryform();
        if (empty($_POST['submit'])) {
            return new View('auth/entry.php', [
                'title' => 'Авторизация',
                'form' => $form
            ]);
        } else {
            // сценарий авторизации
            //----------------------------------
            $form->fill();
            //
            $login = $form->fields[0]->fieldValue;
            $passw = md5($form->fields[1]->fieldValue);
            $stand = $form->fields[2]->fieldValue;
            //
            if ($this->model->authenticate($login, $passw)) {
                //*
                if($this->model->check_confirm($login)) {
                    $_SESSION['user'] = $login;
                    if ($stand === 'yes') {
                        setcookie('user', $login, time() + 3600 * 24 * 7 ); // куки на 7 дней
                    }
                    $message = 'Вы успешно авторизованы на сайте Teach-Assistant!<hr>';
                    $color = 'darkcyan';
                } else {
                    $message = 'Ваша регистрация на сайте Teach-Assistant еще не подтверждена!<hr>';
                    $color = 'darkblue';
                }
            } else {
                $message = 'Авторизация провалена - такой пользователь не найден!<hr>';
                $color = 'red';
            }
            // 
            return new View('auth/entryinfo.php', [
                'title' => 'Register-Info',
                'message' => $message,
                'color' => $color
            ]);
        }
    }

    public function profile() {
        return new View('auth/profile.php', [
            'title' => 'Профиль пользователя'
        ]);
    }

    public function exit() {
        session_destroy();
        if (isset($_COOKIE['user'])) {
            setcookie('user', '', time() - 3600);
        }
        return new View('auth/exit.php', [
            'title' => 'Выход из системы'
        ]);
    }

    //--------------------------------------------ajax
    public function ajax_check_login() {
        //echo('ajax-OK!');
        $loginX = $_POST['login'];
        if ($this->model->check_login($loginX)) {
            echo('свободен');
        } else {
            echo('занят');
        }
    }
	
	public function ajax_check_email() {
        $emailX = $_POST['email'];
        if ($this->model->check_email($emailX)) {
            echo('свободен');
        } else {
            echo('занят');
        }
    }
}