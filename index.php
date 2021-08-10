<?php

session_start();
//echo('Front-Controller: OK');
require_once('sys/lib/autoloader.php');

// Тесты базовых и ключевых классов:
// -------------------------------------
/*
$provider = new \sys\lib\Provider;
$model = new \sys\core\Model;
$model->test();

$result = $model->execute_select_query('select * from roles');
echo('<pre>');
print_r($result);
echo('</pre>');
*/

//$model->execute_dml_query("insert into roles (name) values (?)", ['moder']);
//$model->execute_dml_query("insert into roles (name) values (?)", ['user']);
//$model->execute_dml_query("insert into roles (name) values ('admin')"); // регистрируем роль админ

/*
$testObject = new \sys\core\Test;
$baseController = new \sys\core\Controller;
*/
//$homeController = new \app\controllers\Home;
//$homeController->index();
//$homeController->about();
//$homeController->contact();