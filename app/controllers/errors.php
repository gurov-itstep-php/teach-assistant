<?php

namespace app\controllers;

use \sys\core\View as View;
use \sys\core\Controller as Controller;

class Errors extends Controller {
    public function notfound() {
        return new View('errors/notfound.php', [
            'title' => 'Page 404'
        ]);
    }

    public function forbidden() {
        return new View('errors/forbidden.php', [
            'title' => 'Page 403'
        ]);
    }
}