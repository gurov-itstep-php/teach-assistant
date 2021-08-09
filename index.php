<?php

session_start();
//echo('Front-Controller: OK');
require_once('sys/lib/autoloader.php');
$testObject = new \sys\core\Test;