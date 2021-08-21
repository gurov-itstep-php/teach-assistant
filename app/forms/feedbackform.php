<?php

namespace app\forms;

use \sys\core\Form as Form; //#
use \sys\lib\Field as Field; //#

class Feedbackform extends Form {

    public function __construct() {
        $this->name = 'feedbackform';
        $this->className = 'feedback-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = '';
        $this->fields = [
            new Field('subject', 'input', 'text', 'form-control'),
            new Field('message', 'textarea', 'text', 'form-control') 
            // !!! не работает <textarea> - выдает ошибку message-error - парный тег????? - решено!
        ];
    } 
}