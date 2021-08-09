<?php

namespace app\controllers;

use \sys\core\View as View;
use \sys\core\Controller as Controller;

class Home extends Controller {

    public function index() {
        //echo('<h4>Загрузка представления главной страницы ...</h4>');
        return new View('home/index.php', [
            'param1' => 123,
            'param2' => 3.14,
            'param3' => 'fa-fa',
            'param4' => [100, 200, 300]
        ]);
    }

    public function about() {
        //echo('<h4>Загрузка представления страницы про сайт ...</h4>');
        return new View('home/about.php');
    }

    public function contact() {
        //echo('<h4>Загрузка представления страницы контактов ...</h4>');
        return new View('home/contact.php');
    }
}