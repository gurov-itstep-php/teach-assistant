<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class CategoryForm extends Form {

    public function __construct() {
        $this->name = 'categoryform';
        $this->className = 'category-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = 'multypart/form-data';
        $this->fields = [
            new Field('name', 'input', 'text', 'form-control')
        ];
    }
}