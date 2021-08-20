<?php

namespace app\forms;

use \sys\core\Form as Form;
use \sys\lib\Field as Field;

class MaterialForm extends Form {

    public function __construct() {
        $this->name = 'materialform';
        $this->className = 'material-form';
        $this->methodName = 'post';
        $this->actionPath = '#';
        $this->enctype = 'multypart/form-data';
        $this->fields = [
            new Field('title', 'input', 'text', 'form-control'),
            new Field('category', 'select', '-', 'form-control'),
            new Field('author', 'select', '-', 'form-control'),
            new Field('about', 'textarea', '-', 'form-control'),
            new Field('image', 'input', 'file', 'form-control'),
            new Field('content', 'input', 'file', 'form-control'),
            new Field('lastpublish', 'input', 'date', 'form-control'),
            new Field('lastvideo', 'input', 'url', 'form-control'),
            new Field('price', 'input', 'number', 'form-control')
        ];
    }
}