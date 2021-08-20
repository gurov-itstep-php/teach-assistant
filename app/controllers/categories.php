<?php

namespace app\controllers;

use \app\models\Category as Category;
use \app\forms\CategoryForm as CategoryForm;
use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \sys\lib\Status as Status;

class Categories extends Controller
{

    public function __construct()
    {
        parent::__construct(new Category());
    }

    public function index()
    {
        return new View('categories/index.php', ['title' => 'Управление категориями']);
    }

    public function redirect() {
        return new View('categories/redirect.php', ['title' => 'Перенаправление']);
    }

    // [ACCESS]
    public function create()
    {
        $grantUser = 'admin123';
        if (Status::get_current_user() !== $grantUser) {
            // deny ->
            return new View('errors/forbidden.php', [
                'title' => 'Page 403'
            ]);
        } else {
            // work ->
            $form = new CategoryForm();
            // get:
            if (empty($_POST['submit'])) {
                return new View('categories/create.php', [
                    'title' => 'Добавление категории',
                    'form' => $form
                ]);
            } else {
                // post:
                $form->fill();
                $categoryName = $form->fields[0]->fieldValue;
                $this->model->add_category($categoryName);
                // redirect to CategoriesList:
                //--------------------------------
                //$this->index();
                $this->redirect();
            }
        }
    }

    public function update($categoryId)
    {
        return new View('categories/update.php', ['title' => 'Обновление категории']);
    }

    public function delete($categoryId)
    {
        return new View('categories/delete.php', ['title' => 'Удаление категории']);
    }
}
