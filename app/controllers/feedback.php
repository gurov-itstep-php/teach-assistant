<?php

namespace app\controllers;

use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \app\models\User as User;
use \app\forms\FeedbackForm as FeedbackForm;
use \sys\lib\Feedbacker as Feedbacker;
//use \sys\lib\Status as Status;

class Feedback extends Controller {

    public function __construct() {
        parent::__construct(new User());
    }

    public function index() {
        $form = new Feedbackform();
        if (empty($_POST['submit'])) {
            return new View('feedback/index.php', [
                'title' => 'Обратная связь',
                'form' => $form
            ]);
        }
    }
}