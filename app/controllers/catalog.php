<?php

namespace app\controllers;

use \app\models\Material as Material;
use \app\forms\Materialform as Materialform;
use \sys\core\Controller as Controller;
use \sys\core\View as View;

class Catalog extends Controller {

    public function __construct() {
        parent::__construct(new Material());
    }

    public function index() {
        return new View('catalog/index.php', ['title' => 'Каталог материалов']);
    }

    public function create() {
        return new View('catalog/create.php', ['title' => 'Добавление материяла']);
    }

    public function update($materialId) {
        return new View('catalog/update.php', ['title' => 'Обновление материяла']);
    }
    
    public function delete($materialId) {
        return new View('catalog/delete.php', ['title' => 'Удаление материяла']);
    }

    public function details($materialId) {
        return new View('catalog/details.php', ['title' => 'Просмотр материяла']);
    }
}