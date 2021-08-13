<?php

namespace app\models;

use \sys\core\Model as Model;

class User extends Model {

    public function register($login, $passw, $email, $regdate, $role_id, $status_id, $confirm) {
        $sql = 'insert into users (login, passw, email, regdate, role_id, status_id, confirm) ';
        $sql .= 'values (?, ?, ?, ?, ?, ?, ?)';
        $params = [$login, $passw, $email, $regdate, $role_id, $status_id, $confirm];
        $this->execute_dml_query($sql, $params);
    }

    public function reg_confirm($email) {
        $sql = "update users set confirm='yes' where email=?";
        $params = [$email];
        $this->execute_dml_query($sql, $params);
    }
}