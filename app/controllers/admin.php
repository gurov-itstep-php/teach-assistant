<?php

namespace app\controllers;

use \sys\core\Controller as Controller;
use \sys\core\View as View;
use \sys\lib\Status as Status;

class Admin extends Controller {

      // [ACCESS]
    public function index() {
        // check status:
        $grantUser = 'admin123';
        if (Status::get_current_user() === $grantUser) {
            // grant ->
            return new View('admin/index.php', [
                'title' => 'Админка'
            ]);
        } else {
            // deny
            return new View('errors/forbidden.php', [
                'title' => 'Page 403'
            ]);
        }     
    }
}