<?php

namespace app\controllers;

use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \app\models\User as User;
use \app\forms\FeedbackForm as FeedbackForm;
use \sys\lib\Feedbacker as Feedbacker;
use \sys\lib\Status as Status;

class Feedback extends Controller
{

    public function __construct()
    {
        parent::__construct(new User());
    }

    public function index()
    {
        $userName = Status::get_current_user(); // получаю имя текущего пользователя
        $userEmail = strval(current($this->model->get_uesr_email_by_ligin($userName)[0]));
        //
        if($userName !== 'Guest') {
            $form = new Feedbackform();
            $form->fill();
            //
            if (empty($_POST['submit'])) {
                return new View('feedback/index.php', [
                    'title' => 'Обратная связь',
                    'form' => $form
                ]);
            }
            $subject = $form->fields[0]->fieldValue;
            $mess = $form->fields[1]->fieldValue;
            //
            $feedbacker = new Feedbacker($userEmail, $userName, $subject, $mess);
            $feedbacker->send();
            //
            $message = "Ваше письмо отправлено администрации сайта Teach-Assistant<br>";
            $message .= '<h4 style="text-align: left;">Тема: '.$subject.'</h4>';
            $message .= '<h5 style="text-align: left;">Текст:</h5>';
            $message .= '<p style="text-align: left;">'.$mess.'</p>';
            $color = 'darkcyan';
            //
            return new View('feedback/feedbackinfo.php', [
                'title' => 'Feedback-Info',
                'message' => $message,
                'color' => $color
            ]);
        
        } else {
            $message = 'Для авторизации перейдите по ссыдке: <a href="http://localhost/php/teach-assistant/auth/entry">Войти в систему</a><br><br>';
            $message .= "Если Вы еще не зарегистрированы на сайте Teach-Assistant,<br> пожалуйста зарегистрируйтесь по ссыле: <br>";
            $message .= '<a href="http://localhost/php/teach-assistant/auth/entry">Зарегистрироваться</a>';
            $color = 'darkgreen';
            new View('feedback/feedbackguest.php', [
                'title' => 'Обратная связь',
                'message' => $message,
                'color' => $color
            ]);
        }


        
       
    }
}
