<?php

session_start();
//echo('Front-Controller: OK');
require_once('sys/lib/autoloader.php');

// Тесты базовых и ключевых классов:
// -------------------------------------
/*
$testObject = new \sys\core\Test;
$baseController = new \sys\core\Controller;
*/
$homeController = new \app\controllers\Home;
$homeController->index();
//$homeController->about();
//$homeController->contact();