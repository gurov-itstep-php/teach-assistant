<?php

namespace sys\core;

use \sys\lib\Field as Field;

class Form {

    public $name;
    public $className;
    public $methodName;
    public $actionPath;
    public $enctype;
    public $fields;

    public function generate() {
        echo('<form');
        echo(' id="'.$this->name.'"');
        echo(' class="'.$this->className.'"');
        echo(' method="'.$this->methodName.'"');
        echo(' action="'.$this->actionPath.'"');
        //
        if($this->enctype !== '') {
            echo(' enctype="'.$this->enctype.'"');
        }
        // echo(' onsubmit="return false"'); //валидация
        echo('>');
        //
        if(is_array($this->fields) && count($this->fields) > 0) {
            foreach ($this->fields as $field) {
                if ($field instanceof Field) {
                    echo('<div class="form-group">');
                        //
                    echo('<label for="'.$field->name.'">');
                    echo(ucfirst($field->name).':');
                    echo('</label>');
                        //
                    $field->generate();
                        //
                    echo('<div class="error"');
                    echo(' id="'.$field->name.'-error">');
                    echo('');
                    echo('</div>');
                        //
                    echo('</div>');
                }
            }
        }
        //
        echo('<div class="btn-group">');
        echo('<input type="submit" id="submit" name="submit" value="Отправить" class="btn-sm btn-success my-btn" />');
        echo('<input type="reset" id="reset" name="reset" value="Очистить" class="btn-sm btn-danger my-btn" />');
        echo('</div>');
        //
        echo('</form>');
    }

    public function fill() {
        if(is_array($this->fields) && count($this->fields) > 0) {
            foreach ($this->fields as $field) {
                if(isset($_POST[$field->name])) {
                    $field->fieldValue = $_POST[$field->name];
                }
            }
        }
    }
}